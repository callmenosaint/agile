@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 400px; object-fit: cover;">
                @if($product->gallery)
                <div class="row mt-3">
                    @foreach(json_decode($product->gallery) as $image)
                    <div class="col-3">
                        <img src="{{ asset($image) }}" class="img-thumbnail" alt="Gallery Image" style="height: 100px; object-fit: cover;">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->name }}</h1>
            <div class="mb-3">
                <span class="h4 text-danger fw-bold">{{ number_format($product->price) }}đ</span>
                @if($product->sale_price)
                <span class="text-muted text-decoration-line-through ms-2">{{ number_format($product->sale_price) }}đ</span>
                @endif
            </div>
            <p class="mb-4">{{ $product->description }}</p>

            <div class="mb-4">
                <h5>Danh mục: <a href="{{ route('products.index', ['category' => $product->category_id]) }}" class="text-decoration-none">{{ $product->category->name }}</a></h5>
            </div>

            <div class="mb-4">
                <h5>Số lượng còn lại: {{ $product->stock }}</h5>
            </div>

            @auth
                <form action="{{ route('cart.store', $product) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <label for="quantity" class="form-label">Số lượng:</label>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control" style="width: 100px;">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mt-4">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </form>
            @else
                <div class="alert alert-info mt-4">
                    Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để thêm sản phẩm vào giỏ hàng
                </div>
            @endauth

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Thông tin sản phẩm</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i> Sản phẩm chính hãng</li>
                        <li><i class="fas fa-truck text-primary me-2"></i> Giao hàng toàn quốc</li>
                        <li><i class="fas fa-undo text-info me-2"></i> Đổi trả trong 7 ngày</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        var max = parseInt(quantityInput.getAttribute('max'));
        var current = parseInt(quantityInput.value);
        if (current < max) {
            quantityInput.value = current + 1;
        }
    }

    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        var current = parseInt(quantityInput.value);
        if (current > 1) {
            quantityInput.value = current - 1;
        }
    }
</script>
@endpush
@endsection
