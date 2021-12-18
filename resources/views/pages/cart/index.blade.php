<?php

$cart = Session::get('shoppingCart');
if ($cart)
{
    $total_price = get_cart_total_price();
}
?>

@extends('layouts.master', ['withFooter' => empty($cart)])
@section('specific_css')
    <link href="{{asset('assets/css/scss/cart-page.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
    <script type="module" src="{{asset('assets/js/cart_page.js')}}"></script>

    <script>
        $(document).ready(() =>
        {
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
                        $("#price_no_ship").text(response["price_no_ship"]);

                        // Update subprice of each product
                        for (const product_id in response)
                        {
                            if (product_id !== "total_price")
                            {
                                const volumes = response[product_id];
                                // Update subtotal value of all items
                                for (const volume in volumes)
                                {
                                    $(`span.item-price.${product_id}-${volume}`).text(volumes[volume]["subprice"]);
                                }
                            }
                        }

                    }
                });
            };

            if (cart)
            {
                for (const product_id in cart)
                {
                    const item_detail = cart[product_id];
                    for (const volume in item_detail)
                    {
                        const volume_select = $(`select.volume-${product_id}.${volume}`);
                        const quantity_input = $(`input.quantity-${product_id}.${volume}`);

                        // Update cart item quantity on change
                        quantity_input.change(() =>
                        {
                            let new_quantity = parseInt(quantity_input.val());
                            const update = (new_quantity) =>
                            {
                                if (new_quantity > 0)
                                {
                                    item_detail[volume_select.val()]["quantity"] = new_quantity;
                                }
                                update_cart_in_server();
                            };

                            // Remove the item volume if its quantity = 0
                            if (new_quantity === 0)
                            {
                                // Display confirm modal
                                const modal_element = $("#removeItemConfirm");
                                const confirm_modal = new bootstrap.Modal(modal_element);

                                confirm_modal.toggle();
                                let has_no_volume = false;

                                // Handle remove item which its quantity = 0
                                $("div#removeItemConfirm button#remove").off().click(() =>
                                {
                                    delete item_detail[volume_select.val()];
                                    // Change has_no_volume -> true to delete the item when the modal hides
                                    if (jQuery.isEmptyObject(cart[product_id]))
                                    {
                                        has_no_volume = true;
                                    }
                                    else
                                    {
                                        update_cart_in_server();
                                        location.reload();
                                    }
                                    confirm_modal.hide();
                                });

                                // Add .off() to remove previous event handlers attached (these are added on change event)
                                modal_element.off().on("hide.bs.modal", () =>
                                {
                                    if (has_no_volume)
                                    {
                                        delete cart[product_id];
                                        update_cart_in_server();
                                        // Remove the item row if it has no volume
                                        quantity_input.closest("tr").remove();

                                        // Reload page to stop user click payment button
                                        if (jQuery.isEmptyObject(cart))
                                        {
                                            location.reload();
                                        }
                                    }
                                    else
                                    {
                                        // Revert quantity to 1
                                        new_quantity++;
                                        quantity_input.val(new_quantity);
                                        update(new_quantity);
                                    }
                                });
                            }
                            else
                            {
                                update(new_quantity);
                            }
                        });

                        let old_volume = volume;

                        // Update cart item volume on change
                        volume_select.change(() =>
                        {
                            const new_volume = volume_select.val();
                            if (new_volume !== old_volume)
                            {
                                // Check if user select existed type of a product
                                let error = false;
                                $(`select.volume-${product_id}:not(.${volume})`).each((key, select) =>
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
                                    $(`.volume-${product_id}.${old_volume} span.current`).text(old_volume);
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
                                    $(`span.item-price.${product_id}-${old_volume}`)
                                        .removeClass(`${product_id}-${old_volume}`)
                                        .addClass(`${product_id}-${new_volume}`);

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
    <main>
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>Page active</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    @php
                        $cart = Session::get('shoppingCart')
                    @endphp
                    @if (!empty($cart))

                        {{--Display all cart items--}}
                        @include('pages.cart._cart_items')

                        {{--Payment info--}}
                        @include('pages.cart._payment')

                    @else
                        @php
                            $class = '';
                            if(auth()->check())
                            {
                                $class = auth()->user()->sex === 'Male' ? 'no-product-male' : 'no-product-female';
                            }
                        @endphp
                        <div class="alert alert-secondary no-product {{ $class  }}"
                             role="alert"
                             style="min-height: 320px">
                            <p class="fs-6 p-4">
                                Hiện tại bạn không có sản phẩm nào trong giỏ hàng
                            </p>
                            <a href="{{ route('product_list') }}" class="btn_1 not-this" style="margin-bottom: 20px">
                                Tiếp tục mua sắm chứ nhỉ?
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <!-- Shipment detail modal -->
    @auth
        <x-modal.modal id="exampleModalToggle"
                       title="Shipment Detail"
                       closeText="Hủy"
        >
            <form id="ship_detail" method="POST" action="{{route('new_receipt')}}">
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

    {{--Remove item confirm modal--}}
    <x-modal.modal id="removeItemConfirm" title="Remove item" closeText="No, keep it">
        Do you want to delete this item?

        <x-slot name="acceptButton">
            <button type="button" class="btn btn-primary" id="remove">Remove</button>
        </x-slot>
    </x-modal.modal>

@endsection
