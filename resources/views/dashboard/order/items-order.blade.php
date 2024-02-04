@extends('layouts.dashboard')

@section('title','Order Items ')

@section('content')
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Order ID</td>
                                <td>Prdocut ID</td>
                                <td>Prdocut Name</td>
                                <td>Quantity</td>
                                <td>Price</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($order)

                                    @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->order_id}}</td>
                                        <td>{{$item->product_id}}</td>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->price}}</td>

                                    </tr>

                                    @endforeach

                            @else
                                <tr>
                                    <td>No Orders</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        </div>
    </div>
    </section>
@endsection
