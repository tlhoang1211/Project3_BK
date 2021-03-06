<div class="box_account">
	<h3 class="client">Đăng nhập</h3>
	<form action="{{route('loginP')}}" method="POST">
		@csrf
		<div class="form_container mb-3">

			@if ($errors->has('credentials'))
				<label class="alert-warning">{{$errors->first('credentials')}}</label>
			@endif

			{{-- section Email --}}
			<div class="form-group">
				<input type="email" class="form-control" name="email" id="email"
				       placeholder="Email *" style="margin-top: 32px">
				@if ($errors->has('email'))
					<label class="alert-warning">{{$errors->first('email')}}</label>
				@endif
			</div>

			{{-- section Password --}}
			<div class="form-group">
				<input type="password" class="form-control" name="password" id="password_in"
				       placeholder="Mật khẩu *">
			</div>
			@error('password')
			<label class="alert-warning">{{ $message }}</label>
			@enderror

			{{-- section Remember me & Forgot pass --}}
			<div class="clearfix add_bottom_15 mt-2">
				<div class="checkboxes float-left">
					<label class="container_check">Nhớ tài khoản
						<input type="checkbox" name="remembered" value="checked">
						<span class="checkmark"></span>
					</label>
				</div>
				<div class="float-right"><a id="forgot" href="{{ route('password.request') }}">Quên mật
				                                                                               khẩu?</a></div>
			</div>

			{{-- section Login button --}}
			<div class="text-center">
				<button type="submit"
				        class="btn_1 full-width">Đăng nhập
				</button>
			</div>
		</div>
	</form>
	<h5 class="text-center">OR</h5>

	{{-- section Social login--}}
	<a class="btn btn-block btn-social btn-google" href="{{ route('login.google') }}">
		<i class="fab fa-google"></i>
		Đăng nhập bằng tài khoản Google
	</a>
	<a class="btn btn-block btn-social btn-facebook" href="{{ route('login.facebook') }}">
		<i class="fab fa-facebook"></i>
		Đăng nhập bằng tài khoản Facebook
	</a>

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
