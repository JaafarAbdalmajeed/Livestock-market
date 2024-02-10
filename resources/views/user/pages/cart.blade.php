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
                    {{-- <div class="headCart"><p>My Cart</p></div> --}}
                    @php
                        $totalItem = 0;
                    @endphp
                    <table class="table">
                        <thead>
                            <tr>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($cartItems->count() > 0)
                            @foreach ($cartItems as $cartItem)
                            <tr class="product_data">
                                <td>
                                    <div class="row-img">
                                        <img class="rowimg" src="{{ asset('uploads/products/' . $cartItem->product->image) }}" alt="">
                                    </div>
                                    <p  style=" font-size:12px;">{{$cartItem->product->name}}</p>
                                    <input type="hidden" class="product_id" value="{{ $cartItem->product->id}}">
                                </td>


                                @if ($cartItem->product->quantity >= $cartItem->quantity)
                                    <td >
                                        <div class="input-group text-center mb-3" style="width: 130px;">
                                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                                            <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$cartItem->quantity}}">
                                            <button class="input-group-text changeQuantity increment-btn">+</button>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                                    </td>
                                    @php
                                        $totalItem = $cartItem->product->price * $cartItem->quantity
                                    @endphp
                                @else
                                <h6>Out of Stock</h6>
                                @endif
                                <td>
                                    <h2 style="font-size:15px;">${{$totalItem}}</h2>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td>No Items</td>
                                </tr>
                            @endif




                        </tbody>
                    </table>

                    <div class="footCart">
                        <div>
                            <h3 style="display: inline">Total: </h3>
                            <h2 style="display: inline" id="total">$ {{$total}}</h2>
                        </div>

                        <a  href="{{ route('checkout.index')}}"  class="btn btn-outline-success float-end">Product to checkout</a>
                    </div>
                </div>

            </div>







        </main><!-- End #main -->

        @endsection

        @section('scripts')

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

                $('.changeQuantity').click(function (e) {
                    var product_id = $(this).closest('product_data').find('product_id').val()
                    var qty = $(this).closest('product_data').find('qty-input').val()
                    data = {
                        'product_id':product_id,
                        'quantity':qty
                    }
                    $.ajax({
                        method: "POST",
                        url: "{{ route('cart.update') }}",
                        data: data,
                        success: function (response) {
                            window.location.reload()

                        }
                    })
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
