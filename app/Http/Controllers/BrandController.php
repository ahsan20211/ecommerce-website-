<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use function PHPUnit\Runner\validate;

class BrandController extends Controller
{

    public function index()
    {
        $brandData = Brand::all();
        return view('Admin.Brand.index', compact('brandData'));
    }


    public function create()
    {
        $title = 'Add New Brand';
        return view('Admin.Brand.form', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required'
        ]);
        $brand = new Brand();
        $brand->title = $request->title;
        $brand->save();
        return redirect('admin/brand');

    }


    public function show(string $id)
    {


    }


    public function edit(string $id)
    {
        $title = 'Edit your Brand';
        $edit = Brand::find($id);
        return view('Admin.Brand.form', compact('edit', 'title'));

    }

    public function update(Request $request, string $id)

    {
        $request->validate([

            'title' => 'required'
        ]);
        $brand = Brand::find($id);
        $brand->title = $request->title;
        $brand->save();
        return redirect('/admin/brand');
    }

    public function delete(string $id)

    {
        $delete = Brand::find($id);
        $delete->delete();
        return redirect('admin/brand');

    }
}
