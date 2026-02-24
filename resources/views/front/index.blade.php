@extends('front.layout')
@section('title', 'Nutech Office System Pvt. Ltd. | Modular Furniture Manufacturer Kolkata')
@section('content')

@php
$slides = [
    [
        'bg' => 'hero-bg-half-1', 
        'shape' => 'hero-shape-1', 
        'title' => 'Innovative Modular Office & Workspace Solutions',
        'subtitle' => 'Manufacturer • Supplier • Interior Planner Since 2007',
        'desc' => 'Nutech Office System Pvt. Ltd. specializes in high-quality modular workstations, executive tables, and customized partitions for corporate, banking, and educational sectors.'
    ],
    [
        'bg' => 'hero-bg-half-2', 
        'shape' => 'hero-shape-2', 
        'title' => 'Ergonomic Designs for Productive Environments',
        'subtitle' => 'Trusted by ITC, Tata Steel, SBI & More',
        'desc' => 'Transforming workspaces with AutoCAD-driven planning and 3D visualization. We deliver durable, space-efficient furniture with a focus on timely project execution.'
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
                                <a class="btn btn-light py-3 px-4 px-md-5 me-2" href="{{ url('/products') }}">Explore Products</a>
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

<div class="container-fluid about bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7 wow fadeInLeft" data-wow-delay="0.2s">
                <h4 class="text-primary">About Nutech Office System</h4>
                <h1 class="display-4 mb-4">Leading Modular Furniture Manufacturer in Eastern India</h1>
                <p>
                    Established in 2007, <strong>Nutech Office System Pvt. Ltd.</strong> is a prominent manufacturer and office interior planner based in Kolkata. Operating from a 15,000 sq. ft. automated facility, we provide complete workspace solutions from 3D visualization to final installation.
                </p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="btn-lg-square bg-primary text-white rounded-circle"><i class="fa fa-check"></i></div>
                            <div class="ms-3"><p class="mb-0">500+ Projects Done</p></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="btn-lg-square bg-primary text-white rounded-circle"><i class="fa fa-users"></i></div>
                            <div class="ms-3"><p class="mb-0">100+ Professionals</p></div>
                        </div>
                    </div>
                </div>
                <p>We leverage advanced design tools like AutoCAD and 3D Studio Max to ensure every cubicle and cabin optimizes space and enhances employee productivity.</p>
                <a href="{{ url('/about') }}" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
            </div>
            <div class="col-lg-5 wow fadeInRight" data-wow-delay="0.2s">
                <div class="position-relative h-100">
                    <img src="{{ asset('front/img/about-1.jpg') }}" class="img-fluid w-100 h-100 rounded" style="object-fit: cover;" alt="Office Interior Planning">
                    <div class="bg-white p-4 position-absolute shadow-sm rounded" style="bottom: -20px; left: -20px; max-width: 250px;">
                        <h2 class="text-primary mb-0">18+</h2>
                        <p class="mb-0 fw-bold text-dark">Years of Excellence</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Our Core Offerings</h4>
            <h1 class="display-4 mb-4">Furniture Designed for Efficiency</h1>
        </div>
        <div class="row g-4">
            @php
            $products = [
                ['title'=>'Modular Workstations','desc'=>'2/4/6 seater setups with cable management.','icon'=>'fa-th-large'],
                ['title'=>'Executive & Manager Tables','desc'=>'Premium finishes for leadership workspaces.','icon'=>'fa-user-tie'],
                ['title'=>'Conference & Meeting Tables','desc'=>'Modern designs for collaborative rooms.','icon'=>'fa-users'],
                ['title'=>'Modular Partitions','desc'=>'Full-height and cubicle systems for privacy.','icon'=>'fa-columns'],
                ['title'=>'Institutional Furniture','desc'=>'Solutions for schools, labs, and cafeterias.','icon'=>'fa-university'],
                ['title'=>'Storage & Shelving','desc'=>'Durable filing cabinets and book shelves.','icon'=>'fa-archive']
            ];
            @endphp
            @foreach ($products as $p)
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item p-4 text-center border-0 shadow-sm rounded bg-white h-100">
                    <div class="service-icon mb-4">
                        <i class="fas {{ $p['icon'] }} fa-3x text-primary"></i>
                    </div>
                    <h5>{{ $p['title'] }}</h5>
                    <p class="mb-0 text-muted">{{ $p['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container-fluid bg-dark text-white py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h4 class="text-primary">Our Services</h4>
                <h2 class="display-6 text-white mb-4">Workspace Planning & Design</h2>
                <p>We use advanced tools like AutoCAD and 3D Studio Max to help you visualize your office before execution. Our services include:</p>
                <div class="row g-3">
                    <div class="col-sm-6"><i class="fa fa-angle-right text-primary me-2"></i>Layout Design</div>
                    <div class="col-sm-6"><i class="fa fa-angle-right text-primary me-2"></i>3D Visualization</div>
                    <div class="col-sm-6"><i class="fa fa-angle-right text-primary me-2"></i>Interior Renovation</div>
                    <div class="col-sm-6"><i class="fa fa-angle-right text-primary me-2"></i>Custom Manufacturing</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6"><img class="img-fluid rounded shadow" src="{{ asset('front/img/service-1.jpg') }}" alt="AutoCAD Design"></div>
                    <div class="col-6"><img class="img-fluid rounded shadow" src="{{ asset('front/img/service-2.jpg') }}" alt="3D Visualization"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h4 class="text-primary">Trusted By</h4>
            <h2 class="display-6">Our Prestigious Clients</h2>
            <p class="text-muted">Serving major corporate, banking, and government sectors across India.</p>
        </div>
        <div class="row g-4 text-center justify-content-center">
            <div class="col-6 col-md-2"><p class="fw-bold mb-0">ITC</p><small class="text-muted">Corporate</small></div>
            <div class="col-6 col-md-2"><p class="fw-bold mb-0">Tata Steel</p><small class="text-muted">Industry</small></div>
            <div class="col-6 col-md-2"><p class="fw-bold mb-0">SBI</p><small class="text-muted">Banking</small></div>
            <div class="col-6 col-md-2"><p class="fw-bold mb-0">Vodafone</p><small class="text-muted">Telecom</small></div>
            <div class="col-6 col-md-2"><p class="fw-bold mb-0">L&T</p><small class="text-muted">Engineering</small></div>
            <div class="col-6 col-md-2"><p class="fw-bold mb-0">WEBEL</p><small class="text-muted">Government</small></div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <h4 class="text-primary">Business Factsheet</h4>
                <h2 class="mb-4">Why Choose Nutech?</h2>
                <div class="row g-4">
                    <div class="col-12 border-start border-4 border-primary ps-4">
                        <h6>Customized Modular Solutions</h6>
                        <p class="small text-muted">Tailored layouts to fit your specific office dimensions and workflow needs.</p>
                    </div>
                    <div class="col-12 border-start border-4 border-primary ps-4">
                        <h6>Mechanized Production</h6>
                        <p class="small text-muted">Precision manufacturing in our 15,000 sq. ft. facility ensuring high durability.</p>
                    </div>
                    <div class="col-12 border-start border-4 border-primary ps-4">
                        <h6>Fast Execution</h6>
                        <p class="small text-muted">Typically 4-5 weeks lead time with reliable in-house transportation and installation.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-dark p-5 rounded text-white h-100">
                    <h4 class="text-primary mb-4">Quick Contact</h4>
                    <p><i class="fa fa-map-marker-alt text-primary me-3"></i>Sreema Complex, Maheshtala Mahadebpur Jalkal, Kolkata – 700141</p>
                    <p><i class="fa fa-phone-alt text-primary me-3"></i>+91 033 24926082 / 9830283339</p>
                    <p><i class="fa fa-envelope text-primary me-3"></i>info@nutechofficesystem.in</p>
                    <hr class="bg-light">
                    <p class="mb-2"><small><strong>Business Hours:</strong> Mon - Sat (10:00 AM - 7:00 PM)</small></p>
                    <p class="mb-0"><small>GST Registered | Payment: Cash, Cheque, Cards</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 bg-primary text-white text-center">
    <h2 class="display-5 mb-4">Ready to Optimize Your Workspace?</h2>
    <p class="mb-4 fs-5">Get a free consultation and 3D visualization for your office furniture requirements.</p>
    <a href="{{ url('/contact') }}" class="btn btn-light btn-lg px-5 py-3">Request a Quote</a>
</div>

@endsection