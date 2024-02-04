    @extends('layouts.dashboard')

    @section('title','Orders')

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
                                    <td>User ID</td>
                                    <td>Status</td>
                                    <td>Created At</td>
                                    <td>Updated AT</td>
                                    <td>Addresses</td>
                                    <td>Items</td>
                                    <td>Action</td>


                                </tr>
                            </thead>
                            <tbody>
                                @if ($orders)
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->user_id}}</td>
                                            <td>{{$order->status}}</td>
                                            <td>{{ $order->created_at}}</td>
                                            <td>{{ $order->updated_at}}</td>
                                            <td><a class="btn btn-primary" href="{{ route('orders.items',  ['id'=>$order->id])}}">View Address</a></td>
                                            <td><a class="btn btn-primary" href="{{ route('orders.address',  ['id'=>$order->id])}}">View Items</a></td>
                                            <td><a class="btn btn-danger" href="{{ route('orders.delete',  ['id'=>$order->id]) }}">Delete</a></td>
                                        </tr>
                                    @endforeach
                                    <tfoot>

                                    </tfoot>
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
