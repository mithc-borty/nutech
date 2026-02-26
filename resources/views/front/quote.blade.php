@extends('front.layout')

@section('title', 'Request a Quote | Nutech Office System Pvt. Ltd.')

@section('content')

<!-- Page Header -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown">Request a Quote</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li class="breadcrumb-item active text-primary">
                Get a Quote
            </li>
        </ol>
    </div>
</div>
<!-- Page Header End -->


<!-- Quote Section -->
<div class="container-fluid py-5">
    <div class="container py-5">

        <div class="row g-5 align-items-center">

            <!-- LEFT CONTENT -->
            <div class="col-lg-5">
                <h4 class="text-primary">Free Consultation</h4>
                <h1 class="display-5 mb-4">
                    Let’s Design Your Perfect Workspace
                </h1>

                <p class="mb-4">
                    Share your office requirements and our experts will provide
                    layout planning, furniture recommendations, and a customized quotation.
                    We specialize in modular workstations, executive furniture,
                    partitions, and complete office interiors.
                </p>

                <div class="mb-3">
                    <i class="fa fa-check text-primary me-2"></i>
                    Free workspace consultation
                </div>
                <div class="mb-3">
                    <i class="fa fa-check text-primary me-2"></i>
                    3D layout visualization support
                </div>
                <div class="mb-3">
                    <i class="fa fa-check text-primary me-2"></i>
                    Customized manufacturing solutions
                </div>
                <div class="mb-3">
                    <i class="fa fa-check text-primary me-2"></i>
                    Fast project execution
                </div>

                <div class="mt-4 p-4 bg-light rounded shadow-sm">
                    <h5 class="mb-3">Contact Information</h5>
                    <p class="mb-2">
                        <i class="fa fa-map-marker-alt text-primary me-2"></i>
                        Sreema Complex, Maheshtala Mahadebpur Jalkal,
                        Kolkata – 700141
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        +91 9830283339
                    </p>
                    <p class="mb-0">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        info@nutechofficesystem.in
                    </p>
                </div>
            </div>


            <!-- QUOTE FORM -->
            <div class="col-lg-7">
                <div class="bg-white p-5 rounded shadow">

                    <h3 class="mb-4 text-center">Request Your Quote</h3>

                    <form method="POST" action="{{ url('/quote-submit') }}">
                        @csrf

                        <div class="row g-3">

                            <div class="col-md-6">
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Your Name *"
                                       required>
                            </div>

                            <div class="col-md-6">
                                <input type="tel"
                                       name="phone"
                                       class="form-control"
                                       placeholder="Phone Number *"
                                       required>
                            </div>

                            <div class="col-12">
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Email Address">
                            </div>

                            <div class="col-md-6">
                                <input type="text"
                                       name="company"
                                       class="form-control"
                                       placeholder="Company Name">
                            </div>

                            <div class="col-md-6">
                                <input type="text"
                                       name="location"
                                       class="form-control"
                                       placeholder="Project Location">
                            </div>

                            <div class="col-12">
                                <select name="service" class="form-select">
                                    <option selected disabled>
                                        Select Requirement Type
                                    </option>
                                    <option>Modular Workstations</option>
                                    <option>Executive Tables</option>
                                    <option>Conference Tables</option>
                                    <option>Office Partitions</option>
                                    <option>Complete Interior Setup</option>
                                    <option>Office Renovation</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <textarea name="message"
                                          rows="5"
                                          class="form-control"
                                          placeholder="Describe your requirement (area size, number of seats, timeline, etc.)"></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit"
                                        class="btn btn-primary px-5 py-3">
                                    Submit Request
                                </button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>


<!-- CTA -->
<div class="container-fluid bg-primary text-white text-center py-5">
    <h2 class="display-6 mb-3">
        Need Immediate Assistance?
    </h2>
    <p class="mb-4">
        Call our workspace experts today and get quick guidance for your project.
    </p>
    <a href="{{ url('/contact') }}" class="btn btn-light px-5 py-3">
        Contact Us
    </a>
</div>

@endsection