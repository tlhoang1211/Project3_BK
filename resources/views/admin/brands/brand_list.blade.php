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
                $(".checkbox_list_brand:checked").each(function () {
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
                            url: '{{route('admin_brand_delete_multi')}}',
                            type: 'PUT',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function () {
                                        $(this).parents("tr").remove();
                                    });
                                    alert("Brands Deleted Success");
                                    window.location = '{{route('admin_brand')}}';
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
                    <div class="row">
                        <div>
                            <h4 class="header-title">Brands</h4>
                            <p class="sub-header">
                                <code>All brands</code>
                            </p>
                        </div>
                        <div class="offset-8 col-3">
                            <form class="app-search" action="{{route('admin_brand')}}">
                                <div class="app-search-box">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="keyword" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 24.8px;" aria-label="ID: activate to sort column ascending">
                                                Brand Name
                                </th>
                                <th>Brand Thumbnail</th>
                                <th>Products description</th>
                                <th colspan="2" style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @csrf
                            @foreach($brands as $brand)
                                <tr>

                                    <td colspan="1" style="vertical-align: middle;">
                                        <div class="checkbox checkbox-primary">
                                            <input class="checkbox_list_origin" id="{{$brand->id}}" type="checkbox" style="opacity: 1" name="origins[]" value="3">
                                        </div>
                                    </td>
                                    <td>{{$brand->brand_name}}</td>
                                    <td width="10%"><img src="{{$brand->imagesize600x600}}"style="width: 100%">
                                    </td>
                                    <td><div> {{$brand->brand_description}}</div></td>
{{--                                    <td>{{count($brand->products)}}</td>--}}
                                    <td><a href="{{route('admin_brand_edit',$brand->slug)}}" class="btn btn-primary"
                                           style="float:right">Edit</a></td>
                                    <td>
                                        <form action="{{route('admin_brand_delete',$brand->id)}}" method="POST">
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
                            <div class="col-5"> {{ $brands->links() }}</div>
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