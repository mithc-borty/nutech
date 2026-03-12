@extends('front.layout')

@section('title', $site_title . ' | Projects')

@section('content')

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown">Projects</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Projects</li>
        </ol>    
    </div>
</div>

<div class="container-fluid bg-light py-5">
    <div class="container text-center">
        <h1 class="display-5 fw-bold mb-2">Our Projects</h1>
        <p class="mb-0">Delivering customized modular furniture and workspace solutions across corporate, institutional, and commercial environments.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5 align-items-center">
        <div class="col-lg-6">
            <h2 class="fw-bold mb-3">Workspace Solutions Delivered Across India</h2>
            <p>{{ $projects_intro ?? 'Nutech Office System Pvt. Ltd. has successfully completed large-scale office furniture and interior projects for corporate offices, banks, educational institutions, and commercial spaces. Each project is executed with careful planning, precision manufacturing, and professional installation.' }}</p>
            <p>{{ $projects_detail ?? 'With more than 500 completed projects, our team focuses on ergonomic design, efficient space utilization, and long-lasting furniture systems tailored to client requirements.' }}</p>
        </div>
        <div class="col-lg-6">
            <img src="{{ url('storage/assets/images/product/project-1.jpg') }}" class="img-fluid rounded shadow" alt="Office Interior Project">
        </div>
    </div>
</div>

{{-- <div class="container py-5 bg-light">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Project Categories</h2>
        <p>Industries and environments where our solutions are implemented</p>
    </div>
    <div class="row g-4">
        @foreach($projectCategories as $category)
            <div class="col-md-4">
                <div class="p-4 bg-white shadow rounded h-100">
                    <h5 class="fw-bold">{{ $category->name }}</h5>
                    <p>{{ $category->description }}</p>
                    @if($category->logo)
                        <img src="{{ url('storage/assets/images/product/' . $category->logo) }}" class="img-fluid mt-2" alt="{{ $category->name }}">
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>--}}

{{--<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Our Projects Portfolio</h2>
        <p>Explore our recent projects with customized workspace solutions</p>
    </div>
    <div class="row g-4">
        @foreach($projects as $project)
            <div class="col-md-4">
                <div class="card shadow h-100">
                    @if($project->images->isNotEmpty())
                        <img src="{{ url('storage/assets/images/product/' . $project->images->first()->image) }}" class="card-img-top" alt="{{ $project->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $project->title }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                        <p class="text-muted"><small>{{ $project->category->name ?? '' }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4 text-center">
        {{ $projects->links() }}
    </div>
</div>--}}

{{--<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Major Client Segments</h2>
        <p>Trusted by leading organizations and institutions</p>
    </div>
    <div class="row g-4 text-center">
        @foreach($majorClients as $client)
            <div class="col-md-4">
                <div class="border rounded p-4 h-100">
                    <h5 class="fw-bold">{{ $client['segment'] }}</h5>
                    <p class="mb-0">{{ $client['names'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>--}}

{{--<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Project Execution Process</h2>
        </div>
        <div class="row g-4 text-center">
            @foreach($executionSteps as $step)
                <div class="col-md-3">
                    <h5 class="fw-bold">{{ $step['title'] }}</h5>
                    <p>{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>--}}

<div class="container py-5 text-center">
    <h3 class="fw-bold mb-3">Planning a New Office Project?</h3>
    <p>Contact our team for customized workspace planning, modular furniture solutions, and professional project execution.</p>
    <a href="{{ url('/quote') }}" class="btn btn-primary px-4 py-2">Request a Quote</a>
</div>

@endsection