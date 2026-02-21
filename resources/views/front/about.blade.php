@extends('front.layout')
@section('title', 'About Nutech Office System Pvt. Ltd.')
@section('content')

<div class="container-fluid about bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">

            <div class="col-lg-7 wow fadeInLeft" data-wow-delay="0.2s">
                <h4 class="text-primary">About Nutech</h4>
                <h1 class="display-5 mb-4">Trusted Electrical & Office Infrastructure Solutions in Kolkata</h1>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="d-flex">
                            <span class="fas fa-bolt fa-3x text-primary me-3"></span>
                            <h5 class="mb-0">Electrical & Power Solutions</h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <span class="fas fa-tools fa-3x text-primary me-3"></span>
                            <h5 class="mb-0">Installation & Maintenance Services</h5>
                        </div>
                    </div>
                </div>

                <p class="mb-4">
                    Nutech Office System Pvt. Ltd., founded in 2005, is a leading manufacturer of office tables, workstations, partitions, and storage cabinets. We specialize in high-quality office infrastructure and electrical solutions, ensuring reliability, safety, and long-term support for businesses, industrial setups, and institutional environments.
                </p>

                <div class="text-dark mb-4">
                    <p class="fs-6"><span class="fa fa-check text-primary me-2"></span>Supply and installation of electrical and office equipment</p>
                    <p class="fs-6"><span class="fa fa-check text-primary me-2"></span>Preventive maintenance and technical support services</p>
                    <p class="fs-6"><span class="fa fa-check text-primary me-2"></span>Reliable power and infrastructure solutions for businesses</p>
                    <p class="fs-6"><span class="fa fa-check text-primary me-2"></span>Experienced technical team led by Mr. Dhiren Nahak ensuring safety and efficiency</p>
                </div>

                <a class="btn btn-primary py-3 px-4" href="{{ url('/contact') }}">Contact Us</a>
            </div>

            <div class="col-lg-5 wow fadeInRight" data-wow-delay="0.2s">
                <div class="position-relative h-100">
                    <img src="{{ asset('front/img/about-1.jpg') }}" class="img-fluid w-100 h-100 rounded" style="object-fit: cover;" alt="About Nutech">
                    <div class="position-absolute pt-3" style="width: 50%; left: 0; bottom: 0;">
                        <div class="bg-primary p-4 text-center">
                            <h4 class="display-5 text-white mb-0">10+</h4>
                            <p class="text-white mb-0">Years Experience</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection