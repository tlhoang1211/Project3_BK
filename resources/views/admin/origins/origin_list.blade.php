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
                $(".checkbox_list_origin:checked").each(function () {
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
                            url: '{{route('admin_origin_delete_multi')}}',
                            type: 'PUT',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function () {
                                        $(this).parents("tr").remove();
                                    });
                                    alert("Origins Deleted Success");
                                    window.location = '{{route('admin_origin')}}';
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
    <script>
        $('#checkAll').click(function () {
            $('.checkbox_list_origin').prop('checked',$(this).prop('checked'));
        })
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Xuất xứ</a></li>
                            <li class="breadcrumb-item active">Danh sách</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Danh sách xuất xứ</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-8">
                <div class="card-box">
                    <div class="row">
                        <div>
                            <h4 class="header-title">Xuất xứ</h4>
                            <p class="sub-header">
                                <code>Toàn bộ xuất xứ</code>
                            </p>
                        </div>
                        <div class="offset-8 col-3">
                            <form class="app-search" action="{{route('admin_origin')}}">
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
                                <th colspan="1"><input type="checkbox" id="checkAll"></th>
                                <th colspan="2" class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 24.8px;" aria-label="ID: activate to sort column ascending">
                                    Tên xuất xứ
                                </th>
                                <th colspan="2" style="text-align: center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @csrf
                            @foreach($origins as $origin)
                                <tr>
                                    <td colspan="1">
                                        <div class="checkbox checkbox-primary">
                                            <input class="checkbox_list_origin" id="{{$origin->name}}" type="checkbox"
                                                   name="origins[]" value="{{$origin->id}}">
                                            <label for="{{$origin->name}}"></label>
                                        </div>
                                    </td>
                                    <td colspan="2">{{$origin->name}}</td>
                                    <td><a href="{{route('admin_origin_edit',$origin->slug)}}" class="btn btn-primary"
                                           style="float:right">Edit</a></td>
                                    <td>
                                        <form action="{{route('admin_origin_delete',$origin->id)}}" method="POST">
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
                            <div class="col-5"> {{ $origins->links() }}</div>
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