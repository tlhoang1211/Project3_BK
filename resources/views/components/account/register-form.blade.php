@props(['cities'])

<div class="box_account">
    <h3 class="new_client">Đăng ký</h3> <small class="float-right pt-2">* Phần bắt
                                                                        buộc</small>
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="form_container">
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email_2"
                       placeholder="Email *">
                @if ($errors->has('email'))
                    <label class="alert-warning">{{$errors->first('password')}}</label>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password_in_2"
                       value="" placeholder="Mật khẩu *">
                @if ($errors->has('password'))
                    <label class="alert-warning">{{$errors->first('password')}}</label>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation"
                       value="" placeholder="Nhập lại mật khẩu *">
                @error('password_confirmation')
                <label class="alert-warning">{{ $message }}</label>
                @enderror
            </div>
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
                            @if ($errors->has('firstName'))
                                <label class="alert-warning">{{$errors->first('firstName')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-6 pl-1">
                        <div class="form-group">
                            <input type="text" class="form-control" name="lastName"
                                   placeholder="Họ *">
                            @if ($errors->has('lastName'))
                                <label class="alert-warning">{{$errors->first('lastName')}}</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="address"
                                   placeholder="Địa chỉ cụ thể *">
                            @if ($errors->has('address'))
                                <label class="alert-warning">{{$errors->first('address')}}</label>
                            @endif
                        </div>
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
                            @if ($errors->has('birthDate'))
                                <label class="alert-warning">{{$errors->first('birthDate')}}</label>
                            @endif
                        </div>
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
                            @if ($errors->has('phone'))
                                <label class="alert-warning">{{$errors->first('phone')}}</label>
                            @endif
                        </div>
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
