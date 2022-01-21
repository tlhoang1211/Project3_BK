{{-- section Retrive cart items--}}
@php
	$shopping_cart = Session::get('shoppingCart');
	$quantity = 0;

	$filter_cart = null;

	if($shopping_cart !== null){
		// Get 5 latest item added to the cart
		$filter_cart = array_reverse(array_slice($shopping_cart, -5, 5, true), true);
		$quantity = array_sum(array_map('count', $shopping_cart));
	}
@endphp

<li id="dropdown-cart">
	<div class="dropdown dropdown-cart">
		<a href="{{route('cart')}}" class="cart_bt position-relative">
			<div id="cart_item_count"
			     class="position-absolute bottom-0 start-100 translate-middle badge rounded-pill bg-danger {{$filter_cart ? '' : 'invisible' }}">
				{{ $filter_cart ? $quantity : '' }}
				<span class="visually-hidden">unread messages</span>
			</div>
		</a>
		@if ($filter_cart)
			<div class="dropdown-menu">
				<ul>
					@foreach($filter_cart as $product_id => $product_detail)
						@php
							$product = \App\Product::find($product_id)
						@endphp

						{{-- section Cart item --}}
						@foreach($product_detail as $volume => $volume_detail)
							<li>
								<a href="{{route('product_detail',$product->slug)}}">

									{{-- section Image --}}
									<figure>
										<img src={{$product->firstThumbnail}} data-src="{{$product->firstThumbnail}}"
										     alt="" width="50" height="50" class="lazy">
									</figure>

									{{-- section Details --}}
									<strong>
										<span>{{  $product->name }}</span>
										<span>{{ $volume }}</span>
										<span>x {{ $volume_detail['quantity'] }}</span>
										{{ $volume_detail['subprice'] }}
									</strong>
								</a>
							</li>

						@endforeach
					@endforeach
					<a href="{{ route('cart') }}" class="btn_1">
						Xem giỏ hàng
					</a>
				</ul>
			</div>
		@endif
	</div>
</li>
