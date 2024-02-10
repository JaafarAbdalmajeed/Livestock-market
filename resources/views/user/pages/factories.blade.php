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
            <form action="{{route('factory.search')}}" class="form-search d-flex align-items-stretch mb-a " style="width: 40%" data-aos="fade-up" data-aos-delay="200">
                <input name="search" type="text" class=" form-control" placeholder="">
                <button type="submit " class="btn btn-primary">Search</button>
            </form>
            </div>
            <div class="row gy-4">
                @if (count($factories) > 0)


                @foreach ($factories as $factory)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                    <div class="card-img">
                        <img src="{{asset('/uploads/factories/'.$factory->image)}}" style="height: 15em; width:100% ; object-fit: contain; padding:1em 1em" alt="" class="img-fluid">
                    </div>
                    <h3><a href="{{ route('factory.details', ['id' => $factory->id])}}" class="stretched-link">{{$factory->name}}</a></h3>
                    <p>title</p>
                    </div>
                </div><!-- End Card Item -->
                @endforeach
                @else
                Not Found
                @endif
            </div>
        </div>
        </section>
        <!-- End Services Section -->
    </main>
    <!-- End #main -->

    @endsection
