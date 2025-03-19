@extends('Admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container">
            <h2>{{$title}}</h2>
            <form action=" {{isset($edit) ? '/admin/product/update/'.$edit->id : '/admin/product/store/'}}"
                  method="POST" enctype="multipart/form-data">
                @csrf

                @if(isset($edit))
                    <input type="hidden" name="_method" value="put"/>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" class="form-control" placeholder="Title" name="title"
                               value="{{isset($edit) ? $edit->title : ''}}">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" placeholder="Price" name="price"
                               value="{{isset($edit) ? $edit->price : ''}}">
                    </div>
                    <div class=" col-lg-6">

                        <select name="category_id" class="form-control mt-3">
                            <option value="" disabled selected>Select Category</option>
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}" {{isset($edit) && $edit->category_id == $category->id ? 'selected' : ''}}>{{$category->title }}</option>

                                @endforeach
                            @endif
                        </select>

                    </div>
                    <div class=" col-lg-6">
                        <select name="brand_id" class="form-control mt-3">
                            <option value="" disabled selected>Select Brand</option>
                            @if(isset($brands))
                                @foreach($brands as $brand)
                                    {{--<option value="{{$brand->id}} ">{{$brand->title }}</option>--}}
                                    <option
                                        value="{{ $brand->id }}"{{ isset($edit) && $edit->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class=" col-lg-6">
                        <input type="file" name="image" class="form-control mt-3">
                        @if(isset($edit))
                            <img src="{{ Storage::url($edit->image) }}" alt="Image"
                                 class="object-fit-contain mt-2 "
                                 style="height: 75px; width: 75px;">
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <input type="submit" value="{{isset($edit) ? 'Update' : 'Submit'}}"
                               class="btn btn-primary mt-3">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div>

@endsection
