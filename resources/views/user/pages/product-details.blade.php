@extends('layouts.user')

@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    @include('user.Breadcrumbs', ['pageTitle' => $product->name])

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4 product_data">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
            <img src="{{ asset('uploads/products/' . $product->image) }}" style="height: 15em; width:100% ; object-fit: contain; padding:1em 1em"  class="img-fluid" alt="">
            <a href="3" class=""></a>
          </div>
          <div class="col-lg-6 content order-last  order-lg-first">
            <h3>About {{$product->name}}</h3>
            <p>title</p>
            <ul>
                @foreach ($product->descriptions as $item)
                <li data-aos="fade-up" data-aos-delay="100">
                    <i class="bi bi-diagram-3"></i>
                    <div>
                      <h5>{{$item->title}}</h5>
                      <p>{{$item->text}}</p>
                    </div>
                  </li>

                @endforeach
            </ul>
            <p>Unit {{$product->unit}}</p>
            <p>Price {{$product->price}}</p>
            <input type="hidden" value="{{ $product->id}}" class="product_id">
            <p>Quantity</p>
            <div class="input-group text-center mb-3" style="width: 130px;">
                <button class="input-group-text decrement-btn" >-</button>
                <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                <button class="input-group-text increment-btn">+</button>
            </div>
            <div>
                <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to cart</button>
            </div>

            {{-- <a class="btn btn-primary" href="{{route('')}}">add to cart</a> --}}


            </div>

      </div>
    </section><!-- End About Us Section -->

  </main><!-- End #main -->
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {

            $('.addToCartBtn').click(function (e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var quantity = $(this).closest('.product_data').find('.qty-input').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('cart.create') }}",
                data: JSON.stringify({
                    'product_id': product_id,
                    'quantity': quantity
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
        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                $('.qty-input').val(value);
            }
        });


        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var dec_value = $('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $('.qty-input').val(value);
            }
        });


    });
</script>
@endsection
