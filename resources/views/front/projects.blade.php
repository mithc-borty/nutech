@extends('front.layout')

@section('title', $company_name . ' | Projects')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-light py-5">
    <div class="container text-center">
        <h1 class="display-5 fw-bold mb-2">Our Projects</h1>
        <p class="mb-0">
            Delivering customized modular furniture and workspace solutions
            across corporate, institutional, and commercial environments.
        </p>
    </div>
</div>
<!-- Page Header End -->


<!-- Projects Intro -->
<div class="container py-5">
    <div class="row g-5 align-items-center">
        <div class="col-lg-6">
            <h2 class="fw-bold mb-3">Workspace Solutions Delivered Across India</h2>
            <p>
                Nutech Office System Pvt. Ltd. has successfully completed
                large-scale office furniture and interior projects for corporate
                offices, banks, educational institutions, and commercial spaces.
                Each project is executed with careful planning, precision
                manufacturing, and professional installation.
            </p>
            <p>
                With more than 500 completed projects, our team focuses on
                ergonomic design, efficient space utilization, and long-lasting
                furniture systems tailored to client requirements.
            </p>
        </div>

        <div class="col-lg-6">
            <img src="{{ asset('assets/front/img/project-1.jpg') }}"
                 class="img-fluid rounded shadow"
                 alt="Office Interior Project">
        </div>
    </div>
</div>


<!-- Project Categories -->
<div class="container py-5 bg-light">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Project Categories</h2>
        <p>Industries and environments where our solutions are implemented</p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="p-4 bg-white shadow rounded h-100">
                <h5 class="fw-bold">Corporate Offices</h5>
                <p>
                    Modular workstations, executive cabins, conference rooms,
                    and collaborative office layouts designed for productivity
                    and modern corporate environments.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white shadow rounded h-100">
                <h5 class="fw-bold">Banking & Financial Institutions</h5>
                <p>
                    Secure counters, modular partitions, storage systems,
                    and customer interaction zones customized for banking operations.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white shadow rounded h-100">
                <h5 class="fw-bold">Educational Institutions</h5>
                <p>
                    Classroom furniture, laboratory setups, faculty workspaces,
                    and administrative office solutions designed for durability
                    and functionality.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white shadow rounded h-100">
                <h5 class="fw-bold">Commercial Spaces</h5>
                <p>
                    Reception areas, collaborative seating, cafeteria furniture,
                    and customized layouts for commercial and business facilities.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white shadow rounded h-100">
                <h5 class="fw-bold">Government Projects</h5>
                <p>
                    Office interiors and modular furniture installations for
                    public sector organizations and institutional environments.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white shadow rounded h-100">
                <h5 class="fw-bold">Custom Interior Projects</h5>
                <p>
                    Fully customized workspace planning including partitions,
                    storage systems, and interior optimization solutions.
                </p>
            </div>
        </div>

    </div>
</div>


<!-- Major Clients -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Major Client Segments</h2>
        <p>Trusted by leading organizations and institutions</p>
    </div>

    <div class="row g-4 text-center">

        <div class="col-md-4">
            <div class="border rounded p-4 h-100">
                <h5 class="fw-bold">Corporate Clients</h5>
                <p class="mb-0">
                    ITC, L&T, Tata Steel, Vodafone, Idea and other corporate organizations.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="border rounded p-4 h-100">
                <h5 class="fw-bold">Banking Sector</h5>
                <p class="mb-0">
                    State Bank of India, Central Bank, UCO Bank,
                    Canara Bank, ICICI Bank.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="border rounded p-4 h-100">
                <h5 class="fw-bold">Government & Institutions</h5>
                <p class="mb-0">
                    WEBEL, LIC, Chanakya National Law University
                    and various institutional projects.
                </p>
            </div>
        </div>

    </div>
</div>


<!-- Execution Process -->
<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Project Execution Process</h2>
        </div>

        <div class="row g-4 text-center">

            <div class="col-md-3">
                <h5 class="fw-bold">Planning</h5>
                <p>Site analysis, measurements, and workspace planning.</p>
            </div>

            <div class="col-md-3">
                <h5 class="fw-bold">Design</h5>
                <p>2D layouts and 3D visualization using modern design tools.</p>
            </div>

            <div class="col-md-3">
                <h5 class="fw-bold">Manufacturing</h5>
                <p>Precision production in a mechanized facility.</p>
            </div>

            <div class="col-md-3">
                <h5 class="fw-bold">Installation</h5>
                <p>Professional on-site execution and final setup.</p>
            </div>

        </div>
    </div>
</div>


<!-- Call To Action -->
<div class="container py-5 text-center">
    <h3 class="fw-bold mb-3">Planning a New Office Project?</h3>
    <p>
        Contact our team for customized workspace planning,
        modular furniture solutions, and professional project execution.
    </p>

    <a href="{{ url('/quote') }}" class="btn btn-primary px-4 py-2">
        Request a Quote
    </a>
</div>

@endsection