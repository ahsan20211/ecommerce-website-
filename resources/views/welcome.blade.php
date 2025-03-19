<div class="container mx-auto pt-10 pb-15">
    <div class="flex flex-col md:flex-row gap-8 items-center justify-evenly">
        <div data-aos="fade-right">
                <img id="product_img" src="{{ Storage::url($product->img) }}" class=" h-[300px] md:h-[500px] w-full object-cover rounded-lg mb-6 shadow-lg">


        </div>
        <div data-aos="fade-left" class="bg-white shadow-lg py-8 px-10">
            <div>
                <h2 class="text-2xl" id="product_title">{{ $product->title }}</h2>
            </div>
            <div class="flex gap-4 items-center">
                <div>
                    <i class="fa-solid fa-star text-yellow-400 text-xl"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-xl"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-xl"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-xl"></i>
                    <i class="fa-solid fa-star text-yellow-400 text-xl  "></i>
                </div>
                <div>
                    <p class="text-sm">5 reviews</p>
                </div>
            </div>
            <div>
                <p style="color: #C75D68; font-size: 35px; font-weight: bold; "  id="product_price">${{ $product->price }}</p>
            </div>
            <div>
                <ul class="py-3 list-disc">
                    <li class="py-2 max-w-md text-lg">No one can deny your sleek style with these handsome Madden by Steve Madden® Cale 6 oxfords.</li>
                    <li class=" max-w-md text-lg">Man-made upper features a plain toe.</li>
                    <li class=" max-w-lg text-lg">Man-made lining.</li>
                    <li class=" max-w-lg text-lg">Lace-up closure.</li>
                </ul>
            </div>
            <div class="flex gap-3 items-center ">
                <div>
                    <i class="fa-solid fa-check text-lg p-2"></i>

                </div>
                <div>
                    <h5>Available <strong>56</strong> products in stock</h5>
                </div>
            </div>

            <div class="flex items-center gap-4 mb-4 py-3">
                <div class="border Px-2 w-fit">
                    <button class="text-black text-xl font-bold p-2" onclick="decreaseQuantity()">-</button>
                    <input type="text" id="quantity" value="1" class="w-8 text-center" readonly>
                    <button class="text-black text-xl font-bold" onclick="increaseQuantity()">+</button>
                </div>


public function addToCart(Request $request)
{
    $cart = session()->get('cart', []);


    if (isset($cart[$request->product_id])) {

        $cart[$request->product_id]['product_qty'] += $request->quantity;
    } else {

        $cart[$request->product_id] = [
            'product_id' => $request->product_id,
            'product_qty' => $request->quantity, // Quantity from the request
            'product_title' => $request->productTitle,
            'product_price' => $request->productPrice,
            'product_img' => $request->productImg,
        ];
    }

    // Save the updated cart in the session
    session()->put('cart', $cart);

    return response()->json(['success' => 'Product added to cart successfully!']);
}




                <button class="bg-black text-white px-3 py-2" id="add-to-cart-btn" data-id="{{ $product->id }}">Add to Cart</button>

                <script>
                    $(document).on('click', '#add-to-cart-btn', function() {
                        if (!{{ Auth::check() ? 'true' : 'false' }}) {
                            showLoginPopup();
                            console.log("User is not logged in.");
                            return;
                        }

                        // Get quantity and other product details
                        let quantity = $('#quantity').val();
                        let productTitle = $('#product_title').text();
                        let productPrice = $('#product_price').text();
                        let productImg = $('#product_img').attr('src');

                        // AJAX call to add to cart
                        $.ajax({
                            url: "{{ route('cart.add') }}",
                            method: "POST",
                            data: {
                                product_id: {{ $product->id }},
                                quantity: quantity,
                                productTitle: productTitle,
                                productPrice: productPrice,
                                productImg: productImg,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                alert(response.success);

                                // Reset quantity input to 1
                                $('#quantity').val(1);
                            },
                            error: function(error) {
                                alert('Something went wrong!');
                            }
                        });
                    });
                </script>