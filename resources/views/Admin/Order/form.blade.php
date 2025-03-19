@extends('Admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <h2>{{$title}}</h2>

                <div class="col-lg-6">
                    <input type="text" class="form-control" placeholder="Title" name="title">
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control" placeholder="Price" name="price">
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control mt-3" placeholder="Category" name="category">
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control mt-3" placeholder="Brand" name="brand">
                </div>
                <div class="col-lg-6">
                    <input type="file" class="form-control mt-3">
                </div>
                <div class="col-lg-6">
                    <input type="submit" class="btn btn-primary mt-3">
                </div>
            </div>
        </div>
    </div>
    <div>

@endsection
