@props(['product'])

<div class="container margin_30">
    {{--                <div class="countdown_inner">-20% This offer ends in--}}
    {{--                    <div data-countdown="2019/05/15" class="countdown"></div>--}}
    {{--                </div>--}}
    <div class="row">
        <div class="col-md-6">
            <div class="all">
                <div class="slider">
                    <div class="owl-carousel owl-theme main" style="background-color: #f4f4f4;">
                        @foreach($product->ThumbnailArray as $thumbnail)
                            <div class="item-box"><img src="{{$thumbnail}}" alt="Sauvage">
                            </div>
                        @endforeach
                    </div>
                    <div class="left nonl"><i class="ti-angle-left"></i></div>
                    <div class="right"><i class="ti-angle-right"></i></div>
                </div>
                <div class="slider-two">
                    <div class="owl-carousel owl-theme thumbs">
                        @foreach($product->ThumbnailArray as $thumbnail)
                            <div class="item active"><img
                                        src="{{$thumbnail}}" alt="Sauvage">
                            </div>
                        @endforeach
                    </div>
                    <div class="left-t nonl-t"></div>
                    <div class="right-t"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Nước hoa nam</a></li>
                    <li>Sauvage</li>
                </ul>
            </div>
            <!-- /page_header -->
            <div class="prod_info">
                <h1>{{$product->name}}</h1>
                <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star"></i><a href="#pane-D"><em>4 reviews</em></a></span>
                <h6>{{$product->concentration}}
                    <span
                            class="@if($product->sex == 'Nữ')female @elseif($product->sex == 'Phi giới tính')unisex @else sex @endif">{{$product->sex}}</span>
                    <p>Thương hiệu: <a href="#">{{$product->brand->brand_name}}</a></p>
                </h6>
                <div class="productID">Code:</div>
                <div class="prod_options">
                    <div class="row">
                        <label class="col-xl-5 col-lg-5 col-md-6 col-6">
                            <strong>Dung tích</strong>
                            <a href="#"
                               data-toggle="modal"
                               data-target="#size-modal"><i
                                        class="ti-help-alt"></i></a></label>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                            <x-product-detail.select :options="['100ml', '90ml', '50ml', '10ml']"
                                                     selected="100ml"
                                                     id="none"/>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Số lượng</strong></label>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                            <div class="numbers-row">
                                <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="price_main"><span
                                    class="new_price">{{$product->FormatPrice}}</span>
                            {{--                                        <span class= "percentage">-20%</span> <span class="old_price">$160.00</span>--}} {{-- Giã cũ và % giảm giá --}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="btn_add_to_cart">
                            <a href="#" class="add_to_cart product_add btn_1"
                               data-url="{{route('add_to_cart',$product->id)}}" data="{{$product->id}}">
                                Thêm vào giỏ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /prod_info -->
            <div class="product_actions">
                <ul>
                    <li>
                        <a href="#"><i class="ti-heart"></i><span>Thêm vào danh sách yêu thích</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="ti-control-shuffle"></i><span>So sánh sản phẩm</span></a>
                    </li>
                </ul>
            </div>
            <br>
            <!-- /product_actions -->
            <div class="product_policy">
                <div class="product-policy__item">
                    <div class="product-policy__item__img">
                        <img
                                src="https://res.cloudinary.com/vernom/image/upload/v1596377508/perfume_project/icon/shield_check_xlvnlh.png"
                                width="30px" height="30px">
                    </div>
                    <div class="product-policy__item__text">
                        <div><b>Cam kết hàng chính hãng 100%</b></div>
                        <div>Hoàn tiền <b>200%</b> nếu phát hiện hàng giả</div>
                    </div>
                </div>
                <div class="product-policy__item">
                    <div class="product-policy__item__img">
                        <img
                                src="https://res.cloudinary.com/vernom/image/upload/v1596377507/perfume_project/icon/lock_mbzdux.jpg"
                                width="35px" height="30px">
                    </div>
                    <div class="product-policy__item__text">
                        <div><b>Giao dịch An Toàn - Uy Tín</b></div>
                        <div>Hơn 300.000 đơn hàng đã ship từ 2013</div>
                    </div>
                </div>
                <div class="product-policy__item">
                    <div class="product-policy__item__img">
                        <img
                                src="https://res.cloudinary.com/vernom/image/upload/v1596377509/perfume_project/icon/shop_ru9crz.png"
                                width="30px" height="30px">
                    </div>
                    <div class="product-policy__item__text">
                        <div><b>Hơn 100.000 mặt hàng có sẵn</b></div>
                        <div>Cần là có - Mua là ship</div>
                    </div>
                </div>
                <div class="product-policy__item">
                    <div class="product-policy__item__img">
                        <img
                                src="https://res.cloudinary.com/vernom/image/upload/v1596378892/perfume_project/icon/shipping_dx0t3e.png"
                                width="35px" height="30px">
                    </div>
                    <div class="product-policy__item__text">
                        <div><b>Giao hàng toàn quốc</b></div>
                        <div>Giao trong 3h nội thành HN <a href="/pages/phuong-thuc-van-chuyen"><i
                                        style="color: #3a87ad;">(Xem
                                                                chi
                                                                tiết)</i></a></div>
                    </div>
                </div>
                <div class="product-policy__item">
                    <div class="product-policy__item__img">
                        <img
                                src="https://res.cloudinary.com/vernom/image/upload/v1596377507/perfume_project/icon/refund_a5gobr.png"
                                width="30px" height="30px">
                    </div>
                    <div class="product-policy__item__text">
                        <div><b>Đổi trả miễn phí</b></div>
                        <div>Trong vòng <b>10 ngày</b> <a href="/pages/chinh-sach-doi-tra"><i
                                        style="color: #3a87ad;">(Xem chi
                                                                tiết)</i></a></div>
                    </div>
                </div>
                <div class="shopping-hotline">
                    Gọi đặt mua <img
                            src="https://res.cloudinary.com/vernom/image/upload/v1596377811/perfume_project/icon/telephone_yjju1b.jpg"
                            width="30px" height="30px"> <a href="tel:19000129"><b class="phone_number">+84
                                                                                                       123-456-789</b></a>
                    (9:00-21:00)
                </div>
            </div>
            <!-- /product_policy -->
        </div>
    </div>
    <!-- /row -->
</div>
