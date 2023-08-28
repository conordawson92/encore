<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\ParentCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;


class ItemController extends Controller
{
    //method to show all the items in the home page 
    public function index()
    {
        // Declare $categories here
        $categories = Category::all();

        return view('items.index', [
            'categories' => $categories,
            'items' => Item::latest()->filter(request(['tag', 'search']))->paginate(6),
        ]);
    }

    //show a single item
    public function show(Item $item)
    {
        $categories = Category::all();
        return view('items.show', [
            'categories' => $categories,
            'item' => $item
        ]);
    }

    //show the category items
    public function ShowByCategory(Category $category)
    {
        $items = $category->items()->latest()->paginate(10);
        return view('categories.show', compact('category', 'items'));
    }

    //create new item method
    public function createItem()
    {
        $parentCategories = ParentCategory::all();
        $categories = Category::all();
        return view('items.createItem', ['parentCategories' => $parentCategories, 'categories' => $categories]);
    }

    //store the new item
    public function storeItem(Request $request)
    {
        $item = Item::create($request->all());
        $parentCategory = ParentCategory::find($request->input('parentCategory_id'));
        $category = Category::find($request->input('category_id'));

        //make sure the image is here before saving it
        if ($request->hasFile('itemImage')) {

            $path = "images/{$parentCategory->parentcategoryName}/{$category->category_name}";
            $imagePath = $request->file('itemImage')->store($path, 'public');

            // Prefix the stored path with /storage/
            $item->itemImage = '/storage/' . $imagePath;
            $item->save();
        }

        $request['sellerUser_id'] = auth()->id();
        //this will add the logged in user_ to the new item

        // Redirect the user after successful item creation

        return redirect('/adminUser/dashboard')->with('success', 'Item added successfully.');
    }
}
