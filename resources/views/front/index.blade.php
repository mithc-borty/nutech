@extends('front.layout')
@section('title', 'Electra - Electrical Solutions for Your Home & Business')
@section('content')
<!-- Hero / Carousel Start -->
@php
$slides = [
    [
        'bg' => 'hero-bg-1', 
        'shape' => 'hero-shape-1', 
        'title' => 'Reliable Electrical Services for Home & Business',
        'subtitle' => 'Current Electricity Services',
        'desc' => 'Providing quality electrical solutions with certified experts. Safety and efficiency guaranteed.'
    ],
    [
        'bg' => 'hero-bg-2', 
        'shape' => 'hero-shape-2', 
        'title' => 'Experience the Power of Professionalism',
        'subtitle' => 'Current Electricity Services',
        'desc' => 'Our certified electricians ensure safe, efficient, and timely service for all your electrical needs.'
    ]
];
@endphp

<!-- Carousel Start -->
@php
$slides = [
    [
        'bg' => 'hero-bg-half-1', 
        'shape' => 'hero-shape-1', 
        'title' => 'Reliable Electrical Services for Home & Business',
        'subtitle' => 'Current Electricity Services',
        'desc' => 'Providing quality electrical solutions with certified experts. Safety and efficiency guaranteed.'
    ],
    [
        'bg' => 'hero-bg-half-2', 
        'shape' => 'hero-shape-2', 
        'title' => 'Experience the Power of Professionalism',
        'subtitle' => 'Current Electricity Services',
        'desc' => 'Our certified electricians ensure safe, efficient, and timely service for all your electrical needs.'
    ]
];
@endphp

<div class="header-carousel owl-carousel overflow-hidden">
    @foreach ($slides as $slide)
    <div class="header-carousel-item hero-section position-relative">
        <!-- Background Layer (split image) -->
        <div class="{{ $slide['bg'] }}"></div>
        <!-- Decorative Shape Layer -->
        <div class="{{ $slide['shape'] }}"></div>

        <div class="carousel-caption">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7 animated fadeInLeft">
                        <div class="text-sm-center text-md-start">
                            <h4 class="text-white text-uppercase fw-bold mb-4">{{ $slide['subtitle'] }}</h4>
                            <h1 class="display-2 text-white mb-4">{{ $slide['title'] }}</h1>
                            <p class="mb-5 fs-5">{{ $slide['desc'] }}</p>
                            <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                <a class="btn btn-light py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a>
                                <a class="btn btn-primary py-3 px-4 px-md-5 ms-2" href="{{ url('/contact') }}">Get a Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Carousel End -->

<!-- About Section Start -->
<div class="container-fluid about bg-light py-5">
   <div class="container py-5">
      <div class="row g-5 align-items-center">
         <div class="col-lg-7 wow fadeInLeft" data-wow-delay="0.2s">
            <h4 class="text-primary">About Electra</h4>
            <h1 class="display-4 mb-4">Trusted Electrical Services for Home & Business</h1>
            <p>Electra is a trusted provider of residential and commercial electrical services. We specialize in installation, maintenance, and repair with a commitment to safety and customer satisfaction.</p>
            <ul class="list-unstyled mt-3 text-dark">
               <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Certified & Experienced Technicians</li>
               <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>24/7 Emergency Support</li>
               <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Modern & Energy-Efficient Solutions</li>
            </ul>
            <a href="{{ url('/about') }}" class="btn btn-primary mt-3">Read More</a>
         </div>
         <div class="col-lg-5 wow fadeInRight" data-wow-delay="0.2s">
            <div class="position-relative h-100">
               <img src="{{ asset('front/img/about-1.jpg') }}" class="img-fluid w-100 h-100 rounded" style="object-fit: cover;" alt="About Electra">
               <img src="{{ asset('front/img/about-2.jpg') }}" class="img-fluid rounded position-absolute" style="width: 50%; bottom: 0; right: 0;" alt="About Electra">
            </div>
         </div>
      </div>
   </div>
