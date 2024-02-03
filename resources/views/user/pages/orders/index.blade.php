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
            <div class="card-header">
                <h4>My Orders</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tracking Number</th>
                            <th>Total Price</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{ $item->tracking_no}}</td>
                                <td>{{ $item->total_price}}</td>
                                <td>{{ $item->status == '0' ? 'pending' : 'completed'}}</td>
                                <td>
                                    <a href="{{route('order.view', ['id' => $item->id])}}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</main><!-- End #main -->

@endsection

