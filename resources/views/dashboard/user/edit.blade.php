@extends('layouts.dashboard')

@section('title', 'edit user')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <section class="content" style="height: 100%;">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Edit </h3>
                    </div>
                    <form action="{{ route('users.update', ['user' => $user->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @include('dashboard.user.form')
                    </form>
                </div>
            </section>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
