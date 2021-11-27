@props(['eloquentProduct', 'eloquentProductBrand'])

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Liên quan</h2>
        <span>Sản phẩm</span>
        <br>
        <p>Các sản phẩm tương tự</p>
    </div>
    <div class="owl-carousel owl-theme products_carousel">
        @foreach($eloquentProduct as $elproduct)
            <div class="item">
                <div class="grid_item">
                    <figure>
                        <a href="{{route('product_detail',$elproduct->slug)}}">
                            <img class="owl-lazy"
                                 src="{{$elproduct->firstThumbnail}}"
                                 data-src="{{$elproduct->firstThumbnail}}" alt="" height="290px">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                class="icon-star voted"></i><i class="icon-star voted"></i><i
                                class="icon-star"></i>
                    </div>
                    <a href="{{route('product_detail',$elproduct->slug)}}">
                        <h3>{{$elproduct->name}}</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">{{$elproduct->formatPrice}}</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
                               title="Thêm vào danh sách yêu thích"><i
                                        class="ti-heart"></i><span>Thêm vào danh sách yêu thích</span></a>
                        </li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
                               title="So sánh"><i
                                        class="ti-control-shuffle"></i><span>So sánh</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
                               title="Thêm vào giỏ"><i
                                        class="ti-shopping-cart"></i><span>Thêm vào giỏ hàng</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
    @endforeach
    <!-- /item -->
    </div>
    <!-- /products_carousel -->
    <br>
    <br>
    <div class="main_title">
        <p>Các sản phẩm cùng thương hiệu</p>
    </div>
    {{--                {{dd($eloquentProductBrand)}}--}}
    <div class="owl-carousel owl-theme products_carousel">
        @foreach($eloquentProductBrand as $elproduct)
            <div class="item">
                <div class="grid_item">
                    <figure>
                        <a href="{{route('product_detail',$elproduct->slug)}}">
                            <img class="owl-lazy"
                                 src="{{$elproduct->firstThumbnail}}"
                                 data-src="{{$elproduct->firstThumbnail}}" alt="" height="290px">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                class="icon-star voted"></i><i class="icon-star voted"></i><i
                                class="icon-star"></i>
                    </div>
                    <a href="{{route('product_detail',$elproduct->slug)}}">
                        <h3>{{$elproduct->name}}</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">{{$elproduct->formatPrice}}</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
                               title="Thêm vào danh sách yêu thích"><i
                                        class="ti-heart"></i><span>Thêm vào danh sách yêu thích</span></a>
                        </li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
                               title="So sánh"><i
                                        class="ti-control-shuffle"></i><span>So sánh</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left"
                               title="Thêm vào giỏ"><i
                                        class="ti-shopping-cart"></i><span>Thêm vào giỏ hàng</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
        @endforeach
    </div>
    <!-- /products_carousel -->
</div>
