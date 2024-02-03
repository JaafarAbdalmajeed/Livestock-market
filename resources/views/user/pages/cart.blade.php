        @extends('layouts.user')

        @section('content')
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
            <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
                <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                </div>
                </div>
            </div>

            </div><!-- End Breadcrumbs -->


            <div class="containerCart">

                <div class="sidebarCart ">
                    <div class="headCart"><p>My Cart</p></div>
                    @foreach ($cartItems as $cartItem)
                    <div id="cartItem" class="cart-item product_data">
                        <div class="row-img">
                            <img class="rowimg" src="{{ asset('uploads/products/' . $cartItem->product->image) }}" alt="">
                        </div>
                        <input type="hidden" class="product_id" value="{{ $cartItem->product->id}}">
                        <p style="font-size:12px;">{{$cartItem->product->name}}</p>
                        <div class="input-group text-center mb-3" style="width: 130px;">
                            <button class="input-group-text decrement-btn" >-</button>
                            <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$cartItem->quantity}}">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to cart</button>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                        </div>
                        <h2 style="font-size:15px;">${{$cartItem->product->price}}</h2>
                    </div>
                    @endforeach

                    <div class="footCart">
                        <h3>Total: </h3>
                        <h2 id="total">$ {{$total}}</h2>
                    </div>
                </div>

            </div>


        </main><!-- End #main -->

        @endsection

        @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            $(document).ready(function () {

                $('.increment-btn').click(function (e) {
                    e.preventDefault();
                    var inc_value = $(this).closest('.product_data').find('.qty-input').val();
                    var value = parseInt(inc_value, 10);
                    value = isNaN(value) ? 0 : value;
                    if (value < 10) {
                        value++;
                        var inc_value = $(this).closest('.product_data').find('.qty-input').val(value);

                        updateCart(
                            $(this).closest('.product_data').find('.product_id').val(),
                            value
                        );
                    }
                });

                $('.decrement-btn').click(function (e) {
                    e.preventDefault();
                    var dec_value = $(this).closest('.product_data').find('.qty-input').val();
                    var value = parseInt(dec_value, 10);
                    value = isNaN(value) ? 0 : value;
                    if (value > 1) {
                        value--;
                        var dec_value = $(this).closest('.product_data').find('.qty-input').val(value);

                        updateCart(
                            $(this).closest('.product_data').find('.product_id').val(),
                            value
                        );
                    }
                });

    // Function to update the cart using AJAX
            function updateCart(product_id, quantity) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.update') }}",
                    data: JSON.stringify({
                        'product_id': product_id,
                        'quantity': quantity
                    }),
                    contentType: 'application/json',

                    success: function (response) {

                        // You can handle the success response as needed
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error (e.g., display an error message to the user)
                    }
                });
    }

                $('.delete-cart-item').click(function (e) {
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.product_id').val()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.delete') }}",
                    data: JSON.stringify({
                        'product_id': product_id,
                    }),
                    contentType: 'application/json',
                    success: function (response) {
                        Swal.fire("", response.status, "success");
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error (e.g., display an error message to the user)
                    }
                });



        });

        })
        </script>

        @endsection



        {{-- <script>
            function updateCart(product_id, quantity) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('cart.update') }}",
                    data: JSON.stringify({
                        'product_id': product_id,
                        'quantity': quantity
                    }),
                    contentType: 'application/json',

                    success: function (response) {
                        alert(response.status);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error (e.g., display an error message to the user)
                    }
                });
            }

            $(document).ready(function () {
                $('.increment-btn').click(function (e) {
                    e.preventDefault();
                    var $input = $(this).closest('.product_data').find('.qty-input');
                    var value = parseInt($input.val(), 10);
                    value = isNaN(value) ? 0 : value;

                    if (value < 10) {
                        value++;
                        $input.val(value);
                        updateCart(
                            $(this).closest('.product_data').find('.product_id').val(),
                            value
                        );
                    }
                });

                $('.decrement-btn').click(function (e) {
                    e.preventDefault();
                    var $input = $(this).closest('.product_data').find('.qty-input');
                    var value = parseInt($input.val(), 10);
                    value = isNaN(value) ? 0 : value;

                    if (value > 1) {
                        value--;
                        $input.val(value);
                        updateCart(
                            $(this).closest('.product_data').find('.product_id').val(),
                            value
                        );
                    }
                });
            });
        </script> --}}
