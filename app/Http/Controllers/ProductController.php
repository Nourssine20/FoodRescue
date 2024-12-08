<?php

namespace App\Http\Controllers;

use App\Events\NotificationEvent;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request) 
    {
        $validated = $request->validated(); 

      
        $validated['image'] = $this->uploadImage($request);
        Product::create($validated);
        $name=$request->name;
        event(new NotificationEvent($name));
        
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id) 
    {
        $product = Product::findOrFail($id);
        $validated = $request->validated(); 
        $validated['image'] = $this->uploadImage($request);
        
      

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    private function uploadImage(ProductRequest $request)
    {
        if ($request->hasFile('image')) {
           return $request->file('image')->store('products', 'public');
        }
        return null;
    }
}
