@extends('layouts.user')

@section('title', 'checkout')

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
    <div class="containerCart mt-5 mb-5">
        <form action="{{route('place-order')}}" method="POST">
            @csrf

            <div class="row">
                    <div class="col-md-7">
                        <div class=" card">
                            <div class=" headCart">
                                <h6>Basic Details</h6>
                            </div>
                            <div class="card-body">
                                <div class="row checkout-form">
                                    <div class="col-md-6">
                                        <label for="">First Name</label>
                                        <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Last Name</label>
                                        <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter Email Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Address 1</label>
                                        <input type="text" name="address1" class="form-control" placeholder="Enter Address 1 Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Address 2</label>
                                        <input type="text" name="address2" class="form-control" placeholder="Enter Address 2 Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">City</label>
                                        <input type="text" name="city" class="form-control" placeholder="Enter City Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">State</label>
                                        <input type="text" name="state" class="form-control" placeholder="Enter State Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Country</label>
                                        <input type="text" name="country" class="form-control" placeholder="Enter Country Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Pin Code</label>
                                        <input type="text" name="pin_code" class="form-control" placeholder="Enter Pin Code Name">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col-md-5 ">
                    <div class=" headCart">
                        <h6>Order Details</h6>
                    </div>
                    <div class="  card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>{{ $item->product->name}}</td>
                                        <td>{{ $item->quantity}}</td>
                                        <td>{{ $item->product->price}}</td>


                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <hr>
                        <button type="submit" class=" w-100 btn btn-primary float-end">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
