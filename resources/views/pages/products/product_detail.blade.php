@extends('layouts.master')
@section('specific_css')
	<link href="{{asset('assets/css/scss/product_page.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
	<script src="{{asset('assets/js/carousel_with_thumbs.js')}}"></script>
	<script src="{{asset('assets/js/read_more_read_less.js')}}"></script>

	<script>
        $(document).ready(function ()
        {
            // Save current open nav-item to sessionStorage
            $("a.nav-link").click(function ()
            {
                sessionStorage.setItem("current_nav_item_id", $(this).attr("id"));
            });

            // Display previous nav-item
            const id = sessionStorage.getItem("current_nav_item_id");
            if (id)
            {
                $(`a#${id}.nav-link`).trigger("click");
            }
        });
	</script>
@endsection
@section('content')
	<div id="page">
		<main>
			{{-- section Main--}}
			<x-product-detail.product-primary :product="$product"/>

			{{-- section Detail --}}
			<x-product-detail.detail :product="$product" :comments="$comments"/>

			{{-- section Related products--}}
			<x-product-detail.related-products
					:eloquent-product="$eloquent_product_5"
					:eloquent-product-brand="$eloquent_product_brand"
			/>

			{{-- section Commitments--}}
			<div class="feat">
				<div class="container">
					<ul>
						<li>
							<div class="box">
								<i class="ti-gift"></i>
								<div class="justify-content-center">
									<h3>Miễn phí vận chuyển</h3>
									<p>Áp dụng với đơn hàng trên 1 triệu</p>
								</div>
							</div>
						</li>
						<li>
							<div class="box">
								<i class="ti-wallet"></i>
								<div class="justify-content-center">
									<h3>Bảo mật thanh toán</h3>
									<p>100% bảo mật thông tin</p>
								</div>
							</div>
						</li>
						<li>
							<div class="box">
								<i class="ti-headphone-alt"></i>
								<div class="justify-content-center">
									<h3>Hỗ trợ 24/7</h3>
									<p>Hỗ trợ trực tuyến</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>

		</main>
	</div>

	<!-- section Size modal -->
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="size-modal" id="size-modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
							   role="tab" aria-controls="nav-home" aria-selected="true">Tester là:</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
							   role="tab" aria-controls="nav-profile" aria-selected="false">Unbox là:</a>
						</div>
					</nav>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel"
						     aria-labelledby="nav-home-tab">
							<ul>
								<li>Nước hoa Tester là hàng mới và chưa từng được sử dụng, là nước hoa chính hãng,
								    authentic 100%, có mùi hương và kiểu dáng giống chai mới full seal.
								</li>
								<li>Nước hoa Tester được đựng trong những hộp giấy đơn giản. Chai sản phẩm Tester có thể
								    có nắp đi kèm hoặc không có nắp. Nước hoa Tester được đựng trong box đơn giản là để
								    giảm giá thành sản phẩm.
								</li>
								<li>Bạn có thể sẽ tìm thấy dòng chữ Tester hay Testeur (tiếng Pháp) in trên vỏ hộp hoặc
								    thậm chí in trên chai nước hoa. Một số chai còn ghi rõ dòng chữ Not for Sale (không
								    phải sản phẩm để bán) in trên hộp hoặc chính chai nước hoa đó.
								</li>
							</ul>
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							<ul>
								<li>Nước hoa Unbox (không hộp) là nước hoa chính hãng, authentic và mới 100%. Đôi khi
								    hộp bên ngoài bị hỏng hoặc bị rách seal ni-lon do quá trình vận chuyển nên được tháo
								    bỏ. Có cùng mùi hương và kiểu dáng giống chai mới full seal.
								</li>
								<li>Mua nước hoa unbox cũng là một cách để tiết kiệm.</li>
							</ul>
						</div>
						<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
							...
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

