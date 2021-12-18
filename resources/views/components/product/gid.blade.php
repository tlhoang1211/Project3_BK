@props(['products'])

@push('specific_js')
    <script>

        $(".add-to-cart").on("click", function ()
        {
            const id = $(this).data("id");

            $.ajax({
                url: '{{route('add_to_cart')}}',
                type: "POST",
                headers: {"X-CSRF-TOKEN": $("meta[name=\"csrf-token\"]").attr("content")},
                data: {
                    "_token": "{{ csrf_token() }}",
                    "quantity": 1,
                    "volume": "100ml",
                    "id": id
                },
                success: function (data)
                {
                    if (data["success"])
                    {
                        toastr.success(data["success"]);

                        // Update cart item count
                        const count = $("div#cart_item_count");
                        if (count.hasClass("invisible"))
                        {
                            count.removeClass("invisible");
                        }
                        count.text(data["cart_item_count"]);
                    }
                    else if (data["error"])
                    {
                        toastr.error(data["error"]);
                    }
                    else
                    {
                        toastr.error("Lỗi chưa xác định!");
                    }
                },
                error: function (data)
                {
                    toastr.error(data.responseText);
                }
            });
        });
    </script>
@endpush

<div class="row">
    @foreach($products as $product)
        <div class="col-6 col-md-4 col-xl-3">
            <x-product.grid-item :product="$product"/>
        </div>
    @endforeach
    {{ $slot }}
</div>
