@extends('layouts.master')
@section('specific_css')
    <link href="{{asset('assets/css/about.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
    <script src="{{asset('assets/js/carousel-home.js')}}"></script>
    <script>
        $('.carousel').carousel({
            interval: 3000
        });
    </script>
@endsection
@section('content')
    <main class="bg_gray">
        <div class="top_banner general">
            <div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.1)">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="bg-text">
                            <h1 style="font-size: 50px">Wanderlust</h1>
                            <h2>Nơi mùi hương là bạn đồng hành</h2>
                        </div>
                    </div>
                </div>
            </div>
            <img
                src="https://res.cloudinary.com/vernom/image/upload/v1596806625/perfume_project/about/about_bg_image_tswvsy.jpg"
                class="img-fluid-top" alt="">
        </div>
        <!--/top_banner-->

        <div class="container margin_60_35 add_bottom_30">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5">
                    <div class="box_about">
                        <h2>Lịch sử</h2>
                        <p class="lead">Được ra đời vào năm 2014.</p>
                        <p>Wanderlust được định hình từ đầu là một công ty kinh doanh chuyên về nước hoa dựa theo nền
                            tảng Online, mạng xã hội.</p>
                        <img src="{{asset('assets/img/arrow_about.png')}}" alt="" class="arrow_1">
                    </div>
                </div>
                <div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
                    <img src="{{asset('assets/img/about_1.svg')}}" alt="" class="img-fluid" width="350" height="268">
                </div>
            </div>
            <!-- /row -->
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 pr-lg-5 text-center d-none d-lg-block">
                    <img src="{{asset('assets/img/about_2.svg')}}" alt="" class="img-fluid" width="350" height="268">
                </div>
                <div class="col-lg-5">
                    <div class="box_about">
                        <h2>Đường lối phát triển</h2>
                        <p class="lead">Sau nhiều năm phát triển cùng sự tin tưởng, ủng hộ của các khách hàng trong và
                            ngoài nước.</p>
                        <p>Wanderlust chuyển mình với mong muốn trở thành một start-up về nước hoa đầu tiên tại Việt Nam
                            phát triển theo mô hình Cộng đồng - Dịch vụ - Chất lượng, với mục tiêu phát triển một cộng
                            đồng nước hoa lớn mạnh, tạo ra một sân chơi bổ ích, chia sẻ kiến thức cho tất cả những người
                            yêu thích và quan tâm tới nước hoa, qua đó giúp những người yêu thích nước hoa dễ dàng tìm
                            kiếm cho mình những sản phẩm nước hoa phù hợp, wanderlust từng bước xây dựng "diễn đàn
                            chuyên gia nước hoa" với thông điệp với mỗi chúng ta đều có thể trở thành chuyên gia nước
                            hoa cho chính bản thân mình và người thân.</p>
                        <img src="{{asset('assets/img/arrow_about.png')}}" alt="" class="arrow_2">
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div class="row justify-content-center align-items-center ">
                <div class="col-lg-5">
                    <div class="box_about">
                        <h2>Bộ mặt</h2>
                        <p class="lead">Chất lượng, uy tín là yếu tố then chốt để wanderlust có thể duy trì và không
                            ngừng phát triển.</p>
                        <p>Tất các các sản phẩm được cung cấp, bán tại wanderlust đều là sản phẩm chính hãng, chúng tôi
                            cam kết hoàn tiền 200% nếu khách hàng phát hiện hàng giả. Wanderlust coi sự thành công của
                            khách hàng chính là thành công của chính mình, và mong muốn được nhận thêm nhiều góp ý, đóng
                            góp và những lời động viện, tin tưởng của quý khách hàng để ngày càng hoàn thiện hơn nữa
                            trong tương lai. Wanderlust luôn tự hào là thương hiệu nước hoa nhận được nhiều phản hồi tốt
                            nhất Việt Nam.</p>
                    </div>

                </div>
                <div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
                    <img src="{{asset('assets/img/about_3.svg')}}" alt="" class="img-fluid" width="350" height="316">
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

        <div class="bg_white">
            <div class="container margin_60_35">
                <div class="main_title">
                    <h2>Vì sao nên chọn Wanderlust</h2>
                    <p>Thương hiệu nước hoa được feedback nhiều nhất Việt Nam.</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="box_feat">
                            <i class="ti-medall-alt"></i>
                            <h3>1000+ khách hàng</h3>
                            <p>Bạn biết là bạn có thể tin chúng tôi.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="box_feat">
                            <i class="ti-help-alt"></i>
                            <h3>Hỗ trợ 24/24</h3>
                            <p>Chúng tôi sẽ luôn ở đó vì bạn.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="box_feat">
                            <i class="ti-gift"></i>
                            <h3>Khuyến mãi lớn</h3>
                            <p>Các chương trình khuyến mãi đa dạng.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="box_feat">
                            <i class="ti-headphone-alt"></i>
                            <h3>Đường đây trợ giúp trực tuyến</h3>
                            <p>Hãy gọi cho chúng tôi khi bạn cần.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="box_feat">
                            <i class="ti-wallet"></i>
                            <h3>Bảo mật thanh toán</h3>
                            <p>Thanh toán bảo mật tuyệt đối 100%.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="box_feat">
                            <i class="ti-package"></i>
                            <h3>Ship toàn quốc</h3>
                            <p>Miễn phí trả hàng nếu bạn đổi ý.</p>
                        </div>
                    </div>
                </div>
                <!--/row-->
            </div>
        </div>
        <!-- /bg_white -->

        <div class="container margin_60">
            <div class="main_title">
                <h2>Nhân viên của Wanderlust</h2>
                <p>Linh hồn của công ty.</p>
            </div>
            <div class="owl-carousel owl-theme carousel_centered owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <div class="owl-item active center">
                            <div class="item">
                                <a href="#0">
                                    <div class="title">
                                        <h4>Nguyễn Bảo Hưng<em>CEO</em></h4>
                                    </div>
                                    <img
                                        src="https://res.cloudinary.com/vernom/image/upload/v1596818520/perfume_project/about/4_kd1yym.jpg"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item active">
                            <div class="item">
                                <a href="#0">
                                    <div class="title">
                                        <h4>Trần Lê Hoàng<em>Marketing</em></h4>
                                    </div>
                                    <img
                                        src="https://res.cloudinary.com/vernom/image/upload/c_scale,h_360,w_270/v1596821294/perfume_project/about/5_kh3cxm.jpg"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item active">
                            <div class="item">
                                <a href="#0">
                                    <div class="title">
                                        <h4>Nguyễn Thành Dương<em>Business strategist</em></h4>
                                    </div>
                                    <img
                                        src="https://res.cloudinary.com/vernom/image/upload/c_scale,h_360,w_270/v1596818371/perfume_project/about/1_jnqf2p.jpg"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="item">
                                <a href="#0">
                                    <div class="title">
                                        <h4>Tạ Ngọc Linh<em>Customer Service</em></h4>
                                    </div>
                                    <img
                                        src="https://res.cloudinary.com/vernom/image/upload/c_scale,h_360,w_270/v1596818859/perfume_project/about/3_o1m8on.jpg"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item">
                            <div class="item">
                                <a href="#0">
                                    <div class="title">
                                        <h4>Đỗ Duy Khánh<em>Admissions</em></h4>
                                    </div>
                                    <img
                                        src="https://res.cloudinary.com/vernom/image/upload/v1596818463/perfume_project/about/2_tbf7ad.jpg"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /carousel -->
        </div>
        <!-- /container -->
    </main>
    <!--/main-->
@endsection
