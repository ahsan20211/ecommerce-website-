@extends('frontend.layout.master')
@section('content')

    <form action="/register/store/" method="POST" class="register-section">
        @csrf
        <div class="container">
            <h1>Register Form</h1>
            <div class="row">
                <div class="col-lg-6">
                    <input type="text" placeholder="Name" name="name" class="form-control mt-2">
                </div>
                <div class="col-lg-6">
                    <input type="email" placeholder="email" name="email" class="form-control mt-2">
                </div>
                <div class="col-lg-6">
                    <input type="text" placeholder="Phone Number" name="number" class="form-control mt-2">
                </div>
                <div class="col-lg-6">
                    <input type="password" placeholder="password" name="password" class="form-control mt-2">
                </div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary mt-3">submit</button>
                </div>
            </div>
        </div>
    </form>

@endsection
