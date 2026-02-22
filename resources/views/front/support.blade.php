@extends('front.layout')

@section('title', $company_name . ' | Support')

@section('content')

<!-- Page Header -->
<div class="container-fluid bg-light py-5">
    <div class="container text-center">
        <h1 class="display-5 fw-bold mb-2">Customer Support</h1>
        <p class="mb-0">
            We are committed to providing reliable assistance before,
            during, and after every project execution.
        </p>
    </div>
</div>


<!-- Support Overview -->
<div class="container py-5">
    <div class="row g-5 align-items-center">

        <div class="col-lg-6">
            <h2 class="fw-bold mb-3">Dedicated Client Assistance</h2>
            <p>
                Nutech Office System Pvt. Ltd. provides complete customer
                support for modular furniture projects, workspace planning,
                and installation services. Our team ensures smooth coordination
                from initial consultation to post-installation service.
            </p>

            <p>
                Whether you require technical guidance, maintenance support,
                or project consultation, our specialists are available to help
                you achieve efficient and well-organized workspace solutions.
            </p>
        </div>

        <div class="col-lg-6">
            <img src="{{ asset('assets/front/img/support.jpg') }}"
                 class="img-fluid rounded shadow"
                 alt="Customer Support">
        </div>

    </div>
</div>


<!-- Support Services -->
<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Support Services</h2>
            <p>Comprehensive assistance for all customers and projects</p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow h-100">
                    <h5 class="fw-bold">Project Consultation</h5>
                    <p>
                        Expert guidance on workspace planning, furniture
                        selection, layout optimization, and customization options.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow h-100">
                    <h5 class="fw-bold">Installation Support</h5>
                    <p>
                        Professional on-site installation assistance ensuring
                        proper setup, alignment, and functional performance.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow h-100">
                    <h5 class="fw-bold">Maintenance Assistance</h5>
                    <p>
                        Guidance and service support for maintaining modular
                        furniture systems and extending product life.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow h-100">
                    <h5 class="fw-bold">Customization Help</h5>
                    <p>
                        Assistance in modifying layouts, finishes, sizes,
                        and configurations according to evolving workspace needs.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow h-100">
                    <h5 class="fw-bold">Quotation & Order Support</h5>
                    <p>
                        Help with product specifications, pricing details,
                        order processing, and delivery timelines.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white p-4 rounded shadow h-100">
                    <h5 class="fw-bold">Post-Project Assistance</h5>
                    <p>
                        Continued support after completion to ensure customer
                        satisfaction and optimal workspace performance.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Contact Support -->
<div class="container py-5">
    <div class="row g-5 align-items-center">

        <div class="col-lg-6">
            <h2 class="fw-bold mb-3">Need Assistance?</h2>
            <p>
                Our support team is ready to help you with enquiries,
                service requests, or project discussions.
            </p>

            <ul class="list-unstyled">
                <li><strong>Phone:</strong> +91 033 24926082 / +91 9830283339</li>
                <li><strong>Email:</strong> info@nutechofficesystem.in</li>
                <li>
                    <strong>Address:</strong>
                    Sreema Complex, Maheshtala Mahadebpur Jalkal,
                    Kolkata – 700141, West Bengal, India
                </li>
            </ul>
        </div>

        <div class="col-lg-6 text-center">
            <a href="{{ url('/contact') }}" class="btn btn-primary px-4 py-2 me-2">
                Contact Us
            </a>

            <a href="{{ url('/quote') }}" class="btn btn-outline-primary px-4 py-2">
                Request Quote
            </a>
        </div>

    </div>
</div>

@endsection