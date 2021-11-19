<header class="version_1">
    <div class="main_nav inner Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-2 col-lg-2 col-md-2">

                    <nav class="categories">
                        <ul class="clearfix">
                            <li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
										</a>
									</span>
                                <div id="menu">
                                    <ul>
                                        <li><span><a href="/product_list">SẢN PHẨM</a></span></li>
                                        <li><span><a href="{{route('male_product')}}">NAM</a></span>
                                            {{--                                            <ul>--}}
                                            {{--                                                <li><a href="listing-grid-6-sidebar-left.html">A</a></li>--}}
                                            {{--                                                <li><a href="listing-grid-7-sidebar-right.html">B</a></li>--}}
                                            {{--                                                <li><a href="listing-row-1-sidebar-left.html">C</a></li>--}}
                                            {{--                                                <li><a href="listing-row-3-sidebar-left.html">D</a></li>--}}
                                            {{--                                            </ul>--}}
                                        </li>
                                        <li><span><a href="{{route('female_product')}}">NỮ</a></span>
                                        <li><span><a href="{{route('unisex_product')}}">PHI GIỚI TÍNH</a></span>
                                            {{--                                            <ul>--}}
                                            {{--                                                <li><a href="listing-grid-1-full.html">A</a></li>--}}
                                            {{--                                                <li><a href="listing-grid-2-full.html">B</a></li>--}}
                                            {{--                                                <li><a href="listing-grid-3.html">C</a></li>--}}
                                            {{--                                                <li><a href="listing-grid-4-sidebar-left.html">D</a></li>--}}
                                            {{--                                            </ul>--}}
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-2 col-lg-2 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="{{route('home')}}"><img alt="logo" src={{asset('assets/img/logo.png')}} alt=""
                                                         width="200"
                                                         height="60" style="margin-left: -30px"></a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-5 d-none d-md-block">
                    <form action="{{route('product_search')}}" method="GET">
                        @csrf
                        <div class="custom-search-input">
                            <input type="text" name="keyword" placeholder="Tìm kiếm hơn 10.000 sản phẩm"
                                   value="@if (isset($keyword)){{$keyword}}@endif">
                            <button type="submit"><i class="header-icon_search_custom"></i></button>
                        </div>
                    </form>
                </div>

                @php
                    $product_cart = Session::get('shoppingCart');
                    $filter_cart = null;

                    if($product_cart != null){
                        // Get 3 latest item added to the cart
                        $filter_cart = array_reverse(array_slice($product_cart, -3, 3, true), true);
                    }
                @endphp

                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="{{route('cart')}}" class="cart_bt">
                                    @if ($filter_cart != null)
                                        <strong id="cart_quantity">{{count($product_cart)}}</strong>
                                    @endif
                                </a>
                                @if ($filter_cart != null)
                                    <div class="dropdown-menu">
                                        <ul>
                                            @foreach($filter_cart as $product_id => $product_detail)
                                                @php
                                                    $product = \App\Product::find($product_id);
                                                @endphp
                                                <li>
                                                    <a href="{{route('product_detail',$product->slug)}}">
                                                        <figure><img
                                                                src={{$product->firstThumbnail}} data-src="{{$product->firstThumbnail}}"
                                                                alt="" width="50" height="50" class="lazy"></figure>
                                                        <strong><span>{{$product->name}}</span>{{$product->FormatPrice}}
                                                        </strong>
                                                    </a>
                                                    {{--                                                    <a href="0" class="action"><i class="ti-trash"></i></a>--}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <!-- /dropdown-cart-->
                        </li>
                        {{--                        <li>--}}
                        {{--                            <a href="#0" class="wishlist"><span>Wishlist</span></a>--}}
                        {{--                        </li>--}}
                        <li>
                            <div class="dropdown dropdown-access {{auth()->check() ? 'user-page' : ''}}">
                                <a href="#" class="access_link"
                                >
                                    <span>Tài khoản</span>
                                </a>
                                <div class="dropdown-menu">
                                    @auth()
                                        <strong
                                            style="font-size: 20px">{{auth()->user()->fullName}}</strong>
                                        <ul>
                                            <li>
                                                <a href="{{route('profile')}}"><i class="ti-user"></i>Hồ sơ của tôi</a>
                                            </li>
                                            {{--<li>--}}
                                            {{--    <a href="#track-order.html"><i class="ti-truck"></i>Theo dõi đơn--}}
                                            {{--                                                        hàng</a>--}}
                                            {{--</li>--}}
                                            <li>
                                                <a href="{{route('mypurchase')}}"><i class="ti-package"></i>Đơn hàng của
                                                                                                            tôi</a>
                                            </li>
                                            <li>
                                                <a href="{{route('help')}}"><i class="ti-help-alt"></i>Trợ giúp</a>
                                            </li>
                                            <li>
                                                <a class="log-out-btn" href="{{ route('logout') }}"
                                                >
                                                    <i
                                                        class="fa fa-sign-out" aria-hidden="true"
                                                        style="color: #3a87ad">

                                                    </i>
                                                    Đăng xuất
                                                </a>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="{{route('login')}}" class="btn_1">Đăng nhập/Đăng ký</a>
                                    @endauth
                                </div>
                            </div>
                            <!-- /dropdown-access-->
                        </li>
                        {{--                        <li>--}}
                        {{--                            <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="#menu" class="btn_cat_mob">--}}
                        {{--                                <div class="hamburger hamburger--spin" id="hamburger">--}}
                        {{--                                    <div class="hamburger-box">--}}
                        {{--                                        <div class="hamburger-inner"></div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                Nước hoa--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <div class="search_mob_wp">
            <form action="{{route('product_search')}}" method="GET">
                <input type="text" class="form-control" placeholder="Tìm kiếm hơn 10.000 sản phẩm" name="keyword">
                <input type="submit" class="btn_1 full-width" value="Search">
            </form>
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>
<!-- /header -->
