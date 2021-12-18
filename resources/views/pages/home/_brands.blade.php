<div class="bg_gray">
    <div class="container margin_30">
        <div id="brands" class="owl-carousel owl-theme">
            @foreach ($brands as $brand)
                <div class="item">
                    <a href="{{route("product_search", ['brand'=>$brand->id])}}">
                        <img src={{$brand->ImageSize600x600}} data-src="{{$brand->ImageSize600x600}}"
                             alt="" class="owl-lazy">
                    </a>
                </div><!-- /item -->
            @endforeach
        </div><!-- /carousel -->
    </div><!-- /container -->
</div>
<!-- /bg_gray -->
