@extends('front.layout')
@section('title', 'Nutech Office System Pvt. Ltd. - Full Product Range')
@section('content')

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown">Our Product Catalog</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Products</li>
        </ol>    
    </div>
</div>

<div class="container-fluid products py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" style="max-width: 800px;">
            <h4 class="text-primary">Our Collection</h4>
            <h1 class="display-4 mb-4">Complete Modular Office Solutions</h1>
            <p>Explore our full inventory of customized furniture. Every piece is designed for high durability and ergonomic efficiency, tailored to your specific industrial standards.</p>
        </div>

        @php
            $productCategories = [
                'reception-desks' => [
                    'label' => 'Reception Tables',
                    'items' => [
                        ['title' => 'Designer Reception Table', 'price' => '₹ 5,000/Piece', 'desc' => 'Excellent quality and perfect finishing for high customer credibility.', 'features' => ['Excellent quality', 'Perfect finishing'], 'image' => 'reception-table-2-hq.png'],
                        ['title' => 'Standard Reception Table', 'price' => '₹ 5,000/Piece', 'desc' => 'Stylish look and easy to clean. Fits easily in any workspace.', 'features' => ['Fits easily', 'Stylish look', 'Easy to clean'], 'image' => 'reception-table-1-hq.png'],
                    ]
                ],
                'conference-tables' => [
                    'label' => 'Conference Tables',
                    'items' => [
                        ['title' => 'LSM Conference Table', 'price' => '₹ 27,000/Piece', 'desc' => 'High strength and longer service life.', 'specs' => ['Size' => 'As Per Requirements', 'Type' => 'Customized'], 'image' => 'conference-table-hq.png'],
                        ['title' => 'Designer Conference Table', 'price' => '₹ 24,000/Piece', 'desc' => 'Precisely designed for prestigious corporate clients.', 'image' => 'designer-conference-table-hq.png'],
                        ['title' => 'Wooden Conference Table', 'price' => '₹ 18,000/Piece', 'desc' => 'High quality wooden finish for professional settings.', 'specs' => ['Size' => 'As Per Requirements'], 'image' => 'plain-conference-table-hq.png'],
                        ['title' => 'Office Conference Table', 'price' => '₹ 24,000/Piece', 'desc' => 'Premium quality offered in pace with market advancement.', 'image' => 'office-conference-table-hq.png'],
                        ['title' => 'Glass Conference Table', 'price' => '₹ 15,000/Piece', 'desc' => 'Modern glass-top conference solution.', 'image' => 'dgm-table-hq.png'],
                        ['title' => 'Room Conference Table', 'price' => '₹ 12,000/Piece', 'desc' => 'Optimized for dedicated meeting rooms.', 'image' => 'discursion-table-hq.png'],
                        ['title' => 'Standard Conference Table', 'price' => '₹ 19,500/Piece', 'desc' => 'Sturdy and professional meeting table.', 'image' => 'discursion-table-hq.jpg'],
                    ]
                ],
                'office-partitions' => [
                    'label' => 'Office Partitions',
                    'items' => [
                        ['title' => 'Full Height Office Partition', 'price' => 'Get Latest Price', 'desc' => 'Sophisticated infrastructure at a reasonable price.', 'image' => 'full-height-office-partition-hq.png'],
                        ['title' => 'Portable Office Partitions', 'price' => 'Get Latest Price', 'desc' => 'Flexible design for modern office layouts.', 'image' => 'office-partitions-hq.webp'],
                        ['title' => 'Office Aluminum Partition', 'price' => 'Get Latest Price', 'desc' => 'Durable with a perfect finish.', 'features' => ['Perfect finish', 'Durable'], 'image' => '1200-ht-partition-hq.webp'],
                        ['title' => 'Standard Office Partitions', 'price' => 'Get Latest Price', 'desc' => 'Compliance with industrial quality standards.', 'image' => 'office-partitions-hq.png'],
                        ['title' => 'Glass Office Partition', 'price' => 'Get Latest Price', 'desc' => 'Transparent modular partition solutions.', 'image' => 'glass-office-partition-hq.webp'],
                    ]
                ],
                'office-tables' => [
                    'label' => 'Office Tables',
                    'items' => [
                        ['title' => 'Office Executive Table', 'price' => '₹ 8,400/Piece', 'desc' => 'Developed with expert knowledge to enhance efficiency.', 'specs' => ['Type' => 'Customized'], 'image' => 'office-executive-table-hq.png'],
                        ['title' => 'Designer Office Table', 'price' => '₹ 9,000/Piece', 'desc' => 'Exclusively designed and highly durable.', 'image' => 'designer-office-furniture-hq.png'],
                        ['title' => 'Wooden Office Table', 'price' => '₹ 8,200/Piece', 'desc' => 'Finest quality demanded for long service life.', 'image' => 'cabin-furniture-hq.png'],
                        ['title' => 'Qualitative Office Table', 'price' => '₹ 9,500/Piece', 'desc' => 'Fulfilling the diversified demands of the market.', 'image' => 'office-table-hq.png'],
                    ]
                ],
                'modular-workstations' => [
                    'label' => 'Modular Workstations',
                    'items' => [
                        ['title' => 'Designer Office Workstation', 'price' => 'Get Latest Price', 'desc' => 'Available in various sizes for team productivity.', 'image' => 'desk-base-workstation-2-hq.webp'],
                        ['title' => 'Wooden Office Workstation', 'price' => 'Get Latest Price', 'desc' => 'Elegant collection precisely designed.', 'image' => 'desk-base-workstation-hq.webp'],
                        ['title' => 'Desk Office Workstation', 'price' => 'Get Latest Price', 'desc' => 'Catering to rising demands at reasonable prices.', 'image' => 'fancy-desk-base-workstation-hq.png'],
                        ['title' => 'Office Straight Workstation', 'price' => 'Get Latest Price', 'desc' => 'Modern linear workstation design.', 'image' => 'designer-office-workstation-hq.png'],
                    ]
                ],
                'storage-solutions' => [
                    'label' => 'Storage Solutions',
                    'items' => [
                        ['title' => 'Storage Cabinet', 'price' => '₹ 4,500/Unit', 'desc' => 'Precisely designed through steady R&D.', 'specs' => ['Design' => 'Customized'], 'image' => 'passage-storage-system-3-hq.png'],
                        ['title' => 'Office Storage Cabinet', 'price' => 'Get Latest Price', 'desc' => 'Highly durable and reasonably priced.', 'image' => 'passage-storage-hq.png'],
                        ['title' => 'Wooden Storage Cabinet', 'price' => 'Get Latest Price', 'desc' => 'Excellent quality customized wooden storage.', 'image' => 'passage-storage-system-2-hq.png'],
                    ]
                ],
            ];
        @endphp

        @foreach($productCategories as $key => $category)
            <div id="{{ $key }}" class="category-section mb-5 wow fadeInUp">
                <h2 class="mb-4 border-bottom pb-2 text-dark">{{ $category['label'] }}</h2>
                <div class="row g-4">
                    @foreach($category['items'] as $product)
                        <div class="col-md-6 col-lg-3">
                            <div class="product-item border rounded h-100 d-flex flex-column bg-white shadow-sm">
                                <div class="product-img position-relative overflow-hidden">
                                    {{-- Product Image: Path points to public/img/products/ --}}
                                    <img src="{{ asset('products/' . $product['image']) }}" 
                                         class="img-fluid w-100" 
                                         alt="{{ $product['title'] }}"
                                         onerror="this.src='<?php asset('img/products/placeholder.jpg') ?>'">
                                    
                                    <div class="bg-primary text-white position-absolute top-0 end-0 m-2 py-1 px-2 small rounded">
                                        {{ $product['price'] }}
                                    </div>
                                </div>
                                <div class="product-content p-4 flex-grow-1 text-center">
                                    <h5 class="mb-2">{{ $product['title'] }}</h5>
                                    <p class="small text-muted mb-3">{{ $product['desc'] }}</p>

                                    @if(isset($product['features']))
                                        <div class="text-start mb-3">
                                            @foreach($product['features'] as $feature)
                                                <div class="small text-dark" style="font-size: 0.8rem;">
                                                    <i class="fa fa-check text-primary me-2"></i>{{ $feature }}
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if(isset($product['specs']))
                                        <div class="bg-light p-2 rounded mb-3 text-start" style="font-size: 0.75rem;">
                                            @foreach($product['specs'] as $label => $val)
                                                <div class="text-uppercase text-muted"><strong>{{ $label }}:</strong> {{ $val }}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="product-footer p-4 pt-0">
                                    <a href="#" class="btn btn-primary btn-sm w-100">Get Latest Price</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="mt-5 text-center wow fadeInUp">
            <div class="bg-light p-5 rounded">
                <h3 class="mb-3 text-primary">Custom Orders & Workspace Planning</h3>
                <p class="lead">All products can be customized by <strong>Size</strong> and <strong>Design Type</strong> to suit your specific office infrastructure.</p>
                <a href="{{ url('/contact') }}" class="btn btn-dark px-5 py-3 mt-3">Inquire About Customization</a>
            </div>
        </div>
    </div>
</div>

@endsection