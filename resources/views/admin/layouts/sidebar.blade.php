<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('admin')}}">
                        <i class="fe-airplay"></i>
                        <span class="badge badge-success badge-pill float-right">2</span>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-sidebar"></i>
                        <span>  Quản lý sản phẩm</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin_product_list')}}">Danh sách sản phẩm</a></li>
                        <li><a href="{{route('admin_product_create')}}">Thêm mới sản phẩm</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-sidebar"></i>
                        <span>  Quản lý hãng</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin_brand')}}">Danh sách hãng</a></li>
                        <li><a href="{{route('admin_brand_create')}}">Thêm hãng</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fe-sidebar"></i>
                        <span>  Quản lý nguồn gốc</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin_origin')}}">Danh sách</a></li>
                        <li><a href="{{route('admin_origin_create')}}">Thêm nguồn gốc</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fe-sidebar"></i>
                        <span>  Quản lý tài khoản</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin_account_list')}}">Danh sách</a></li>
                        <li><a href="{{route('admin_account_create')}}">Thêm tài khoản</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fe-sidebar"></i>
                        <span>  Quản lý hóa đơn</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin_receipt')}}">Danh sách</a></li>
                        <li><a href="{{route('admin_receipt_create')}}">Thêm mới hóa đơn</a></li>
                    </ul>
                </li>

{{--                <li>--}}
{{--                    <a href="javascript: void(0);">--}}
{{--                        <i class="fe-sidebar"></i>--}}
{{--                        <span>  Brands Manager</span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li><a href="layouts-horizontal.html">Brand List</a></li>--}}
{{--                        <li><a href="layouts-menucollapsed.html">Menu Collapsed</a></li>--}}
{{--                        <li><a href="layouts-light-sidebar.html">Light Sidebar</a></li>--}}
{{--                        <li><a href="layouts-small-sidebar.html">Small Sidebar</a></li>--}}
{{--                        <li><a href="layouts-boxed.html">Boxed</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->