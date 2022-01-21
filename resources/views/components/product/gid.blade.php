@props(['products', 'category' => '', 'categoryLink' => '#'])

<div class="row">

	{{--Category--}}
	@if ($category !== '')
		<div class="row__category">
			<a href="{{ $categoryLink }}">
				<span>Nước hoa</span>
				{{ $category }}
				<i class="far fa-arrow-right"></i>
			</a>
		</div>
	@endif

	{{--Products--}}
	@foreach($products as $product)
		<div class="col-6 col-md-4 col-xl-3">
			<x-product.grid-item :product="$product"/>
		</div>
	@endforeach

	{{ $slot }}
</div>
