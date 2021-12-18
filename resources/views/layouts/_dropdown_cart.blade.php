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

<li>
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
                        <li>
                            <a href="{{route('product_detail',$product->slug)}}">
                                <figure><img
                                            src={{$product->firstThumbnail}} data-src="{{$product->firstThumbnail}}"
                                            alt="" width="50" height="50" class="lazy"></figure>
                                <strong><span>{{$product->name}}</span>{{$product->FormatPrice}}
                                </strong>
                            </a>
                            {{--<a href="0" class="action"><i class="ti-trash"></i></a>--}}
                        </li>
                    @endforeach
                    <a href="{{ route('cart') }}" class="btn_1">
                        Xem giỏ hàng
                    </a>
                </ul>
            </div>
        @endif
    </div>
</li>
