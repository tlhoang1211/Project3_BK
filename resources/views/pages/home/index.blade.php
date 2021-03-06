@extends('layouts.master')
@section('title')
	Wanderlust
@endsection
@section('specific_css')
	<link href={{ asset('assets/css/scss/home.css') }} rel="stylesheet">
@endsection
@section('specific_js')
	<script src={{asset('assets/js/carousel-home.min.js')}}></script>
@endsection
@section('content')
	<div id="page">
		<!-- /header -->
		<main>
			@include('pages.home._carousel')
			@include('pages.home._banners')

			{{--Product grid--}}
			<div class="container margin_60_35">

				<div class="main_title">
					<h2>Được đánh giá tốt nhất</h2>
					<span>Các sản phẩm</span>
					<p>Các thương hiệu nước hoa được feedback nhiều nhất tại Việt Nam</p>
				</div>

				<x-product.gid :products="$products_male"
				               category="Nam Giới"
				               :categoryLink="route('product_search', ['sex' => 'Nam'])"
				/>

				<x-product.gid :products="$products_female"
				               category="Nữ Giới"
				               :categoryLink="route('product_search', ['sex' => 'Nữ'])"
				/>

				<x-product.gid :products="$products_unisex"
				               category="Phi Giới Tính"
				               :categoryLink="route('product_search', ['sex' => 'Phi giới tính'])"
				/>
			</div>

			@include('pages.home._feature')
			@include('pages.home._brands')
			@include('pages.home._blogs')

		</main>
		<!-- /main -->



@endsection
