<?php
//if (isset($_POST['name']) && isset($_POST['name'])) {
//    $name = $_POST['name'];
//    $email = $_POST['email'];
//    $to = 'tlhoang1211@gmail.com';
//    $subject = "Customer's Feedback";
//    $body = '
//    <html>
//        <body>
//            <h2>Feedback</h2>
//            <hr>
//            <p>Name:<br>.$name.</p>
//            <p>Email:<br>.$email.</p>
//        </body>
//    </html>';
//    //headers
//    $headers = "From: " . $name . " <" . $email . ">\r\n";
//    $headers .= "Reply-To" . $email . "\r\n";
//    $headers .= "MIME-Version: 1.0\r\r";
//    $headers .= "Content-type: text/html; charset-utf-8";
//    //send
//    $send = mail($to, $subject, $body, $headers);
//    if ($send) {
//        echo '<br>';
//        echo 'Cám ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ cố gắng phản hồi lại sớm nhất có thể.';
//    } else {
//        echo 'Lỗi';
//    }
//}
//?>

@extends('layouts.master')
@section('specific_css')
    <link href="{{asset('assets/css/contact.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{asset('assets/js/sticky_sidebar.min.js')}}"></script>
    <script src="{{asset('assets/js/specific_listing.min.js')}}"></script>
@endsection
@section('content')
    <main class="bg_gray">

        <div class="container margin_60">
            <div class="main_title">
                <h2 style="color: #3a87ad;">Liên hệ Wanderlust</h2>
                <p>Nếu bạn cần giúp đỡ hãy liên lạc ngay với chúng tôi.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="ti-support"></i>
                        <h2>Trung tâm hỗ trợ Wanderlust</h2>
                        <a href="#0">+84 123-456-789</a> - <a href="#0">t1908e@fpt.edu.vn</a>
                        <small>T2->T6: 9am-6pm | T7-CN: 9am-2pm</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="ti-map-alt"></i>
                        <h2>Wanderlust Showroom</h2>
                        <div>Số 8 Tôn Thất Thuyết, Hà Nội - Việt Nam</div>
                        <small>T2->T6: 9am-6pm | T7-CN: 9am-2pm</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box_contacts">
                        <i class="ti-package"></i>
                        <h2>Đặt hàng Wanderlust</h2>
                        <a href="#0">+84 123-456-789</a> - <a href="#0">t1908e@fpt.edu.vn</a>
                        <small>T2->T6: 9am-6pm | T7-CN: 9am-2pm</small>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
        <div class="bg_white">
            <div class="container margin_60_35">
                <h4 class="pb-3">Gửi tin nhắn cho chúng tôi</h4>
                <div class="row">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <form method="post" action="{{ url('/contact/send') }}">
                        @csrf
                        <div class="col-lg-4 col-md-6 add_bottom_25">
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Tên *"
                                       style="width: 350px">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="Email *"
                                       style="width: 350px">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" style="height: 150px; width: 350px"
                                          placeholder="Tin nhắn *" name="message"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn_1 full-width" type="submit" name="send" value="Gửi">
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-8 col-md-6 add_bottom_25">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.886480212416!2d105.77955235025571!3d21.02887719308209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b3260b1a8b%3A0x862052392e3f478e!2zOCBUw7RuIFRo4bqldCBUaHV54bq_dCwgTeG7uSDEkMOsbmgsIFThu6sgTGnDqm0sIEjDoCBO4buZaSAxMDAwMCwgVmlldG5hbQ!5e1!3m2!1sen!2s!4v1595375108503!5m2!1sen!2s"
                            width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_white -->
    </main>
    <!--/main-->
@endsection
