@extends('layouts.user')

@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    @include('user.Breadcrumbs', ['pageTitle' => $factory->name])
    <!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
            <img src="{{ asset('uploads/factories/' . $factory->image) }}" style="height: 15em; width:100% ; object-fit: contain; padding:1em 1em"  class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 content order-last  order-lg-first">
            <h3>About {{$factory->name}}</h3>

            <ul>
                @foreach ($factory->descriptions as $item)
                <li data-aos="fade-up" data-aos-delay="100">
                    <i class="bi bi-diagram-3"></i>
                    <div>
                      <h5>{{$item->title}}</h5>
                      <p>{{$item->text}}</p>
                    </div>
                  </li>

                @endforeach
            </ul>
          </div>

        </div>
        <a href="{{route('user.products.factory', ['id'=>$factory->id])}}" class="btn btn-primary">Products</a>
      </div>
    </section><!-- End About Us Section -->

  </main><!-- End #main -->
@endsection
