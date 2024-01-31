@extends('layouts.dashboard')

@section('title', 'create')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <section class="content" style="height: 100%;">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Add Description</h3>
                    </div>
                    <form action="{{ $nameTable === 'factories' ? route('descriptions.storeFactory') : route('descriptions.storeProduct') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="factory_id" value="{{ $factory_id ?? '' }}">
                        <input type="hidden" name="product_id" value="{{ $product_id ?? '' }}">

                        @include('dashboard.description.form')

                    </form>
                </div>
            </section>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
