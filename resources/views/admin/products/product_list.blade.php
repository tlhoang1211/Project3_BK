@extends('admin.layouts.master')
@section('specific_css')
@endsection
@section('specific_js')
    <script src="{{asset('assets/admin/js/vendor.min.js')}}"></script>

    <!-- third party js -->
    <script src="{{asset('assets/admin/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/libs/datatables/dataTables.responsive.min.js')}}"></script>

    <!-- Tickets js -->
    <script src="{{asset('assets/admin/js/pages/tickets.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/admin/js/app.min.js')}}"></script>

    <script src="{{asset('assets/admin/libs/parsleyjs/parsley.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".parsley-examples").parsley()
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#delete_all").on('click', function (e) {
                console.log('123');
                var allVals = [];
                $(".checkbox_list_product:checked").each(function () {
                    allVals.push($(this).val());
                    console.log(allVals);
                });
                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    var check = confirm("Are you sure you want to delete this row?");
                    if (check == true) {
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: '{{route('admin_product_delete_multi')}}',
                            type: 'PUT',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function () {
                                        $(this).parents("tr").remove();
                                    });
                                    alert("Brands Deleted Success");
                                    window.location = '{{route('admin_product_list')}}';
                                } else if (data['error']) {
                                    console.log(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });
                        $.each(allVals, function (index, value) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            })
        });
    </script>
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Adminox</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Basic Tables</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Basic Tables</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-2">
                                <h4 class="header-title">Brands</h4>
                                <p class="sub-header">
                                    <code>All products</code>
                                </p>
                            </div>
                            <div class="col-9">
                                <div class="col-12">
                                    <form action="{{route('admin_product_list')}}">
                                        <div class="row">
                                            <div class="col-2">
                                                <label>Hãng</label>
                                                <select class="form-control" name="brand">
                                                    <option value="0">All</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <label>Xuất xứ</label>
                                                <select class="form-control" name="origin">
                                                    <option value="0">All</option>
                                                    @foreach($origins as $origin)
                                                        <option value="{{$origin->id}}">{{$origin->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <label>Nhà phát minh</label>
                                                <input type="text" class="form-control" name="inventor"
                                                       value="{{$datas->inventor ?? ''}}">
                                            </div>
                                            <div class="col-4">
                                                <label>Tên sản phẩm</label>
                                                <input type="text" class="form-control" name="product_name"
                                                       value="{{$datas->product_name ?? ''}}">
                                            </div>
                                            <div class="col-2"
                                                 style="justify-content: space-between;flex-direction: column;display: flex;">
                                                <label> </label>
                                                <div>
                                                    <button class="btn btn-primary waves-effect waves-light btn-block" > Lọc
                                                    </button>
                                                    <button type="reset"
                                                            class="btn btn-secondary waves-effect waves-light btn-block">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">

                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                style="width: 24.8px;" aria-label="ID: activate to sort column ascending">
                                Tên sản phẩm
                            </th>
                            <th>Năm ra mắt</th>
                            <th>Tên nhà phát minh</th>
                            <th>Tên xuất xứ</th>
                            <th>Tên hãng</th>
                            <th colspan="2" style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @csrf
                        @foreach($products as $product)

                            <tr>

                                <td colspan="1" style="vertical-align: middle;">
                                    <div class="checkbox checkbox-primary">
                                        <input class="checkbox_list_origin" id="{{$product->id}}" type="checkbox"
                                               style="opacity: 1" name="origins[]" value="3">
                                    </div>
                                </td>
                                <td>{{$product->name}}</td>
                                </td>
                                <td>{{$product->released_year}}</td>
                                @if ($product->inventor_name == '-')
                                    <td>Unknown</td>
                                @else
                                    <td>{{$product->inventor_name}}</td>
                                @endif

                                <td>{{$product->origin->name}}</td>
                                <td>{{$product->brand->brand_name}}</td>
                                {{--                                    <td><div> {{$product->description}}</div></td>--}}
                                {{--                                    <td>{{count($product->products)}}</td>--}}
                                <td><a href="{{route('admin_product_edit',$product->id)}}" class="btn btn-primary"
                                       style="float:right">Edit</a></td>
                                <td>
                                    <form action="{{route('admin_product_delete',$product->id)}}" method="POST">
                                        @csrf @method('PUT')
                                        <button class="btn btn-primary"> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>


                </div>
                <div style="margin-top: 1%">
                    <div class="row">
                        <div class="col-5"> {{ $products->links() }}</div>
                        <div class="col-6">
                            <button class="btn btn-primary" style="float: right" id="delete_all"> Delete All
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- end row -->

    </div> <!-- end container-fluid -->


@endsection