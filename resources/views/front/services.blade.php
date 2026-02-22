@extends('front.layout')
@section('title', 'Nutech Office System Pvt. Ltd. - Services')
@section('content')

<!-- Page Header -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown">Our Services</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Services</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->


<!-- Services Intro -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 800px;">
            <h4 class="text-primary">What We Do</h4>
            <h1 class="display-5 mb-3">Complete Office Furniture & Interior Solutions</h1>
            <p>
                Nutech Office System Pvt. Ltd. provides end-to-end modular furniture and workspace
                solutions — from planning and design to manufacturing and installation.
                Our goal is to create efficient, ergonomic, and aesthetically modern workspaces
                that enhance productivity and optimize available space.
            </p>
        </div>

        <!-- Core Services -->
        <div class="row g-4">

            <div class="col-md-6 col-lg-4">
                <div class="border rounded p-4 h-100 text-center">
                    <i class="fas fa-drafting-compass fa-3x text-primary mb-3"></i>
                    <h5>Workspace Planning & Design</h5>
                    <p>
                        Professional layout planning using dimensional drawings and 3D visualization
                        to help clients understand workspace flow before execution.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="border rounded p-4 h-100 text-center">
                    <i class="fas fa-couch fa-3x text-primary mb-3"></i>
                    <h5>Custom Furniture Manufacturing</h5>
                    <p>
                        Customized modular furniture manufactured in our automated facility
                        using durable materials and ergonomic design standards.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="border rounded p-4 h-100 text-center">
                    <i class="fas fa-tools fa-3x text-primary mb-3"></i>
                    <h5>Installation & Project Execution</h5>
                    <p>
                        Complete on-site installation handled by experienced professionals,
                        ensuring precision, safety, and timely project completion.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="border rounded p-4 h-100 text-center">
                    <i class="fas fa-building fa-3x text-primary mb-3"></i>
                    <h5>Office Renovation & Decoration</h5>
                    <p>
                        Modern office transformation services including partitions,
                        workspace restructuring, and interior upgrades.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="border rounded p-4 h-100 text-center">
                    <i class="fas fa-layer-group fa-3x text-primary mb-3"></i>
                    <h5>Modular Workspace Solutions</h5>
                    <p>
                        Modular workstations, partitions, and collaborative layouts
                        designed for flexibility and future expansion.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="border rounded p-4 h-100 text-center">
                    <i class="fas fa-ruler-combined fa-3x text-primary mb-3"></i>
                    <h5>Interior Space Optimization</h5>
                    <p>
                        Smart furniture placement and storage planning to maximize usable
                        office space without compromising comfort.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Industries Served -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5 text-center">
        <h4 class="text-primary">Industries We Serve</h4>
        <h2 class="mb-4">Solutions Across Multiple Sectors</h2>

        <div class="row g-4">
            <div class="col-md-3">Corporate Offices</div>
            <div class="col-md-3">Banking & Financial Institutions</div>
            <div class="col-md-3">Educational Institutions</div>
            <div class="col-md-3">Commercial & Industrial Spaces</div>
        </div>
    </div>
</div>


<!-- Why Choose Us -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h4 class="text-primary">Why Choose Us</h4>
            <h2>Experience, Quality & Customization</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4">✔ Customized modular solutions</div>
            <div class="col-md-4">✔ Mechanized manufacturing process</div>
            <div class="col-md-4">✔ Fast delivery timelines</div>
            <div class="col-md-4">✔ Ergonomic & modern designs</div>
            <div class="col-md-4">✔ In-house transportation</div>
            <div class="col-md-4">✔ 500+ completed projects</div>
        </div>
    </div>
</div>


<!-- Call To Action -->
<div class="container-fluid bg-primary text-white py-5">
    <div class="container text-center">
        <h2 class="mb-3">Need a Custom Workspace Solution?</h2>
        <p>
            Contact our team for planning, design consultation, and quotation
            tailored to your office requirements.
        </p>
        <a href="{{ url('/contact') }}" class="btn btn-light px-4 py-2">Request Consultation</a>
    </div>
</div>

@endsection