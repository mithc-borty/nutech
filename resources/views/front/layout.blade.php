<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>@yield('title', 'Nutech Office System Pvt. Ltd.')</title>
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
            <!-- Logo -->
            <div class="d-flex align-items-center h-100">
               <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center anchor-logo">
                  <!-- Logo Image -->
                  <img src="{{ asset('front/img/logo.jpg') }}" alt="Nutech Logo" class="logo">
               </a>
            </div>
            <div class="w-100 h-100">
               <!-- Topbar -->
               <div class="topbar px-0 py-2 d-none d-lg-block" style="height: 45px;">
                  <div class="row gx-0 align-items-center">
                     <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                        <div class="d-flex flex-wrap align-items-center">
                           <div class="border-end border-primary pe-3 mb-2 mb-lg-0">
                              <a href="#" class="text-muted small text-truncate" style="max-width: 100%;">
                                 <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                 <!-- Sreema Complex, Near Mahendra Showroom,  -->Jalkal, Maheshtala, Kolkata-700141
                              </a>
                           </div>
                           <div class="ps-3">
                              <a href="mailto:info@nutechoffice.com" class="text-muted small" style="white-space: nowrap;">
                              <i class="fas fa-envelope text-primary me-2"></i>info@nutechoffice.com
                              </a>
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
                              <small class="text-body"><i class="fas fa-globe-europe text-primary me-2"></i> English</small>
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
                        <h1 class="text-primary mb-0">
                           <i class="fas fa-building"></i> Nutech
                        </h1>
                     </a>
                     <button class="navbar-toggler" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                     <span class="fa fa-bars"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-0 mx-lg-auto bg-white">
                           <a href="{{ url('/') }}" class="nav-item nav-link {{ $active_page == 'home' ? 'active' : '' }}">Home</a>
                           <a href="{{ url('/about') }}" class="nav-item nav-link {{ $active_page == 'about' ? 'active' : '' }}">About</a>
                           <a href="{{ url('/products') }}" class="nav-item nav-link {{ $active_page == 'products' ? 'active' : '' }}">Products</a>
                           <a href="{{ url('/services') }}" class="nav-item nav-link {{ $active_page == 'services' ? 'active' : '' }}">Services</a>
                           <a href="{{ url('/projects') }}" class="nav-item nav-link {{ $active_page == 'projects' ? 'active' : '' }}">Projects</a>
                           <a href="{{ url('/support') }}" class="nav-item nav-link {{ $active_page == 'support' ? 'active' : '' }}">Support</a>
                           <a href="{{ url('/contact') }}" class="nav-item nav-link {{ $active_page == 'contact' ? 'active' : '' }}">Contact</a>
                           <div class="nav-btn ps-3">
                              <a href="{{ url('/quote') }}"
                                 class="btn btn-primary py-2 px-4 ms-0 ms-lg-3">
                              Get Quote
                              </a>
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
            <!-- Newsletter & Social Icons -->
            <div class="row g-5 mb-5 align-items-center">
               <div class="col-lg-5">
                  <div class="position-relative mx-auto">
                     <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Email address to Subscribe">
                     <button type="button" class="btn btn-primary position-absolute top-0 end-0 py-2 px-4 mt-2 me-2">Subscribe</button>
                  </div>
               </div>
               <div class="col-lg-7">
                  <div class="d-flex align-items-center justify-content-center justify-content-lg-end">
                     <a class="btn btn-light btn-md-square me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                     <a class="btn btn-light btn-md-square me-3" href="#"><i class="fab fa-twitter"></i></a>
                     <a class="btn btn-light btn-md-square me-3" href="#"><i class="fab fa-instagram"></i></a>
                     <a class="btn btn-light btn-md-square me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                  </div>
               </div>
            </div>
            <!-- Footer Columns -->
            <div class="row g-5">
               <!-- Company Info -->
               <div class="col-md-6 col-lg-6 col-xl-3">
                  <div class="footer-item d-flex flex-column">
                     <h3 class="text-white mb-4"><i class="fas fa-building text-primary me-3"></i>Nutech Office System</h3>
                     <p class="mb-3">
                        Established in 2005, Nutech Office System Pvt. Ltd. is a leading manufacturer of Office Tables, Workstations, Partitions, and Storage Cabinets. Our products are crafted with premium materials and tested to ensure quality and durability.
                     </p>
                     <p>Managed under the guidance of Mr. Dhiren Nahak, we focus on timely delivery and high-quality standards for all products.</p>
                  </div>
               </div>
               <!-- Quick Links -->
               <div class="col-md-6 col-lg-6 col-xl-3">
                  <div class="footer-item d-flex flex-column">
                     <h4 class="text-white mb-4">Quick Links</h4>
                     <a href="{{ url('/') }}">Home</a>
                     <a href="{{ url('/about') }}">About Us</a>
                     <a href="{{ url('/products') }}">Products</a>
                     <a href="{{ url('/testimonial') }}">Testimonial</a>
                     <a href="{{ url('/contact') }}">Contact Us</a>
                  </div>
               </div>
               <!-- Our Products -->
               <div class="col-md-6 col-lg-6 col-xl-3">
                  <div class="footer-item d-flex flex-column">
                     <h4 class="text-white mb-4">Our Products</h4>
                     <a href="#">Reception Table (2 products)</a>
                     <a href="#">Conference Table (7 products)</a>
                     <a href="#">Office Partitions (9 products)</a>
                     <a href="#">Office Table (4 products)</a>
                     <a href="#">Office Workstation (6 products)</a>
                     <a href="#">Storage Cabinet (3 products)</a>
                  </div>
               </div>
               <!-- Contact Info -->
               <div class="col-md-6 col-lg-6 col-xl-3">
                  <div class="footer-item d-flex flex-column">
                     <h4 class="text-white mb-4">Contact Info</h4>
                     <a href="#"><i class="fa fa-map-marker-alt text-primary me-2"></i> Sreema Complex, Near Mahendra Showroom, Jalkal, Maheshtala, Kolkata-700141, West Bengal</a>
                     <a href="mailto:info@nutechoffice.com"><i class="fas fa-envelope text-primary me-2"></i> info@nutechoffice.com</a>
                     <a href="tel:+91-XXXXXXXXXX"><i class="fas fa-phone text-primary me-2"></i> +91-XXXXXXXXXX</a>
                     <a href="tel:+91-XXXXXXXXXX"><i class="fas fa-print text-primary me-2"></i> +91-XXXXXXXXXX</a>
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
                  <span class="text-body">
                  <a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Nutech Office System Pvt. Ltd.</a>, All rights reserved.
                  </span>
               </div>
               <div class="col-md-6 text-center text-md-end text-body">
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