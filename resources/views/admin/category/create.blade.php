@extends('admin.layouts.admin_master')

@section('title', 'Thêm danh mục')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <p class="alert alert-danger text-center">Đã có lỗi xảy ra, vui lòng kiểm tra lại dữ liệu nhập vào</p>
                            @endif

                            <form class="" method="POST" action="{{ route('categories.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Tên danh mục</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}"
                                        placeholder="Nhập tên danh mục">
                                    @error('name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Danh mục cha</label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        <option value="0">Không</option>
                                        {{getCategories($categories, old('parent_id'))}}
                                    </select>
                                    @error('parent_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
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


