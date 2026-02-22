@extends('front.layout')
@section('title', 'Nutech Office System Pvt. Ltd. - Products')
@section('content')

<!-- Page Header / Breadcrumb -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Products</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Products</li>
        </ol>    
    </div>
</div>
<!-- Page Header End -->

<!-- Products Listing Start -->
<div class="container-fluid products py-5">
    <div class="container py-5">
        <div class="d-flex flex-column mx-auto text-center mb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Collection</h4>
            <h1 class="display-4 mb-4">Premium Office Furniture & Workstations</h1>
            <p class="mb-0">Explore our wide range of office tables, workstations, partitions, and storage solutions. All products are crafted with quality, durability, and ergonomic design in mind.</p>
        </div>

        @php
            use Illuminate\Pagination\LengthAwarePaginator;

            $allProducts = [
                ['image' => 'img/products/product-1.jpg', 'title' => 'Executive Office Table', 'desc' => 'High-quality executive desk with ergonomic design.', 'link' => '#'],
                ['image' => 'img/products/product-2.jpg', 'title' => 'Modular Workstation', 'desc' => 'Flexible workstation units for modern offices.', 'link' => '#'],
                ['image' => 'img/products/product-3.jpg', 'title' => 'Storage Cabinet', 'desc' => 'Durable cabinets for secure storage.', 'link' => '#'],
                ['image' => 'img/products/product-4.jpg', 'title' => 'Office Partition', 'desc' => 'Stylish and functional office partitions.', 'link' => '#'],
                ['image' => 'img/products/product-5.jpg', 'title' => 'Reception Desk', 'desc' => 'Elegant reception desks for welcoming visitors.', 'link' => '#'],
                ['image' => 'img/products/product-6.jpg', 'title' => 'Conference Table', 'desc' => 'Spacious and sturdy tables for meetings.', 'link' => '#'],
                ['image' => 'img/products/product-7.jpg', 'title' => 'Ergonomic Chair', 'desc' => 'Comfortable chairs for long working hours.', 'link' => '#'],
                ['image' => 'img/products/product-8.jpg', 'title' => 'File Cabinet', 'desc' => 'Secure filing cabinets for office documents.', 'link' => '#']
            ];

            $page = request()->get('page', 1);
            $perPage = 4; // products per page
            $offset = ($page - 1) * $perPage;
            $products = array_slice($allProducts, $offset, $perPage);

            $paginator = new LengthAwarePaginator($products, count($allProducts), $perPage, $page, [
                'path' => request()->url(),
                'query' => request()->query(),
            ]);
        @endphp

        <div class="row g-4">
            @foreach ($paginator as $product)
            <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="product-item border rounded overflow-hidden">
                    <div class="product-img position-relative">
                        <img src="{{ asset($product['image']) }}" class="img-fluid w-100" alt="{{ $product['title'] }}">
                    </div>
                    <div class="product-content bg-light text-center p-4">
                        <h5>{{ $product['title'] }}</h5>
                        <p class="mb-3">{{ $product['desc'] }}</p>
                        <a href="{{ $product['link'] }}" class="btn btn-primary py-2 px-4">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $paginator->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
<!-- Products Listing End -->

@endsection