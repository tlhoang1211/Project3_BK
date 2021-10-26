<?php

use App\Brand;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Brand::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            Brand::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }

//        Brand::truncate();

        $brands = array(
            array(
                'brand_name' => 'Christian Dior',
                'brand_thumbnail' => 'perfume_project/brand/valentino_a2lkk2',
                'brand_description' => 'Nhà thiết kế thời trang Christian Dior sinh ra ở Pháp và vươn tầm, trở thành một trong những tên tuổi lớn trong làng thời trang thế giới với việc tạo ra những chiếc váy "New Look" làm nổi bật hình dáng nữ tính, những đường cong quyến rũ của phụ nữ. Nền tảng thời trang của Dior bao gồm làm việc cùng hoặc là đối thủ của những huyền thoại thời trang (và nước hoa) nổi tiếng của thế kỷ XX. Ông tham gia vào công việc kinh doanh thời trang cùng với Robert Piguet, sau đó làm việc cùng Lucien Lelong cùng một nhà mốt tiếng tăm khác, Pierre Balmain. Dior đã giới thiệu "Diện mạo mới" vào năm 1947, nó thể hiện sự khác biệt hoàn toàn với phong cách đơn giản, cổ điển vốn được ưa chuộng trong suốt thế chiến thứ II và có ảnh hưởng lớn trong thời trang của phụ nữ, cũng như giúp tái lập thành phố Paris trở thành một kinh đô thời trang của thế giới. Nhà Dior đã phát hành nước hoa để phù hợp với thời trang và những chiến lược trong triết lý thiết kế thời trang của họ, và công ty Parfums Dior cùng dòng nước hoa đầu tiên của hãng đã ra đời vào năm 1947 với tên gọi: Miss Dior, được đặt theo tên của chị gái nhà thiết kế Catherine. Christian Dior qua đời vào năm 1957, để lại một nền tảng vững chắc với những tài năng cùng triết lý thời trang đẳng cấp, biến thương hiệu Christian Dior trở thành một trong những thương hiệu thời trang, nước hoa cao cấp hàng đầu trên thế giới.',
                'status' => 1,
                'slug' => 'christian_dior',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'brand_name' => 'Chanel',
                'brand_thumbnail' => 'perfume_project/brand/chanel_rlntgr.jpg',
                'brand_description' => 'Chanel là nhà mốt được thành lập vào năm 1910 bởi Gabrielle Chanel (hay còn được gọi là "Coco", một biệt danh được bạn bè thân thiết thường gọi). Chanel đã tạo ra một cuộc cách mạng mang tính lịch sử trong thế giới thời trang với triết lý thời trang đơn giản, thanh lịch nhưng tinh tế và có sức hấp dẫn vượt thời gian. Cô là một trong những nhà thiết kế đầu tiên giới thiệu mẫu quần cho phụ nữ, được công nhận rộng tãi là người tạo ra món đồ thời trang mà không cô nàng nào có thể thiếu được, "chiếc váy đen nhỏ". Bà Chanel duy trì, kiểm soát đội ngũ sáng tạo của công ty cho đến khi bà qua đời vào năm 1971. karl Lagerfeld nắm quyền lãnh đạo thiết kế vào năm 1983. Chanel đã tạo ra một cuộc cách mạng tương tự trong thế giới nước hoa với mùi hương đầu tiên vớiChanel No 5 mang tính biểu tượng, được giới thiệu lần đầu tiên vào năm 1921. Loại nước hoa này tiếp tục là một sản phẩm bán chạy nhất trên toàn thế giới, duy trì sự hấp dẫn đương đại với những cách thức quảng cáo sáng tạo cùng những gương mặt nổi tiếng. Chanel No 5 và nhiều loại nước hoa lâu đời nhất của nhà Chanel được tạo ra bởi chuyên gia nước hoa Ernest Beaux. Từ năm 1978, chuyên gia nước hoa đảm nhiệm chính trong gia đình Chanel là Jaccques Polge cùng một số tên tuổi lớn như Olivier Polge, Henri Robert...',
                'status' => 1,
                'slug' => 'chanel',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'brand_name' => 'Creed',
                'brand_thumbnail' => 'perfume_project/brand/creed_qfdy9r.jpg',
                'brand_description' => 'CREED là công ty đến từ Pháp, có trụ sở tại Paris, được điều hành bởi Olivier CREED, đời thứ 6 trong dòng họ CREED và là người chịu trách nhiệm sáng tạo, cảm hứng về mùi hương của CREED ngày này. Con trai của ông, Erwin, 30 tuổi là thế hệ thứ 7, người sẽ kế cận việc hoạt động tương lai của công ty này. CREED là công ty về nước hoa xa xỉ, cao cấp bậc nhất, và là công ty nước hoa tư nhân duy nhất trên thế giới, được thành lập vào năm 1760 và được truyền từ các thế hệ cha con trong dòng tộc CREED kể từ ngày thành lập. Công ty đã phục vụ nước hoa và các sản phẩm mùi hương cho các hoàng gia và giới thượng lưu, tinh hoa trong suốt hơn 251 năm qua. CREED được thành lập tại London vào năm 1760 bởi James Henry CREED, năm 1781, CREED đã tạo ra mùi hương Royal English Leather cho Vua George III. CREED chuyển đến Paris vào năm 1854 theo yêu cầu của khách hàng, đó là Hoàng Hậu Eugenie của Pháp, người được CREED tạo ra Jasmin Imperatrice Eugenie, một loại nước hoa danh tiếng vẫn còn được cung cấp cho đến ngày nay. Năm 1885, Nữ Hoàng Victoria đã chỉ định CREED là nhà cung cấp nước hoa cho hoàng gia Anh, vì sự uy tín và danh tiếng của mình, CREED đã tạo ra một mùi hương sáng tạo bậc nhất thời điểm đó, Fleurs de Bulgarie bằng hoa hồng. Mùi hương này gây được tiếng vang lớn và được cung cấp và bán cho đến ngày này. Trong thế kỷ 20, không chỉ hoàng gia bao gồm Công tước và Nữ Công tước xứ Windsor chọn CREED, mà cả các chính trị gia hàng đầu cũng trở thành khách hàng trung thành của CREED. Ngài Winston Churchill đã mặc mùi hương Tabarome của CREED. Ở Mỹ, Nghị sỹ trẻ và Tổng thống John F.Kennedy đã mặc Vetiver của CREED. Vào cuối thế ký 20, đầu thế kỷ 21, bậc thầy về nước hoa, và là thế hệ kế cận thứ 6 với khả năng sáng tạo xuất chúng, Olivier CREED đã tạo ra những "Báu vật" quý giá cho nhà CREED, với những mùi hương kinh điển như: Green Irish Tweed, Millesime Imperial, Silver Mountain Water, Spring Flower, Himalaya và Original Vetiver. Năm 2010, CREED kỷ niệm 250 năm thành lập công ty bằng cách mở một cửa hàng duy nhất tại Mỹ, số 794 Madison Avenue tại Manhattan cùng với việc tạo ra vị Vua huyền thoại "AVENTUS", được ví như vị vua của nước hoa.',
                'status' => 1,
                'slug' => 'creed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'brand_name' => 'Giorgio Armani',
                'brand_thumbnail' => 'perfume_project/brand/giorgio_armani_vgm7us.jpg',
                'brand_description' => 'Giorgio Armani là một nhà thiết kế thời trang người Ý nổi tiếng với những bộ y phục nam giới. Ban đầu, Armani là nhà thiết kế trong một cửa hàng bách hóa kinh doanh cửa sổ. Từ năm 1960 đến năm 1972, ông làm thiết kế cho hãng thời trang danh tiếng Nino Cerutti. Sau đó, ông làm việc như một nhà thiết kế độc lập cho một số hãng thời trang trước khi thành lập thương hiệu của riêng mình. Giorgio Armani hợp tác với hãng mỹ phẩm L’Oreal để cho ra đời dòng nước hoa dành cho phụ nữ đầu tiên của thương hiệu mang tên Armani năm 1982. Tiếp sau đó là dòng nước hoa dành cho nam giới Armani năm 1984. Hai dòng nước hoa này là bước tiến khởi đầu cho những thành công to lớn của thương hiệu nước hoa Giorgio Armani sau này. Hãng nước hoa Giorgio Armani hiện tại có hơn 113 loại nước hoa, những dòng nước hoa đầu tiên ra  mắt năm 1982 và những dòng nước hoa mới nhất được tung ra thị trường từ năm 2015. Giorgio Armani  hợp tác cùng những chuyên gia nước hoa  Alberto Morillas, Loc Dong, Anne Flipo, Dominique Ropion, Annick Menardo…',
                'status' => 1,
                'slug' => 'giorgio_armani',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'brand_name' => 'Hermes',
                'brand_thumbnail' => 'perfume_project/brand/hermes_icdwsk.jpg',
                'brand_description' => 'Hermes là thương hiệu nổi tiếng với những sản phẩm cao cấp ở Pháp được thành lập bởi Thierry Hermes năm 1937. Ban đầu, thương hiệu Hermes tập trung kinh doanh sản phẩm về phụ kiện cưỡi ngựa. Sau đó, công ty phát triển và mở rộng kinh doanh sang túi xách da, khăn quàng cổ, phụ kiện, thời trang và nước hoa. Dòng nước hoa đầu tiên của Hermès mang tên Eau d’Hermès được ra mắt năm 1951. Eau d’Hermès được tạo ra bởi Edmond Roudnitska – một trong những nhà sáng chế nước hoa lừng danh vĩ đại nhất của thế giới. Hiện tại hãng nước hoa Hermes có hơn 83 loại nước hoa, những dòng nước hoa đầu tiên ra mắt năm 1951 và những dòng nước hoa mới nhất được tung ra thị trường từ năm 2015. Hermes hợp tác cùng những chuyên gia nước hoa Maurice Maurin, Francois Maurin, Jean-Louis Sieuzac, Guy Robert, Fabrice Pellegrin, Jean Guichard, Jean-Claude Ellena, Edmond Roudnitska, Francoise Caron, Olivia Giacobetti, Akiko Kamei, Gilles Romey, Maurice Roucel, Bernard Bourjois, Ralf Schwieger và Nathalie Feisthauer.',
                'status' => 1,
                'slug' => 'hermes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'brand_name' => 'Valentino',
                'brand_thumbnail' => 'perfume_project/brand/valentino_a2lkk2.jpg',
                'brand_description' => 'Valentino là thương hiệu thời trang được thành lập bởi nhà thiết kế thời trang người Ý nổi tiếng Valentino Garavani. Nước hoa mang thương hiệu Valentino cũng đã được giới thiệu trong một vài năm. Lần đầu tiên là hợp tác với hãng Procter and Gamble và vào năm 2010 hợp tác cùng hãng Puig. Hãng nước hoa Valentino hiện có khoảng 24 loại nước hoa, dòng nước hoa đầu tiên ra mắt năm 1978 và những dòng nước hoa mới nhất được tung ra thị trường vào năm 2015. Hãng Valentino hợp tác cùng những chuyên gia nước hoa Ilias Ermenidis, Francoise Caron, Alberto Morillas, Givaudan, Antoine Lie, Cecile Matton, Olivier Polge, IFF, Edouard Flechier, Daniela (Roche) Andrier, Harry Fremont, Olivier Cresp, Daphne Bugey, Fabrice Pellegrin, Oliver Cresp and Hamid Merati-Kashani. Thật dễ dàng khi chỉ với một hương nước hoa đã có thể khiến ai đó vấn vương, ấn tượng và làm bản thân chỉnh chu hơn trong mắt mọi người. Một ngày mới cũng sẽ hạnh phúc, tràn đầy năng lượng khi có sự đồng hành của mùi hương nước hoa.',
                'status' => 1,
                'slug' => 'valentino',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'brand_name' => 'Gucci',
                'brand_thumbnail' => 'perfume_project/brand/gucci_vfw6hf.jpg',
                'brand_description' => 'Gucci-Thương hiệu nước hoa cao cấp, làm nức lòng giới điệu mộ trên toàn thế giới, với trên 49 mùi hương mang tính di sản. Được ra mắt vào năm 1974 với mẫu nước hoa cao cấp đầu tiên dành cho nữ mang tên Gucci No.1, được sáng tạo bởi bậc thầy nước hoa người Pháp-Guy Robert. Tiếp theo sau đó là một loạt các hương nước hoa gắn liền với bản sắc và tinh thần của giám đốc sáng tạo Tom Ford. Gucci Fragrance đồng hành cùng người dùng trên con đường tới với tự tin, hạnh phúc của chính mình. Thật dễ dàng khi chỉ với một hương nước hoa đã có thể khiến ai đó vấn vương, ấn tượng và làm bản thân chỉnh chu hơn trong mắt mọi người. Một ngày mới cũng sẽ hạnh phúc, tràn đầy năng lượng khi có sự đồng hành của mùi hương nước hoa.',
                'status' => 1,
                'slug' => 'gucci',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'brand_name' => 'Le Labo',
                'brand_thumbnail' => 'perfume_project/brand/le_labo_uncyg5.jpg',
                'brand_description' => 'Le Labo được thành lập bởi Fabrice Penot và Edouard Roschi vào năm 2006 và đã giới thiệu thêm 10 loại nước hoa. Con số trong tên nước hoa thể hiện số lượng thành phần và tên nguyên liệu (cỏ hương bài, hoa nhài, nhựa thơm labdanum) nổi bật của dòng nước hoa. Nước hoa Le Labo khác biệt với những mùi hương bạn chưa từng ngửi thấy ở bất kỳ đâu. Do đó mà sớm tại nên tiếng vang kể từ ngày ra mắt. Trong đó phải nói đến Santal 33-chai nước hoa có mặt hầu hết mặt trận thủ phủ thời trang danh giá. Hiện Le Labo mới chỉ có mặt tại chưa đến 10 quốc gia trên thế giới nhưng mỗi cửa hàng đều được thiết kế như một phòng lab, nơi các mùi hương được pha chế ngay trước mắt khách hàng thay vì được sản xuất đại trà. Hãng nước hoa Le Labo hiện có khoảng 49 loại nước hoa, dòng nước hoa đầu tiên ra mắt năm 2006 và những dòng nước hoa mới nhất được tung ra thị trường từ năm 2014. Hãng đã hợp tác cùng những chuyên gia nước hoa Yann Vasnier, Frank Voelkl, Daphne Bugey, Francoise Caron, Barnabe Fillion, Maurice Roucel, Annick Menardo, Alberto Morillas, Mark Buxton và Vincent Schaller.',
                'status' => 1,
                'slug' => 'le_labo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'brand_name' => 'Narciso Rodriguez',
                'brand_thumbnail' => 'perfume_project/brand/narciso_rodriguez_xj5uec.jpg',
                'brand_description' => 'Narciso Rodriguez III là nhà thiết kế thời trang người Mỹ gốc Cuba. Ông sinh ra tại New Jersey và theo học ngôi trường danh tiếng về lĩnh vực thời trang – Parsons School of Design. Đầu tiên, ông làm việc tự do cho một số công ty ở New York. Ông có thời gian ngắn là nhân viên tại Anne Klein (giám đốc lúc bấy giờ là Donna Karan) và Calvin Klein. Narciso Rodriguez đã hợp tác cùng thương hiệu Beaute Prestige International của tập đoàn Shiseido để cho ra đời dòng nước hoa đầu tiên của mình mang tên For Her vào năm 2003. Thương hiệu nước hoa dành cho nam For Him được ra mắt vào năm 2007. Hiện tại hãng Narciso Rodriguez có hơn 26 loại nước hoa, dòng nước hoa đầu tiên ra mắt năm 2003 và những dòng nước hoa mới nhất được tung ra thị trường từ năm 2015. Hãng Narciso Rodriguez hợp tác cùng những chuyên gia nước hoa Alberto Morillas, Christine Nagel, Francis Kurkdjian and Aurelien Guichard. Thật dễ dàng khi chỉ với một hương nước hoa đã có thể khiến ai đó vấn vương, ấn tượng và làm bản thân chỉnh chu hơn trong mắt mọi người. Một ngày mới cũng sẽ hạnh phúc, tràn đầy năng lượng khi có sự đồng hành của mùi hương nước hoa.',
                'status' => 1,
                'slug' => 'narciso_rodriguez',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),array(
                'brand_name' => 'Yves Saint Laurent',
                'brand_thumbnail' => 'perfume_project/brand/yves_saint_laurent_obfexv.jpg',
                'brand_description' => 'Yves Saint Laurent là nhà mốt của Pháp được thành lập bởi Yves Henri Donat Mathieu Saint Laurent, và thường được biết dưới tên viết tắt YSL. Sự nghiệp thời trang của laurent bắt đầu từ năm 17 tuổi, khi anh làm trợ lý cho Christian Dior. 4 năm sau khi Dior qua đời, Laurent được coi là người đứng đầu ngôi nhà của Dior khi mới 21 tuổi. Năm 1960, khi chiến tranh giành độc lập ở Algeria nổ ra, Laurent bị yêu cầu gia nhập quân đội và mất vị trí tại Dior. Tuyệt vọng vì mất vị trí thiết kế của mình dẫn đến việc ông phải nhập viện, sau một thời gian ngắn hồi phục, laurent bắt đầu công ty thời trang của riêng mình và tiếp tục trở thành một trong những nhà thiết kế thời trang có ảnh hưởng nhất trong thập niên 1960 và1970. Nước hoa đầu tiên của thương hiệu YSL là Y for Women, được ra mắt vào năm 1964, tiếp tục sự thành công về mảng nước hoa, YSL cho ra đời các dòng nước hoa Rive Gauche (1970), Opium (1977), Kourous (1981) và Paris (1983) và nhanh chóng trở thành những dòng nước hoa kinh điển.',
                'status' => 1,
                'slug' => 'yves_saint_laurent',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'brand_name' => 'Yves Saint Laurent',
                'brand_thumbnail' => 'perfume_project/brand/yves_saint_laurent_obfexv.jpg',
                'brand_description' => 'Yves Saint Laurent là nhà mốt của Pháp được thành lập bởi Yves Henri Donat Mathieu Saint Laurent, và thường được biết dưới tên viết tắt YSL. Sự nghiệp thời trang của laurent bắt đầu từ năm 17 tuổi, khi anh làm trợ lý cho Christian Dior. 4 năm sau khi Dior qua đời, Laurent được coi là người đứng đầu ngôi nhà của Dior khi mới 21 tuổi. Năm 1960, khi chiến tranh giành độc lập ở Algeria nổ ra, Laurent bị yêu cầu gia nhập quân đội và mất vị trí tại Dior. Tuyệt vọng vì mất vị trí thiết kế của mình dẫn đến việc ông phải nhập viện, sau một thời gian ngắn hồi phục, laurent bắt đầu công ty thời trang của riêng mình và tiếp tục trở thành một trong những nhà thiết kế thời trang có ảnh hưởng nhất trong thập niên 1960 và1970. Nước hoa đầu tiên của thương hiệu YSL là Y for Women, được ra mắt vào năm 1964, tiếp tục sự thành công về mảng nước hoa, YSL cho ra đời các dòng nước hoa Rive Gauche (1970), Opium (1977), Kourous (1981) và Paris (1983) và nhanh chóng trở thành những dòng nước hoa kinh điển.',
                'status' => 1,
                'slug' => 'yves_saint_laurent',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        );

        Brand::insert($brands);
    }
}

