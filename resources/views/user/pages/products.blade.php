    @extends('layouts.user')

    @section('title', 'products')

    @section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
            <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                <h2>Product</h2>
                <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                </div>
            </div>
            </div>
        </div>
        <nav>
            <div class="container">
            <ol>
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li><a href="{{ route('products.index') }}">Products</a></li>
            </ol>
            </div>
        </nav>
        </div><!-- End Breadcrumbs -->



        <!-- ======= Services Section ======= -->
        <section id="service" class="services pt-0">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
            <span>Our Products</span>
            <h2>Our Products</h2>

            </div>

            <div class="row gy-4">
                @foreach ($products as $product)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                    <div class="card-img">
                        <img src="{{asset('assets/img/storage-service.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <h3><a href="{{ route('product.details', ['id'=> $product->id])}}" class="stretched-link">{{$product->name}}</a></h3>
                    <p>title</p>

                    </div>
                </div>
                <!-- End Card Item -->
                @endforeach


            </div>

        </div>
        </section>
        <!-- End Services Section -->

    </main>
    <!-- End #main -->

    @endsection
