<header class="version_1">
	<div class="Sticky inner main_nav shadow sticky_element">
		<div class="container" style="max-width: 90%;">
			<div class="align-items-center d-flex justify-content-between" style="min-height: 83px;">

				{{-- section Hamburger menu--}}
				<nav class="categories d-block menu">
					<ul class="clearfix">
						<li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
										</a>
									</span>
							<div id="menu">
								<ul>
									<li><span><a href="{{route('product_list')}}">SẢN PHẨM</a></span></li>
									<li><span><a href="{{route('product_search', ['sex' => 'Nam'])}}">NAM</a></span>
									</li>
									<li><span><a href="{{route('product_search', ['sex' => 'Nữ'])}}">NỮ</a></span>
									<li><span><a href="{{route('product_search', ['sex' => 'Phi giới tính'])}}">PHI GIỚI TÍNH</a></span>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>


				{{-- section Logo--}}
				<div class="align-items-center d-flex flex-column" style="min-width: 300px;">
					<div id="logo" class="m-auto w-50">
						<a href="{{route('home')}}">
							<img class="swing" alt="logo" src={{asset('assets/img/logo-3.png')}}
									width="435" height="83" style="margin-left: -30px">
						</a>
					</div>

					{{-- section Search bar--}}
					<div class="search-bar" id="search_bar">
						<form action="{{route('product_search')}}" method="GET">
							@csrf
							<div class="custom-search-input">
								<input type="text" name="keyword" placeholder="Tìm kiếm hơn 10.000 sản phẩm"
								       value="@if (isset($keyword)){{$keyword}}@endif">
								<button type="submit"><i class="header-icon_search_custom"></i></button>
							</div>
						</form>
					</div>
				</div>

				<div>
					<ul class="top_tools">

						{{-- section Search icon --}}
						<li>
							<div id="search_icon">
								<a href="#" class="header-icon_search_custom fa-2x" style="padding-top: 3px;">
									<span>Search</span>
								</a>
							</div>
						</li>

						{{-- section Dropdown cart--}}
						@include('layouts._dropdown_cart')

						{{-- section Dropdown Account--}}
						@include('layouts._dropdown_account')

					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<div class="search_mob_wp">
			<form action="{{route('product_search')}}" method="GET">
				<input type="text" class="form-control" placeholder="Tìm kiếm hơn 10.000 sản phẩm" name="keyword">
				<input type="submit" class="btn_1 full-width" value="Search">
			</form>
		</div>
		<!-- /search_mobile -->
	</div>
	<!-- /main_nav -->
</header>
<!-- /header -->
