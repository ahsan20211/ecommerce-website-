@extends('Admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container">
            <h2>{{$title}}</h2>
            <form action="{{isset($category) ? '/admin/category/update/'.$category->id : '/admin/category/store/'}}" method="POST" enctype="multipart/form-data">
                @if(isset($category))
                <input type="hidden" name="_method" value="PUT">
                @endif
                @csrf

                <div class="row">

                    <div class="col-lg-6">
                        <input type="text" class="form-control" placeholder="Title" name="title"
                               value="{{isset($category) ? $category->title : ''}}">
                    </div>

                    <div class="col-lg-6">
                        <input type="submit" value="{{isset($category) ? 'update' : 'submit'}}" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div>

@endsection
