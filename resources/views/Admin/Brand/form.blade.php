@extends('Admin.layouts.master')
@section('content')
    <div class="content">
        <div class="container">
            <h2>{{$title}}</h2>
            <form action="{{isset($edit) ? '/admin/brand/update/'.$edit->id : '/admin/brand/store'}}" method="POST" enctype="multipart/form-data">
                @if(isset($edit))
                <input type="hidden" name="_method" value="PUT"/>
                @endif

                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" class="form-control" placeholder="Title" name="title" value="{{isset($edit) ? $edit->title : ''}}">
                    </div>

                    <div class="col-lg-6">
                        <input type="submit" value="{{ isset($edit) ? 'Update' : 'Submit' }}" class="btn btn-primary">

                    </div>

                </div>
            </form>
        </div>
    </div>
    <div>

@endsection
