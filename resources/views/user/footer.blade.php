<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="container">
    <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
        <a href="index" class="logo d-flex align-items-center">
            <span><img src="{{ asset('assets/img/cow1.png')}}" alt=""></span>
        </a>
        <p>An electronic platform founded by Jaafar Al-Wahsh, which aims to meet the diverse needs of livestock breeders, pet owners, and agriculture enthusiasts. The company focuses on providing high-quality livestock feed, pet care products, educational resources, and facilitating responsible pet adoption.
        </p>
        <div class="social-links d-flex mt-4">
            <a href="https://twitter.com/Jaafar_Alwahsh" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://www.facebook.com/jaafar.altamare" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.linkedin.com/in/jaafar-alwahsh/" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a class="{{ Request::is('user.products') ? 'active' : '' }}" href="{{ route('user.products')}}">Products</a></li>
            <li><a class="{{ Request::is('user.factories') ? 'active' : ''}}" href="{{route('user.factories')}}">Factories</a></li>
            {{-- <li><a class="{{ Request::is('specialrequest*') ? 'active' : '' }}" href="{{ route('specialrequest.index')}}">Special Request</a></li> --}}

        </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
        <h4>Contact Us</h4>
        <p> Jaafar Alwahsh <br>
            Amman<br>
            Jordan <br><br>
            <strong>Phone:</strong> 0796694148<br>
            <strong>Email:</strong> jaafar@gmail.com<br>
        </p>

        </div>

    </div>
    </div>

    <div class="container mt-4">
    <div class="copyright">
        &copy; Copyright <strong><span>FarmFuel Feeds</span></strong>
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/ -->
        Designed by <a href="https://orange.com/">Orange</a>
    </div>
    </div>

