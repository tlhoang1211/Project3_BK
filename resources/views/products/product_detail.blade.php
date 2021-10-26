@extends('layouts.master')
@section('specific_css')
    <link href="{{asset('assets/css/product_page.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
    <script src="{{asset('assets/js/carousel_with_thumbs.js')}}"></script>
    <script src="{{asset('assets/js/read_more_read_less.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".add_to_cart").on('click', function (e) {
                console.log('123');
                var allVals = [];
                $(".checkbox_list_receipt:checked").each(function () {
                    allVals.push($(this).val());
                    console.log(allVals);
                });
                var check = confirm("Thêm sản phẩm vào giỏ hàng?");
                if (check == true) {
                    var id = this.getAttribute('data');
                    var quantity = $('#quantity_1').val();
                    var volume = $('select[name="volume"]').val();
                    console.log(volume)
                    // console.log(join_selected_values);
                    // var xsrfToken = decodeURIComponent(readCookie('XSRF-TOKEN'));
                    $.ajax({
                        url: '{{route('add_to_cart')}}',
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'quantity': quantity,
                            'volume': volume,
                            'id': id,
                        },
                        success: function (data) {
                            if (data['success']) {
                                alert("Thành công.");
                            } else if (data['error']) {
                                console.log(data['error']);
                            } else {
                                alert('Lỗi!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                    $.each(allVals, function (index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            })
        });
    </script>
@endsection
@section('content')
    <div id="page">
        <div class="layer" style="z-index: 4"></div>
        <main>
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
                                        class="icon-star"></i><em>4 reviews</em></span>
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
                                        <div class="custom-select-form">
                                            <select class="wide" name="volume">
                                                <option value="10ml" selected>10ml</option>
                                                <option value="50ml">50ml</option>
                                                <option value="90ml">90ml</option>
                                                <option value="100ml">100ml</option>
                                            </select>
                                        </div>
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
            <!-- /container -->

            <div class="tabs_product">
                <div class="container">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Sử dụng và bảo
                                quản</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab">Vận chuyển và đổi
                                trả</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab-D" href="#pane-D" class="nav-link" data-toggle="tab" role="tab">Đánh giá</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /tabs_product -->
            <div class="tab_content_wrapper">
                <div class="container">
                    <div class="tab-content" role="tablist">
                        <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                            <div class="card-header" role="tab" id="heading-A">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false"
                                       aria-controls="collapse-A">
                                        Mô tả
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-lg-6">
                                            <h3><u>Tổng quan</u></h3>
                                            <div>
                                                <p class="description">
                                                    {!! $product->description !!}
                                                </p>
                                                <a href="javascript:void(0);" class="readmore-btn">Đọc thêm</a>
                                            </div>

                                        </div>
                                        <div class="col-lg-5">
                                            <h3><u>Thông tin chi tiết</u></h3>
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tbody>
                                                    <tr>
                                                        <td><strong>Xuất xứ</strong></td>
                                                        <td>{{$product->origin->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Độ tuổi khuyên dùng</strong></td>
                                                        <td>{{$product->recommended_age}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Năm phát hành</strong></td>
                                                        <td>{{$product->released_year}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Nhà sáng chế</strong></td>
                                                        <td>{{$product->inventor_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Độ lựu hương</strong></td>
                                                        <td>{{$product->incense_level}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Độ toả hương</strong></td>
                                                        <td>{{$product->aroma_level}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Phong cách</strong></td>
                                                        <td>{{$product->style}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Thời điểm khuyên dùng</strong></td>
                                                        <td>{{$product->recommended_time}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /table-responsive -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /TAB A -->
                        <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                            <div class="card-header" role="tab" id="heading-B">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false"
                                       aria-controls="collapse-B">
                                        Sử dụng và bảo quản
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-lg-6">
                                            <h3><u>Cách sử dụng</u></h3>
                                            <ul class="ul_use">
                                                <li>Nước hoa mang lại mùi hương cho cơ thể bạn thông qua việc tiếp
                                                    xúc lên da và phản ứng với hơi ấm trên cơ thể của bạn. Việc được
                                                    tiếp xúc với các bộ phận như cổ tay, khuỷu tay, sau tai, gáy, cổ
                                                    trước là những vị trí được ưu tiên hàng đầu trong việc sử dụng
                                                    nước hoa bởi sự kín đáo và thuận lợi trong việc tỏa mùi hương.
                                                </li>
                                                <li>Sau khi sử dụng, xịt nước hoa lên cơ thể, tránh dùng tay chà xát
                                                    hoặc làm khô da bằng những vật dụng khác, điều này phá vỡ các
                                                    tầng hương trong nước hoa, khiến nó có thể thay đổi mùi hương
                                                    hoặc bay mùi nhanh hơn.
                                                </li>
                                                <li>Để chai nước hoa cách vị trí cần dùng nước hoa trong khoảng
                                                    15-20cm và xịt mạnh, dứt khoát để mật đổ phủ của nước hoa được
                                                    rộng nhất, tăng độ bám tỏa trên da của bạn.
                                                </li>
                                                <li>
                                                    Phần cổ tay được xịt nước hoa thường có nhiều tác động như lúc
                                                    rửa tay, đeo vòng, đồng hồ, do đó để đảm bảo mùi hương được duy
                                                    trì, bạn nên sử dụng nước hoa ở cổ tay ở tần suất nhiều hơn lúc
                                                    cần thiết.
                                                </li>
                                                <li>
                                                    Nước hoa có thể bám tốt hay không tốt tùy thuộc vào thời gian,
                                                    không gian, cơ địa, chế độ sinh hoạt, ăn uống của bạn, việc sử
                                                    dụng một loại nước hoa trong thời gian dài có thể khiến bạn bị
                                                    quen mùi, dẫn đến hiện tượng không nhận biết được mùi hương.
                                                    Mang theo nước hoa bên mình hoặc trang bị những mẫu mini tiện
                                                    dụng để giúp bản thân luôn tự tin mọi lúc mọi nơi.
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-5">
                                            <h3><u>Bảo quản nước hoa</u></h3>
                                            <ul class="preservation">
                                                <li>Nước hoa phổ thông (Designer) thường không có hạn sử dụng, ở một
                                                    số Quốc gia, việc ghi chú hạn sử dụng là điều bắt buộc để hàng
                                                    hóa được bán ra trên thị trường. Hạn sử dụng ở một số dòng nước
                                                    hoa được chú thích từ 24 đến 36 tháng, và tính từ ngày bạn mở
                                                    sản phẩm và sử dụng lần đầu tiên.
                                                </li>
                                                <li>Nước hoa là tổng hợp của nhiều thành phần hương liệu tự nhiên và
                                                    tổng hợp, nên bảo quản nước hoa ở những nơi khô thoáng, mát mẻ,
                                                    tránh nắng, nóng hoặc quá lạnh, lưu ý không để nước hoa trong
                                                    cốp xe, những nơi có nhiệt độ nóng lạnh thất thường...
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /TAB B -->
                        <div id="pane-C" class="card tab-pane fade " role="tabpanel" aria-labelledby="tab-C">
                            <div class="card-header" role="tab" id="heading-C">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false"
                                       aria-controls="collapse-C">
                                        Vận chuyển và đổi trả
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-lg-6">
                                            <h3><u>Vận chuyển</u></h3>
                                            <p class="shipping_exchange">
                                                <b>Hà Nội</b><br>
                                                Các đơn hàng tại thành phố Hà Nội có thể chọn phương thức thanh
                                                toán COD hoặc chuyển khoản, wanderlust cam kết các quận trung tâm
                                                quý khách sẽ nhận được hàng chậm nhất trong 3 giờ kể từ khi chốt đơn
                                                đối với những đơn hàng trong ngày từ khung giờ 9.00 am đến 15.00 pm.
                                                Nếu bạn muốn ship hẹn giờ, liên hệ với tổng đài CSKH +84 123-456-789
                                                hoặc
                                                fangape Facebook, Instagram của chúng tôi để được hỗ trợ.<br><br>

                                                <b>Các Tỉnh Khác</b><br>
                                                wanderlust thực hiện lên đơn hàng và thanh toán với cách thức chuyển
                                                khoản trước. Sau khi chúng tôi xác nhận được sao kê số tiền, đơn
                                                hàng của bạn sẽ được đóng gói và vận chuyển đến bạn trong vòng 2-4
                                                ngày (không tính cuối tuần và ngày lễ)<br><br>

                                                <b>Cách Thức Đóng Hàng</b><br>
                                                Với các đơn hàng ship Tỉnh, các sản phẩm của bạn sẽ được đóng gói
                                                cẩn thận và kỹ lưỡng, bao gồm nhiều lớp chống sốc, đóng hộp carton
                                                và dán keo dính cẩn thận kèm hóa đơn, đảm bảo các sản phẩm được đến
                                                tay khách hàng của chúng tôi một cách tốt nhất.<br><br>

                                                <b>Hỗ trợ từ wanderlust</b><br>
                                                Trong trường hợp các bạn mua tại thành phố Hà Nội cần hỗ trợ
                                                đóng hàng, hãy liên hệ hotline +84123-456-789 hoặc fangape Facebook,
                                                Instagram của chúng tôi để được hỗ trợ.
                                                <br><br>
                                            </p>
                                        </div>
                                        <div class="col-lg-5">
                                            <h3><u>Đổi trả hàng hoá</u></h3>
                                            <p class="exchange">
                                                Hàng hóa wanderlust bán ra đảm bảo là hàng chính hãng 100%, chúng tôi
                                                cam
                                                kết không bán hàng giả, hàng nhái, hàng không đảm bảo chất
                                                lượng.<br><br>

                                                <b>Chính sách đổi hàng hóa:</b><br>
                                                Các trường hợp được đổi lại hàng hóa:<br>
                                                - Với những sản phẩm lỗi kết cấu sản phẩm do quá trình sản xuất của
                                                hãng,
                                                hay lỗi do vận chuyển dẫn đến việc sản phẩm bị méo mó, thay đổi hình
                                                dạng,
                                                hư hỏng bộ phận vòi xịt, ống xịt, bị nứt, vỡ.<br>
                                                - Đối với những sản phẩm đổi vì lý do cá nhân (tặng, được tặng), sản
                                                phẩm
                                                đổi chỉ được áp dụng trong thời gian 10 ngày kể từ khi sản phẩm được bán
                                                ra.
                                                Sản phẩm đổi phải đảm bảo chưa được sửa dụng, đối với hàng Full seal thì
                                                phải còn nguyên seal, đối với các sản phẩm Giftset, Tester phải đảm bảo
                                                còn
                                                nguyên hộp, sản phẩm chưa bị can thiệp và sử dụng. sản phẩm sẽ được
                                                chúng
                                                tôi kiểm tra lại để đảm bảo sản phẩm là hàng hóa của bên chúng tôi phân
                                                phối.<br><br>

                                                <b>Các trường hợp không được áp dụng đổi lại hàng hóa:</b><br>
                                                - Sản phẩm không phải do wanderlust cung cấp, không chứng minh được
                                                nguồn
                                                gốc của sản phẩm (hóa đơn, thời gian mua hàng)<br>
                                                - Sản phẩm được mua quá 10 ngày kể từ khi sản phẩm được bán ra.<br>
                                                - Sản phẩm đã được sử dụng hoặc bị tác động từ người mua dẫn đến hư hại.<br><br>

                                                <b>Quy trình đổi hàng hóa:</b><br>
                                                - Sau khi bạn đáp ứng được các điều kiện về đổi lại hàng hóa của chúng
                                                tôi,
                                                hãy liên hệ với chúng tôi để được hỗ trợ.<br>
                                                - Sau khi tiếp nhận thông tin và check kiểm các điều kiện, nếu bạn đáp
                                                ứng
                                                đủ điều kiện, chúng tôi sẽ hỗ trợ ngay và nhanh nhất cho bạn.<br><br>

                                                <b>Chính sách trả hàng hóa:</b><br>
                                                Các trường hợp được trả lại hàng hóa:<br>
                                                - Với những sản phẩm lỗi kết cấu sản phẩm do quá trình sản xuất của
                                                hãng,
                                                hay lỗi do vận chuyển dẫn đến việc sản phẩm bị méo mó, thay đổi hình
                                                dạng,
                                                hư hỏng bộ phận vòi xịt, ống xịt, bị nứt, vỡ.<br><br>

                                                <b>Các trường hợp không được chấp nhận trả lại hàng hóa:</b><br>
                                                - Sản phẩm bị tác động từ phía người sử dụng dẫn đến hư hỏng, móp méo,
                                                thay
                                                đổi hình dạng.<br>
                                                - Sản phẩm đã được sử dụng<br>
                                                - Chúng tôi không chấp nhận trả lại hàng, hoàn lại tiền với các trường
                                                hợp
                                                muốn trả lại hàng vì lý do cá nhân như không thích nữa, thay đổi ý định,
                                                hay
                                                các lý do cá nhân khác.<br><br>

                                                <b>Quy trình trả hàng, hoàn tiền:</b><br>
                                                - Sau khi bạn đáp ứng được các điều kiện về trả lại hàng hóa của chúng
                                                tôi,
                                                hãy liên hệ với chúng tôi để được hỗ trợ<br>
                                                - Sau khi tiếp nhận thông tin và check kiểm các điều kiện, nếu bạn đáp
                                                ứng
                                                đủ điều kiện, chúng tôi sẽ hỗ trợ ngay và nhanh nhất cho bạn.
                                            </p>
                                            <a href="javascript:void(0);" class="readmore-btn">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /TAB C -->
                        <div id="pane-D" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-D">
                            <div class="card-header" role="tab" id="heading-D">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-D" aria-expanded="false"
                                       aria-controls="collapse-D">
                                        Đánh giá
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-D" class="collapse" role="tabpanel" aria-labelledby="heading-D">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-lg-6">
                                            <div class="review_content">
                                                <div class="clearfix add_bottom_10">
                                                    <span class="rating"><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i
                                                            class="icon-star"></i><em>5.0/5.0</em></span>
                                                    <em>54 phút trước</em>
                                                </div>
                                                <h4>"Commpletely satisfied"</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="review_content">
                                                <div class="clearfix add_bottom_10">
                                                    <span class="rating"><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star empty"></i><i
                                                            class="icon-star empty"></i><em>4.0/5.0</em></span>
                                                    <em>1 ngày trước</em>
                                                </div>
                                                <h4>"Always the best"</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row justify-content-between">
                                        <div class="col-lg-6">
                                            <div class="review_content">
                                                <div class="clearfix add_bottom_10">
                                                    <span class="rating"><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i
                                                            class="icon-star empty"></i><em>4.5/5.0</em></span>
                                                    <em>3 ngày trước</em>
                                                </div>
                                                <h4>"Outstanding"</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="review_content">
                                                <div class="clearfix add_bottom_10">
                                                    <span class="rating"><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i
                                                            class="icon-star"></i><em>5.0/5.0</em></span>
                                                    <em>4 ngày trước</em>
                                                </div>
                                                <h4>"Excellent"</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                    <p class="text-right"><a href="/leave_review" class="btn_1">Để
                                            lại
                                            đánh giá</a>
                                    </p>
                                </div>
                                <!-- /card-body -->
                            </div>
                        </div>
                        <!-- /tab D -->
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /container -->
            </div>
            <!-- /tab_content_wrapper -->

            <div class="container margin_60_35">
                <div class="main_title">
                    <h2>Liên quan</h2>
                    <span>Sản phẩm</span>
                    <br>
                    <p>Các sản phẩm tương tự</p>
                </div>
                <div class="owl-carousel owl-theme products_carousel">
                    @foreach($eloquent_product_5 as $elproduct)
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
{{--                {{dd($eloquent_product_brand)}}--}}
                <div class="owl-carousel owl-theme products_carousel">
                    @foreach($eloquent_product_brand as $elproduct)
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
            <!-- /container -->

            <div class="feat">
                <div class="container">
                    <ul>
                        <li>
                            <div class="box">
                                <i class="ti-gift"></i>
                                <div class="justify-content-center">
                                    <h3>Miễn phí vận chuyển</h3>
                                    <p>Áp dụng với đơn hàng trên 1 triệu</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <i class="ti-wallet"></i>
                                <div class="justify-content-center">
                                    <h3>Bảo mật thanh toán</h3>
                                    <p>100% bảo mật thông tin</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <i class="ti-headphone-alt"></i>
                                <div class="justify-content-center">
                                    <h3>Hỗ trợ 24/7</h3>
                                    <p>Hỗ trợ trực tuyến</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/feat-->

        </main>
        <!-- /main -->


        <!--/footer-->
    </div>
    <!-- page -->

    <div id="toTop"></div><!-- Back to top button -->

    <div class="top_panel">
        <div class="container header_panel">
            <a href="#0" class="btn_close_top_panel"><i class="ti-close"></i></a>
            <label>1 product added to cart</label>
        </div>
        <!-- /header_panel -->
        <div class="item">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="item_panel">
                            <figure>
                                <img src="{{$product->firstThumbnail}}"
                                     data-src="{{$product->firstThumbnail}}" class="lazy" alt="">
                            </figure>
                            <h4>{{$product->name}}</h4>
                            <div class="price_panel"><span class="new_price">{{$product->formatPrice}}</span>
                                {{--                                <span class="percentage">-20%</span> <span class="old_price">$160.00</span>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 btn_panel">
                        <a href="{{route('cart')}}" class="btn_1 outline">Xem giỏ hàng</a> <a href="#checkout" class="btn_1">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /item -->
        <div class="container related">
            <h4>Who bought this product also bought</h4>
            <div class="row">
                @foreach($eloquent_product as $product_e)
                    <div class="col-md-4">
                        <div class="item_panel">
                            <a href="{{route('product_detail',$product_e->slug)}}">
                                <figure>
                                    <img src="{{$product_e->firstThumbnail}}"
                                         data-src="{{$product_e->firstThumbnail}}" alt="" class="lazy">
                                </figure>
                            </a>
                            <a href="#0">
                                <h5>{{$product_e->name}}</h5>
                            </a>
                            <div class="price_panel"><span class="new_price">{{$product_e->formatPrice}}</span></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /related -->
    </div>
    <!-- /add_cart_panel -->

    <!-- Size modal -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="size-modal" id="size-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                               role="tab" aria-controls="nav-home" aria-selected="true">Tester là:</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                               role="tab" aria-controls="nav-profile" aria-selected="false">Unbox là:</a>
                        </div>
                    </nav>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            <ul>
                                <li>Nước hoa Tester là hàng mới và chưa từng được sử dụng, là nước hoa chính hãng,
                                    authentic 100%, có mùi hương và kiểu dáng giống chai mới full seal.
                                </li>
                                <li>Nước hoa Tester được đựng trong những hộp giấy đơn giản. Chai sản phẩm Tester có thể
                                    có nắp đi kèm hoặc không có nắp. Nước hoa Tester được đựng trong box đơn giản là để
                                    giảm giá thành sản phẩm.
                                </li>
                                <li>Bạn có thể sẽ tìm thấy dòng chữ Tester hay Testeur (tiếng Pháp) in trên vỏ hộp hoặc
                                    thậm chí in trên chai nước hoa. Một số chai còn ghi rõ dòng chữ Not for Sale (không
                                    phải sản phẩm để bán) in trên hộp hoặc chính chai nước hoa đó.
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <ul>
                                <li>Nước hoa Unbox (không hộp) là nước hoa chính hãng, authentic và mới 100%. Đôi khi
                                    hộp bên ngoài bị hỏng hoặc bị rách seal ni-lon do quá trình vận chuyển nên được tháo
                                    bỏ. Có cùng mùi hương và kiểu dáng giống chai mới full seal.
                                </li>
                                <li>Mua nước hoa unbox cũng là một cách để tiết kiệm.</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

