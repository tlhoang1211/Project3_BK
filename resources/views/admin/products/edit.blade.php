@extends('admin.layouts.master')
@section('specific_js')
    <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>

    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: 'vernom',
                uploadPreset: 'fn5rpymu',
                multiple: true,
                form: '#product_form',
                folder: 'perfume_project/perfume',
                fieldName: 'thumbnails[]',
                thumbnails: '.thumbnails'
            }, function (error, result) {
                if (!error && result && result.event === "success") {
                    console.log('Done! Here is the image info: ', result.info.url);
                    var arrayThumnailInputs = document.querySelectorAll('input[name="thumbnails[]"]');
                    for (let i = 0; i < arrayThumnailInputs.length; i++) {
                        arrayThumnailInputs[i].value = arrayThumnailInputs[i].getAttribute('data-cloudinary-public-id');
                    }
                    console.log(thumbnailInput)
                }
            }
        );
        $('#upload_widget').click(function () {
            myWidget.open();
        })
        // xử lý js trên dynamic content.
        $('body').on('click', '.cloudinary-delete', function () {
            event.preventDefault();
            var splittedImg = $(this).parent().find('img').attr('src').split('/');
            var imgName = splittedImg[splittedImg.length - 1];
            $(this).parent().parent().remove()
            console.log()
            imgName = imgName.split('.');
            var name = 'input[data-cloudinary-public-id="'+ splittedImg[splittedImg.length - 3] +'/'+ splittedImg[splittedImg.length - 2] +'/'+ imgName[0] + '"]';
            console.log(name);
            $(name).remove();
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
          rel="stylesheet"/>

    <script>
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>
@endsection
@section('content')
{{--        {{dd($errors)}}--}}
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Create Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="header-title">Create Product : </h4>
                    <form action="{{route('admin_product_update',$product->id)}}" id="product_form" method="POST"
                          class="parsley-examples" novalidate="">
                        @csrf
                        @method('PUT')
{{--                        {{dd($product->name)}}--}}
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group" style="width: 60%">
                                        <label for="userName">Tên sản phẩm<span class="text-danger">*</span></label>
                                        <input type="text" name="name" parsley-trigger="change" required=""
                                               class="form-control"  value="{{$product->name}}">
                                        @if ($errors->has('name'))
                                            <label class="alert-warning">{{$errors->first('name')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group" style="width: 40%">
                                        <label for="userName">Tên nhà phát minh<span
                                                    class="text-danger">*</span></label>
                                        <input type="text" name="inventor_name" parsley-trigger="change" required=""
                                               value="{{$product->inventor_name}}" class="form-control" id="userName">
                                        @if ($errors->has('inventor_name'))
                                            <label class="alert-warning">{{$errors->first('inventor_name')}}</label>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group" style="width: 50%">
                                        <label>Hãng</label>
                                        <select class="form-control" name="brand_id">
                                            <option value="{{$product->brand->id}}"  selected>{{$product->brand->brand_name}}</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('brand_id'))
                                            <label class="alert-warning">{{$errors->first('brand_id')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group" style="width: 60%">
                                        <label>Xuất xứ</label>
                                        <select class="form-control" name="origin_id">
                                            <option value="{{$product->origin->id}}"  selected>{{$product->origin->name}}</option>
                                            @foreach($origins as $origin)
                                                <option value="{{$origin->id}}">{{$origin->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('origin_id'))
                                            <label class="alert-warning">{{$errors->first('origin_id')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group" style="width: 40%">
                                        <label>Dung lượng</label>
                                        <select class="form-control" name="volume">
                                            <option value="{{$product->volume}}"  selected>{{$product->volume}}</option>
                                            <option value="100ml">100ml</option>
                                            <option value="90ml">90ml</option>
                                            <option value="50ml">50ml</option>
                                            <option value="10ml">10ml</option>
                                        </select>
                                        @if ($errors->has('volume'))
                                            <label class="alert-warning">{{$errors->first('volume')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group" style="width: 40%">
                                        <label>Giới tính</label>
                                        <select class="form-control" name="sex">
                                            <option value="{{$product->sex}}"  selected>{{$product->sex}}</option>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                            <option value="Phi giới tính">Phi giới tính</option>
                                        </select>
                                        @if ($errors->has('sex'))
                                            <label class="alert-warning">{{$errors->first('sex')}}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group" style="width: 60%">
                                            <label for="userName">Phong cách<span class="text-danger">*</span></label>
                                            <input type="text" name="style" parsley-trigger="change" required=""
                                                   value="{{$product->style}}" class="form-control" id="userName">
                                            @if ($errors->has('style'))
                                                <label class="alert-warning">{{$errors->first('style')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group" style="width: 20%">
                                            <label for="released_year">Năm ra mắt<span
                                                        class="text-danger">*</span></label>
                                            <input type="text" name="released_year" parsley-trigger="change" required=""
                                                   value="{{$product->released_year}}" class="form-control" id="datepicker">
                                            @if ($errors->has('released_year'))
                                                <label class="alert-warning">{{$errors->first('released_year')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group" style="width: 75%">
                                            <label>Độ lưu hương</label>
                                            <select class="form-control" name="incense_level">
                                                <option value="{{$product->incense_level}}"  selected>{{$product->incense_level}}</option>
                                                <option value="Lâu - 7 giờ đến 12 giờ">Lâu - 7 giờ đến 12 giờ</option>
                                                <option value="Tạm ổn - 3 giờ đến 6 giờ">Tạm ổn - 3 giờ đến 6 giờ
                                                </option>
                                                <option value="Rất lâu - Trên 12 giờ">Rất lâu - Trên 12 giờ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group" style="width: 75%">
                                            <label>Phạm vi hương thơm</label>
                                            <select class="form-control" name="aroma_level">
                                                <option value="{{$product->aroma_level}}"  selected>{{$product->aroma_level}}
                                                </option>
                                                <option value="Xa - Toả hương trong vòng bán kính 2 mét">Xa - Toả hương trong vòng bán kính 2 mét
                                                </option>
                                                <option value="Gần - Toả hương trong vòng một cánh tay">Gần - Toả hương trong vòng một cánh tay
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group" style="width: 75%">
                                            <label>Mức nồng độ</label>
                                            <select class="form-control" name="concentration">
                                                <option value="{{$product->concentration}}"  selected>{{$product->concentration}}
                                                </option>
                                                <option value="Eau de Parfum">Eau de Parfum
                                                </option>
                                                <option value="Eau de Toilette">Eau de Toilette
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group" style="width: 60%">
                                            <label for="userName">Gía tiền<span class="text-danger">*</span></label>
                                            <input type="number" name="price" parsley-trigger="change" required=""
                                                   value="{{$product->price}}" class="form-control" id="userName">
                                            @if ($errors->has('price'))
                                                <label class="alert-warning">{{$errors->first('price')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group" style="width: 60%">
                                            <label for="userName"> Tuổi khuyên dùng<span
                                                        class="text-danger">*</span></label>
                                            <input type="number" name="recommended_age" parsley-trigger="change"
                                                   required=""
                                                   value="{{$product->recommended_age}}" class="form-control" id="userName">
                                            @if ($errors->has('recommended_age'))
                                                <label class="alert-warning">{{$errors->first('recommended_age')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="userName">Thời gian khuyên dùng<span
                                                        class="text-danger">*</span></label>
                                            <div>
                                                <label for=""> Thời gian trong ngày :</label>
                                                <input type="checkbox" name="recommended_time[]" value="Ngày"
                                                @if (str_contains($product->recommended_time,'Ngày'))
                                                    checked
                                                @endif> Ngày
                                                <input type="checkbox" name="recommended_time[]" value="Đêm"
                                                @if (str_contains($product->recommended_time,'Đêm'))
                                                    checked
                                                @endif> Đêm
                                            </div>
                                            <div>
                                                <label>Mùa :</label>
                                                <input type="checkbox" name="recommended_time[]" value="Xuân"
                                                @if (str_contains($product->recommended_time,'Xuân'))
                                                    checked
                                                @endif> Xuân
                                                <input type="checkbox" name="recommended_time[]" value="Hạ"
                                                @if (str_contains($product->recommended_time,'Hạ'))
                                                    checked
                                                @endif> Hạ
                                                <input type="checkbox" name="recommended_time[]" value="Thu"
                                                @if (str_contains($product->recommended_time,'Thu'))
                                                    checked
                                                @endif> Thu
                                                <input type="checkbox" name="recommended_time[]" value="Đông"
                                                @if (str_contains($product->recommended_time,'Đông'))
                                                    checked
                                                @endif> Đông
                                            </div>
                                            @if ($errors->has('recommended_time'))
                                                <label class="alert-warning">{{$errors->first('recommended_time')}}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="userName">Product images<span class="text-danger">*</span></label>
                                    <button type="button" id="upload_widget" class="btn btn-primary">Upload
                                        files
                                    </button>

                                    <div class="thumbnails" style="display: flex">
                                        @foreach($product->ThumbnailArray as $thumb)
                                            <ul class="cloudinary-thumbnails">
                                                <li class="cloudinary-thumbnail active" data-cloudinary="">
                                                    <img src="{{$thumb}}" style="width: 150px;height: 150px">
                                                    <a href="#" class="cloudinary-delete">x</a>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                    @if ($errors->has('thumbnails'))
                                        <label class="alert-warning">{{$errors->first('thumbnails')}}</label>
                                    @endif
                                </div>

                                <div class="form-group" style="width: 50%">
                                    <label for="userName">Brand description<span
                                                class="text-danger">*</span></label>
                                    <textarea id="editor" name="description" class="form-control"
                                              placeholder="" >{{$product->description}}</textarea>
                                    @if ($errors->has('description'))
                                        <label class="alert-warning">{{$errors->first('description')}}</label>
                                    @endif
                                </div>
                                @foreach($product->photo_ids as $id)
                                    <input type="hidden" name="thumbnails[]" data-cloudinary-public-id="{{$id}}" value="{{$id}}">
                                @endforeach
                                <div class="form-group text-left mb-0">
                                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-box -->
            </div>
            <!-- end row -->
        </div>
@endsection