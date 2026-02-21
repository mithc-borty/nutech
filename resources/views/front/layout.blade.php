<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>@yield('title', 'Electra - Electrical Website Template')</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="keywords" content="@yield('keywords', '')">
      <meta name="description" content="@yield('description', '')">
      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Edu+TAS+Beginner:wght@400..700&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <!-- Icon Font Stylesheet -->
      <link rel="stylesheet" href="{{ asset('front/lib/fontawesome/css/all.min.css') }}">
      <link rel="stylesheet" href="{{ asset('front/lib/bootstrap-icons/bootstrap-icons.css') }}">
      <!-- Libraries Stylesheet -->
      <link rel="stylesheet" href="{{ asset('front/lib/animate/animate.min.css') }}">
      <link rel="stylesheet" href="{{ asset('front/lib/owlcarousel/owl.carousel.min.css') }}">
      <!-- Bootstrap & Template Stylesheet -->
      <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
      @yield('CSS')
   </head>
   <body>
      <div class="container-fluid header-top">
         <div class="container d-flex align-items-center">
            <div class="d-flex align-items-center h-100">
               <a href="{{ url('/') }}" class="navbar-brand" style="height: 125px;">
                  <h1 class="text-primary mb-0"><i class="fas fa-bolt"></i> Electra</h1>
               </a>
            </div>
            <div class="w-100 h-100">
               <!-- Topbar -->
               <div class="topbar px-0 py-2 d-none d-lg-block" style="height: 45px;">
                  <div class="row gx-0 align-items-center">
                     <div class="col-lg-8 text-center text-lg-center mb-lg-0">
                        <div class="d-flex flex-wrap">
                           <div class="border-end border-primary pe-3">
                              <a href="#" class="text-muted small"><i class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                           </div>
                           <div class="ps-3">
                              <a href="mailto:example@gmail.com" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>example@gmail.com</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex justify-content-end align-items-center">
                           <!-- Social Icons -->
                           <div class="d-flex border-end border-primary pe-3">
                              <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                              <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-twitter"></i></a>
                              <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-instagram"></i></a>
                              <a class="btn p-0 text-primary me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                           </div>
                           <!-- Language Dropdown -->
                           <div class="dropdown ms-3">
                              <a href="#" class="dropdown-toggle text-white" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                              <small class="text-body">
                              <i class="fas fa-globe-europe text-primary me-2"></i> English
                              </small>
                              </a>
                              <ul class="dropdown-menu">
                                 <li><a class="dropdown-item" href="#">English</a></li>
                                 <li><a class="dropdown-item" href="#">Bangla</a></li>
                                 <li><a class="dropdown-item" href="#">French</a></li>
                                 <li><a class="dropdown-item" href="#">Spanish</a></li>
                                 <li><a class="dropdown-item" href="#">Arabic</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Navbar -->
               <div class="nav-bar px-0 py-lg-0" style="height: 80px;">
                  <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-lg-end">
                     <a href="{{ url('/') }}" class="navbar-brand-2">
                        <h1 class="text-primary mb-0"><i class="fas fa-bolt"></i> Electra</h1>
                     </a>
                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                     <span class="fa fa-bars"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-0 mx-lg-auto bg-white">
                           <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                           <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                           <a href="{{ url('/service') }}" class="nav-item nav-link">Service</a>
                           <div class="nav-item dropdown">
                              <a href="#" class="nav-link" data-bs-toggle="dropdown">
                              <span class="dropdown-toggle">Pages</span>
                              </a>
                              <div class="dropdown-menu">
                                 <a href="{{ url('/team') }}" class="dropdown-item">Our team</a>
                                 <a href="{{ url('/testimonial') }}" class="dropdown-item">Testimonial</a>
                                 <a href="{{ url('/404') }}" class="dropdown-item">404 Page</a>
                              </div>
                           </div>
                           <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                           <div class="nav-btn ps-3">
                              <a href="#" class="btn btn-primary py-2 px-4 ms-0 ms-lg-3">Buy Pro Version</a>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      @yield('content')
      <!-- Footer Start -->
      <div class="container-fluid footer bg-dark py-5 wow fadeIn" data-wow-delay="0.2s">
         <div class="container py-5">
            <div class="row g-5 mb-5 align-items-center">
               <div class="col-lg-7">
                  <div class="position-relative mx-auto">
                     <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Email address to Subscribe">
                     <button type="button" class="btn btn-primary position-absolute top-0 end-0 py-2 px-4 mt-2 me-2">Subscribe</button>
                  </div>
               </div>
               <div class="col-lg-5">
                  <div class="d-flex align-items-center justify-content-center justify-content-lg-end">
                     <a class="btn btn-light btn-md-square me-3" href=""><i class="fab fa-facebook-f"></i></a>
                     <a class="btn btn-light btn-md-square me-3" href=""><i class="fab fa-twitter"></i></a>
                     <a class="btn btn-light btn-md-square me-3" href=""><i class="fab fa-instagram"></i></a>
                     <a class="btn btn-light btn-md-square me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                  </div>
               </div>
            </div>
            <div class="row g-5">
               <div class="col-md-6 col-lg-6 col-xl-3">
                  <div class="footer-item d-flex flex-column">
                     <div class="footer-item">
                        <h3 class="text-white mb-4"><i class="fas fa-bolt text-primary me-3"></i>Electra</h3>
                        <p class="mb-3">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-xl-3">
                  <div class="footer-item d-flex flex-column">
                     <h4 class="text-white mb-4">Quick Links</h4>
                     <a href="#"> Home</a>
                     <a href="#"> About us</a>
                     <a href="#"> Service</a>
                     <a href="#"> Testimonial</a>
                     <a href="#"> Contact Us</a>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-xl-3">
                  <div class="footer-item d-flex flex-column">
                     <h4 class="text-white mb-4">Electricity service</h4>
                     <a href="#"> Air Conditioning</a>
                     <a href="#"> Electrical Panels</a>
                     <a href="#"> Security System</a>
                     <a href="#"> Indoor Lighting</a>
                     <a href="#"> Electrical Services</a>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6 col-xl-3">
                  <div class="footer-item d-flex flex-column">
                     <h4 class="text-white mb-4">Contact Info</h4>
                     <a href="#"><i class="fa fa-map-marker-alt text-primary me-2"></i> 123 Street, New York, USA</a>
                     <a href="mailto:info@example.com"><i class="fas fa-envelope text-primary me-2"></i> info@example.com</a>
                     <a href="mailto:info@example.com"><i class="fas fa-envelope text-primary me-2"></i> info@example.com</a>
                     <a href="tel:+012 345 67890"><i class="fas fa-phone text-primary me-2"></i> +012 345 67890</a>
                     <a href="tel:+012 345 67890" class="mb-3"><i class="fas fa-print text-primary me-2"></i> +012 345 67890</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Footer End -->
      <!-- Copyright Start -->
      <div class="container-fluid copyright py-4">
         <div class="container">
            <div class="row g-4 align-items-center">
               <div class="col-md-6 text-center text-md-start mb-md-0">
                  <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
               </div>
               <div class="col-md-6 text-center text-md-end text-body">
                  <!--/*** The author’s attribution link must remain intact in the template. ***/-->
                  <!--/*** If you wish to remove this credit link, please purchase the Pro Version . ***/-->
                  Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a>
               </div>
            </div>
         </div>
      </div>
      <!-- Copyright End -->
      <!-- Back to Top -->
      <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>  
      <!-- JS Libraries -->
      <script src="{{ asset('front/js/jquery.min.js') }}"></script>
      <script src="{{ asset('front/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('front/lib/wow/wow.min.js') }}"></script>
      <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
      <script src="{{ asset('front/lib/waypoints/waypoints.min.js') }}"></script>
      <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('front/lib/fontawesome/js/all.min.js') }}"></script>
      <script src="{{ asset('front/js/main.js') }}"></script>
      @yield('JS')
   </body>
</html>