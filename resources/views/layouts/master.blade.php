<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title','Wanderlust') </title>

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
          href={{ asset('assets/img/apple-touch-icon-57x57-precomposed.png') }}>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href={{ asset('assets/img/apple-touch-icon-72x72-precomposed.png') }}>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href={{ asset('assets/img/apple-touch-icon-114x114-precomposed.png') }}>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href={{ asset('assets/img/apple-touch-icon-144x144-precomposed.png') }}>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href={{ asset('assets/css/bootstrap.custom.min.css') }} rel="stylesheet">
    {{--	<link href={{ URL::asset('assets/css/bootstrap.custom.min.css') }} rel="stylesheet">--}}
    <link href={{ asset('assets/css/style.css') }} rel="stylesheet">

    <!-- SPECIFIC CSS -->
    @yield('specific_css')

<!-- YOUR CUSTOM CSS -->
    {{--    <link href={{ asset('assets/css/custom.css') }} rel="stylesheet">--}}
    <link href={{ asset('assets/css/custom-hung.css') }} rel="stylesheet">
</head>

<body>

@include('layouts.menu_bar')

<!--content Start-->
@yield('content')

<!--content End-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_1">Về Wanderlust</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        <li><a href="/about_us">Giới thiệu về Wanderlust</a></li>
                        <li><a href="/blog">Diễn đàn chuyên gia nước hoa</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_2">Dịch vụ</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    <ul>
                        <li><a href="/faq">Các câu hỏi thường gặp</a></li>
                        {{-- Frequently Asked Questions - FAQ --}}
                        <li><a href="/ordering_guide">Hướng dẫn đặt hàng</a></li>
                        <li><a href="/mode_of_transportation">Phương thức vận chuyển</a></li>
                        <li><a href="/payment_methods">Phương thức thanh toán</a></li>
                        <li><a href="/policy">Chính sách</a></li>
                        {{--                        <li><a href="">Chính sách giá cả</a></li>--}}
                        {{--                        <li><a href="">Chính sách đổi trả</a></li>--}}
                        {{--                        <li><a href="">Chính sách bảo mật</a></li>--}}
                        <div class="collapse dont-collapse-sm links" id="collapse_2">
                            <ul>
                                <li><a href="/service">Trang dịch vụ</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_3">Liên hệ</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="ti-home"></i>Số 8 Tôn Thất Thuyết<br>Hà Nội - Việt Nam</li>
                        <li><i class="ti-mobile"></i>+84 123-456-789</li>
                        <li><i class="ti-email"></i><a href="#0">t1908e@fpt.edu.vn</a></li>

                        <div class="collapse dont-collapse-sm links" id="collapse_2">
                            <ul>
                                <li><a href="/contact">Trang liên hệ</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_4">Có gì mới</h3>
                <h5 class="keep-contact">Đăng kí để nhận thông tin khuyến mãi mới nhất!!</h5>
                <div class="collapse dont-collapse-sm" id="collapse_4">
                    <div id="newsletter">
                        <div class="form-group">
                            <input type="email" name="email_newsletter" id="email_newsletter"
                                   class="form-control" placeholder="Nhập Email">
                            <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="follow_us">
                        <h5>Theo dõi ủng hộ Wanderlust</h5>
                        <ul>
                            <li><a href="#0"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="assets/img/twitter_icon.svg" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="assets/img/facebook_icon.svg" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="assets/img/instagram_icon.svg" alt="" class="lazy"></a></li>
                            <li><a href="#0"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="assets/img/youtube_icon.svg" alt="" class="lazy"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-6">
                <ul class="footer-selector clearfix">
                    <li>
                        <div class="styled-select lang-selector">
                            <select>
                                <option value="Vietnamese" selected>Vietnamese</option>
                                <option value="French">French</option>
                                <option value="English">English</option>
                                <option value="Russian">Russian</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="styled-select currency-selector">
                            <select>
                                <option value="VND" selected>VND</option>
                                <option value="Euro">Euro</option>
                            </select>
                        </div>
                    </li>
                    <li><img
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                            data-src="assets/img/cards_all.svg" alt="" width="198" height="30" class="lazy">
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="additional_links">
                    <li><a href="#0">Các điều khoản và điều kiện</a></li>
                    <li><a href="#0">Bảo mật</a></li>
                    <li><span>© 2020 Wanderlust</span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->
</div>
<!-- page -->

<div id="toTop"></div><!-- Back to top button -->
<!-- COMMON SCRIPTS -->
<script src={{asset('assets/js/common_scripts.min.js')}}></script>
<script src={{asset('assets/js/main.js')}}></script>

<!-- SPECIFIC SCRIPTS -->
@yield('specific_js')

</body>
