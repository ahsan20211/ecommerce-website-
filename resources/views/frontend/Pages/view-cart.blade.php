@extends('frontend.layout.master')
@section('content')
    <div class="container my-5">
        <h2 class="mb-4">Shopping cart</h2>
        <div class="row">
            <div class="col-lg-8">
                <div class="card p-3">
                    <table class="table align-middle">
                        <thead>
                        <tr>
                            <th>PRODUCT</th>
                            <th>QUANTITY</th>
                            <th>PRICE</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $total = 0; @endphp

                        @foreach($cart as $cart)
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{$cart['productImg']}}" class="me-3 rounded object-fit-contain"
                                         style="height:70px" width="70px" alt="Product">
                                    <div>
                                        <p class="mb-0 fw-bold">{{$cart['productTitle']}}</p>
                                        <small><b>Category:</b>{{$cart['productCategory']}}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group w-auto">
                                    <form action="{{'/decrement/' . $cart['product_id']}}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-secondary" type="submit">-</button>
                                    </form>
                                    <input type="number" value="{{$cart['product_qty']}}" min="1"
                                           class="form-control text-center w-25" id="product-qty">
                                    <form action="{{'/increment/'. $cart['product_id']}}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-secondary" type="submit">+</button>
                                    </form>

                                </div>
                            </td>
                            <td>
                                <p class="mb-0 fw-bold">{{$cart['productPrice'] * $cart ['product_qty']}}</p>
                                <small>{{$cart['productPrice']}}each</small>
                            </td>
                            <td>
                                <a href="/product/delete/{{$cart['product_id']}}"
                                   class="btn btn-outline-danger btn-sm">Remove</a>
                            </td>
                            </tr>


                            @php $total += $cart['productPrice'] * $cart ['product_qty']; @endphp

                        @endforeach

                        </tbody>

                    </table>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="card p-3">
                    <h5>Have coupon?</h5>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Coupon code">
                        <button class="btn btn-primary">Apply</button>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total:</h5>
                        <h5 class="text-success">${{$total}}</h5>
                    </div>
                    <hr>
                    <div class=" my-2">
                        <h4 class="text-left">Checkout Form</h4>
                        <form>
                            <!-- Personal Information -->
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName"
                                           placeholder="Enter your first name" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName"
                                           placeholder="Enter your last name" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                            </div>

                            <!-- Shipping Information -->
                            <h5 class="mt-4">Shipping Information</h5>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address"
                                       placeholder="Enter your shipping address" required>
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" id="country" required>
                                    <option value="">Select your Country</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="Uk">United Kingdom</option>
                                    <option value="AU">Australia</option>
                                    <!-- Add more countries as needed -->
                                </select>
                            </div>

                            <!-- Payment Information -->
                            <h5 class="mt-4">Payment Information</h5>
                            <div class="mb-3">
                                <label for="cardName" class="form-label">Name on Card</label>
                                <input type="text" class="form-control" id="cardName" placeholder="Enter name on card"
                                       required></div>
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber"
                                       placeholder="Enter your card number" required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="expiryDate" class="form-label">Expiry Date</label>
                                    <input type="month" class="form-control" id="expiryDate" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" placeholder="Enter your CVV"
                                           required>
                                </div>
                            </div>

                            <!-- Terms & Conditions -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                <label class="form-check-label" for="termsCheck">
                                    I agree to the <a href="#">Terms and Conditions</a>.
                                </label>

                            </div>
                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Complete Checkout</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

