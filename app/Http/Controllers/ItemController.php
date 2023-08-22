<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

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

    //show item creation form
    public function create(){
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    //store in the database the new item
    public function store(Request $request){

        $formFields = $request->validate([
            //here we will add what rules we want for our fields
            'itemName' => ['required','min:3'],
            'itemImage' => 'required',
            'description' => ['required', 'min:5'],
            'size' => 'required',
            'price' => 'required',
            'brand'=> 'required',
            'condition'=> 'required',
            'dateListed' => ['required', 'date'],
            'tags' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'sellerUser_id'=> 'required',
            'buyerUser_id'
        ]);

        //make sure the image is here before saving it
        if ($request->hasFile('itemImage')) {
            //let s brake this down together
            $formFields['itemImage'] = $request->file('itemImage')->store('ItemImages', 'public');
            //$ formFields['itemImage'] >> this will add a 'image' key to our array of data from the form
            //$request->file('itemImage') >> retrieve the image file that has been uploaded (could be any file really)
            //store('itemImages', 'public') > the file will be stored in public/itemImages/ , instead of just public
        }

        $formFields['user_id']=auth()->id();
        //this will add the logged in user_ to the new listing

        Item::create($formFields);

        //if one of this failed, it will show the error
        //when completed go to homepage
        return redirect('/')->with('message', 'Item create successfully');
    }


    //show edit items form
    public function edit(Item $item){
        $categories = Category::all();
        return view('items.edit', ['item'=> $item, 'categories' => $categories]);
    }

    //method to update the item in the db with the new informations
    public function update(Request $request, Item $item){
        $formFields = $request->validate([
            'itemName' => ['required','min:3'],
            'description' => ['required', 'min:5'],
            'size' => 'required',
            'price' => 'required',
            'brand'=> 'required',
            'condition'=> 'required',
            'dateListed' => ['required', 'date'],
            'tags' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'sellerUse_id'=> 'required',
            'buyerUser_id',
        ]);

        if ($request->hasFile('itemImage')) {
            $formFields['logo'] = $request->file('itemImage')->store('itemImages', 'public');
        }

        //update() changes the data in the table for us
        $item->update($formFields);

        return redirect('/items/' . $item->id)->with('message', 'Item updated successfully');
    }

    //method to delete a item
    public function destroy(Item $item){
        $item->delete();
        return redirect('/')->with('message', 'Item deleted succefully');
    }

    //manage items list (show all the user items he can edit or delete)
    public function manage(){
        return view('items.manage', ['items' => auth()->user()->items()->get()]);
        //'items' will contain all items created by the logged in user
    }

}
