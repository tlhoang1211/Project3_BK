<li>
    <div class="dropdown dropdown-access {{auth()->check() ? 'user-page' : ''}}">
        <a href="{{ route('profile') }}" class="access_link"
        >
            <span>Tài khoản</span>
        </a>
        <div class="dropdown-menu">
            @auth()
                <strong
                        style="font-size: 20px">{{auth()->user()->fullName}}</strong>
                <ul>
                    <li>
                        <a href="{{route('profile')}}"><i class="ti-user"></i>Hồ sơ của tôi</a>
                    </li>
                    <li>
                        <a href="{{route('mypurchase')}}"><i class="ti-package"></i>Đơn hàng của
                                                                                    tôi</a>
                    </li>
                    <li>
                        <a href="{{route('help')}}"><i class="ti-help-alt"></i>Trợ giúp</a>
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        <a onclick="document.getElementById('logout-form').submit(); this.preventDefault();"
                           class="log-out-btn" href="#">
                            <i
                                    class="fa fa-sign-out" aria-hidden="true"
                                    style="color: #3a87ad">

                            </i>
                            Đăng xuất
                        </a>
                    </li>
                </ul>
            @else
                <a href="{{route('login')}}" class="btn_1">Đăng nhập/Đăng ký</a>
            @endauth
        </div>
    </div>
    <!-- /dropdown-access-->
</li>
