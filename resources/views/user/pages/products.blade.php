    @extends('layouts.user')

    @section('title', 'products')

    @section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        @include('user.Breadcrumbs', ['pageTitle' => 'Products'])
        <!-- End Breadcrumbs -->



        <!-- ======= Services Section ======= -->
        <section id="service" class="services pt-0">

        <div class="container" data-aos="fade-up">

            <div class="section-header">
            <span>Our Products</span>
            <h2>Our Products</h2>
            <div class="form-group">

            </div>
            <form action="{{route('product.search')}}" class="form-search d-flex align-items-stretch mb-a " style="width: 40%" data-aos="fade-up" data-aos-delay="200">
                <input name="search" type="text" class=" form-control" placeholder="">
                <button type="submit " class="btn btn-primary">Search</button>
            </form>
            </div>

            <div class="row gy-4">
                @if(count($products) > 0)
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
                @else
                Not found

                @endif


            </div>

        </div>
        </section>
        <!-- End Services Section -->

    </main>
    <!-- End #main -->

    @endsection
