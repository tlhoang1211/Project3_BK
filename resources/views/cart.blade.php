@extends('layouts.master')
@section('specific_css')
    <link href="{{asset('assets/css/account.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/user_page.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
    <script src="{{asset('assets/js/custome_select.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
@endsection
@section('content')
    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>Page active</li>
                    </ul>
                </div>
                <h1>Cart page</h1>
            </div>
            <!-- /page_header -->
            @if (Session::get('shoppingCart') != null)
                <table class="table table-striped cart-list">
                    <thead>
                    <tr>
                        <th>
                            Product
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Price (100ml)
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Subtotal
                        </th>
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $products = Session::get('shoppingCart');
                        $total_price = 0;
                    @endphp
                    @foreach ($products as $product)
                        @php
                            $product_detail = $product['product']->first();
                            $price_basic = $product['product']->first()->price;
                            $product_volume = $product['type'];
                        @endphp
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <img src="{{$product_detail->firstThumbnail150}}"
                                         data-src="{{$product_detail->firstThumbnail150}}" class="lazy" alt="Image">
                                </div>
                            </td>
                            <td>
                                <span class="item_cart">{{$product_detail->name}}</span>
                            </td>
                            <td>
                                <strong>{{$product_detail->formatPrice}}</strong>
                            </td>
                            <td>
                                @foreach($product_volume as $product_v => $product)
                                    <strong>{{$product_v}}</strong><br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($product_volume as $product_v => $product)
                                    <strong>{{$product}}</strong><br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($product_volume as $product_v => $product)
                                    @php $price = $price_basic; @endphp
                                    @if ($product_v == "100ml")
                                        @php    $price = $price * 100 / 100 @endphp
                                    @elseif ($product_v == "90ml")
                                        @php    $price = $price * 90 / 100 @endphp
                                    @elseif ($product_v == "50ml")
                                        @php    $price = $price * 50 / 100 @endphp
                                    @elseif ($product_v == "10ml")
                                        @php    $price = $price * 10 / 100 @endphp
                                    @endif
                                    {{--                            {{dd($price)}}--}}
                                    @php
                                        $subprice = $price * $product;
                                          $total_price += $subprice;
                                    @endphp
                                    {{number_format($subprice, '0', '3', '.') . ' ₫'}}<br>
                                @endforeach
                            </td>
                            <td class="options">
                                <a href="{{route('cart_remove',$product_detail->id)}}"><i class="ti-trash"></i></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>


            {{--            <div class="row add_top_30 flex-sm-row-reverse cart_actions">--}}
            {{--                <div class="col-sm-4 text-right">--}}
            {{--                    <button type="button" class="btn_1 gray">Update Cart</button>--}}
            {{--                </div>--}}
            {{--                <div class="col-sm-8">--}}
            {{--                    <div class="apply-coupon">--}}
            {{--                        <div class="form-group form-inline">--}}
            {{--                            <input type="text" name="coupon-code" value="" placeholder="Promo code"--}}
            {{--                                   class="form-control">--}}
            {{--                            <button type="button" class="btn_1 outline">Apply Coupon</button>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <!-- /cart_actions -->

        </div>
        <!-- /container -->

        <div class="box_cart">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <ul>
                            <li>
                                <span>Shipping :</span> 200.000 đ (Toàn quốc)
                            </li>
                            <li>
                                <span>Total    :</span> {{number_format($total_price, '0', '3', '.') . ' ₫'}}
                            </li>
                        </ul>

                        {{--<a href="cart-2.html" class="btn_1 full-width cart">Xác nhận thanh toán</a>--}}
                        <button type="button" class="btn_1 full-width cart" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            Xác nhận thanh toán
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @else
        Hiện tại bạn không có sản phẩm nào trong giỏ hàng
        @endif
    <!-- /box_cart -->

        {{-- Order comfirmation--}}
    <!-- Button trigger modal -->
        {{--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">--}}
        {{--    Launch demo modal--}}
        {{--</button>--}}


    </main>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #3A87AD; margin-left: 0">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke">Shipment Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Họ và tên:</label>
                            <input type="text" class="form-control" id="recipient-name" value="{{$account->fullName}}">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="recipient-name" value="{{$account->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="recipient-name" value="{{$account->phoneNumber}}">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Address:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Place order</button>
                </div>
            </div>
        </div>
    </div>
    <!--/main-->
@endsection
