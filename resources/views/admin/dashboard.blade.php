@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Dashboard Admin</h1>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Sản phẩm</h5>
                    <h2 class="card-text">{{ $stats['products'] }}</h2>
                    <a href="{{ route('admin.products.index') }}" class="text-white">Xem chi tiết</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Danh mục</h5>
                    <h2 class="card-text">{{ $stats['categories'] }}</h2>
                    <a href="{{ route('admin.categories.index') }}" class="text-white">Xem chi tiết</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Người dùng</h5>
                    <h2 class="card-text">{{ $stats['users'] }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Đơn hàng</h5>
                    <h2 class="card-text">{{ $stats['orders'] }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quản lý sản phẩm</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Thêm sản phẩm mới</a>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Xem danh sách</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quản lý danh mục</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Thêm danh mục mới</a>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Xem danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection