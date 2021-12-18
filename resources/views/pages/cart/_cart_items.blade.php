<div class="col-md-8 add-to-cart d-flex flex-column">
    <div class="title">
        <div class="row">
            <div class="col">
                <h4><b>Giỏ Hàng</b></h4>
            </div>
            <div class="col fs-6 align-self-center text-end text-muted">
                {{ count($cart) }} sản phẩm
            </div>
        </div>
    </div>

    @foreach ($cart as $product_id => $product_volume)
        @php
            $product_detail = \App\Product::find($product_id)
        @endphp
        <div class="row border-top border-bottom">
            <div class="row main align-items-center">

                {{--Image--}}
                <a href="{{route('product_detail',$product_detail->slug)}}">
                    <div class="col-2"><img class="img-fluid"
                                            src="{{$product_detail->firstThumbnail150}}">
                    </div>
                </a>

                {{--Name--}}

                <a href="{{route('product_detail',$product_detail->slug)}}">
                    <div class="col">
                        <div class="row text-muted fs-6">{{$product_detail->name}}</div>
                    </div>
                </a>

                {{-- Volume select --}}
                <span class="w-auto">
                                            @foreach($product_volume as $volume => $volume_detail)
                        <x-product-detail.select :options="['100ml', '90ml', '50ml', '10ml']"
                                                 selected="{{$volume}}"
                                                 :class='"volume-$product_detail->id $volume"'
                        />
                    @endforeach
                                        </span>

                {{-- Quantity input --}}
                <span class="quantity">
                                            @foreach($product_volume as $volume => $volume_detail)
                        <div class="numbers-row">
                                                    <input type="text"
                                                           value="{{$volume_detail['quantity']}}"
                                                           class='{{"qty2 quantity-$product_detail->id $volume"}}'
                                                           name="{{'quantity-' . $product_detail->id}}"
                                                    >
                                                </div>
                    @endforeach
                                        </span>

                {{--Price--}}
                <div class="align-items-center col d-flex fs-6">
                                                <span class="col">
                                                    @foreach($product_volume as $volume => $volume_detail)
                                                        <span class="{{"item-price $product_detail->id-$volume"}} ">
                                                            {{ $volume_detail['subprice'] }}
                                                        </span>
                                                    @endforeach
                                            </span>
                    <a href="{{route('cart_remove',$product_detail->id)}}" class="close">&#10005;</a>
                </div>
            </div>

        </div>
    @endforeach

    <div class="back-to-shop mt-auto"><a href="{{ route('product_list') }}">&leftarrow;<span
                    class="text-muted">Tiếp tục mua sắm</span></a></div>
</div>
