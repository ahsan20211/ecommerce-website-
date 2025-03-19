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
                        <a href="#" class="text-white text-decoration-none">Create</a>
                    </button>
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Product A</td>
                    <td>$10.00</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Product B</td>
                    <td>$15.00</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


    </div>

@endsection

