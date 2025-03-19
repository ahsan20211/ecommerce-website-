<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categoryData = Category::all();
        return view('Admin.Category.index', compact('categoryData'));
    }

    public function create()
    {
        $title = 'Add New Category';
        return view('Admin.Category.form', compact('title'));
    }


    public function store(Request $request)
    {

        $request->validate([

            'title' => 'required'
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->save();
        return redirect('/admin/category');

    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
            $title = 'Edit Category';
            $category = Category::find($id);
            return view('Admin.Category.form',compact('title' , 'category'));
//        return 'edit';
    }

    public function update(Request $request, string $id)
    {
        $request->validate([

            'title' => 'required'
        ]);

        $category = Category::find($id);
        $category->title = $request->title;
        $category->save();

        return redirect('/admin/category');
    }

    public function delete(string $id)
    {
        $delete = Category::find($id);
        $delete->delete();
        return redirect('/admin/category');
    }
}
