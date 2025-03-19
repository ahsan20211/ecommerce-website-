@extends('Admin.layouts.master')
@section('content')

    <div class="content">
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="text-left">Category</h2>
                </div>
                <div class="col-lg-6 text-end">
                    <button class="btn btn-primary ">
                        <a href="/admin/category/create" class="text-white text-decoration-none">Create</a>
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
                @foreach($categoryData as $Data )

                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$Data->title}}</td>
                    <td>
                        <a href="/admin/category/edit/{{$Data->id}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/admin/category/delete/{{$Data->id}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>

@endsection

