@props(['product'])

<div class="grid_item">
    <figure>
        <a href="{{route('product_detail',$product->slug)}}">
            <img class="img-fluid lazy"
                 src="{{$product->firstThumbnail}}" data-src="{{$product->firstThumbnail}}"
                 alt="">
        </a>
    </figure>
    <a href="product-detail-1.html">
        <h3>{{$product->name}}</h3>
    </a>
    <div class="price_box">
        <span class="new_price">{{format_money($product->price)}}</span>
    </div>
</div>
