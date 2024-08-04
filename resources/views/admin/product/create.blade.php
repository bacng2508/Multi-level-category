@extends('admin.layouts.admin_master')

@section('title', 'Thêm sản phẩm')

@push('styles')
    <style>
        .ck-editor__editable {
            min-height: 200px;
        }
    </style>
@endpush


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <p class="alert alert-danger text-center">Đã có lỗi xảy ra, vui lòng kiểm tra lại dữ liệu
                                    nhập vào</p>
                            @endif

                            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}" placeholder="Nhập tên sản phẩm">
                                    @error('name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="thumbnail">Ảnh đại diện</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                            <label class="custom-file-label" for="thumbnail">Chọn ảnh</label>
                                        </div>
                                    </div>
                                    @error('thumbnail')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <input type="text" class="form-control" name="price" id="price"
                                        value="{{ old('price') }}" placeholder="Nhập giá">
                                    @error('price')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea class="form-control" rows="3" placeholder="Nhập mô tả sản phẩm" id="myEditor" class="myEditor" name="description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Danh mục</label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        {{getCategories($categories, old('parent_id'))}}
                                    </select>
                                    @error('parent_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
@endsection

@push('jsHandle')

@endpush
