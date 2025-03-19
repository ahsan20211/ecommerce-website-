<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

use function PHPUnit\Runner\validate;


class ProductController extends Controller
{

    public function index()
    {
        $productData = Product::with('category' , 'brand')->get();
        return view('Admin.Product.index', compact('productData'));
    }


    public function create()

    {
        $title = 'Add New Products';
        $categories  = Category::all();
        $brands  = Brand::all();
        return view('Admin.product.form', compact('title' ,'categories' , 'brands'));
    }


    public function store(Request $request)
    {
//        dd($request->all());

        $request->validate([

            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required'
        ]);


        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('upload', 'public');
            $product->image = $file;
        }
        $product->save();
        return redirect('/admin/product');

    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $title = 'Edit your Product';
        $edit = Product::find($id);
        $categories  = Category::all();
        $brands  = Brand::all();
        return view('Admin.Product.form', compact('title', 'edit','categories' ,'brands'));


    }

    public function update(Request $request, $id)
    {
//        dd($request->all());

        $request->validate([

            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required'
        ]);


        $product = Product::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('upload', 'public');
            $product->image = $file;
        }
        $product->save();
        return redirect('/admin/product');
    }


    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/product')->with('success', 'Product Deleted Successfully');
    }
}
