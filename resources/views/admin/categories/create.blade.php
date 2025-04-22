<?php
@extends('admin.layouts.app')
@section('title', 'Thêm danh mục')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Thêm danh mục mới</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Tên danh mục</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Thêm danh mục</button>
            </form>
        </div>
    </div>
</div>
@endsection