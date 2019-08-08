<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $total = Category::all()->count();

        return view('list-category', compact('categories', 'total'));
    }

    public function create()
    {

        return view('include-category');

    }

    public function store(Request $request)
    {

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->inactive = $request->inactive;
        $category->save();

        return redirect()->route('category.index')->with('messaage', 'Categoria criada com sucesso!');

    }

    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {

        $category = Category::findOrFail($id);

        return view('edit-category', compact('category'));

    }

    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->inactive = $request->inactive;
        $category->save();

        return redirect()->route('category.index')->with('messaage', 'Categoria alterada com sucesso!');

    }

    public function destroy($id)
    {
        
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('messaage', 'Categoria excluída com sucesso!');

    }
}
