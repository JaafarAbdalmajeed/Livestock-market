@extends('layouts.dashboard')

@section('title', 'edit')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <section class="content" style="height: 100%;">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Add Category</h3>
                    </div>
                    <form action="{{ route('categories.update', ['category' => $category->id])}}" method="POST" >
                        @csrf
                        @method('PATCH')
                        @include('dashboard.category.form')
                    </form>
                </div>
            </section>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
