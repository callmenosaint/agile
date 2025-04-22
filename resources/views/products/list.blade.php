@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Danh mục</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action {{ !request('category') ? 'active' : '' }}">
                        Tất cả sản phẩm
                    </a>
                    @foreach($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category->id]) }}"
                       class="list-group-item list-group-item-action {{ request('category') == $category->id ? 'active' : '' }}">
                        {{ $category->name }}
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Lọc theo giá</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.index') }}" method="GET">
                        <div class="mb-3">
                            <label for="min_price" class="form-label">Giá tối thiểu</label>
                            <input type="number" class="form-control" id="min_price" name="min_price" value="{{ request('min_price') }}">
                        </div>
                        <div class="mb-3">
                            <label for="max_price" class="form-label">Giá tối đa</label>
                            <input type="number" class="form-control" id="max_price" name="max_price" value="{{ request('max_price') }}">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Lọc</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Product List -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Sản phẩm</h2>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown">
                        Sắp xếp theo
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('products.index', array_merge(request()->query(), ['sort' => 'price_asc'])) }}">Giá tăng dần</a></li>
                        <li><a class="dropdown-item" href="{{ route('products.index', array_merge(request()->query(), ['sort' => 'price_desc'])) }}">Giá giảm dần</a></li>
                        <li><a class="dropdown-item" href="{{ route('products.index', array_merge(request()->query(), ['sort' => 'newest'])) }}">Mới nhất</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                @forelse($products as $product)
                <div class="col-md-4 mb-4">
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
                @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        Không tìm thấy sản phẩm nào.
                    </div>
                </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
