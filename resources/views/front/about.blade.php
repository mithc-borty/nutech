@extends('front.layout')
@section('content')

<!-- About Section Start -->
<div class="container-fluid about bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">

            <div class="col-lg-7 wow fadeInLeft" data-wow-delay="0.2s">
                <h4 class="text-primary">About Nutech Office System</h4>
                <h1 class="display-5 mb-4">Leading Modular Office Furniture & Workspace Solutions in Kolkata</h1>

                <p>
                    Founded in 2007, Nutech Office System Pvt. Ltd. is a trusted manufacturer, supplier, and workspace solutions provider. We specialize in modular office furniture, workstations, partitions, storage systems, and complete office interiors. Serving corporate offices, banks, educational institutions, and commercial spaces, our solutions combine **ergonomic design, durability, and aesthetic appeal**.
                </p>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="d-flex">
                            <span class="fas fa-couch fa-3x text-primary me-3"></span>
                            <h5 class="mb-0">Modular Office Furniture</h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <span class="fas fa-project-diagram fa-3x text-primary me-3"></span>
                            <h5 class="mb-0">Workspace Planning & Interiors</h5>
                        </div>
                    </div>
                </div>

                <div class="text-dark mb-4">
                    <p class="fs-6"><span class="fa fa-check text-primary me-2"></span>Customized modular furniture manufacturing</p>
                    <p class="fs-6"><span class="fa fa-check text-primary me-2"></span>Office layouts, 3D visualization, and workspace optimization</p>
                    <p class="fs-6"><span class="fa fa-check text-primary me-2"></span>Project execution, installation, and on-time delivery</p>
                    <p class="fs-6"><span class="fa fa-check text-primary me-2"></span>Ergonomic and contemporary design solutions for every office</p>
                </div>

                <a class="btn btn-primary py-3 px-4" href="{{ url('/contact') }}">Contact Us</a>
            </div>

            <div class="col-lg-5 wow fadeInRight" data-wow-delay="0.2s">
                <div class="position-relative h-100">
                    <img src="{{ asset('front/img/about-1.jpg') }}" class="img-fluid w-100 h-100 rounded" style="object-fit: cover;" alt="About Nutech">
                    <div class="position-absolute pt-3" style="width: 50%; left: 0; bottom: 0;">
                        <div class="bg-primary p-4 text-center">
                            <h4 class="display-5 text-white mb-0">16+</h4>
                            <p class="text-white mb-0">Years of Excellence</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Company Overview Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Company Overview</h4>
            <h1 class="display-5 mb-4">Who We Are</h1>
            <p class="text-muted mb-0">
                Nutech Office System Pvt. Ltd. is a leading provider of modular office furniture and workspace solutions. We design, manufacture, and install office furniture systems tailored for:
            </p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="p-4 border rounded h-100">
                    <span class="fas fa-building fa-3x text-primary mb-3"></span>
                    <h5>Corporate Offices</h5>
                </div>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="p-4 border rounded h-100">
                    <span class="fas fa-university fa-3x text-primary mb-3"></span>
                    <h5>Educational Institutions</h5>
                </div>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="p-4 border rounded h-100">
                    <span class="fas fa-store fa-3x text-primary mb-3"></span>
                    <h5>Commercial Spaces</h5>
                </div>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="p-4 border rounded h-100">
                    <span class="fas fa-home fa-3x text-primary mb-3"></span>
                    <h5>Residential Solutions</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Company Overview End -->

<!-- Products & Services Start -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Our Products & Services</h4>
            <h1 class="display-5 mb-4">Comprehensive Workspace Solutions</h1>
        </div>

        <div class="row g-4">
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="mb-3">Office Furniture</h5>
                <ul class="list-unstyled text-dark">
                    <li><span class="fa fa-check text-primary me-2"></span>Modular Workstations</li>
                    <li><span class="fa fa-check text-primary me-2"></span>Executive & Manager Tables</li>
                    <li><span class="fa fa-check text-primary me-2"></span>Reception Desks & Conference Tables</li>
                    <li><span class="fa fa-check text-primary me-2"></span>Office Chairs & Storage Units</li>
                </ul>
            </div>
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <h5 class="mb-3">Workspace Services</h5>
                <ul class="list-unstyled text-dark">
                    <li><span class="fa fa-check text-primary me-2"></span>Workspace Planning & 3D Layout Design</li>
                    <li><span class="fa fa-check text-primary me-2"></span>Custom Furniture Manufacturing</li>
                    <li><span class="fa fa-check text-primary me-2"></span>Installation & Project Execution</li>
                    <li><span class="fa fa-check text-primary me-2"></span>Interior Space Optimization</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Products & Services End -->

<!-- Major Clients Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Major Clients</h4>
            <h1 class="display-5 mb-4">Trusted By Leading Organizations</h1>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="p-4 border rounded h-100">
                    <span class="fab fa-apple fa-3x text-primary mb-3"></span>
                    <h6>ITC</h6>
                </div>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="p-4 border rounded h-100">
                    <span class="fab fa-typo3 fa-3x text-primary mb-3"></span>
                    <h6>Tata Steel</h6>
                </div>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="p-4 border rounded h-100">
                    <span class="fas fa-university fa-3x text-primary mb-3"></span>
                    <h6>State Bank of India</h6>
                </div>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="p-4 border rounded h-100">
                    <span class="fas fa-landmark fa-3x text-primary mb-3"></span>
                    <h6>WEBEL & LIC</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Major Clients End -->

<!-- Business Strengths / USP Start -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Why Choose Us</h4>
            <h1 class="display-5 mb-4">Our Business Strengths</h1>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                <span class="fas fa-cogs fa-3x text-primary mb-3"></span>
                <h5>Customized Solutions</h5>
                <p class="text-muted">Tailored furniture and modular setups to match client requirements and space efficiency.</p>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.4s">
                <span class="fas fa-rocket fa-3x text-primary mb-3"></span>
                <h5>Fast Execution</h5>
                <p class="text-muted">Mechanized manufacturing, in-house transport, and timely delivery for all projects.</p>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
                <span class="fas fa-users fa-3x text-primary mb-3"></span>
                <h5>Experienced Team</h5>
                <p class="text-muted">Professional design and installation teams with 16+ years of industry expertise.</p>
            </div>
        </div>
    </div>
</div>
<!-- Business Strengths / USP End -->

<!-- Contact CTA Start -->
<div class="container-fluid py-5 bg-primary text-white text-center">
    <h2 class="mb-3">Ready to Transform Your Workspace?</h2>
    <p class="mb-3">Let our experts design and deliver ergonomic, modular office solutions tailored for your business.</p>
    <a href="{{ url('/contact') }}" class="btn btn-light btn-lg">Request a Consultation</a>
</div>
<!-- Contact CTA End -->

@endsection