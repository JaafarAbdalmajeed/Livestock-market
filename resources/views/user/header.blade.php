<!-- ======= Header ======= -->
<header id="header" class="header  d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl m-3 d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <h1><img src="{{ asset('assets/img/4.jpg')}}"  width="90px" style="border-radius: 50%" class="img-fluid" style="width: 80px; height: 100%;"> FramFuel Feeds</h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        <nav id="navbar" class=" navbar">
            <ul>
                <li ><a href="/" class="{{ Request::is('/') ? 'active' : '' }}"  id="home">Home</a></li>

                <li><a class=" {{ Request::is('user.products') ? 'active' : '' }}" href="{{ route('user.products')}}">Livestock feed</a></li>
                <li><a class=" {{ Request::is('user.factories') ? 'active' : '' }}" href="{{route('user.factories')}}">Factories</a></li>
                @if(auth()->check())
                <li><a class="{{ Request::is('order-cart*') ? 'active' : '' }}" href="{{route('cart.index')}}">Cart</a></li>

                <li class=" m-0"><a class="get-a-quote" href="{{route('profile.index')}}"><span>{{ auth()->user()->name }}</span> </a>

                </li>
                <div class="image">
                </div>
                <li>
                    <form class="m-0" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="border-0 get-a-quote" type="submit">Logout</button>
                    </form>
                </li>

                @else
                <li>
                    <a class="{{ Request::is('login') ? 'active' : '' }} get-a-quote" href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a class="{{ Request::is('register') ? 'active' : '' }} get-a-quote" href="{{ route('register') }}">Register</a>
                </li>
                @endif
            </ul>
        </nav>
    </div>

</header>

