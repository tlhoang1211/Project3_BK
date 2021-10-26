@extends('layouts.master')
@section('specific_css')
    <link href="{{asset('assets/css/faq.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
    <script>
        var coll = document.getElementsByClassName("collapsible_faq");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("activ");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>
@endsection
@section('content')
    <main class="bg_gray">

        <div class="top_banner general" style="height: 400px">
            <div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.1)">
                <div class="row justify-content-end">
                    <div class="bg-text">
                        <h1 style="font-size: 50px">Wanderlust</h1>
                        <h2>Các câu hỏi thường gặp</h2>
                    </div>
                </div>
            </div>
            <img
                src="https://res.cloudinary.com/vernom/image/upload/c_scale,h_190,w_696/v1596969572/perfume_project/service/uyjrqqsdirnf1f1gja3o.jpg"
                class="img-fluid-top" alt="">
        </div>
        <!--/top_banner-->

        <div class="container margin_30">
            <div class="row">
                <div class="col-md-3">
                    <h6 class="top_line">Chúng tôi là Wanderlust</h6>
                    <div class="list_choice">1. Các câu hỏi thường gặp
                        <ul class="a">
                            <li><a href="/faq" style="color: #3a87ad">Hỏi đáp về nước hoa</a></li>
                            <li><a href="/faq_2">Hỏi đáp về hàng hoá</a></li>
                        </ul>
                    </div>
                    <div class="list_choice"><a href="/ordering_guide">2. Hướng dẫn đặt hàng</a></div>
                    <div class="list_choice"><a href="/mode_of_transportation">3. Phương thức vận chuyển</a></div>
                    <div class="list_choice"><a href="/payment_methods">4. Phương thức thanh toán</a></div>
                    <div class="list_choice"><a href="/policy">5. Chính sách</a></div>
                </div>
                <div class="col-md-9">
                    <button class="collapsible_faq"><strong style="font-size: 17px">Nước hoa Tester là gì?</strong>
                    </button>
                    <div class="content_faq">
                        <p>Nước hoa Tester là hàng mới và chưa từng được sử dụng, là nước hoa chính hãng, authentic
                            100%, được các hãng sản xuất với số lượng ít nhưng đảm bảo chất lượng tốt nhất, với mục đích
                            hỗ trợ những cửa hàng bán lẻ làm mẫu thử cho khách. Vì là hàng Tester (hàng thử) nên hãng sẽ
                            luôn đảm bảo về chất lượng cho khách hàng của mình.
                            <br><br>
                            Nước hoa Tester được đựng trong những hộp giấy đơn giản (thường là hộp giấy trắng hoặc giấy
                            carton). Chai sản phẩm Tester có thể có nắp đi kèm hoặc không có nắp. Nước hoa Tester được
                            đựng trong box đơn giản là để giảm giá thành sản phẩm.
                            <br><br>
                            Bạn có thể sẽ tìm thấy dòng chữ Tester hay Testeur (tiếng Pháp) in trên vỏ hộp hoặc thậm chí
                            in trên chai nước hoa. Một số chai còn ghi rõ dòng chữ Not for Sale (không phải sản phẩm để
                            bán) in trên hộp hoặc chính chai nước hoa đó.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Nước hoa Unbox là gì?</strong>
                    </button>
                    <div class="content_faq">
                        <p>Nước hoa Unbox (không hộp) là nước hoa chính hãng, authentic và mới 100%. Đôi khi hộp bên
                            ngoài bị hỏng hoặc bị rách seal ni-lon do quá trình vận chuyển nên được tháo bỏ. Có cùng mùi
                            hương và kiểu dáng giống chai mới full seal.
                            <br><br>
                            Mua nước hoa unbox cũng là một cách để tiết kiệm.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Làm thế nào để kéo dài độ lưu hương
                            của nước hoa khi dùng?</strong></button>
                    <div class="content_faq">
                        <p>Bí quyết để có một mùi hương nước hoa bám lâu hơn trên da đó là "Layering", bằng cách sử dụng
                            các dạng khác nhau của cùng một loại hương thơm như xà bông, dầu tắm, gel, sữa dưỡng thể,
                            kem dưỡng thể hoặc là nước hoa cho tóc cùng với loại nước hoa bạn đang dùng. Ngày nay, nắm
                            bắt được tâm lý của khách hàng, rất nhiều hãng nước hoa cho ra đời các line sản phẩm đa
                            dạng, có thể bán rời hoặc bán kèm, bán theo set, để khách hàng có thể sử dụng được các sản
                            phẩm theo cùng mùi hương mà mình yêu thích, từ đó có thể tăng cường độ bám mùi hương trên cơ
                            thể.
                            <br><br>
                            Một cách phổ biến và dễ sử dụng nhất đó là dùng kem dưỡng thể mùi nước hoa (Body Lotion),
                            kem dưỡng thể giữ được độ ẩm trên da, xịt nước hoa lên phần thoa kem dưỡng thể sẽ khiến nước
                            hoa bám được tốt hơn nhiều lần. Một số cách khác như xịt nước hoa lên quần áo, lên tóc cũng
                            có thể cải thiện phần nào độ lưu hương của nước hoa, tuy nhiên nó không đảm báo được sự
                            chính xác, bởi quần áo có thể chịu nhiều tác động từ bên ngoài, và xịt nước hoa lên tóc có
                            thể khiến tóc bị khô và hư tổn nếu không chăm sóc kỹ.
                        </p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Bảo quản nước hoa như thế nào là
                            đúng cách?</strong></button>
                    <div class="content_faq">
                        <p>Hãy luôn giữ nước hoa của bạn ở nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp và các
                            nguồn tỏa nhiệt. Nhiệt độ quá cao hoặc quá lạnh sẽ làm đảo lộn sự cân bằng tinh tế của các
                            nhóm hương dẫn đến việc thay đổi mùi hương của chúng. Khi nước hoa được mở ra và sử dụng,
                            việc bay hơi của nước hoa tuy ko nhiều nhưng cũng sẽ xuất hiện, do đó, nơi tốt nhất để lưu
                            giữ nước hoa là trong các tủ kệ nơi mát mẻ, ngăn kéo.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Tôi nên xịt nước hoa ở chỗ nào trên
                            cơ thể?</strong></button>
                    <div class="content_faq">
                        <p>Theo một số nghiên cứu, nơi nào da có thân nhiệt ấm áp và nơi có lưu thông các mạch máu tốt
                            là nơi nên dùng nước hoa, bởi nhiệt độ sẽ giúp khuếch tán và phóng đại mùi hương của nước
                            hoa. Bên cạnh đó, các mạch máu tạo ra các xung nhịp trên cơ thể, giúp kích hoạt hoàn hảo cho
                            nước hoa. Một số điểm thích hợp để sử dụng nước hoa như Cổ tay, Khuỷu tay, khuỷu chân, sau
                            tai, dưới cổ họng. Phần sau gáy ngay trên chân tóc là nơi có nhiệt độ và phạm vi tỏa mùi
                            hương rất tốt, nên đó cũng là một vị trí rất tuyệt vời để sử dụng nước hoa.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Tôi có thể sử dụng nươc hoa ở đâu
                            ngoài việc sử dụng trên da của tôi?</strong></button>
                    <div class="content_faq">
                        <p>Bạn có thẻ xịt nhẹ lên tóc ẩm của bạn trước khi bạn sấy khô, tránh việc xịt lên tóc bạn quá
                            nhiều sẽ khiến tóc bị khô và hư tổn, hoặc bạn có thể xịt nhẹ lên lược ướt và chải tóc. Thêm
                            một vài giọt nước hoa vào bàn ủi hơi nước cũng sẽ khiến cho quần áo của bạn thơm hơn. Ngoài
                            ra xịt lên quần áo cũng là một cách để lưu giữ mùi hương được lâu hơn, tuy nhiên với những
                            quần áo trắng, sáng màu, bạn nên hạn chế bởi một số loại nước hoa có thể làm ố màu quần
                            áo.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Làm sao để phân biệt được nước hoa
                            thật và nước hoa giả?</strong></button>
                    <div class="content_faq">
                        <p>Việc những hãng cho ra mắt dòng sản phẩm nước hoa mới phải trải qua rất nhiều thời gian, thử
                            nghiệm trên nhiều phiên bản trước khi được giới thiệu và bán thương mại, do đó những hương
                            thơm nước hoa chính hãng của mỗi dòng thường khác nhau, thể hiện cá tính, thông điệp mà hãng
                            muốn gửi lại, và được sản xuất trên dây chuyền hiện đại với các thành phần cao cấp, đặc
                            trưng. Nhiều sản phẩm giả, fake bày bán trên thị trường chỉ bắt chước được thiết kế, còn về
                            mùi hương thì không thể bắt chước được chính xác, và đa số nước hoa giả thường có các mùi
                            hương chung chung và giống nhau.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Nước hoa bám và toả mùi không tốt là
                            nước hoa giả?</strong></button>
                    <div class="content_faq">
                        <p>Nước hoa bám toả tốt hay không là do các thành phần mùi hương của sản phẩm đó, thường những
                            dòng nước hoa đậm, ngọt thì sẽ có độ lưu hương lâu hơn những dòng nước hoa thanh mát, dịu
                            nhẹ. Việc bám và toả mùi còn phụ thuộc rất nhiều vào người sử dụng, bản thân các thành phần
                            mùi hương ở nước hoa khi lên da sẽ phản ứng với cơ địa, độ ẩm da khác nhau trên cơ thể của
                            mỗi người, bởi vậy cùng 1 dòng nước hoa nhưng sẽ có sự khác biệt về độ bám toả và thậm chí
                            là mùi hương trên mỗi cá thể khác nhau.
                            <br><br>
                            Nước hoa còn bị ảnh hưởng bởi các yếu tố như môi trường người sử dụng (văn phòng, ngoài
                            trời, nơi khô nóng…) hay chế độ ăn uống, sinh hoạt của người sử dụng. Do đó độ bám toả của
                            nước hoa không thể đánh giá được nước hoa đó là thật hay giả, bạn chỉ nên phân biệt nước hoa
                            giả bằng mùi hương của nó.
                        </p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Tôi có thể sử dụng hai loại nước hoa
                            cùng một lúc không?</strong></button>
                    <div class="content_faq">
                        <p>Thường sẽ là không, vì mỗi loại nước hoa là được tạo ra với độ cân bằng và hoàn chỉnh trong
                            mùi hương. Tuy nhiên hiện nay, có một số hãng đã cho ra đời nhiều dòng nước hoa dùng để Mix
                            (dùng chung) với những dòng nước hoa khác để tạo ra những mùi hương độc đáo hơn, táo bạo
                            hơn. Việc mix hai loại nước hoa với nhau nên được tham khảo ý kiến của những người am hiểu
                            về nước hoa, tránh việc mix không đúng sẽ gây cảm giác loạn mùi hương, tạo ra mùi hương
                            không như ý muốn.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Nhiều nơi pha trộn giữa nước hoa giả
                            và thật để bán?</strong></button>
                    <div class="content_faq">
                        <p>Điều này hoàn toàn không có thật, bởi nước hoa được thiết kế với các thành phần mùi hương
                            phức tạp, tinh xảo bởi các chuyên gia nước hoa hàng đầu cùng với các thương hiệu danh tiếng,
                            việc pha trộn nước hoa chính hãng và nước hay với nước hoa giả sẽ khiến mùi hương bị thay
                            đổi, biến dạng, không còn giữ được các mùi hương chính xác.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Hạn sử dụng của nước hoa là bao
                            lâu?</strong>
                    </button>
                    <div class="content_faq">
                        <p>Có rất nhiều bộ sưu tập nước hoa cổ, điều đó củng cố thêm thông tin rằng hạn sử dụng của nước
                            hoa là rất lâu, thậm chí nếu bảo quản đúng cách nó sẽ không hư hỏng. Một số hãng in trên bao
                            bì chai nước hoa hạn sử dụng là 24 đến 36 tháng tính từ thời điểm chai nước hoa đó được sử
                            dụng, đó có thể là một khuyến cáo về thời gian sử dụng tốt nhất của chai nước hoa đó, và
                            cũng có một số hãng được yêu cầu phải ghi hạn sử dụng theo quy định của một số quốc gia đối
                            với các sản phẩm được lưu hành. Do đó việc hạn sử dụng nước hoa là bao lâu tùy thuộc rất lớn
                            vào việc bạn bảo quản nó như thế nào.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Làm thế nào để tôi chọn được loại
                            nước hoa có mùi hương tôi thích?</strong>
                    </button>
                    <div class="content_faq">
                        <p>Bạn có thể thấy rằng không thể có logic nào trong việc lựa chọn nước hoa yêu thích của bạn
                            cả, bởi khứu giác và cảm xúc của bạn là duy nhất, và không hề giống 100% với bất kỳ ai. Mùi
                            hương khiến bạn yêu thích hay phù hợp với bạn sẽ là một, hai thậm chí là ba trong số mười
                            bốn họ nước hoa khác nhau. Để tìm được những điều tốt đẹp và phù hợp với mình, bạn sẽ phải
                            mất một chút nỗ lực để có thể tìm ra loại nước hoa dành cho bạn.
                            <br><br>
                            Bạn có thể đến các cửa hàng nước hoa, nơi trưng bày nhiều mẫu thử đa dạng về mùi hương để
                            trực tiếp thử mùi, hoặc lắng nghe những lời tư vấn, thậm chí đọc những bài đánh giá, review
                            về nước hoa ở một số trang thông tin uy tín để có thể đưa ra quyết định của mình về việc sở
                            hữu mùi hương nào sẽ phù hợp với bạn. Và lưu ý với bạn rằng, nó có thể phù hợp với bạn nhưng
                            lại không hề phù hợp với người khác, hoặc nó phù hợp với tính cách của bạn nhưng bạn cần một
                            thứ nước hoa phù hợp với từng thời điểm, cách ăn mặc và không gian sử dụng của bạn, hãy dành
                            thời gian cho việc tìm kiếm hành trình mùi hương cho chính mình, nó sẽ khiến bạn cảm thấy
                            hạnh phúc khi xuất hiện và hiện hữu trên cơ thể của bạn mỗi ngày.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Tôi nên thử mùi bao nhiêu loại nước
                            hoa cùng một lúc?</strong>
                    </button>
                    <div class="content_faq">
                        <p>Cái đó tùy thuộc vào nhu cầu và sự cảm nhận của bạn, thông thường thì khứu giác sẽ hoạt động
                            tốt nhất khi bạn thử từ 3 đến 4 loại nước hoa cho một thời gian ngắn. Khi bạn thử quá nhiều
                            mùi hương, khứu giác của bạn sẽ bị đánh lừa, khiến cảm xúc của bạn lúc đó bị nhầm lẫn giữa
                            các mùi hương.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Cách chính xác nhất để thử một mùi
                            hương là gì?</strong>
                    </button>
                    <div class="content_faq">
                        <p>Xịt lên da của bạn, đợi một lát, hãy để cho nước hoa có thời gian trên da của bạn, cảm nhận
                            các note hương "thì thầm" và "nói chuyện" cùng cảm xúc của chính bạn.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Tôi nên thử mùi hương như thế nào
                            nếu tôi không muốn thử nó trên da?</strong>
                    </button>
                    <div class="content_faq">
                        <p>Bạn có thể thử nó trên giấy thử mùi, nó không thể chính xác như thử trên da của bạn nhưng nó
                            là điều tốt nhất nên làm nếu bạn không muốn thử lên da của mình.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Tôi có thể chọn một mùi hương bằng
                            cách ngửi một chai nước hoa đã mở không?</strong>
                    </button>
                    <div class="content_faq">
                        <p>Điều đó hoàn toàn không chính xác, bởi hương thơm trên chai đã lắng xuống, và khi bạn ngửi,
                            đó chính là tầng hương cuối cùng, nó khiến bạn bị sai lệch trong cách cảm nhận mùi hương.
                            Một hương thơm có thể cảm nhận được trọn vẹn nhất khi lên da của bạn, bởi sự phản ứng với
                            hơi ấm của của cơ thể sẽ là câu trả lời chính xác nhất dành cho bạn.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Tôi có thể phân biệt được bao nhiêu
                            mùi hương khác nhau?</strong>
                    </button>
                    <div class="content_faq">
                        <p>Tùy thuộc vào khưu giá cá nhân của bạn, nhưng thường giao động trong khoảng 5.000 đến 10.000
                            mùi hương.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Tại sao chúng ta mặc và cảm thấy yêu
                            các mùi hương, hương thơm của nước hoa?</strong>
                    </button>
                    <div class="content_faq">
                        <p>Bởi vì hương thơm giúp cho chúng ta cảm thấy tốt về bản thân mình và những người xung
                            quanh. Các thử nghiệm tâm lý gần đây cho thấy những người sử dụng nước hoa thường xuyên có
                            thái độ tích cực hơn đối với việc giao tiếp xã hội và có thể có kỹ năng xã hội hơn những
                            người ít khi hoặc không bao giờ dùng nước hoa. Những người sử dụng nước hoa thường được đánh
                            giá là tự tin hơn trong cách tiếp cận những mối quan hệ mới.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Tại sao tôi thích một số nước hoa
                            nhưng bạn tôi lại không hề thích nó?</strong>
                    </button>
                    <div class="content_faq">
                        <p>Bởi vì tất cả chúng ta đều được lập trình để thích một số mùi nhất định và người khác cũng
                            vậy, dẫn đến việc mùi này có thể khiến bạn thích nhưng họ thì không. Phản ứng của mỗi người
                            về các mùi hương, nhóm hương, theo các nhà khoa học thì một phần là do môi trường gia đình,
                            không gian sinh hoạt hoặc di truyền. Chúng ta được sinh ra với những cảm xúc tách biệt về
                            một số thứ thích hoặc không thích, cũng như rất nhạy cảm với một số mùi hương nhất định.</p>
                    </div>

                    <button class="collapsible_faq"><strong style="font-size: 17px">Tại sao nước hoa mang lại những kỷ
                            niệm và cảm xúc của quá khứ?</strong>
                    </button>
                    <div class="content_faq">
                        <p>Bởi vì mùi hương kích hoạt bộ nhớ liên kết của các cụm sự kiện và cảm xúc. Bộ nhớ lưu lại các
                            mùi hương khiến con người ấn tượng nhưng rất khó để có thể giải thích. Cách để có thể giải
                            thích mùi hương đó như nào ở con người chính là việc khi họ tiếp xúc với những mùi hương, họ
                            thường so sánh rằng nó có mùi giống như... mùi hương này như là.....
                            <br><br>
                            Đó là những từ ngữ mang tính so sánh tương đối và không có một định nghĩa chính xác. Mùi
                            hương thường tác động rất mạnh đến bộ nhớ, kèm với đó là các sự kiện, khi bạn gặp một mùi
                            hương nào đó quen thuộc, bộ nhớ sẽ kích hoạt, khiến những hình ảnh, cảm xúc cũ được tái hiện
                            lại, đó cũng là lý do nước hoa thường khiến con người cảm thấy rất nhiều cảm xúc và kỷ niệm.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg_white">
            <div class="text-center">
                <span class="section-header__text">Tại sao wanderlust?</span>
            </div>
            <div class="col-md-4 text-center">
                <div class="image rounded">
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path
                                d="M13.5938 33.5156C14.2406 33.5156 14.7656 32.9906 14.7656 32.3438C14.7656 31.6969 14.2406 31.1719 13.5938 31.1719C12.9469 31.1719 12.4219 31.6969 12.4219 32.3438C12.4219 32.9906 12.9469 33.5156 13.5938 33.5156Z"
                                fill="black"></path>
                            <path
                                d="M53.4375 10.5469C53.4375 9.8996 52.9124 9.375 52.2656 9.375H38.2031C37.5558 9.375 37.0312 9.8996 37.0312 10.5469C37.0312 11.1937 37.5558 11.7183 38.2031 11.7183H52.2656C52.9124 11.7183 53.4375 11.1937 53.4375 10.5469Z"
                                fill="black"></path>
                            <path
                                d="M12.4219 24.6927V27.6562C12.4219 28.3035 12.9465 28.8281 13.5938 28.8281C14.241 28.8281 14.7656 28.3035 14.7656 27.6562V25.177L17.6779 22.2656H35.2908L38.2031 25.177V48.8855L35.2908 51.7969H17.6779L14.7656 48.8855V37.0312C14.7656 36.384 14.241 35.8594 13.5938 35.8594C12.9465 35.8594 12.4219 36.384 12.4219 37.0312V49.3712C12.4219 49.682 12.5455 49.98 12.7652 50.1997L16.3641 53.7978C16.5839 54.0175 16.8819 54.1406 17.1927 54.1406H35.7761C36.0869 54.1406 36.3849 54.0175 36.6046 53.7978L40.2036 50.1997C40.4233 49.98 40.5469 49.682 40.5469 49.3712V24.6918C40.5469 24.3805 40.4233 24.0825 40.2036 23.8628L36.6046 20.2652C36.3849 20.0455 36.0869 19.9219 35.7761 19.9219H17.1927C16.8819 19.9219 16.5839 20.0455 16.3641 20.2652L12.7652 23.8628C12.5455 24.0825 12.4219 24.3819 12.4219 24.6927Z"
                                fill="black"></path>
                            <path
                                d="M30 2.34375H22.9688C22.3215 2.34375 21.7969 2.86835 21.7969 3.51562V9.375H19.4531C18.8058 9.375 18.2812 9.8996 18.2812 10.5469V14.062H14.7656C14.4548 14.062 14.1568 14.1856 13.9371 14.4054L6.90582 21.4366C6.6861 21.6563 6.5625 21.9543 6.5625 22.2652V51.7964C6.5625 52.1072 6.6861 52.4052 6.90582 52.625L13.9371 59.6562C14.1568 59.8759 14.4548 59.9995 14.7656 59.9995H38.2031C38.5139 59.9995 38.812 59.8759 39.0317 59.6562L46.0629 52.625C46.2827 52.4052 46.4062 52.1072 46.4062 51.7964V22.2652C46.4062 21.9543 46.2827 21.6563 46.0629 21.4366L39.0317 14.4054C38.812 14.1856 38.5139 14.062 38.2031 14.062H34.6875V10.5469C34.6875 9.8996 34.1624 9.375 33.5156 9.375H31.1719V3.51562C31.1719 2.86835 30.6468 2.34375 30 2.34375ZM24.1406 4.6875H28.8281V9.375H24.1406V4.6875ZM37.7174 16.4058L44.0625 22.7509V51.3112L37.7174 57.6558H15.2509L8.90625 51.3112V22.7509L15.2509 16.4058H37.7174ZM32.3438 11.7183V14.062H20.625V11.7183H32.3438Z"
                                fill="black"></path>
                            <path
                                d="M23.8586 39.6321L25.4311 44.3498C25.5908 44.8282 26.0385 45.1509 26.543 45.1509C27.0474 45.1509 27.4951 44.8282 27.6549 44.3498L29.2273 39.6321L33.9445 38.0597C34.4234 37.9004 34.7461 37.4522 34.7461 36.9482C34.7461 36.4438 34.4234 35.9961 33.9445 35.8363L29.2273 34.2639L27.6549 29.5462C27.4951 29.0678 27.0474 28.7451 26.543 28.7451C26.0385 28.7451 25.5908 29.0678 25.4311 29.5462L23.8586 34.2639L19.1409 35.8363C18.6626 35.9956 18.3398 36.4438 18.3398 36.9482C18.3398 37.4522 18.6626 37.9004 19.1409 38.0597L23.8586 39.6321ZM25.1555 36.3019C25.5057 36.1852 25.7803 35.9109 25.8971 35.5608L26.543 33.6226L27.1889 35.5608C27.3056 35.9105 27.5803 36.1852 27.93 36.3019L29.8682 36.9482L27.93 37.5941C27.5803 37.7109 27.3056 37.9851 27.1889 38.3353L26.543 40.2734L25.8971 38.3353C25.7803 37.9855 25.5057 37.7109 25.1555 37.5941L23.2173 36.9482L25.1555 36.3019Z"
                                fill="black"></path>
                            <path
                                d="M53.3771 0.801548C53.1724 0.187687 52.5087 -0.144192 51.8948 0.0604285L37.8323 4.74793C37.2184 4.95255 36.8866 5.61631 37.0912 6.23017C37.2958 6.84403 37.9596 7.17591 38.5734 6.97129L52.6359 2.28379C53.2498 2.07917 53.5817 1.41587 53.3771 0.801548Z"
                                fill="black"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="60" height="60" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="text-desc">
					<span class="font-weight-bold">
						Chai nước hoa mà bạn muốn? <br>
						Chúng tôi có
					</span>
                    <span class="text-normal">
						Hơn 100.000 sản phẩm có sẵn <br>
						300.000 đơn hàng đã ship từ 2014
					</span>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="image rounded">
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path
                                d="M30.0005 18.8948C35.2098 18.8948 39.4479 14.6567 39.4479 9.44732C39.4479 4.23804 35.2098 0 30.0005 0C24.7913 0 20.5532 4.23804 20.5532 9.44732C20.5532 14.6567 24.7913 18.8948 30.0005 18.8948ZM30.0005 1.91489C34.1539 1.91489 37.533 5.29391 37.533 9.44732C37.533 13.6007 34.1539 16.9799 30.0005 16.9799C25.8471 16.9799 22.4681 13.6007 22.4681 9.44732C22.4681 5.29391 25.8471 1.91489 30.0005 1.91489Z"
                                fill="black"></path>
                            <path
                                d="M29.9998 22.7245C37.6354 22.7245 43.9048 28.6849 44.3989 36.1975H22.2713C21.7426 36.1975 21.3139 36.6261 21.3139 37.155C21.3139 37.6839 21.7426 38.1124 22.2713 38.1124H45.3879C45.9167 38.1124 46.3454 37.6839 46.3454 37.155C46.3454 28.1421 39.0128 20.8096 29.9998 20.8096C20.9868 20.8096 13.6543 28.1421 13.6543 37.155C13.6543 37.6839 14.083 38.1124 14.6117 38.1124H18.4415C18.9703 38.1124 19.399 37.6839 19.399 37.155C19.399 36.6261 18.9703 36.1975 18.4415 36.1975H15.6006C16.0949 28.6849 22.3644 22.7245 29.9998 22.7245Z"
                                fill="black"></path>
                            <path
                                d="M17.9246 48.2179L12.6723 47.3364L10.2109 42.6136C10.0459 42.2971 9.71876 42.0986 9.36182 42.0986C9.00489 42.0986 8.67769 42.2971 8.51276 42.6136L6.05135 47.3364L0.799055 48.2179C0.447098 48.277 0.157183 48.5268 0.046885 48.8662C-0.0634129 49.2056 0.0242892 49.5782 0.274247 49.8328L4.00535 53.6332L3.22063 58.9008C3.16803 59.2539 3.31612 59.6067 3.60489 59.8165C3.8934 60.0264 4.27497 60.058 4.59437 59.899L9.36169 57.5249L14.129 59.899C14.2641 59.9661 14.4102 59.9993 14.5557 59.9993C14.7544 59.9993 14.9519 59.9375 15.1185 59.8164C15.4073 59.6066 15.5554 59.2538 15.5028 58.9007L14.718 53.6331L18.4491 49.8326C18.6991 49.5781 18.7868 49.2054 18.6765 48.8661C18.5665 48.5268 18.2765 48.277 17.9246 48.2179ZM13.0177 52.6319C12.8075 52.8462 12.7097 53.1467 12.754 53.4437L13.3383 57.3658L9.78872 55.5981C9.51999 55.4642 9.20391 55.4642 8.93506 55.5981L5.38535 57.3658L5.96965 53.4437C6.01395 53.1467 5.91629 52.846 5.70591 52.6319L2.92778 49.8022L6.8385 49.1458C7.13467 49.096 7.39038 48.9103 7.52914 48.644L9.36182 45.1275L11.1945 48.644C11.3333 48.9103 11.589 49.096 11.8851 49.1458L15.7959 49.8022L13.0177 52.6319Z"
                                fill="black"></path>
                            <path
                                d="M38.5628 48.2179L33.3105 47.3364L30.8491 42.6136C30.6841 42.2971 30.3569 42.0986 30 42.0986C29.6431 42.0986 29.3159 42.2971 29.1509 42.6136L26.6895 47.3364L21.4372 48.2179C21.0853 48.277 20.7954 48.5268 20.6851 48.8662C20.5748 49.2056 20.6625 49.5782 20.9124 49.8328L24.6435 53.6332L23.8589 58.9008C23.8063 59.2539 23.9544 59.6067 24.2432 59.8165C24.5317 60.0264 24.9133 60.058 25.2327 59.899L30 57.5249L34.7673 59.899C34.9024 59.9661 35.0485 59.9993 35.194 59.9993C35.3927 59.9993 35.5902 59.9375 35.7568 59.8164C36.0456 59.6066 36.1937 59.2538 36.1411 58.9007L35.3565 53.6331L39.0876 49.8326C39.3375 49.5781 39.4252 49.2054 39.3149 48.8661C39.2046 48.5268 38.9147 48.277 38.5628 48.2179ZM33.6559 52.6319C33.4457 52.8462 33.3479 53.1467 33.3922 53.4437L33.9763 57.3658L30.4268 55.5981C30.2923 55.5312 30.1462 55.4978 30 55.4978C29.8538 55.4978 29.7075 55.5312 29.5732 55.5981L26.0237 57.3658L26.6078 53.4437C26.6521 53.1467 26.5545 52.846 26.3441 52.6319L23.566 49.8022L27.4767 49.1458C27.7728 49.096 28.0286 48.9103 28.1673 48.644L30 45.1276L31.8327 48.6441C31.9714 48.9104 32.2271 49.0962 32.5233 49.1459L36.434 49.8024L33.6559 52.6319Z"
                                fill="black"></path>
                            <path
                                d="M59.9531 48.8662C59.8428 48.5268 59.5531 48.277 59.201 48.2179L53.9487 47.3364L51.4873 42.6136C51.3223 42.2971 50.9951 42.0986 50.6382 42.0986C50.2813 42.0986 49.9541 42.2971 49.7891 42.6136L47.3277 47.3364L42.0754 48.2179C41.7235 48.277 41.4335 48.5268 41.3233 48.8662C41.213 49.2056 41.3007 49.5782 41.5506 49.8328L45.2817 53.6332L44.497 58.9008C44.4444 59.2539 44.5925 59.6067 44.8813 59.8165C45.1698 60.0264 45.5513 60.058 45.8707 59.899L50.6381 57.5249L55.4054 59.899C55.5405 59.9661 55.6866 59.9993 55.832 59.9993C56.0308 59.9993 56.2283 59.9375 56.3949 59.8164C56.6836 59.6066 56.8317 59.2538 56.7791 58.9007L55.9944 53.6331L59.7255 49.8326C59.9757 49.5782 60.0634 49.2056 59.9531 48.8662ZM54.2942 52.6319C54.084 52.8462 53.9862 53.1467 54.0305 53.4437L54.6148 57.3658L51.0651 55.5981C50.9307 55.5312 50.7845 55.4978 50.6383 55.4978C50.492 55.4978 50.3459 55.5312 50.2116 55.5981L46.662 57.3658L47.2463 53.4437C47.2906 53.1467 47.1929 52.846 46.9825 52.6319L44.2044 49.8022L48.1151 49.1458C48.4113 49.096 48.667 48.9103 48.8058 48.644L50.6384 45.1275L52.4711 48.644C52.6099 48.9103 52.8656 49.096 53.1618 49.1458L57.0725 49.8022L54.2942 52.6319Z"
                                fill="black"></path>
                            <path
                                d="M29.9999 13.789C31.255 13.789 32.449 13.2437 33.2757 12.2927C33.6225 11.8937 33.5804 11.2889 33.1813 10.942C32.7822 10.595 32.1774 10.6372 31.8306 11.0363C31.3678 11.5688 30.7004 11.8741 29.9999 11.8741C29.2995 11.8741 28.6322 11.5688 28.1693 11.0363C27.8223 10.6372 27.2176 10.5951 26.8185 10.942C26.4195 11.2889 26.3772 11.8937 26.7242 12.2927C27.5509 13.2435 28.7449 13.789 29.9999 13.789Z"
                                fill="black"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="60" height="60" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="text-desc">
					<span class="font-weight-bold">
						Hơn 10.000+ reviews
					</span>
                    <span class="text-normal">
						Bạn biết là bạn có thể tin chúng tôi
					</span>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="image rounded">
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path
                                d="M59.3925 12.9771L36.0246 0.145516C35.6735 -0.0472031 35.2478 -0.0472031 34.8967 0.145516L26.0889 4.98179C25.903 5.03077 25.7295 5.12416 25.5858 5.25828L11.5292 12.9771C11.1543 13.1826 10.9213 13.5763 10.9213 14.0043V29.5234C8.55009 30.265 6.37708 31.5728 4.57029 33.3801C-0.139186 38.0891 -1.3399 45.2714 1.58246 51.2521C1.86628 51.8335 2.56803 52.0747 3.14939 51.7904C3.73121 51.5062 3.97199 50.8044 3.68818 50.223C1.20527 45.1414 2.22562 39.039 6.22739 35.0372C8.72999 32.5346 12.057 31.1563 15.596 31.1563C19.135 31.1563 22.462 32.5346 24.9646 35.0372C27.4667 37.5393 28.845 40.8664 28.845 44.4053C28.845 47.9443 27.4667 51.2713 24.9641 53.7739C20.9624 57.7757 14.8599 58.7961 9.77827 56.3131C9.19691 56.0289 8.49516 56.2701 8.21134 56.8515C7.92707 57.4333 8.16786 58.135 8.74967 58.4189C10.9282 59.4836 13.2655 60.0009 15.5859 60.0009C19.6339 60.0004 23.6279 58.4248 26.6217 55.431C27.9945 54.0582 29.0794 52.4743 29.8471 50.7527L34.8967 53.5254C35.0725 53.6219 35.2666 53.67 35.4607 53.67C35.6547 53.67 35.8493 53.6219 36.0246 53.5254L59.3925 40.6942C59.7675 40.4882 60.0005 40.0946 60.0005 39.667V31.5229C60.0005 30.8757 59.4759 30.3511 58.8286 30.3511C58.1813 30.3511 57.6567 30.8757 57.6567 31.5229V38.9735L36.6362 50.516V27.5271L43.5736 23.7176V29.7564C43.5736 30.1712 43.7924 30.5548 44.149 30.7653C44.333 30.8738 44.539 30.9283 44.7455 30.9283C44.9396 30.9283 45.1341 30.8802 45.3104 30.7832L50.3178 28.027C50.6923 27.821 50.9244 27.4278 50.9244 27.0007V19.681L57.6567 15.9846V22.1484C57.6567 22.7957 58.1813 23.3203 58.8286 23.3203C59.4759 23.3203 60.0005 22.7957 60.0005 22.1484V14.0043C60.0005 13.5768 59.7675 13.1826 59.3925 12.9771ZM35.4607 2.50941L56.3937 14.0043L49.7905 17.6303L28.8574 6.13536L35.4607 2.50941ZM35.4607 25.4988L14.5276 14.0043L21.373 10.2452L42.3065 21.7396L35.4607 25.4988ZM44.7409 20.4029L23.8078 8.90849L26.4226 7.47248L47.3561 18.9669L44.7409 20.4029ZM26.6217 33.3801C23.6764 30.4348 19.7607 28.813 15.596 28.813C14.8082 28.813 14.03 28.8711 13.2651 28.9851V15.9846L34.2929 27.5312V50.5201L30.6431 48.516C31.0025 47.1931 31.1883 45.8134 31.1883 44.4053C31.1883 40.2406 29.5665 36.3249 26.6217 33.3801ZM48.5811 26.3081L45.9174 27.7743V22.4308L48.5811 20.9683V26.3081Z"
                                fill="black"></path>
                            <path
                                d="M58.8281 25.6572C58.5201 25.6572 58.2175 25.7827 57.9996 26.0005C57.7817 26.2184 57.6562 26.5206 57.6562 26.8291C57.6562 27.1372 57.7817 27.4393 57.9996 27.6572C58.2175 27.8756 58.5201 28.0005 58.8281 28.0005C59.1362 28.0005 59.4388 27.8756 59.6567 27.6572C59.8746 27.4393 60 27.1372 60 26.8291C60 26.5206 59.8746 26.2184 59.6567 26.0005C59.4388 25.7827 59.1362 25.6572 58.8281 25.6572Z"
                                fill="black"></path>
                            <path
                                d="M11.6552 45.5768C11.955 45.5768 12.2553 45.4624 12.4837 45.2339C12.9415 44.7762 12.9415 44.0341 12.4837 43.5764L11.6721 42.7643H18.5981C20.2781 42.7643 21.645 44.1312 21.645 45.8112C21.645 47.4912 20.2781 48.8581 18.5981 48.8581H14.4942C13.8469 48.8581 13.3224 49.3826 13.3224 50.0299C13.3224 50.6767 13.8469 51.2013 14.4942 51.2013H18.5981C21.5703 51.2013 23.9887 48.7834 23.9887 45.8112C23.9887 42.8389 21.5703 40.421 18.5981 40.421H11.6721L12.4837 39.6089C12.9415 39.1512 12.9415 38.4091 12.4837 37.9514C12.0264 37.4941 11.2844 37.4941 10.8266 37.9514L8.01412 40.7639C7.55682 41.2216 7.55682 41.9637 8.01412 42.4214L10.8266 45.2335C11.0555 45.4624 11.3553 45.5768 11.6552 45.5768Z"
                                fill="black"></path>
                            <path
                                d="M5.39941 55.7745C5.06616 55.7745 4.7352 55.6326 4.50403 55.3575L4.50174 55.3547C4.08517 54.8594 4.14926 54.1206 4.64456 53.704C5.13986 53.287 5.87915 53.3511 6.29571 53.8464C6.71182 54.3421 6.64911 55.0824 6.15381 55.4989C5.93362 55.6839 5.66583 55.7745 5.39941 55.7745Z"
                                fill="black"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="60" height="60" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="text-desc">
					<span class="font-weight-bold">
						Ship toàn quốc <br>Giao hàng Nội thành Hà Nội 3H
					</span>
                    <span class="text-normal">
						Bạn đổi ý? Không sao cả. Miễn phí trả hàng
					</span>
                </div>
            </div>
        </div>
        <!--/extra_footer-->
    </main>
@endsection
