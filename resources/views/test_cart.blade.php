@extends('layouts.master')
@section('specific_css')
    <link href="{{asset('assets/css/account.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/user_page.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
    <script src="{{asset('assets/js/custome_select.js')}}"></script>
    <script type="module" src="{{asset('assets/js/cart_page.js')}}"></script>

    <script>
        $(document).ready(() =>
        {
            // Config toast message
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            // Display remove successfully notification
            @if (session()->has('success'))
            toastr.success("{{ session()->get('success') }}");
            @endif

            {{--Handle updating shopping cart in cart page--}}

            // Pass data from Laravel to JS
            let cart = {!! json_encode(session('shoppingCart'), JSON_HEX_TAG) !!};

            const update_cart_in_server = () =>
            {
                $.ajax({
                    url: '{{route('cart_update')}}',
                    type: "POST",
                    headers: {"X-CSRF-TOKEN": $("meta[name=\"csrf-token\"]").attr("content")},
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "shoppingCart": JSON.stringify(cart)
                    },
                    success: (payload) =>
                    {
                        const response = payload["success"];
                        // Update total price
                        $("#total-price").text(response["total_price"]);

                        // Update subprice of each product
                        for (const product_id in response)
                        {
                            if (product_id !== "total_price")
                            {
                                const volumes = response[product_id];
                                // Update subtotal value of all items
                                for (const volume in volumes)
                                {
                                    $(`div.item-price.${product_id}-${volume}`).text(volumes[volume]["subprice"]);
                                }
                            }
                        }

                    }
                });
            };

            if (cart)
            {
                for (const cart_item in cart)
                {
                    const item_detail = cart[cart_item];
                    for (const volume in item_detail)
                    {
                        const volume_select = $(`select.volume-${cart_item}.${volume}`);
                        const quantity_input = $(`input.quantity-${cart_item}.${volume}`);

                        // Update Quantity on change
                        quantity_input.change(() =>
                        {
                            item_detail[volume_select.val()]["quantity"] = quantity_input.val();

                            update_cart_in_server();
                        });

                        let old_volume = volume;

                        // Update Volume on change
                        volume_select.change(() =>
                        {
                            const new_volume = volume_select.val();
                            if (new_volume !== old_volume)
                            {
                                // Check if user select existed type of a product
                                let error = false;
                                $(`select.volume-${cart_item}:not(.${volume})`).each((key, select) =>
                                {
                                    const other_select_value = select.value;
                                    if (new_volume === other_select_value)
                                    {

                                        toastr.error(`Sản phẩm được chọn loại ${new_volume} đã tồn tại!`);
                                        error = true;
                                    }
                                });

                                if (error)
                                {
                                    // Reset to old volume
                                    volume_select.val(old_volume);
                                    $(`.volume-${cart_item}.${old_volume} span.current`).text(old_volume);
                                    // Reset select item to the previous one
                                    const ul = $("ul.list");
                                    ul.find(`[data-value='${new_volume}']`).removeClass("selected focus");
                                    ul.find(`[data-value='${old_volume}']`).addClass("selected focus");
                                }
                                else
                                {
                                    // Replace old volume with the new one and its quantity
                                    item_detail[new_volume] = {"quantity": quantity_input.val()};
                                    delete item_detail[old_volume];

                                    // Update subtotal display element class to match current volume value
                                    // (required to update subtotal value after changing the volume)
                                    $(`div.item-price.${cart_item}-${old_volume}`)
                                        .removeClass(`${cart_item}-${old_volume}`)
                                        .addClass(`${cart_item}-${new_volume}`);

                                    // Update old volume to be deleted in next volume selection
                                    old_volume = new_volume;


                                    update_cart_in_server();
                                }
                            }
                        });
                    }
                }
            }
        });
    </script>

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
            @php
                $cart = Session::get('shoppingCart')
            @endphp
            @if ($cart !== null)
                <table class="table table-striped cart-list"
                       x-data="{cart: {{json_encode(session('shoppingCart'), JSON_HEX_TAG)}} }"
                       x-init="$watch('cart', value => console.log(value))"
                >
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
                        $total_price = get_cart_total_price();
                    @endphp
                    @foreach ($cart as $product_id => $product_volume)
                        @php
                            $product_detail = \App\Product::find($product_id);
                        @endphp
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <a href="{{route('product_detail',$product_detail->slug)}}">
                                        <img src="{{$product_detail->firstThumbnail150}}"
                                             data-src="{{$product_detail->firstThumbnail150}}" class="lazy" alt="Image">
                                    </a>
                                </div>
                            </td>
                            <td>
                                <span class="item_cart">
                                    <a href="{{route('product_detail',$product_detail->slug)}}">
                                    {{$product_detail->name}}
                                    </a>
                                </span>
                            </td>
                            <td>
                                <strong>{{$product_detail->formatPrice}}</strong>
                            </td>
                            <td>
                                @foreach($product_volume as $volume => $volume_detail)

                                    {{-- Volume --}}
                                    <x-select :options="['100ml', '90ml', '50ml', '10ml']"
                                              selected="{{$volume}}"
                                              :class='"volume-$product_detail->id $volume"'
                                              x-data='{volume: "{{ $volume }}" }'
                                    />

                                @endforeach
                            </td>
                            <td>
                                @foreach($product_volume as $volume => $volume_detail)
                                    <div class="numbers-row" style="height: 32.5px">

                                        {{-- Quantity --}}
                                        {{--<input style="height: 32.5px" type="text" value="{{$volume_detail['quantity']}}"--}}
                                        {{--       class='{{"qty2 quantity-$product_detail->id $volume"}}'--}}
                                        {{--       name="{{'quantity-' . $product_detail->id}}"--}}
                                        {{-->--}}
                                        <x-quantity-input :initVal="$volume_detail['quantity']" name="quantity"/>

                                    </div>
                                @endforeach
                            </td>
                            <td>
                                {{--Price of each cart item--}}
                                @foreach($product_volume as $volume => $volume_detail)
                                    <div class='{{"item-price $product_detail->id-$volume"}}'>
                                        {{ $volume_detail['subprice'] }}
                                    </div>
                                @endforeach
                            </td>

                            {{-- Delete item button --}}
                            <td class="options">
                                <a href="{{route('cart_remove',$product_detail->id)}}"><i class="ti-trash"></i></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
                                <span>Total:</span> <span id="total-price">{{format_money($total_price)}}</span>
                            </li>
                        </ul>

                        {{--<a href="cart-2.html" class="btn_1 full-width cart">Xác nhận thanh toán</a>--}}
                        <a role="button" class="btn_1 full-width cart"
                           {!! auth()->check() ? 'data-bs-toggle="modal"' : '' !!}
                           href="{{auth()->check() ? '#exampleModalToggle' : route('login')}}">
                            Xác nhận thanh toán
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @else
        Hiện tại bạn không có sản phẩm nào trong giỏ hàng
    @endif
    <!-- /box_cart -->

    </main>
    @auth
        <!-- Shipment detail modal -->
        <x-modal.modal id="exampleModalToggle"
                       title="Shipment Detail"
                       closeText="Hủy"
        >
            <form id="ship_detail" method="POST" action="/new/receipt">
                @csrf
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @php
                    $account = auth()->user()
                @endphp

                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Họ và tên:</label>
                    <input name="ship_name" type="text" class="form-control" id="recipient-name"
                           value="{{$account->fullName}}">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Email:</label>
                    <input readonly name="email" type="email" class="form-control" id="recipient-name"
                           value="{{$account->email}}">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Số điện thoại</label>
                    <input name="phone" type="text" class="form-control" id="recipient-name"
                           value="{{$account->phoneNumber}}">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Address:</label>
                    <textarea name="name_address" class="form-control"
                              id="message-text">{{$account->address}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Note:</label>
                    <textarea name="note" class="form-control" id="message-text"></textarea>
                </div>
            </form>

            <x-slot name="acceptButton">
                <button type="submit" form="ship_detail" class="btn btn-primary">Đặt hàng</button>
            </x-slot>
        </x-modal.modal>
    @endauth

@endsection