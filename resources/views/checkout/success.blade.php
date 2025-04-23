@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    <h2 class="mt-3">Đặt hàng thành công!</h2>
                    <p class="text-muted">Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ xử lý đơn hàng của bạn sớm nhất có thể.</p>
                    
                    <div class="mt-4">
                        <h5>Thông tin đơn hàng</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Mã đơn hàng:</th>
                                    <td>#{{ $order->id }}</td>
                                </tr>
                                <tr>
                                    <th>Ngày đặt:</th>
                                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Tổng tiền:</th>
                                    <td>{{ number_format($order->total_amount) }}đ</td>
                                </tr>
                                <tr>
                                    <th>Phương thức thanh toán:</th>
                                    <td>
                                        @if($order->payment_method == 'cod')
                                            Thanh toán khi nhận hàng (COD)
                                        @else
                                            Chuyển khoản ngân hàng
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 