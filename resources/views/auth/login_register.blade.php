@extends('layouts.master')
@section('specific_css')
    <link href="{{asset('assets/css/auth.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/user_page.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom-hung.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap-social.css')}}" rel="stylesheet">
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
            </div>
            <!-- /page_header -->
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <x-account.login-form/>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <x-account.register-form :cities="$cities"/>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!--/main-->

@endsection
