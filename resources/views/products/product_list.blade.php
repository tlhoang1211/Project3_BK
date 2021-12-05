@extends('layouts.master')
@section('specific_css')
    <link href="{{asset('assets/css/listing.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
    <script src="{{asset('assets/js/sticky_sidebar.min.js')}}"></script>
    <script src="{{asset('assets/js/specific_listing.min.js')}}"></script>
    <script>
        $('#reset_filter').click(function () {
            $('#filter_form').trigger("reset");
        });
    </script>
@endsection
@section('content')
    <main>
        <div class="container margin_30">
            <div class="row">
                <aside class="col-lg-3" id="sidebar_fixed">
                    <div class="filter_col">
                        <form action="{{route('product_search')}}" id="filter_form">
                            <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-open"></i></a></div>
                            @if (isset($keyword))
                                <input name="keyword" style="display: none" value="{{$keyword}}">
                            @endif
                            <div class="filter_type version_2">
                                <h4><a href="#filter_1" data-toggle="collapse" class="closed">Nước hoa</a></h4>
                                <div class="collapse show" id="filter_1">
                                    <ul>
                                        <li style="display: flex">
                                            <input type="radio" value="Nam" name="sex" id="Male"
                                                   @if ("Nam" == Request::get('sex')) checked @endif>
                                            <label for="Male" class="container_check" style="width: 100%">Nam
                                                <small>{{$male_product_amount}}</small>
                                            </label>
                                        </li>
                                        <li style="display: flex">
                                            <input type="radio" value="Nữ" name="sex" id="Female"
                                                   @if ("Nữ" == Request::get('sex')) checked @endif>
                                            <label for="Female" class="container_check" style="width: 100%">Nữ
                                                <small>{{$female_product_amount}}</small>
                                            </label>
                                        </li>
                                        <li style="display: flex">
                                            <input type="radio" value="Phi giới tính" name="sex" id="Unisex"
                                                   @if ("Unisex" == Request::get('sex')) checked @endif>
                                            <label for="Unisex" class="container_check" style="width: 100%">Phi giới
                                                tính
                                                <small>{{$unisex_product_amount}}</small>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /filter_type -->
                            </div>
                            <!-- /filter_type -->
                            <div class="filter_type version_2">
                                <h4><a href="#filter_2" data-toggle="collapse" class="closed">Xuất xứ</a></h4>

                                <div class="collapse" id="filter_2">
                                    <ul>
                                        @foreach($origins as $origin)
                                            <li style="display: flex">
                                                <input type="radio" name="origin" id="origin{{$origin->id}}"
                                                       value="{{$origin->id}}"
                                                       @if ($origin->id == Request::get('origin')) checked @endif>
                                                <label for="origin{{$origin->id}}" class="container_check"
                                                       style="width: 100%">{{$origin->name}}
                                                    <small>{{count($origin->products)}}</small>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- /filter_type -->

                            <div class="filter_type version_2">
                                <h4><a href="#filter_3" data-toggle="collapse" class="closed">Thương hiệu</a></h4>

                                <div class="collapse" id="filter_3">
                                    <ul>
                                        @foreach($brands as $brand)
                                            {{--                                            {{dd($brand)}}--}}
                                            <li style="display: flex">
                                                <input type="radio" name="brand" id="brand{{$brand->id}}"
                                                       value="{{$brand->id}}"
                                                       @if ($brand->id == Request::get('brand')) checked @endif>
                                                <label for="brand{{$brand->id}}" class="container_check"
                                                       style="width: 100%">{{$brand->brand_name}}
                                                    <small>{{count($brand->products)}}</small>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="buttons">
                                <button href="" type="submit" class="btn_1">Filter</button>
                                <a href="{{route("product_list")}}" class="btn_1 gray" id="reset_filter">Reset</a>
                            </div>
                        </form>
                    </div>
                </aside>
                <!-- /col -->
                <div class="col-lg-9">
                    <div class="top_banner">
                        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                            <div class="container pl-lg-5">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="/">Trang chủ</a></li>
                                        <li><a href="/product_list">Danh sách sản phẩm</a></li>
                                    </ul>
                                </div>
                                <h1>Nước hoa</h1>
                            </div>
                        </div>
                        <img
                            src="https://res.cloudinary.com/vernom/image/upload/c_scale,h_450,w_1200/v1596895362/perfume_project/product_list/top_banner_nqdcfl.jpg"
                            class="img-fluid" alt="">
                    </div>
                    <!-- /top_banner -->
                    <div id="stick_here"></div>
                    <div class="toolbox elemento_stick add_bottom_30">
                    </div>
                    <!-- /toolbox -->
                    <div class="row small-gutters">
                        @foreach($products as $product)
                            <div class="col-6 col-md-4">
                                <x-product.grid-item :product="$product"/>
                            </div>
                    @endforeach
                    <!-- /col -->
                    </div>
                    <!-- /row -->
                    <div class="pagination__wrapper">
                        {{ $products->links() }}
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!-- /main -->

@endsection

