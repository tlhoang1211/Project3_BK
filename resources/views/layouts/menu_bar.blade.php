<header class="version_1">
    <div class="Sticky inner main_nav shadow sticky_element">
        <div class="container" style="max-width: 90%;">
            <div class="align-items-center d-flex justify-content-between" style="min-height: 83px;">

                {{--Hamburger menu--}}
                <nav class="categories d-block menu">
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
                                    </li>
                                    <li><span><a href="{{route('female_product')}}">NỮ</a></span>
                                    <li><span><a href="{{route('unisex_product')}}">PHI GIỚI TÍNH</a></span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>


                {{--Logo--}}
                <div class="align-items-center d-flex flex-column" style="min-width: 300px;">
                    <div id="logo" class="m-auto w-50">
                        <a href="{{route('home')}}">
                            <img class="swing" alt="logo" src={{asset('assets/img/logo-3.png')}}
                                    width="435" height="83" style="margin-left: -30px">
                        </a>
                    </div>

                    {{--Search bar--}}
                    <div class="search-bar" id="search_bar">
                        <form action="{{route('product_search')}}" method="GET">
                            @csrf
                            <div class="custom-search-input">
                                <input type="text" name="keyword" placeholder="Tìm kiếm hơn 10.000 sản phẩm"
                                       value="@if (isset($keyword)){{$keyword}}@endif">
                                <button type="submit"><i class="header-icon_search_custom"></i></button>
                            </div>
                        </form>
                    </div>
                </div>


                @php
                    $product_cart = Session::get('shoppingCart');
                    $filter_cart = null;

                    if($product_cart !== null){
                        // Get 3 latest item added to the cart
                        $filter_cart = array_reverse(array_slice($product_cart, -3, 3, true), true);
                    }
                @endphp

                <div>
                    <ul class="top_tools">

                        {{--Search icon --}}
                        <li>
                            <div id="search_icon">
                                <a href="#" class="header-icon_search_custom fa-2x" style="padding-top: 3px;">
                                    <span>Search</span>
                                </a>
                            </div>
                        </li>

                        {{-- Dropdown cart --}}
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="{{route('cart')}}" class="cart_bt position-relative">
                                    @if ($filter_cart)
                                        <div id="cart_item_count"
                                             class="position-absolute bottom-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ count($product_cart) }}
                                            <span class="visually-hidden">unread messages</span>
                                        </div>
                                    @endif
                                </a>
                                @if ($filter_cart)
                                    <div class="dropdown-menu">
                                        <ul>
                                            @foreach($filter_cart as $product_id => $product_detail)
                                                @php
                                                    $product = \App\Product::find($product_id)
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
                                <a href="{{ route('profile') }}" class="access_link"
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
                                            <li>
                                                <a href="{{route('mypurchase')}}"><i class="ti-package"></i>Đơn hàng của
                                                                                                            tôi</a>
                                            </li>
                                            <li>
                                                <a href="{{route('help')}}"><i class="ti-help-alt"></i>Trợ giúp</a>
                                            </li>
                                            <li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                </form>
                                                <a onclick="document.getElementById('logout-form').submit(); this.preventDefault();"
                                                   class="log-out-btn" href="#">
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
