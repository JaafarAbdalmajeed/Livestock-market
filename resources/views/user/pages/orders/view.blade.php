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

        <div class="sidebarCart " style="background-clip: white">
            <div class="headCart bg-primary">
                <h4 class="text-white">Order View</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class=" col-md-6 order-details">
                        <label for="">First Name</label>
                        <div class="border p-2">{{$order->fname}}</div>
                        <label for="">Last Name</label>
                        <div class="border p-2">{{$order->lname}}</div>
                        <label for="">Email</label>
                        <div class="border p-2">{{$order->email}}</div>
                        <label for="">Contact No</label>
                        <div class="border p-2">{{$order->phone}}</div>
                        <label for="">Shipping Address</label>
                        <div class="border p-2">
                            {{$order->address1}},
                            {{$order->address2}},
                            {{$order->city}},
                            {{$order->state}},
                            {{$order->country}},
                        </div>
                        <label for="">Zip Code</label>
                        <div class="border p-2">{{$order->price_code}}</div>

                    </div>
                    <div class="col-md-6">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <img src="{{asset('uploads/products/'.$item->products->image)}}" width="50px" alt="">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h4>Grand Total: {{ $order->total_price}}</h4>
                    </div>
                </div>

            </div>
        </div>

    </div>


</main><!-- End #main -->

@endsection

