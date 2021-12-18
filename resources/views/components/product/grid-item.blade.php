@props(['product'])

<div class="grid_item">

    <div class="media">

        {{--Image--}}
        <figure>
            <img class="img-fluid lazy"
                 src="{{$product->firstThumbnail}}" data-src="{{$product->firstThumbnail}}"
                 alt="">
        </figure>

        {{--Rating--}}
        <a href="{{route('product_detail',$product->slug)}}">
            <div class="media__rating">
                <x-product-detail.rating :rate="$product->rate" isOverview="true"/>
            </div>
        </a>

    </div>

    <div class="bottom">

        {{--Name--}}
        <div class="name">
            <a href="{{route('product_detail',$product->slug)}}">
                <h3>{{$product->name}}</h3>
            </a>
        </div>

        {{--Detail--}}
        <div class="detail">
            <p class="volume">100ml</p>
            <div class="scents">
                <p>{!! $product->description !!}</p>
                <i class="fal fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                   title="{{ preg_replace('/<br\s?\/?>/i', "\r\n", $product->description) }}"></i>
            </div>
        </div>

        {{--Price--}}
        <p class="price">{{format_money($product->price)}}</p>

        {{--Add to cart button--}}
        <div class="position-relative add-to-cart" data-id="{{ $product->id }}">
            <span class="position-absolute top-50 start-50 translate-middle fw-bold">ADD</span>
        </div>

    </div>
</div>
