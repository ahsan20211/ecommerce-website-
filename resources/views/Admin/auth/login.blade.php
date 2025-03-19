@extends('frontend.layout.master')
@section('content')

    <form action="/login/store/" method="POST" class="register-section">
        @csrf
        <div class="container">
            <h1>login Form</h1>
            <div class="row">
                <div class="col-lg-6">
                    <input type="email" placeholder="Email" name="email" class="form-control mt-2">
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
