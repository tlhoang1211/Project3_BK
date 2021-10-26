@extends('layouts.master')
@section('specific_css')
    <link href="{{asset('assets/css/user_page.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom-hung.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
    {{--	<script>--}}
    {{--    	// Client type Panel--}}
    {{--		$('input[name="client_type"]').on("click", function() {--}}
    {{--		    var inputValue = $(this).attr("value");--}}
    {{--		    var targetBox = $("." + inputValue);--}}
    {{--		    $(".box").not(targetBox).hide();--}}
    {{--		    $(targetBox).show();--}}
    {{--		});--}}
    {{--	</script>--}}
@endsection
@section('content')

    {{--		@if($errors->any())--}}
    {{--			<div class="popup_wrapper" style="z-index: 0;">--}}
    {{--				<div class="popup_content">--}}
    {{--					<span class="popup_close">X</span>--}}
    {{--					<ul>--}}
    {{--				@foreach($errors->all() as $error)--}}
    {{--							<li>{{$error}}</li>--}}
    {{--				@endforeach--}}
    {{--					</ul>--}}
    {{--				</div>--}}
    {{--			</div>--}}
    {{--		@endif--}}
    {{--	<ul>--}}
    {{--		@if($errors->any())--}}
    {{--			@foreach($errors->all() as $error)--}}
    {{--				<li>{{$error}}</li>--}}
    {{--			@endforeach--}}
    {{--		@endif--}}
    {{--	</ul>--}}
{{--    @include('layouts.error_pop_up')--}}
    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li>Đăng nhập/Đăng ký</li>
                    </ul>
                </div>
                <h1>Đăng nhập hoặc đăng ký tài khoản</h1>
            </div>
            <!-- /page_header -->
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="box_account">
                        <h3 class="client">Khách hàng</h3>
                        <form action="{{route('loginP')}}" method="POST">
                            @csrf
                            <div class="form_container">
                                {{--                                <div class="row no-gutters">--}}
                                {{--                                    <div class="col-lg-6 pr-lg-1">--}}
                                {{--                                        <a href="#0" class="social_bt facebook">Đăng nhập bằng Facebook</a>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-lg-6 pl-lg-1">--}}
                                {{--                                        <a href="#0" class="social_bt google">Đăng nhập bằng Google</a>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="divider"><span>Hoặc</span></div>--}}
                                <div class="form-group">
                                    <input type="email" class="form-control" name="emailLogin" id="email"
                                           placeholder="Email *" style="margin-top: 32px">
                                </div>
                                @if ($errors->has('emailLogin'))
                                    <label class="alert-warning">{{$errors->first('emailLogin')}}</label>
                                @endif
                                <div class="form-group">
                                    <input type="password" class="form-control" name="passwordLogin" id="password_in"
                                           value="" placeholder="Mật khẩu *">
                                </div>
                                @if ($errors->has('passwordLogin'))
                                    <label class="alert-warning">{{$errors->first('passwordLogin')}}</label>
                                @endif
                                <div class="clearfix add_bottom_15">
                                    <div class="checkboxes float-left">
                                        <label class="container_check">Nhớ tài khoản
                                            <input type="checkbox" name="term" value="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="float-right"><a id="forgot" href="javascript:void(0);">Quên mật
                                            khẩu?</a></div>
                                </div>
                                <div class="text-center"><input type="submit" value="Đăng nhập"
                                                                class="btn_1 full-width">
                                </div>
                                <div id="forgot_pw">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email_forgot" id="email_forgot"
                                               placeholder="Nhập email">
                                    </div>
                                    <p>Password mới sẽ được gửi lại trong vài phút.</p>
                                    <div class="text-center"><input type="submit" value="Gửi" class="btn_1">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /form_container -->
                    </div>
                    <!-- /box_account -->
                    <div class="row" style="padding-top: 60px">
                        <div class="col-md-6 d-none d-lg-block">
                            <ul class="list_ok">
                                <li>Lưu trữ thông tin dài hạn</li>
                                <li>Bảo vệ thông tin tuyệt đối</li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-none d-lg-block">
                            <ul class="list_ok">
                                <li>Bảo mật thanh toán</li>
                                <li>Hỗ trợ 24/7</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="box_account">
                        <h3 class="new_client">Khách hàng mới</h3> <small class="float-right pt-2">* Phần bắt
                            buộc</small>
                        <form action="{{route('registerP')}}" method="POST">
                            @csrf
                            <div class="form_container">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email_2"
                                           placeholder="Email *">
                                </div>
                                @if ($errors->has('email'))
                                    <label class="alert-warning">{{$errors->first('password')}}</label>
                                @endif
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password_in_2"
                                           value="" placeholder="Mật khẩu *">
                                </div>
                                @if ($errors->has('password'))
                                    <label class="alert-warning">{{$errors->first('password')}}</label>
                                @endif
                                <hr>
                                {{--						<div class="form-group">--}}
                                {{--							<label class="container_radio" style="display: inline-block; margin-right: 15px;">Private--}}
                                {{--								<input type="radio" name="client_type" checked value="private">--}}
                                {{--								<span class="checkmark"></span>--}}
                                {{--							</label>--}}
                                {{--							<label class="container_radio" style="display: inline-block;">Company--}}
                                {{--								<input type="radio" name="client_type" value="company">--}}
                                {{--								<span class="checkmark"></span>--}}
                                {{--							</label>--}}
                                {{--						</div>--}}
                                <div class="private box">
                                    <div class="row no-gutters">
                                        <div class="col-6 pr-1">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="firstName"
                                                       placeholder="Tên *">
                                            </div>
                                            @if ($errors->has('firstName'))
                                                <label class="alert-warning">{{$errors->first('firstName')}}</label>
                                            @endif
                                        </div>
                                        <div class="col-6 pl-1">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="lastName"
                                                       placeholder="Họ *">
                                            </div>
                                            @if ($errors->has('lastName'))
                                                <label class="alert-warning">{{$errors->first('lastName')}}</label>
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="address"
                                                       placeholder="Địa chỉ cụ thể *">
                                            </div>
                                            @if ($errors->has('address'))
                                                <label class="alert-warning">{{$errors->first('address')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-6 pr-1">
                                            <div class="form-group">
                                                <div class="custom-select-form">
                                                    <select class="wide add_bottom_10" name="sex" id="sex">
                                                        <option value="" disabled selected>Giới tính</option>
                                                        <option value="Male">Nam</option>
                                                        <option value="Female">Nữ</option>
                                                        <option value="Other">Khác</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 pl-1">
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="birthDate">
                                            </div>
                                            @if ($errors->has('birthDate'))
                                                    <label class="alert-warning">{{$errors->first('birthDate')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-6 pr-1">
                                            <div class="form-group">
                                                <div class="custom-select-form">
                                                    <select class="wide add_bottom_10" name="city" id="city">
                                                        <option value="" disabled selected>Thành phố *</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('city'))
                                                    <label class="alert-warning">{{$errors->first('city')}}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6 pl-1">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phone"
                                                       placeholder="Điện thoại *">
                                            </div>
                                            @if ($errors->has('phone'))
                                                <label class="alert-warning">{{$errors->first('phone')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /row -->
                                </div>
                                <hr>
                                {{--						<div class="form-group">--}}
                                {{--							<label class="container_check">Accept <a href="#0">Terms and conditions</a>--}}
                                {{--								<input type="checkbox" name="term" required oninvalid="this.setCustomValidity('Please check here !')"--}}
                                {{--    oninput="this.setCustomValidity('')">--}}
                                {{--								<span class="checkmark"></span>--}}
                                {{--							</label>--}}
                                {{--						</div>--}}
                                <div class="text-center"><input type="submit" value="Đăng Ký" class="btn_1 full-width">
                                </div>
                            </div>
                        </form>
                        <!-- /form_container -->
                    </div>
                    <!-- /box_account -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!--/main-->

@endsection
