@extends('layouts.dashboard')

@section('title', 'create')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <section class="content" style="height: 100%;">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Add User</h3>
                    </div>
                    <form action="{{ route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('dashboard.user.form')
                    </form>
                </div>
            </section>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
