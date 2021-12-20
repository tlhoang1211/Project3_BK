<!-- section COMMON SCRIPTS -->
<script src={{asset('assets/js/common_scripts.min.js')}}></script>
<script src={{asset('assets/js/main.js')}}></script>
<script src={{asset('assets/js/Bootstrap/bootstrap.bundle.min.js')}}></script>
<script src={{asset('assets/js/toastr.min.js')}}></script>
<script src={{asset('assets/js/SaveScrollPosition.js')}}></script>
<script src={{asset('assets/js/enable_tooltip.js')}}></script>
<script src={{asset('assets/js/config_toastr.js')}}></script>

<!-- section SPECIFIC SCRIPTS -->
@yield('specific_js')

{{-- section Adding item to shopping cart--}}
<script>
    $(document).ready(function ()
    {
        $(".add_to_cart").on("click", function (e)
        {
            const id = $(this).data("id");
            const quantity = $("#quantity_1").val() ? undefined : 1;
            const volume = $("select[name=\"volume\"]").val() ? undefined : "100ml";

            $.ajax({
                url: '{{route('add_to_cart')}}',
                type: "POST",
                headers: {"X-CSRF-TOKEN": $("meta[name=\"csrf-token\"]").attr("content")},
                data: {
                    "_token": "{{ csrf_token() }}",
                    "quantity": quantity,
                    "volume": volume,
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

                        //Update Dropdown cart view
                        $("#dropdown-cart").html(data["updated_dropdown_cart"]);
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

            const allVals = [];
            $(".checkbox_list_receipt:checked").each(function ()
            {
                allVals.push($(this).val());
                console.log(allVals);
            });

            $.each(allVals, function (index, value)
            {
                $("table tr").filter("[data-row-id='" + value + "']").remove();
            });
        });
    });
</script>
