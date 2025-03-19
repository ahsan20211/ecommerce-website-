@extends('Admin.layouts.master')
@section('content')

    <div class="content">
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="text-left">Add New Product</h2>
                </div>
                <div class="col-lg-6 text-end">
                    <button class="btn btn-primary ">
                        <a href="/admin/product_create" class="text-white text-decoration-none">Create</a>
                    </button>
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $productData as $data)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->category->title ?? '' }}</td>
                        <td>{{$data->brand->title ?? ''}}</td>
                        <td>{{$data->price}}</td>
                        <td>
                            <img src="{{ Storage::url($data->image) }}" alt="Image"
                                 class="object-fit-contain"
                                 style="height: 75px; width: 75px;">
                        </td>
                        <td>

                            <a href="/admin/product/edit/{{$data->id}}" class="btn btn-warning btn-sm"> Edit</a>
                            <a href="/admin/product/delete/{{$data->id}}" class="btn btn-danger btn-sm"> Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>


    </div>

@endsection

