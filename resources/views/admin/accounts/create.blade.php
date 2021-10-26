@extends('admin.layouts.master')
@section('specific_js')
    <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>

    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: 'dwarrion',
                uploadPreset: 'ins6mnhp',
                multiple: false,
                form: '#product_form',
                fieldName: 'thumbnail',
                thumbnails: '.thumbnail'
            }, function (error, result) {
                if (!error && result && result.event === "success") {
                    console.log('Done! Here is the image info: ', result.info.url);
                    var thumbnailInput = document.querySelector('input[name="thumbnail"]');
                    thumbnailInput.value = thumbnailInput.getAttribute('data-cloudinary-public-id');
                    console.log(thumbnailInput)
                }
            }
        );
        $('#upload_widget').click(function () {
            myWidget.open();
        })
        // xử lý js trên dynamic content.
        $('body').on('click', '.cloudinary-delete', function () {
            var splittedImg = $(this).parent().find('img').attr('src').split('/');
            var imgName = splittedImg[splittedImg.length - 1];

            imgName = imgName.split('.');

            $(this).parent().remove();
            $('input[data-cloudinary-public-id="' + imgName[0] + '"]').remove();

            console.log("Remove image : " + imgName[0] + " successful");
        });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Adminox</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Quản lý tài khoản</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Quản lý tài khoản</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card-box">
                    <h4 class="header-title">Create Account : </h4>
                    <form action="{{route('admin_account_create')}}" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="userName">Fullname<span class="text-danger">*</span></label>
                            <input type="text" name="fullName" parsley-trigger="change" required=""
                                   value="" class="form-control" id="userName">
                            @if ($errors->has('name'))
                                <label class="alert-warning">{{$errors->first('name')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="userName">Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" parsley-trigger="change" required=""
                                   value="" class="form-control" id="userName">
                            @if ($errors->has('email'))
                                <label class="alert-warning">{{$errors->first('email')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="userName">Birthday<span class="text-danger">*</span></label>
                            <input type="date" name="birthDate" parsley-trigger="change" required=""
                                   value="" class="form-control" id="userName">
                            @if ($errors->has('birthDate'))
                                <label class="alert-warning">{{$errors->first('birthDate')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="userName">phoneNumber<span class="text-danger">*</span></label>
                            <input type="number" name="phoneNumber" parsley-trigger="change" required=""
                                   value="" class="form-control" id="userName">
                            @if ($errors->has('phoneNumber'))
                                <label class="alert-warning">{{$errors->first('phoneNumber')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="userName">City<span class="text-danger">*</span></label>
                            <select name="city">
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city'))
                                <label class="alert-warning">{{$errors->first('city')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="role">Role<span class="text-danger">*</span></label>
                            <select name="role">
                                <option value="2">Admin</option>
                                <option value="1">User</option>
                            </select>
                            @if ($errors->has('role'))
                                <label class="alert-warning">{{$errors->first('role')}}</label>
                            @endif
                        </div>
                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                Cancel
                            </button>
                        </div>

                    </form>
                </div> <!-- end card-box -->
            </div>
            <!-- end row -->
        </div>
@endsection