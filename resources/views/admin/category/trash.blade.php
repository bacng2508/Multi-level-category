@extends('admin.layouts.admin_master')

@section('title', 'Danh sách danh mục')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if (session('msg'))
                                <div class="alert alert-success text-center ">{{ session('msg') }}</div>
                            @endif
                            <div class="mb-3 d-flex justify-content-end ">
                                <div class="mr-2">
                                    <a href="{{route('categories.index')}}" class="btn btn-warning">Quay lại danh sách</a>
                                </div>
                            </div>
                            <table id="example2" class="table table-bordered table-hover mb-3">
                                <thead class="text-center">
                                    <tr>
                                        <th width="15%">#</th>
                                        <th width="35%">Tên danh mục</th>
                                        <th width="15%">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td style="vertical-align: middle;">{{ $key + 1 }}</td>
                                            <td style="vertical-align: middle;">{{ $category->name }}</td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <div class="d-flex justify-content-center">
                                                    <form method="POST" action="{{ route('categories.restore', $category->id)}}">
                                                        @csrf
                                                        <button class="btn btn-success mr-1" type="submit">Khôi phục</button>
                                                    </form>
                                                    {{-- <a href="{{ route('categories.restore-category', $category->id)}} " class="btn btn-success mr-1">Khôi phục</a> --}}
                                                    <form method="POST" action="{{route('categories.force-delete', $category)}}">
                                                        @csrf
                                                        @method('POST')
                                                        <button class="btn btn-danger" type="submit">Xóa vĩnh viễn</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

