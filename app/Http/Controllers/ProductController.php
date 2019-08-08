<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        $total = Product::all()->count();
        return view('list-product', compact('products', 'total'));
    }

    public function create() {

        $categories = Category::all();

        return view('include-product', compact('categories'));
    }

    public function store(Request $request) {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->id_category = $request->id_category;
        
        $product->save();
        return redirect()->route('product.index')->with('message', 'Produto criado com sucesso!');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('edit-product', compact('product','categories'));
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id); 
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->id_category = $request->id_category;
        $product->save();
        return redirect()->route('product.index')->with('message', 'Produto alterado com sucesso!');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('message', 'Produto excluído com sucesso!');
    }

}
