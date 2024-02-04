    @extends('layouts.user')

    @section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        @include('user.Breadcrumbs', ['pageTitle' => 'Factories'])

        <!-- End Breadcrumbs -->

        <!-- ======= Services Section ======= -->
        <section id="service" class="services pt-0">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
            <span>Our Services</span>
            <h2>Our Services</h2>
            </div>
            <div class="row gy-4">
                @foreach ($factories as $factory)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                    <div class="card-img">
                        <img src="assets/img/storage-service.jpg" alt="" class="img-fluid">
                    </div>
                    <h3><a href="{{ route('factory.details', ['id' => $factory->id])}}" class="stretched-link">{{$factory->name}}</a></h3>
                    <p>title</p>
                    </div>
                </div><!-- End Card Item -->
                @endforeach
            </div>
        </div>
        </section>
        <!-- End Services Section -->
    </main>
    <!-- End #main -->

    @endsection
