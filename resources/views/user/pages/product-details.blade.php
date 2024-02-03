@extends('layouts.user')

@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>{{ $product->name }}</h2>
              <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>{{$product->name}}</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4 product_data">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
            <img src="{{ asset('uploads/products/' . $product->image) }}" class="img-fluid" alt="">
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
                    alert(response.status);
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
