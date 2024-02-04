<!-- user/Breadcrumbs.blade.php -->

<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url({{asset('assets/img/background_websitejpg.jpg')}});">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>{{ $pageTitle }}</h2>
                    <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
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
