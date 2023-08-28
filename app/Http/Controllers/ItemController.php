<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
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

        return view('items.index', [ 'categories'=> $categories, 
        'items' => Item::latest()->filter(request(['tag', 'search']))->paginate(6),
        ]);
    }

    //show a single item
    public function show(Item $item)
    {
        $categories = Category::all();
        return view('items.show', [
            'categories'=>$categories,
            'item'=> $item
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
        return view('items.createItem');
    }

    //store the new item
    public function storeItem(Request $request)
    {
        Log::info('Received request in storeItem method');
        Log::info('Validating form data');
        // Validate the form data
        $validatedData = $request->validate([
            'ItemName' => ['required','min:3'],
            'description' => ['required', 'min:5'],
            'size' => 'required',
            'price' => 'required',
            'brand'=> 'required',
            'condition'=> 'required', 
            //Rule::in(['new', 'used', 'very used'])],
            'tags' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
        ]);

        //make sure the image is here before saving it
        if ($request->hasFile('itemImage')) {
            $validatedData['itemImage'] = $request->file('itemImage')->store('images', 'public');
        }

        $validatedData['sellerUser_id']=auth()->id();
        //this will add the logged in user_ to the new item

        // value for the date
        $validatedData['dateListed'] = now();

        //default value for the status
        $validatedData['status'] = 'available';

        $validatedData['buyerUser_id'] = 1;

        Log::info('Form data validated');

        try {
            Log::info('Creating new item');
            $item= new Item($validatedData);
            $item->save();
            Log::info('Item created successfully');
        } catch (\Exception $e) {
            Log::error('Error creating item: ' . $e->getMessage());
            // Redirect the user with an error message
            return redirect('/adminUser/dashboard')->with('error', 'Failed to create item.');
        }

        // Redirect the user after successful item creation
        Log::info('Item added successfully');
        return redirect('/adminUser/dashboard')->with('success', 'Item added successfully.');
    }

}
