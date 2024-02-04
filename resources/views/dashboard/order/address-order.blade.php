@extends('layouts.dashboard')

@section('title','Address Order')

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
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Address 1</td>
                                <td>Address 2</td>
                                <td>city</td>
                                <td>state</td>
                                <td>country</td>
                                <td>Pin Code</td>
                                <td>Total Price</td>
                                <td>Message</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($order)

                                    <tr>
                                        <td>{{$order->fname}}</td>
                                        <td>{{$order->lname}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->address1}}</td>
                                        <td>{{$order->address2}}</td>
                                        <td>{{$order->city}}</td>
                                        <td>{{$order->state}}</td>
                                        <td>{{$order->country}}</td>
                                        <td>{{$order->pin_code}}</td>
                                        <td>{{$order->total_price}}</td>
                                        <td>{{$order->message ?? ''}}</td>
                                    </tr>

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
