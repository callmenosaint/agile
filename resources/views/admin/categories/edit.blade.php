@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa danh mục')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Chỉnh sửa danh mục</h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Tên danh mục</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    @if($category->image)
                        <div class="mb-2">
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" style="max-width: 200px;">
                        </div>
                    @endif
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" {{ $category->status ? 'checked' : '' }}>
                        <label class="custom-control-label" for="status">Hiển thị danh mục</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
</div>
@endsection 