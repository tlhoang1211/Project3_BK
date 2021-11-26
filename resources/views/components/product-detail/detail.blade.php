@props(['product', 'comments'])

{{--Tab titles--}}
<div class="tabs_product">
    <div class="container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Mô tả</a>
            </li>
            <li class="nav-item">
                <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Sử dụng và bảo
                                                                                           quản</a>
            </li>
            <li class="nav-item">
                <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab">Vận chuyển và đổi
                                                                                           trả</a>
            </li>
            <li class="nav-item">
                <a id="tab-D" href="#pane-D" class="nav-link" data-toggle="tab" role="tab">Đánh giá</a>
            </li>
        </ul>
    </div>
</div>

{{--Tab content--}}
<div class="tab_content_wrapper">
    <div class="container">
        <div class="tab-content" role="tablist">
            <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                <div class="card-header" role="tab" id="heading-A">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false"
                           aria-controls="collapse-A">
                            Mô tả
                        </a>
                    </h5>
                </div>
                <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-6">
                                <h3><u>Tổng quan</u></h3>
                                <div>
                                    <p class="description">
                                        {!! $product->description !!}
                                    </p>
                                    <a href="javascript:void(0);" class="readmore-btn">Đọc thêm</a>
                                </div>

                            </div>
                            <div class="col-lg-5">
                                <h3><u>Thông tin chi tiết</u></h3>
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped">
                                        <tbody>
                                        <tr>
                                            <td><strong>Xuất xứ</strong></td>
                                            <td>{{$product->origin->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Độ tuổi khuyên dùng</strong></td>
                                            <td>{{$product->recommended_age}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Năm phát hành</strong></td>
                                            <td>{{$product->released_year}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nhà sáng chế</strong></td>
                                            <td>{{$product->inventor_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Độ lựu hương</strong></td>
                                            <td>{{$product->incense_level}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Độ toả hương</strong></td>
                                            <td>{{$product->aroma_level}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phong cách</strong></td>
                                            <td>{{$product->style}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Thời điểm khuyên dùng</strong></td>
                                            <td>{{$product->recommended_time}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SỬ DỤNG VÀ BẢO QUẢN -->
            <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                <div class="card-header" role="tab" id="heading-B">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false"
                           aria-controls="collapse-B">
                            Sử dụng và bảo quản
                        </a>
                    </h5>
                </div>
                <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-6">
                                <h3><u>Cách sử dụng</u></h3>
                                <ul class="ul_use">
                                    <li>Nước hoa mang lại mùi hương cho cơ thể bạn thông qua việc tiếp
                                        xúc lên da và phản ứng với hơi ấm trên cơ thể của bạn. Việc được
                                        tiếp xúc với các bộ phận như cổ tay, khuỷu tay, sau tai, gáy, cổ
                                        trước là những vị trí được ưu tiên hàng đầu trong việc sử dụng
                                        nước hoa bởi sự kín đáo và thuận lợi trong việc tỏa mùi hương.
                                    </li>
                                    <li>Sau khi sử dụng, xịt nước hoa lên cơ thể, tránh dùng tay chà xát
                                        hoặc làm khô da bằng những vật dụng khác, điều này phá vỡ các
                                        tầng hương trong nước hoa, khiến nó có thể thay đổi mùi hương
                                        hoặc bay mùi nhanh hơn.
                                    </li>
                                    <li>Để chai nước hoa cách vị trí cần dùng nước hoa trong khoảng
                                        15-20cm và xịt mạnh, dứt khoát để mật đổ phủ của nước hoa được
                                        rộng nhất, tăng độ bám tỏa trên da của bạn.
                                    </li>
                                    <li>
                                        Phần cổ tay được xịt nước hoa thường có nhiều tác động như lúc
                                        rửa tay, đeo vòng, đồng hồ, do đó để đảm bảo mùi hương được duy
                                        trì, bạn nên sử dụng nước hoa ở cổ tay ở tần suất nhiều hơn lúc
                                        cần thiết.
                                    </li>
                                    <li>
                                        Nước hoa có thể bám tốt hay không tốt tùy thuộc vào thời gian,
                                        không gian, cơ địa, chế độ sinh hoạt, ăn uống của bạn, việc sử
                                        dụng một loại nước hoa trong thời gian dài có thể khiến bạn bị
                                        quen mùi, dẫn đến hiện tượng không nhận biết được mùi hương.
                                        Mang theo nước hoa bên mình hoặc trang bị những mẫu mini tiện
                                        dụng để giúp bản thân luôn tự tin mọi lúc mọi nơi.
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-5">
                                <h3><u>Bảo quản nước hoa</u></h3>
                                <ul class="preservation">
                                    <li>Nước hoa phổ thông (Designer) thường không có hạn sử dụng, ở một
                                        số Quốc gia, việc ghi chú hạn sử dụng là điều bắt buộc để hàng
                                        hóa được bán ra trên thị trường. Hạn sử dụng ở một số dòng nước
                                        hoa được chú thích từ 24 đến 36 tháng, và tính từ ngày bạn mở
                                        sản phẩm và sử dụng lần đầu tiên.
                                    </li>
                                    <li>Nước hoa là tổng hợp của nhiều thành phần hương liệu tự nhiên và
                                        tổng hợp, nên bảo quản nước hoa ở những nơi khô thoáng, mát mẻ,
                                        tránh nắng, nóng hoặc quá lạnh, lưu ý không để nước hoa trong
                                        cốp xe, những nơi có nhiệt độ nóng lạnh thất thường...
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- VẬN CHUYỂN VÀ ĐỔI TRẢ -->
            <div id="pane-C" class="card tab-pane fade " role="tabpanel" aria-labelledby="tab-C">
                <div class="card-header" role="tab" id="heading-C">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false"
                           aria-controls="collapse-C">
                            Vận chuyển và đổi trả
                        </a>
                    </h5>
                </div>
                <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-6">
                                <h3><u>Vận chuyển</u></h3>
                                <p class="shipping_exchange">
                                    <b>Hà Nội</b><br>
                                    Các đơn hàng tại thành phố Hà Nội có thể chọn phương thức thanh
                                    toán COD hoặc chuyển khoản, wanderlust cam kết các quận trung tâm
                                    quý khách sẽ nhận được hàng chậm nhất trong 3 giờ kể từ khi chốt đơn
                                    đối với những đơn hàng trong ngày từ khung giờ 9.00 am đến 15.00 pm.
                                    Nếu bạn muốn ship hẹn giờ, liên hệ với tổng đài CSKH +84 123-456-789
                                    hoặc
                                    fangape Facebook, Instagram của chúng tôi để được hỗ trợ.<br><br>

                                    <b>Các Tỉnh Khác</b><br>
                                    wanderlust thực hiện lên đơn hàng và thanh toán với cách thức chuyển
                                    khoản trước. Sau khi chúng tôi xác nhận được sao kê số tiền, đơn
                                    hàng của bạn sẽ được đóng gói và vận chuyển đến bạn trong vòng 2-4
                                    ngày (không tính cuối tuần và ngày lễ)<br><br>

                                    <b>Cách Thức Đóng Hàng</b><br>
                                    Với các đơn hàng ship Tỉnh, các sản phẩm của bạn sẽ được đóng gói
                                    cẩn thận và kỹ lưỡng, bao gồm nhiều lớp chống sốc, đóng hộp carton
                                    và dán keo dính cẩn thận kèm hóa đơn, đảm bảo các sản phẩm được đến
                                    tay khách hàng của chúng tôi một cách tốt nhất.<br><br>

                                    <b>Hỗ trợ từ wanderlust</b><br>
                                    Trong trường hợp các bạn mua tại thành phố Hà Nội cần hỗ trợ
                                    đóng hàng, hãy liên hệ hotline +84123-456-789 hoặc fangape Facebook,
                                    Instagram của chúng tôi để được hỗ trợ.
                                    <br><br>
                                </p>
                            </div>
                            <div class="col-lg-5">
                                <h3><u>Đổi trả hàng hoá</u></h3>
                                <p class="exchange">
                                    Hàng hóa wanderlust bán ra đảm bảo là hàng chính hãng 100%, chúng tôi
                                    cam
                                    kết không bán hàng giả, hàng nhái, hàng không đảm bảo chất
                                    lượng.<br><br>

                                    <b>Chính sách đổi hàng hóa:</b><br>
                                    Các trường hợp được đổi lại hàng hóa:<br>
                                    - Với những sản phẩm lỗi kết cấu sản phẩm do quá trình sản xuất của
                                    hãng,
                                    hay lỗi do vận chuyển dẫn đến việc sản phẩm bị méo mó, thay đổi hình
                                    dạng,
                                    hư hỏng bộ phận vòi xịt, ống xịt, bị nứt, vỡ.<br>
                                    - Đối với những sản phẩm đổi vì lý do cá nhân (tặng, được tặng), sản
                                    phẩm
                                    đổi chỉ được áp dụng trong thời gian 10 ngày kể từ khi sản phẩm được bán
                                    ra.
                                    Sản phẩm đổi phải đảm bảo chưa được sửa dụng, đối với hàng Full seal thì
                                    phải còn nguyên seal, đối với các sản phẩm Giftset, Tester phải đảm bảo
                                    còn
                                    nguyên hộp, sản phẩm chưa bị can thiệp và sử dụng. sản phẩm sẽ được
                                    chúng
                                    tôi kiểm tra lại để đảm bảo sản phẩm là hàng hóa của bên chúng tôi phân
                                    phối.<br><br>

                                    <b>Các trường hợp không được áp dụng đổi lại hàng hóa:</b><br>
                                    - Sản phẩm không phải do wanderlust cung cấp, không chứng minh được
                                    nguồn
                                    gốc của sản phẩm (hóa đơn, thời gian mua hàng)<br>
                                    - Sản phẩm được mua quá 10 ngày kể từ khi sản phẩm được bán ra.<br>
                                    - Sản phẩm đã được sử dụng hoặc bị tác động từ người mua dẫn đến hư hại.<br><br>

                                    <b>Quy trình đổi hàng hóa:</b><br>
                                    - Sau khi bạn đáp ứng được các điều kiện về đổi lại hàng hóa của chúng
                                    tôi,
                                    hãy liên hệ với chúng tôi để được hỗ trợ.<br>
                                    - Sau khi tiếp nhận thông tin và check kiểm các điều kiện, nếu bạn đáp
                                    ứng
                                    đủ điều kiện, chúng tôi sẽ hỗ trợ ngay và nhanh nhất cho bạn.<br><br>

                                    <b>Chính sách trả hàng hóa:</b><br>
                                    Các trường hợp được trả lại hàng hóa:<br>
                                    - Với những sản phẩm lỗi kết cấu sản phẩm do quá trình sản xuất của
                                    hãng,
                                    hay lỗi do vận chuyển dẫn đến việc sản phẩm bị méo mó, thay đổi hình
                                    dạng,
                                    hư hỏng bộ phận vòi xịt, ống xịt, bị nứt, vỡ.<br><br>

                                    <b>Các trường hợp không được chấp nhận trả lại hàng hóa:</b><br>
                                    - Sản phẩm bị tác động từ phía người sử dụng dẫn đến hư hỏng, móp méo,
                                    thay
                                    đổi hình dạng.<br>
                                    - Sản phẩm đã được sử dụng<br>
                                    - Chúng tôi không chấp nhận trả lại hàng, hoàn lại tiền với các trường
                                    hợp
                                    muốn trả lại hàng vì lý do cá nhân như không thích nữa, thay đổi ý định,
                                    hay
                                    các lý do cá nhân khác.<br><br>

                                    <b>Quy trình trả hàng, hoàn tiền:</b><br>
                                    - Sau khi bạn đáp ứng được các điều kiện về trả lại hàng hóa của chúng
                                    tôi,
                                    hãy liên hệ với chúng tôi để được hỗ trợ<br>
                                    - Sau khi tiếp nhận thông tin và check kiểm các điều kiện, nếu bạn đáp
                                    ứng
                                    đủ điều kiện, chúng tôi sẽ hỗ trợ ngay và nhanh nhất cho bạn.
                                </p>
                                <a href="javascript:void(0);" class="readmore-btn">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ĐÁNH GIÁ -->
            <div id="pane-D" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-D">
                <div class="card-header" role="tab" id="heading-D">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" href="#collapse-D" aria-expanded="false"
                           aria-controls="collapse-D">
                            Đánh giá
                        </a>
                    </h5>
                </div>
                <div id="collapse-D" class="collapse" role="tabpanel" aria-labelledby="heading-D">
                    <div class="card-body">

                    {{--Comments--}}
                    <!-- /row -->


                        <div class="row justify-content-between">

                            {{-- Display comments--}}
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-center mb-3">
                                    {{ $comments->links() }}
                                </div>

                                @foreach($comments as $comment)
                                    <x-product-detail.comment
                                            :rate="$comment->rate"
                                            :title="$comment->title"
                                            :date="$comment->created_at->diffForHumans()"
                                    >
                                        {{ $comment->body }}
                                    </x-product-detail.comment>
                                @endforeach
                            </div>

                            {{-- Write new comment --}}
                            <div class="col-lg-5">
                                @auth()
                                    <div class="border p-lg-4 rounded-3 bg-light bg-gradient comment">
                                        <form action="/product/{{ $product->slug }}/comment" method="POST">
                                            @csrf

                                            {{-- Rating --}}
                                            <div class="rating mb-3 d-flex justify-content-center flex-row-reverse">
                                                <input type="radio" name="rating" value="5" id="5"><label
                                                        for="5">☆</label>
                                                <input type="radio" name="rating" value="4" id="4"><label
                                                        for="4">☆</label>
                                                <input type="radio" name="rating" value="3" id="3"><label
                                                        for="3">☆</label>
                                                <input type="radio" name="rating" value="2" id="2"><label
                                                        for="2">☆</label>
                                                <input type="radio" name="rating" value="1" id="1"><label
                                                        for="1">☆</label>
                                            </div>

                                            {{-- Title --}}
                                            <div class="mb-3">
                                                <input name="title" type="text" class="form-control form-control-lg"
                                                       id="title"
                                                       placeholder="Title">
                                            </div>

                                            {{-- Body --}}
                                            <div class="mb-3">
                                        <textarea name="body" class="form-control fix-textarea" id="body"
                                                  rows="3" placeholder="Enter your comment here..."></textarea>
                                            </div>

                                            <button type="submit" class="btn_1">
                                                Để lại đánh giá
                                            </button>

                                        </form>
                                    </div>
                                @else
                                    <div>
                                        <h1>Để lại đánh giá</h1>
                                        <p>
                                            Bạn cần
                                            <a href="{{ route('login') }}" class="link-info fs6-6">đăng nhập</a>
                                            để đánh giá sản phẩm này.
                                        </p>
                                    </div>
                                @endauth
                            </div>
                        </div>

                    </div>
                    <!-- /card-body -->
                </div>
            </div>
        </div>
        <!-- /tab-content -->
    </div>
    <!-- /container -->
</div>

