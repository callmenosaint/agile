@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Danh sách sản phẩm</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Thêm sản phẩm
    </a>
</div>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-danger fw-bold">{{ number_format($product->price) }}đ</span>
                    @if($product->sale_price)
                    <span class="text-muted text-decoration-line-through">{{ number_format($product->sale_price) }}đ</span>
                    @endif
                </div>
                <div class="mt-3">
                    <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> Xem chi tiết
                    </a>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Sửa
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                            <i class="fas fa-trash"></i> Xóa
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>
@endsection