</div>
<!-- About Section End -->
<!-- Services Section Start -->
<div class="container-fluid service py-5">
   <div class="container py-5">
      <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
         <h4 class="text-primary">Our Services</h4>
         <h1 class="display-4 mb-4">Expert Electrical Solutions</h1>
         <p class="text-muted mb-0">We provide energy-efficient, safe, and professional services for all your electrical needs.</p>
      </div>
      <div class="row g-4">
         @foreach ([
         ['icon'=>'fa-bolt','title'=>'Electrical Panels','desc'=>'Installation and maintenance of residential and commercial electrical panels with maximum safety.'],
         ['icon'=>'fa-lightbulb','title'=>'Indoor Lighting','desc'=>'Energy-efficient lighting solutions to illuminate your home or workplace beautifully and safely.'],
         ['icon'=>'fa-fan','title'=>'Air Conditioning','desc'=>'Professional AC installation, repair, and maintenance services for residential and commercial spaces.'],
         ] as $service)
         <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="{{ $loop->index * 0.2 + 0.2 }}s">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
               <i class="fas {{ $service['icon'] }} fa-3x text-primary mb-3"></i>
               <h5 class="mb-3">{{ $service['title'] }}</h5>
               <p>{{ $service['desc'] }}</p>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>
<!-- Services Section End -->
<!-- Team Section Start -->
<div class="container-fluid team py-5">
   <div class="container py-5">
      <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
         <h4 class="text-primary">Our Expert Team</h4>
         <h1 class="display-4 mb-4">Certified Professionals</h1>
         <p class="text-muted mb-0">Our certified technicians and engineers are ready to provide safe and reliable electrical solutions.</p>
      </div>
      <div class="row g-4">
         @foreach ([
         ['img'=>'team-1.jpg','name'=>'John Doe','role'=>'Electrical Engineer'],
         ['img'=>'team-2.jpg','name'=>'Jane Smith','role'=>'Technician'],
         ['img'=>'team-3.jpg','name'=>'Mark Wilson','role'=>'Project Manager'],
         ['img'=>'team-4.jpg','name'=>'Lisa Brown','role'=>'Customer Support'],
         ] as $index => $member)
         <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="{{ 0.2 + $index*0.2 }}s">
            <div class="team-item">
               <div class="team-img position-relative">
                  <img src="{{ asset('front/img/'.$member['img']) }}" class="img-fluid w-100" alt="{{ $member['name'] }}">
                  <div class="team-icon position-absolute top-50 start-50 translate-middle d-flex flex-column">
                     <a class="btn btn-square btn-primary mb-2" href="#"><i class="fab fa-facebook-f"></i></a>
                     <a class="btn btn-square btn-primary mb-2" href="#"><i class="fab fa-twitter"></i></a>
                     <a class="btn btn-square btn-primary mb-2" href="#"><i class="fab fa-instagram"></i></a>
                     <a class="btn btn-square btn-primary mb-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                  </div>
               </div>
               <div class="team-content bg-light text-center p-4">
                  <h4>{{ $member['name'] }}</h4>
                  <p class="mb-0">{{ $member['role'] }}</p>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>
<!-- Team Section End -->
<!-- Testimonial Section Start -->
<div class="container-fluid testimonial bg-dark py-5">
   <div class="container py-5">
      <div class="row g-5">
         <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Testimonials</h4>
            <h1 class="display-4 text-white mb-4">What Our Clients Say</h1>
            <p class="text-white-50">Real feedback from our satisfied customers about our electrical services.</p>
         </div>
         <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="owl-carousel testimonial-carousel">
               @foreach ([
               ['name'=>'Michael Scott','role'=>'Manager, Dunder Mifflin','img'=>'testimonial-1.jpg','msg'=>'Electra did a fantastic job installing our new electrical panels. Professional, on time, and highly recommended!'],
               ['name'=>'Pam Beesly','role'=>'Designer, Scranton','img'=>'testimonial-2.jpg','msg'=>'Excellent service for our home lighting system. Very knowledgeable staff and excellent support.'],
               ['name'=>'Jim Halpert','role'=>'Sales Executive','img'=>'testimonial-3.jpg','msg'=>'Quick and safe AC installation by certified professionals. Great experience overall.']
               ] as $testimonial)
               <div class="testimonial-item text-center">
                  <p class="mb-3">{{ $testimonial['msg'] }}</p>
                  <h6>{{ $testimonial['name'] }}</h6>
                  <small>{{ $testimonial['role'] }}</small>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Testimonial Section End -->
<!-- Call To Action Start -->
<div class="container-fluid py-5 bg-primary text-white text-center">
   <h2 class="mb-4">Need Professional Electrical Services?</h2>
   <p class="mb-4">Contact Electra today and get a free consultation from our certified team.</p>
   <a href="{{ url('/contact') }}" class="btn btn-light btn-lg">Contact Us</a>
</div>
<!-- Call To Action End -->
@endsection