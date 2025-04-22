@extends('layouts.app')

@section('title', 'Trang chủ - Cosmetic Shop')

@section('content')
<!-- Hero Section -->
<div class="hero-section bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold">Chào mừng đến với Cosmetic Shop</h1>
                <p class="lead">Khám phá thế giới làm đẹp với những sản phẩm chất lượng cao</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Mua sắm ngay</a>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/600x400" alt="Hero Image" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

<!-- Featured Categories -->
<div class="container my-5">
    <h2 class="text-center mb-4">Danh mục nổi bật</h2>
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset($category->image) }}" class="card-img-top" alt="{{ $category->name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <p class="card-text">{{ Str::limit($category->description, 100) }}</p>
                    <a href="{{ route('products.index', ['category' => $category->id]) }}" class="btn btn-outline-primary">Xem sản phẩm</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Featured Products -->
<div class="container my-5">
    <h2 class="text-center mb-4">Sản phẩm nổi bật</h2>
    <div class="row">
        @foreach($featuredProducts as $product)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-danger fw-bold">{{ number_format($product->price) }}đ</span>
                        @if($product->sale_price)
                        <span class="text-muted text-decoration-line-through">{{ number_format($product->sale_price) }}đ</span>
                        @endif
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary btn-sm w-100">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Why Choose Us -->
<div class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Tại sao chọn chúng tôi?</h2>
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <i class="fas fa-truck fa-3x mb-3 text-primary"></i>
                <h4>Giao hàng nhanh chóng</h4>
                <p>Giao hàng toàn quốc trong 2-3 ngày</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <i class="fas fa-shield-alt fa-3x mb-3 text-primary"></i>
                <h4>Sản phẩm chính hãng</h4>
                <p>Cam kết 100% sản phẩm chính hãng</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <i class="fas fa-headset fa-3x mb-3 text-primary"></i>
                <h4>Hỗ trợ 24/7</h4>
                <p>Đội ngũ hỗ trợ nhiệt tình</p>
            </div>
        </div>
    </div>
</div>
@endsection
