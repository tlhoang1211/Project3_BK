@extends('admin.layouts.master')
@section('specific_js')
    <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>

    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: 'vernom',
                uploadPreset: 'fn5rpymu',
                multiple: false,
                form: '#product_form',
                folder: 'perfume_project/brand',
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
            console.log(imgName[0]);
            $('input[data-cloudinary-public-id="' + splittedImg[splittedImg.length - 3] +'/'+ splittedImg[splittedImg.length - 2] +'/'+ splittedImg[splittedImg.length - 1] + '"]').remove();
        });
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
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
                            <li class="breadcrumb-item active">Form Validation</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Form Validation</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="header-title">Create Brand : </h4>
                    <form action="{{route('admin_brand_store')}}" id="product_form" method="POST" class="parsley-examples" novalidate="">
                        @csrf
                        <div class="form-group" style="width: 30%">
                            <label for="userName">Brand Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" parsley-trigger="change" required=""
                                   value="" class="form-control" id="userName">

                            @if ($errors->has('name'))
                                <label class="alert-warning">{{$errors->first('name')}}</label>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="userName">Brand Thumbnail<span class="text-danger">*</span></label>
                            <button type="button" id="upload_widget" class="btn btn-primary">Upload
                                files
                            </button>
                            <div class="thumbnail"></div>
                            @if ($errors->has('thumbnail'))
                                <label class="alert-warning">{{$errors->first('thumbnail')}}</label>
                            @endif
                        </div>

                        <div class="form-group" style="width: 50%">
                            <label for="userName">Brand description<span class="text-danger">*</span></label>
                            <textarea id="editor" name="detail" class="form-control"
                                                      placeholder=""></textarea>
                            @if ($errors->has('detail'))
                                <label class="alert-warning">{{$errors->first('detail')}}</label>
                            @endif
                        </div>

                         <div class="form-group text-left mb-0">
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