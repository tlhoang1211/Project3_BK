<div class="col-md-4 summary">
    <div>
        <h5><b class="fs-3">Thanh toán</b></h5>
    </div>
    <hr>
    <div class="row">
        <div class="col fs-6" style="padding-left:0;">Số sản phẩm: {{ count($cart) }}</div>
        <div id="price_no_ship" class="col text-end fs-6">{{format_money($total_price)}}</div>
    </div>
    <form>
        <p class="fs-6">SHIPPING</p> <select disabled>
            <option class="text-muted">Standard-Delivery- 200,000 đ</option>
        </select>
        <p class="fs-6">GIVE CODE</p> <input disabled id="code" placeholder="Enter your code">
    </form>
    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
        <div class="col fs-5 text-uppercase">Tổng thanh toán</div>
        <div
                id="total-price"
                class="col text-end fs-5">{{format_money($total_price + 200000)}}</div>
    </div>
    <a role="button" class="btn_1 full-width text-uppercase"
       {!! auth()->check() ? 'data-bs-toggle="modal"' : '' !!}
       href="{{auth()->check() ? '#exampleModalToggle' : route('login')}}">
        Mua hàng
    </a>
</div>
