<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Rules\UniqueProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function create()
    {
        return view('product.create');
    }

    function store()
    {

        // Validate the input parameters
        $attributes = request()->validate([
            'name' => ['required', new UniqueProduct],
            'description' => ['required'],
            'quantity' => ['required'],
            'image' => ['required', 'image'],
        ]);

        // Set the image name to the product name
        $imageName = strtolower($attributes['name'] . "." . $attributes['image']->extension());

        // Store the image in the path
        $pathName =  "storage/" . $attributes['image']->storeAs('images/products', $imageName, 'public');
        // Insert the product into the database
        Product::create([
            'name' => $attributes['name'], 
            'description' => $attributes['description'],
            'quantity' => $attributes['quantity'],
            'image' => $pathName,
        ]);

        
        return redirect(route('create-product'))->with('success', "Product Created Successfully");
    }

    function list(){
        return view('product.list', [
            'products' => Product::all()
        ]);
    }

    function delete(Product $product){
        // $product->delete();
        return redirect(route('list-product'))->with('deleted', "Deleted product with name \"" . $product->name . "\".");
    }
}
