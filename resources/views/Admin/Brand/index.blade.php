@extends('Admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="text-left">Add New Brand</h2>
                </div>
                <div class="col-lg-6 text-end">
                    <button class="btn btn-primary ">
                        <a href="/admin/brand/create" class="text-white text-decoration-none">Create</a>
                    </button>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brandData as $data)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$data->title}}</td>
                        <td>
                            <a href="/admin/brand/edit/{{$data->id}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/admin/brand/delete/{{$data->id}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>


    </div>

@endsection

