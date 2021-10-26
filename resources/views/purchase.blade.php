@extends('layouts.master')
@section('specific_css')
    <link href="{{asset('assets/css/account.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/user_page.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
    <script src="{{asset('assets/js/custome_select.js')}}"></script>
@endsection
@section('content')
    <div class="container margin_30">
        <div class="row">
            <div class="col-md-2">
                <div class="all">
                    <div class="user-page-brief">
                        <div class="user-page-brief__right">
                            <div class="user-page-brief__username">{{$account->fullName}}</div>
                            <div><a class="user-page-brief__edit" href="/user/account/profile">
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
                                    <div class="userpage-sidebar-menu-entry__text">Tài khoản của tôi</div>
                                </a></div>
                            <div class="stardust-dropdown__item-body stardust-dropdown__item-body--open">
                                <div class="userpage-sidebar-menu__subsection">
                                    <a class="_17BcjA _1EUbVp"
                                       href="account/profile"><span
                                            class="_2ilxaJ">Hồ sơ</span>
                                    </a>
                                    <a class="_17BcjA"
                                       href="account/payment"><span
                                            class="_2ilxaJ">Ngân hàng</span>
                                    </a>
                                    <a class="_17BcjA"
                                       href="account/address"><span
                                            class="_2ilxaJ">Địa chỉ</span>
                                    </a>
                                    <a class="_17BcjA"
                                       href="/account/password"><span
                                            class="_2ilxaJ">Đổi mật khẩu</span>
                                    </a>
                                </div>
                            </div>
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
                            <div class="userpage-sidebar-menu-entry__text" style="color: #3a87ad">Đơn Mua</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="purchase-list-page__wrapper">
                    <div class="purchase-list-page__tabs-container">
                        <div class="purchase-list-page__tab purchase-list-page__tab--selected"><span
                                class="purchase-list-page__tab-label">Tất cả</span></div>
                        <div class="purchase-list-page__tab"><span
                                class="purchase-list-page__tab-label">Chờ xác nhận</span>
                        </div>
                        <div class="purchase-list-page__tab"><span
                                class="purchase-list-page__tab-label">Chờ lấy hàng</span>
                        </div>
                        <div class="purchase-list-page__tab"><span
                                class="purchase-list-page__tab-label">Đang giao</span>
                        </div>
                        <div class="purchase-list-page__tab"><span class="purchase-list-page__tab-label">Đã giao</span>
                        </div>
                        <div class="purchase-list-page__tab"><span class="purchase-list-page__tab-label">Đã Hủy</span>
                        </div>
                    </div>
                    <div class="purchase-list-page__search-bar">
                        <svg width="19px" height="19px" viewBox="0 0 19 19">
                            <g id="Search-New" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="my-purchase-copy-27" transform="translate(-399.000000, -221.000000)"
                                   stroke-width="2">
                                    <g id="Group-32" transform="translate(400.000000, 222.000000)">
                                        <circle id="Oval-27" cx="7" cy="7" r="7"></circle>
                                        <path d="M12,12 L16.9799555,16.919354" id="Path-184" stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <input autocomplete="off" placeholder="Tìm kiếm ID đơn hàng hoặc Tên Sản phẩm"
                               value="">
                    </div>
                    <div class="purchase-list-page__empty-page-wrapper">
                        <div class="purchase-empty-order__container">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
