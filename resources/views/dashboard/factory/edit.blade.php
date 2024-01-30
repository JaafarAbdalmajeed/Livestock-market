@extends('layouts.dashboard')

@section('title', 'edit')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <section class="content" style="height: 100%;">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Add Factory</h3>
                    </div>
                    <form action="{{ route('factories.update', ['factory' => $factory->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @include('dashboard.factory.form')
                    </form>
                </div>
            </section>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
