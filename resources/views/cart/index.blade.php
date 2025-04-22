@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Giỏ hàng của bạn</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($carts->isEmpty())
        <div class="alert alert-info">
            Giỏ hàng của bạn đang trống
        </div>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($cart->product->image) }}" alt="{{ $cart->product->name }}" class="img-thumbnail" style="width: 100px;">
                                    <div class="ms-3">
                                        <h5>{{ $cart->product->name }}</h5>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($cart->product->sale_price)
                                    <del>{{ number_format($cart->product->price) }}đ</del>
                                    <div class="text-danger">{{ number_format($cart->product->sale_price) }}đ</div>
                                @else
                                    {{ number_format($cart->product->price) }}đ
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('cart.update', $cart) }}" method="POST" class="d-flex">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" class="form-control" style="width: 80px;">
                                    <button type="submit" class="btn btn-sm btn-primary ms-2">Cập nhật</button>
                                </form>
                            </td>
                            <td>
                                {{ number_format($cart->product->sale_price ? $cart->product->sale_price * $cart->quantity : $cart->product->price * $cart->quantity) }}đ
                            </td>
                            <td>
                                <form action="{{ route('cart.destroy', $cart) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td colspan="2"><strong>{{ number_format($total) }}đ</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="text-end mt-4">
            <a href="{{ route('checkout') }}" class="btn btn-primary">Thanh toán</a>
        </div>
    @endif
</div>
@endsection