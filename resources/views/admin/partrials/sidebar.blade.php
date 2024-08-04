<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <span class="brand-text font-weight-bold pl-2">THE COLLECTION</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-1 pb-2 mb-3 d-flex align-items-center ">
            <div class="info pl-3">
                <span class="d-block text-white font-weight-bold"
                    style="font-size: 20px;">Nguyễn Hùng Bắc</span>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                <li class="nav-item sidebar-nav">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa-solid fa-list mr-2"></i>
                        <p>
                            Quản lý danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <p>Danh sách danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link">
                                <p>Thêm danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item sidebar-nav">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa-solid fa-boxes-stacked mr-2"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item sidebar-nav">
                            <a href="{{ route('products.index') }}" class="nav-link">
                                <p>Danh sách sản phẩm</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item sidebar-nav">
                            <a href="{{ route('products.create') }}" class="nav-link">
                                <p>Thêm sản phẩm</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
