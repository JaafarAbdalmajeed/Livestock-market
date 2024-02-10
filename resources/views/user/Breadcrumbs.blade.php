<!-- user/Breadcrumbs.blade.php -->

<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url({{asset('assets/img/background_websitejpg.jpg')}});">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>{{ $pageTitle }}</h2>
                </div>
            </div>
        </div>
    </div>
    <nav>
        <div class="container">
            <ol>
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li>{{ $pageTitle }}</li>
            </ol>
        </div>
    </nav>
</div><!-- End Breadcrumbs -->
