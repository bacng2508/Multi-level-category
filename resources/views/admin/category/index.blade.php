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
                                    <a href="{{ route('categories.trash') }}" class="btn btn-warning">Thùng rác</a>
                                </div>
                                <a href="{{ route('categories.create') }}" class="btn btn-primary ">
                                    <i class="fa-solid fa-plus mr-2"></i>
                                    Thêm danh mục
                                </a>
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
                                                    <a href="{{route('categories.edit', $category)}}" class="btn btn-warning mr-1">Sửa</a>
                                                    <form method="POST"
                                                        action="{{ route('categories.destroy', $category, old('parent_id')) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger deleteItemBtn"
                                                            type="submit">Xóa</button>
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

{{-- @push('jsHandle')
    <script type="text/javascript">
        var deleteItemBtn = document.querySelectorAll('.deleteItemBtn');
        // Using SweetAlert
        deleteItemBtn.forEach((element) => {
            element.addEventListener('click', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: "Bạn có chắc chắn muốn xóa không?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Đồng ý",
                    cancelButtonText: "Hủy bỏ"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        element.parentElement.submit();
                    }
                });
            })
        })
    </script>
@endpush --}}
