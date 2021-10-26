@extends('layouts.master')
@section('specific_css')
    <link href="{{asset('assets/css/leave_review.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
    <script src="{{asset('assets/js/common_scripts.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
@endsection
@section('content')
    <main>
        <div class="container margin_60_35">

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="write_review">
                        <h1>Để lại review cho sản phẩm</h1>
                        <div class="rating_submit">
                            <div class="form-group">
                                <label class="d-block">Đánh giá</label>
                                <span class="rating mb-0">
								<input type="radio" class="rating-input" id="5_star" name="rating-input"
                                       value="5 Stars"><label for="5_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="4_star" name="rating-input"
                                       value="4 Stars"><label for="4_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="3_star" name="rating-input"
                                       value="3 Stars"><label for="3_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="2_star" name="rating-input"
                                       value="2 Stars"><label for="2_star" class="rating-star"></label>
								<input type="radio" class="rating-input" id="1_star" name="rating-input" value="1 Star"><label
                                        for="1_star" class="rating-star"></label>
							</span>
                            </div>
                        </div>
                        <!-- /rating_submit -->
                        <div class="form-group">
                            <label>Tiêu đề bài đánh giá của bạn</label>
                            <input class="form-control" type="text"
                                   placeholder="Tiêu đề">
                        </div>
                        <div class="form-group">
                            <label>Nhận xét của bạn</label>
                            <textarea class="form-control" style="height: 180px;"
                                      placeholder="Viết nhận xét của bạn để giúp những người khác hiểu rõ hơn về sản phẩm này"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh (tuỳ chọn)</label>
                            <div class="fileupload"><input type="file" name="fileupload" accept="image/*"></div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <div class="checkboxes float-left add_bottom_15 add_top_15">--}}
                        {{--                                <label class="container_check">Những điều bạn viết sẽ được hiển thị trên mục đánh giá--}}
                        {{--                                    của sản phẩm. Bạn đồng ý chứ?Những điều bạn viết sẽ được hiển thị trên mục đánh giá--}}
                        {{--                                    của sản phẩm. Bạn đồng ý chứ?Những điều bạn viết sẽ được hiển thị trên mục đánh giá--}}
                        {{--                                    của sản phẩm. Bạn đồng ý chứ?Những điều bạn viết sẽ được hiển thị trên mục đánh giá--}}
                        {{--                                    của sản phẩm. Bạn đồng ý chứ?--}}
                        {{--                                    <input type="checkbox">--}}
                        {{--                                    <span class="checkmark"></span>--}}
                        {{--                                </label>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <a href="{{view('confirm_review')}}" class="btn_1">Submit review</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!--/main-->
@endsection
