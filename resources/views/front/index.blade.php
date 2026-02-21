@extends('front.layout')
@section('title', 'Nutech Office System Pvt. Ltd.')
@section('content')

<!-- Hero / Carousel Start -->
@php
$slides = [
    [
        'bg' => 'hero-bg-half-1', 
        'shape' => 'hero-shape-1', 
        'title' => 'Premium Office Furniture & Workstations',
        'subtitle' => 'Quality Products Since 2005',
        'desc' => 'Providing a wide range of office tables, partitions, workstations, and storage solutions with superior quality and design.'
    ],
    [
        'bg' => 'hero-bg-half-2', 
        'shape' => 'hero-shape-2', 
        'title' => 'Innovative Office Solutions for Every Space',
        'subtitle' => 'Trusted by Businesses Across Kolkata',
        'desc' => 'We deliver ergonomically designed office furniture and customized solutions tailored to your workspace needs.'
    ]
];
@endphp

<div class="header-carousel owl-carousel overflow-hidden">
    @foreach ($slides as $slide)
    <div class="header-carousel-item hero-section position-relative">
        <div class="{{ $slide['bg'] }}"></div>
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
                <h4 class="text-primary">About Nutech Office System</h4>
                <h1 class="display-4 mb-4">Leading Manufacturer of Office Furniture</h1>
                <p>Nutech Office System Pvt. Ltd., established in 2005, is a trusted manufacturer of office tables, workstations, partitions, and storage cabinets. We combine high-quality materials with modern manufacturing techniques to deliver products that meet market standards and customer expectations.</p>
                <ul class="list-unstyled mt-3 text-dark">
                    <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>High-Quality & Durable Products</li>
                    <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Custom Solutions for Every Workspace</li>
                    <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Experienced Team Led by Mr. Dhiren Nahak</li>
                </ul>
                <a href="{{ url('/about') }}" class="btn btn-primary mt-3">Read More</a>
            </div>
            <div class="col-lg-5 wow fadeInRight" data-wow-delay="0.2s">
                <div class="position-relative h-100">
                    <img src="{{ asset('front/img/about-1.jpg') }}" class="img-fluid w-100 h-100 rounded" style="object-fit: cover;" alt="About Nutech">
                    <img src="{{ asset('front/img/about-2.jpg') }}" class="img-fluid rounded position-absolute" style="width: 50%; bottom: 0; right: 0;" alt="About Nutech">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Products Section Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Our Products</h4>
            <h1 class="display-4 mb-4">Quality Office Furniture</h1>
            <p class="text-muted mb-0">Explore our wide range of office furniture designed for functionality and style.</p>
        </div>
        <div class="row g-4">
            @foreach ([
            ['title'=>'Reception Table','desc'=>'2 products available','img'=>'reception-table.jpg'],
            ['title'=>'Conference Table','desc'=>'7 products available','img'=>'conference-table.jpg'],
            ['title'=>'Office Partitions','desc'=>'9 products available','img'=>'office-partitions.jpg'],
            ['title'=>'Office Table','desc'=>'4 products available','img'=>'office-table.jpg'],
            ['title'=>'Office Workstation','desc'=>'6 products available','img'=>'office-workstation.jpg'],
            ['title'=>'Storage Cabinet','desc'=>'3 products available','img'=>'storage-cabinet.jpg']
            ] as $product)
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="{{ $loop->index * 0.2 + 0.2 }}s">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <img src="{{ asset('front/img/'.$product['img']) }}" class="img-fluid mb-3" alt="{{ $product['title'] }}">
                    <h5 class="mb-2">{{ $product['title'] }}</h5>
                    <p>{{ $product['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Products Section End -->

<!-- Factsheet Section Start -->
<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Company Factsheet</h4>
            <h1 class="display-4 mb-4">Quick Overview</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <h5>Basic Information</h5>
                    <ul class="list-unstyled text-dark">
                        <li>Nature of Business: Manufacturer</li>
                        <li>Company CEO: Dheeraj</li>
                        <li>Employees: 11 to 25 People</li>
                        <li>GST Registration: 01-07-2017</li>
                        <li>Legal Status: Limited Company</li>
                        <li>Annual Turnover: 5 - 25 Cr</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <h5>Company USP</h5>
                    <ul class="list-unstyled text-dark">
                        <li>Quality Measures / Testing Facilities: Yes</li>
                        <li>Customized Packaging: Yes</li>
                        <li>On-time Delivery</li>
                        <li>Huge Distribution Network</li>
                        <li>Ethical Business Strategies</li>
                        <li>Clarity in Deals</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <h5>Contact</h5>
                    <p>Sreema Complex, Near Mahendra Showroom, Jalkal, Maheshtala, Kolkata-700141</p>
                    <p>Email: <a href="mailto:info@nutechoffice.com">info@nutechoffice.com</a></p>
                    <p>Phone: +91-1234567890</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Factsheet Section End -->

<!-- Call To Action Start -->
<div class="container-fluid py-5 bg-primary text-white text-center">
    <h2 class="mb-4">Upgrade Your Office Today</h2>
    <p class="mb-4">Contact Nutech Office System Pvt. Ltd. for premium office furniture and solutions.</p>
    <a href="{{ url('/contact') }}" class="btn btn-light btn-lg">Get in Touch</a>
</div>
<!-- Call To Action End -->

@endsection