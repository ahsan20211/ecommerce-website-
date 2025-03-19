@extends('frontend.layout.master')
@section('content')
    <div class="container py-5">
        <div class="row g-4">
            <!-- Product Images -->
            <div class="col-md-6">
                <div class="border rounded p-3">
                    <img id="product_img" src="{{Storage::url($show->image)}}"
                         class="img-fluid object-fit-cover rounded mb-3"
                         style="height: 500px" alt="Product Image">
                    <div class="d-flex justify-content-center gap-2">
                        <img
                            src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg"
                            class="img-thumbnail" width="80" alt="Thumbnail">
                        <img
                            src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg"
                            class="img-thumbnail" width="80" alt="Thumbnail">
                        <img
                            src="https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg"
                            class="img-thumbnail" width="80" alt="Thumbnail">
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <h2 class="fw-bold" id="product_title">{{$show->title}}</h2>
                <a href="#" class="badge bg-primary text-decoration-none"
                   id="product_category">{{$show->category->title}}</a>
                <p class="fs-5 fw-semibold text-danger">New Price: $<span id="product_price">{{$show->price}}</span></p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur
                    placeat sapiente architecto illum soluta.</p>

                <ul class="list-unstyled">
                    <li><strong>Color:</strong> Black</li>
                    <li><strong>Availability:</strong> In stock</li>
                    <li><strong>Category:</strong> Shoes</li>
                    <li><strong>Shipping Area:</strong> Worldwide</li>
                    <li><strong>Shipping Fee:</strong> Free</li>
                </ul>

                <div class="d-flex align-items-center gap-3">
                    <input type="number" class="form-control w-auto" id="quantity" min="1" value="1">
                    <a href="/add_to_cart/" id="add_to_cart" class="btn btn-primary">Add to Cart <i
                            class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    $(document).on('click', '#add_to_cart', function (e) {
        e.preventDefault();
        // alert('working');

        let productImg = $('#product_img').attr('src');
        let productTitle = $('#product_title').text();
        let productQuantity = $('#quantity').val();
        let productPrice = $('#product_price').text();
        let productCategory = $('#product_category').text();


        $.ajax({

            url: '/add_to_cart',
            type: 'POST',

            headers: {

                'X-CSRF-Token': "{{csrf_token()}}",
            },

            data: {
                product_id:{{$show->id}},
                productImg: productImg,
                productQuantity: productQuantity,
                productTitle: productTitle,
                productPrice: productPrice,
                productCategory: productCategory
            },
            success: function (res) {
                // console.log(res);
                if (res.success) {
                    alert(res.success);
                }
                window.location.reload();
            }

        })
    });


</script>
