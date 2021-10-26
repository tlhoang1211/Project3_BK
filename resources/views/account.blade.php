@extends('layouts.master')
@section('specific_css')
    <link href="{{asset('assets/css/user_page.css')}}" rel="stylesheet">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('specific_js')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd-mm-yyyy'
        });
    </script>
@endsection
@section('content')
    {{--    {{dd(session()->all())}}--}}
    {{--    {{dd($account)}}--}}
    <div class="container margin_30">
        <div class="row">
            <div class="col-md-2">
                <div class="all">
                    <div class="user-page-brief">
                        <div class="user-page-brief__right">
                            <div class="user-page-brief__username">{{$account->fullName}}</div>
                            <div style="margin-top: 3px"><a class="user-page-brief__edit" href="/user/account/profile">
                                    <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg"
                                         style="margin-right: 4px;">
                                        <path
                                            d="M8.54 0L6.987 1.56l3.46 3.48L12 3.48M0 8.52l.073 3.428L3.46 12l6.21-6.18-3.46-3.48"
                                            fill="#9B9B9B" fill-rule="evenodd"></path>
                                    </svg>
                                    Sửa hồ sơ</a></div>
                        </div>
                    </div>
                    <div class="userpage-sidebar-menu">
                        <div class="stardust-dropdown stardust-dropdown--open">
                            <div class="stardust-dropdown__item-header">
                                <a class="userpage-sidebar-menu-entry"
                                   href="/user/account/profile">
                                    <div class="userpage-sidebar-menu-entry__icon"
                                         style="background-color: rgb(255, 193, 7);">
                                        <svg class="wanderlust-svg-icon user-page-sidebar-icon icon-headshot"
                                             enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0">
                                            <g>
                                                <circle cx="7.5" cy="4.5" fill="none" r="3.8"
                                                        stroke-miterlimit="10"></circle>
                                                <path d="m1.5 14.2c0-3.3 2.7-6 6-6s6 2.7 6 6" fill="none"
                                                      stroke-linecap="round" stroke-miterlimit="10"></path>
                                            </g>
                                        </svg>
                                    </div>

                                    <div class="userpage-sidebar-menu-entry__text" style="color: rgb(255, 193, 7)">Tài
                                        khoản của tôi
                                    </div>
                                </a></div>
                        </div>
                        <a class="userpage-sidebar-menu-entry" href="/user/purchase/">
                            <div class="userpage-sidebar-menu-entry__icon" style="background-color: #3a87ad;">
                                <svg class="wanderlust-svg-icon user-page-sidebar-icon "
                                     enable-background="new 0 0 15 15"
                                     viewBox="0 0 15 15" x="0" y="0" style="fill: rgb(255, 255, 255);">
                                    <g>
                                        <rect fill="none" height="10" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-miterlimit="10" width="8" x="4.5" y="1.5"></rect>
                                        <polyline fill="none" points="2.5 1.5 2.5 13.5 12.5 13.5" stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-miterlimit="10" x1="6.5" x2="10.5" y1="4" y2="4"></line>
                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-miterlimit="10" x1="6.5" x2="10.5" y1="6.5" y2="6.5"></line>
                                        <line fill="none" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-miterlimit="10" x1="6.5" x2="10.5" y1="9" y2="9"></line>
                                    </g>
                                </svg>
                            </div>
                            <div class="userpage-sidebar-menu-entry__text">Đơn Mua</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="my-account-section">
                    <div class="my-account-section__header">
                        <div class="my-account-section__header-left">
                            <div class="my-account-section__header-title">Hồ sơ của tôi</div>
                            <div class="my-account-section__header-subtitle">Quản lý thông tin hồ sơ để
                                bảo mật tài khoản
                            </div>
                        </div>
                    </div>
                    <div class="my-account-profile">
                        <form action="{{route('account_update',$account->id)}}" method="POST" style="width: 100%">
                            @csrf
                            @method('PUT')
                            {{--                            <div class="my-account-profile__left">--}}
                            <div class="input-with-label">
                                <div class="input-with-label__wrapper">
                                    <div class="input-with-label__label"><label>Tên</label></div>
                                    <div class="input-with-label__content">
                                        <div class="input-with-validator-wrapper">
                                            <div class="input-with-validator"><input type="text"
                                                                                     placeholder=""
                                                                                     value="{{$account->fullName}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-with-label">
                                <div class="input-with-label__wrapper">
                                    <div class="input-with-label__label"><label>Email</label></div>
                                    <div class="input-with-label__content">
                                        <div class="my-account__inline-container">
                                            <div class="my-account__input-text">{{$account->email}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-with-label">
                                <div class="input-with-label__wrapper">
                                    <div class="input-with-label__label"><label>Số điện thoại</label>
                                    </div>
                                    <div class="input-with-label__content">
                                        <div class="my-account__inline-container">
                                            <div class="my-account__input-text">{{$account->phoneNumber}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-with-label">
                                <div class="input-with-label__wrapper">
                                    <div class="input-with-label__label"><label>Giới tính</label></div>
                                    <div class="input-with-label__content">
                                        <div class="my-account-profile__gender">
                                            <div class="stardust-radio-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="inlineRadioOptions" id="inlineRadio1"
                                                           value="option1"
                                                           @if ($account->sex == "Male")
                                                           checked
                                                        @endif>
                                                    <label class="form-check-label" for="inlineRadio1">Nam</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                           name="inlineRadioOptions" id="inlineRadio2"
                                                           value="option2"
                                                           @if ($account->sex == "Female")
                                                           checked
                                                        @endif>
                                                    <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="input-with-label">
                                <div class="input-with-label__wrapper birthday-choose">
                                    <div class="input-with-label__label"><label>Ngày sinh</label></div>
                                    <div class="input-with-label__content">
                                        <input id="datepicker" width="90%"
                                               value="{{date("d-m-Y", strtotime($account->birthDate))}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="my-account-page__submit">
                                <button type="submit" class="btn btn-solid-primary btn--m btn--inline"
                                        aria-disabled="false">Lưu
                                </button>
                            </div>
                            {{--                            </div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
