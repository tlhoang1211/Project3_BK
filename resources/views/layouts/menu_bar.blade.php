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
                                        {{--                                        <li><span><a href="/collection">CÁC BỘ SƯU TẬP</a></span>--}}
                                        {{--                                            <ul>--}}
                                        {{--                                                <li><a href="listing-grid-1-full.html">A</a></li>--}}
                                        {{--                                                <li><a href="listing-grid-2-full.html">B</a></li>--}}
                                        {{--                                                <li><a href="listing-grid-3.html">C</a></li>--}}
                                        {{--                                                <li><a href="listing-grid-5-sidebar-right.html">XEM TOÀN BỘ BST</a>--}}
                                        {{--                                                </li>--}}
                                        {{--                                            </ul>--}}
                                        </li>
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
                        <a href="{{route('home')}}"><img src={{asset('assets/img/logo.png')}} alt="" width="200"
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
                    #$product_cart = session()->get('shoppingCart');
                    $products_in_cart  = null;

                    $product_cart = Session::get('shoppingCart');

                    if($product_cart != null && $product_cart > 0){
                        $products_in_cart = array_reverse(array_slice($product_cart, -3));
                    }
                @endphp

                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>

                            <div class="dropdown dropdown-cart">
                                <a href="{{route('cart')}}"
                                   class="cart_bt">@if ($products_in_cart != null)
                                        <strong> {{count($product_cart)}}</strong>@endif</a>
                                @if ($products_in_cart != null)
                                    <div class="dropdown-menu">
                                        <ul>
                                            @foreach($products_in_cart as $product_item)
                                                <li>
                                                    <a href="{{route('product_detail',$product_item['product']->first()->id)}}">
                                                        <figure><img
                                                                src={{$product_item['product']->first()->firstThumbnail}} data-src="{{$product_item['product']->first()->firstThumbnail}}"
                                                                alt="" width="50" height="50" class="lazy"></figure>
                                                        <strong><span>{{$product_item['product']->first()->name}}</span>{{$product_item['product']->first()->FormatPrice}}
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
                            <div class="dropdown dropdown-access">
                                <a href="account.html" class="access_link"><span>Tài khoản</span></a>
                                <div class="dropdown-menu">
                                    @if(Session::has('current_account'))
                                        <strong
                                            style="font-size: 20px">{{Session::get('current_account')->fullName}}</strong>
                                        <ul>
                                            <li>
                                                <a href="#track-order.html"><i class="ti-truck"></i>Theo dõi đơn
                                                    hàng</a>
                                            </li>
                                            <li>
                                                <a href="{{route('mypurchase')}}"><i class="ti-package"></i>Đơn hàng của
                                                    tôi</a>
                                            </li>
                                            <li>
                                                <a href="{{route('profile')}}"><i class="ti-user"></i>Hồ sơ của tôi</a>
                                            </li>
                                            <li>
                                                <a href="{{route('help')}}"><i class="ti-help-alt"></i>Trợ giúp</a>
                                            </li>
                                            <li>
                                                <a class="log-out-btn" href="#"
                                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                        class="fa fa-sign-out" aria-hidden="true"
                                                        style="color: #3a87ad"></i>Đăng xuất </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="{{route('login')}}" class="btn_1">Đăng nhập/Đăng ký</a>
                                    @endif

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
