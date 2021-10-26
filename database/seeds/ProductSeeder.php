<?php

use App\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Product::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            Product::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }
        $products = [
            [
                'name' => 'SAUVAGE',
                'slug' => 'sauvage_edt',
                'sex' => 'Nam',
                'brand_id' => '1', //Christian Dior
                'concentration' => 'Eau de Toilette',
                'volume' => '10ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2015',
                'inventor_name' => 'Francois Demachy',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Xuân, Hạ, Thu',
                'style' => 'Hấp dẫn, Tươi mát, Nam tính, Tinh tế',
                'price' => '3500000',
                'description' => 'Hương Đầu: Tiêu, Cam Bergamot Calabria<br>
Hương giữa: Hoa phong lữ, Hoa Oải Hương, Xuyên tiêu, Dấu trám, Hồng tiêu, Cỏ hương bài, Cây hoắc hương<br>
Hương cuối: Gỗ tuyết tùng, Hương Labdanum, Hương Ambroxan<br>
<br>Yêu hay ghét, thì với rất nhiều người, Dior Sauvage vẫn luôn được công nhận là một chai nước hoa kinh điển của thế kỷ 21. Nếu bạn so sánh về mức độ phủ sóng của Sauvage và nhìn về năm phát hành của nó, cuối "năm 2015" thì bạn chắc chắn sẽ rất ngạc nhiên về sự nổi tiếng nhanh đến đáng sợ của gã đàn ông lắm tài nhiều tật này. Mọi người hay so sánh sự nổi tiếng giữa Sauvage của nhà Dior và Bleu de Chanel của nhà Chanel, xem thử ai là kẻ mạnh hơn, nhưng chung quy lại thì là kẻ 8 lạng người hơn nửa cân. Được đánh giá là đậm chất đàn ông,  Dior Sauvage mang trong mình mùi hương của sự phong lưu, mạnh mẽ và sát gái. Như chính người đại diện cho chai nước hoa này vậy, Johnny Depp, kẻ cướp biển được yêu quý nhất mọi thời đại. Vốn dĩ  Dior Sauvage là vậy, có tật, Bad boy nhưng ai cũng yêu quý và phục tùng. Francois Demachy, người sáng tạo ra  Dior Sauvage đã khéo léo pha trộn giữa Cam Bergamot và hương Ambroxan, tạo nên một khoảng màu xanh tươi mát của bầu trời, cùng sự mạnh mẽ và ấm nồng của tiêu đen và Gỗ tuyết tùng,  Dior Sauvage trở nên lôi cuốn không có điểm dừng. Kết thúc một buổi gặp gỡ với những câu chuyện cười thông minh hòa lẫn không khí sang trọng, lãng mạn của hoa Lavender, mọi ánh mắt sẽ chỉ hướng về gã  Dior Sauvage này mà thôi.',
                'thumbnail' => 'perfume_project/perfume/dior_sauvage_EDT_1_hhqwbq,perfume_project/perfume/dior_sauvage_EDT_2_mfakfp,perfume_project/perfume/dior_sauvage_EDT_3_bq9q2r,perfume_project/perfume/dior_sauvage_EDT_4_szikum,perfume_project/perfume/dior_sauvage_EDT_5_v0l7d4,perfume_project/perfume/dior_sauvage_EDT_6_dvax7d',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'SAUVAGE',
                'slug' => 'sauvage_p',
                'sex' => 'Nam',
                'brand_id' => '1', //Christian Dior
                'concentration' => 'Parfume',
                'volume' => '100ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2019',
                'inventor_name' => 'Francois Demachy',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Xa - Toả hương trong vòng bán kính 2 mét',
                'recommended_time' => 'Ngày, Đêm, Xuân, Thu, Đông',
                'style' => 'Lịch lãm, Nam tính, Lôi cuốn',
                'price' => '3600000',
                'description' => 'Hương Đầu: Cam Bergamot, Cam Mandarin, Nhựa cây Elemi<br>
Hương giữa: Gỗ đàn hương từ Sri Lanka<br>
Hương cuối: Đậu Tonka, Nhũ Hương, Hương Va ni (Vanille)<br>
<br>Dior sauvage Parfum là phiên bản mới nhất trong bộ sưu tập nước hoa của nhà Dior trong dòng Sauvage, tiếp nối sự thành công của các phiên bản Sauvage EDT và Sauvage EDP. Một phiên bản mới được thiết kế đậm đà hơn nhưng vẫn giữ nguyên các ADN cốt lõi làm nên thương hiệu “Lady Killer” đình đám của Dior Sauvage. Chuyên gia Francois Demachy đã phát hành phiên bản Sauvage Parfume vào năm 2019, được lấy cảm hứng từ vùng thảo nguyên, thời điểm ánh trăng lên cao cùng bầu trời tối đen le lói ánh sáng của lửa trại.',
                'thumbnail' => 'perfume_project/perfume/dior_sauvage_P_1_mdaf2x,perfume_project/perfume/dior_sauvage_P_2_nsa3sf,perfume_project/perfume/dior_sauvage_P_3_ufnnld,perfume_project/perfume/dior_sauvage_P_4_fmkrne,perfume_project/perfume/dior_sauvage_P_5_roty0b,perfume_project/perfume/dior_sauvage_P_6_kuaovq',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'SAUVAGE',
                'slug' => 'sauvage_edp',
                'sex' => 'Nam',
                'brand_id' => '1', //Christian Dior
                'concentration' => 'Eau de Parfume',
                'volume' => '100ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2018',
                'inventor_name' => 'Francois Demachy',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Xuân, Hạ, Thu, Đông',
                'style' => 'Hấp dẫn, Tươi mát, Nam tính, Tinh tế',
                'price' => '3000000',
                'description' => 'Hương Đầu: Cam Bergamot<br>
Hương giữa: Hoa Oải Hương, Xuyên tiêu, Hồi hương, Nhục đậu khấu<br>
Hương cuối: Hương Ambroxan, Hương Va ni<br>
<br>Nước hoa nam Sauvage Eau de Parfum phù hợp với người trên 25 tuổi.Đây là dòng nước hoa Christian Dior này có độ lưu hương lâu - 7 giờ đến 12 giờ. và độ tỏa hương thuộc dạng gần - toả hương trong vòng một cánh tay. Perfumista.vn khuyến cáo Sauvage Eau de Parfum phù hợp để sử dụng trong bất cứ thời gian nào. Đây là dòng nước hoa Christian Dior thuộc nhóm Oriental Fougere (Hương dương xỉ phương đông). Bên cạnh đó, Hương Ambroxan và Xuyên tiêu là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'thumbnail' => 'perfume_project/perfume/dior_sauvage_EDP_1_uectru,perfume_project/perfume/dior_sauvage_EDP_2_xr8xsj,perfume_project/perfume/dior_sauvage_EDP_3_iri2ai,perfume_project/perfume/dior_sauvage_EDP_4_fgwbqk,perfume_project/perfume/dior_sauvage_EDP_5_sgn5oh,perfume_project/perfume/dior_sauvage_EDP_6_qgqpwh',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'ACQUA DI GIO',
                'slug' => 'acqua_di_gio_edt',
                'sex' => 'Nam',
                'brand_id' => '4', //Giorgio Armani
                'concentration' => 'Eau de Toilette',
                'volume' => '100ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '1996',
                'inventor_name' => 'Alberto Morillas',
                'incense_level' => 'Tạm ổn - 3 giờ đến 6 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Hạ',
                'style' => 'Nam tính, Tươi mát',
                'price' => '2100000',
                'description' => 'Hương Đầu: Quả cam, Quả chanh xanh, Quả quýt hồng, Hoa nhài, Cam Bergamot, Quả chanh vàng, Hoa cam Neroli<br>
Hương giữa: Hoa anh thảo, Nhục đậu khấu, Cây mộng tê (Mignonette), Ngò thơm, Hoa tím, Hoa lan Nam Phi, Hương nước biển, Quả đào, Hoa lan dạ hương (Hiacynth), Hoa hồng, Hoa nhài, Cây hương thảo, Hương Calone<br>
Hương cuối: Hổ phách, Cây hoắc hương, Rêu sồi, Gỗ tuyết tùng, Xạ hương trắng<br>
<br>Hương thơm này được chế tạo ra vào năm 1996 bởi Alberto Morillas. Lấy cảm hứng từ vẻ đẹp của Pantellerie, nơi ông đã trải qua kỳ nghỉ của mình, Armani tạo ra mùi thơm của Aqua di Gio cho cả nam giới lẫn nữ giới. Hương thơm dành cho nam giới là một mùi hương của sự tự do, đầy gió và nước. Hỗn hợp mùi hương này được hình thành từ sự hòa hợp hoàn hảo giữa mùi hương ngòn ngọt mằn mặn của nước biển và ánh nắng ấm áp mơn trớn trên làn da của bạn. Aqua di Gio đầy ánh nắng mặt trời Địa Trung Hải nóng như thiêu đốt.',
                'thumbnail' => 'perfume_project/perfume/acqua_di_gio_EDT_1_ztficq,perfume_project/perfume/acqua_di_gio_EDT_2_tcez4o,perfume_project/perfume/acqua_di_gio_EDT_3_wbz1tx,perfume_project/perfume/acqua_di_gio_EDT_4_jbvojc,perfume_project/perfume/acqua_di_gio_EDT_5_huqczl,perfume_project/perfume/acqua_di_gio_EDT_6_iavz0c',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'TERRE D`HERMES',
                'slug' => 'terre_d_hermes_edp',
                'sex' => 'Nam',
                'brand_id' => '5', //Hermes
                'concentration' => 'Eau de Parfum',
                'volume' => '75ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2009',
                'inventor_name' => 'Jean-Claude Ellena',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Xuân, Hạ, Thu, Đông',
                'style' => 'Phóng khoáng, Năng động, Cá tính',
                'price' => '2600000',
                'description' => 'Hương Đầu: Quả cam, Quả bưởi<br>
Hương giữa: Hương của gỗ, Rêu cây sồi, An tức hương, Flint<br>
Hương cuối: Hương của gỗ, Rêu cây sồi, An tức hương<br>
<br>Terre d’Hermes Parfum là dòng nước hoa của Hermes dành cho nam giới , được cho ra mắt vào năm 2009 và nó được xếp loại là hương gỗ Chypre. Cha đẻ của dòng nước hoa này là Jean-Claude Ellena. Đằng sau dòng nước hoa này là một câu chuyện thần thoại của thời kỳ cổ đại và thiên nhiên – Nó kể một câu chuyện về sự chuyển đổi, đơm hoa kết trải của trái đất thông qua mùi hương dễ chịu và ngây ngất.',
                'thumbnail' => 'perfume_project/perfume/terre_d_hermes_EDP_1_ko5rci,perfume_project/perfume/terre_d_hermes_EDP_2_yn33qs,perfume_project/perfume/terre_d_hermes_EDP_3_cfdfcq,perfume_project/perfume/terre_d_hermes_EDP_4_bnyxn8,perfume_project/perfume/terre_d_hermes_EDP_5_brdvaa,v1596216899/perfume_project/perfume/terre_d_hermes_EDP_6_qg36p5',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'VALENTINO UOMO INTENSE',
                'slug' => 'valentino_uomo_intense_edp',
                'sex' => 'Nam',
                'brand_id' => '6', //Valentino
                'concentration' => 'Eau de Parfum',
                'volume' => '100ml',
                'origin_id' => '1', //Italy
                'recommended_age' => 'Trên 25',
                'released_year' => '2016',
                'inventor_name' => '-',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Xa - Toả hương trong vòng bán kính 2 mét',
                'recommended_time' => 'Ngày, Đêm, Thu, Đông',
                'style' => 'Sang trọng , Lịch lãm, Hấp dẫn',
                'price' => '2100000',
                'description' => 'Hương Đầu: Quả quýt hồng, Cây đơn sâm<br>
Hương giữa: Hoa diên vĩ, Đậu Tonka<br>
Hương cuối: Da thuộc, Hương Va ni<br>
<br>Nước hoa nam Valentino Uomo Intense phù hợp với người trên 25 tuổi. Đây là dòng nước hoa Valentino này có độ lưu hương lâu - 7 giờ đến 12 giờ. và độ tỏa hương thuộc dạng xa - toả hương trong vòng bán kính 2 mét. Perfumista.vn khuyến cáo Valentino Uomo Intense phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa thu, đông. Đây là dòng nước hoa Valentino thuộc nhóm Leather (Hương da thuộc). Valentino Uomo Intense được cho ra mắt vào năm 2016. Bên cạnh đó, Hoa diên vĩ và Hương Va ni là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'thumbnail' => 'perfume_project/perfume/valentino_uomo_intense_EDP_1_mokupq,valentino_uomo_intense_EDP_2_proprv,valentino_uomo_intense_EDP_3_unulum,valentino_uomo_intense_EDP_4_edxdk3,valentino_uomo_intense_EDP_5_hqugt2,valentino_uomo_intense_EDP_6_zvysly',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'ALLURE HOMME SPORT EAU EXTREME',
                'slug' => 'allure_homme_sport_eau_extreme_edp',
                'sex' => 'Nam',
                'brand_id' => '2', //Chanel
                'concentration' => 'Eau de Parfume',
                'volume' => '100ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2012',
                'inventor_name' => 'Jacques Polge',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Xa - Toả hương trong vòng bán kính 2 mét',
                'recommended_time' => 'Ngày, Đêm, Xuân, Hạ, Thu',
                'style' => 'Hiện đại, Nam tính, Mạnh mẽ',
                'price' => '3250000',
                'description' => 'Hương Đầu: Cây xô thơm, Quả quýt hồng, Cây bạc hà, Cây bách<br>
Hương giữa: Tiêu<br>
Hương cuối: Xạ hương, Gỗ đàn hương, Gỗ tuyết tùng, Đậu tonka<br>
<br>Lấy cảm hứng từ những kỳ tích thể thao, người phá chế nước hoa của Chanel, Jacques Polge đã cho ra đời chai nước hoa Allure Homme Sport Eau Extreme,một phiên bản mới của Allure Homme Sport. Mẫu nước hoa nay được ra mắt vào năm 2012.Tổ hợp nước hoa này là sự hòa quyện tuyệt vời của quýt và đậu tonka, tạo nên một mùi hương lâu dài và làm hài lòng bất cứ ai sử dụng. Nước hoa tỏa hương đủ mạnh vào mùa đông, nhưng vẫn nhẹ nhàng vào những mùa xuân/hè.',
                'thumbnail' => 'perfume_project/perfume/allure_homme_sport_eau_extreme_EDP_1_zrfwsf,perfume_project/perfume/allure_homme_sport_eau_extreme_EDP_2_rpp195,perfume_project/perfume/allure_homme_sport_eau_extreme_EDP_3_es3rd0,perfume_project/perfume/allure_homme_sport_eau_extreme_EDP_4_rcjm1b,v1596216877/perfume_project/perfume/allure_homme_sport_eau_extreme_EDP_5_xjngr6,perfume_project/perfume/allure_homme_sport_eau_extreme_EDP_6_t30qf7',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'GUCCI BY GUCCI POUR HOMME',
                'slug' => 'gucci_by_gucci_pour_homme_edt',
                'sex' => 'Nam',
                'brand_id' => '7', //Gucci
                'concentration' => 'Eau de Toilette',
                'volume' => '90ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2008',
                'inventor_name' => 'Aurelien Guichard',
                'incense_level' => 'Tạm ổn - 3 giờ đến 6 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Xuân, Thu, Đông',
                'style' => 'Nam tính, Quyến rũ, Lịch lãm',
                'price' => '2250000',
                'description' => 'Hương Đầu: Cam Bergamot, Cây bách, Hoa tím<br>
Hương giữa: Cây thuốc lá, Hoa nhài<br>
Hương cuối: Cây hoắc hương, Trầm hương, Hổ phách, Hương nhựa cây Elemi, Da thuộc<br>
<br>Phiên bản dành cho nam với tên gọi Gucci by Gucci Pour Homme được sáng tạo bởi giám đốc sáng tạo của hãng Gucci là Frida Giannini, với sự hợp tác của Givaudan và P&G vào năm 2008. Hương nước hoa được biết đến như một hương gỗ Chypre hiện đại và bao gồm những hương như hoa tím và cây bách ở lớp đầu, lớp giữa gồm có hương của thuốc lá và hoa nhài, lớp nền bao gồm sự hiện diện của hoắc hương, hổ phách và dấu trám.',
                'thumbnail' => 'perfume_project/perfume/gucci_by_gucci_pour_homme_EDT_1_ivvrqf,perfume_project/perfume/gucci_by_gucci_pour_homme_EDT_2_pn75s7,perfume_project/perfume/gucci_by_gucci_pour_homme_EDT_3_zwoeol,perfume_project/perfume/gucci_by_gucci_pour_homme_EDT_4_h2c6ap,perfume_project/perfume/gucci_by_gucci_pour_homme_EDT_5_jglby0,perfume_project/perfume/gucci_by_gucci_pour_homme_EDT_6_lbvgas',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'AVENTUS',
                'slug' => 'aventus_edp',
                'sex' => 'Nam',
                'brand_id' => '3', //Creed
                'concentration' => 'Eau de Parfum',
                'volume' => '100ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2010',
                'inventor_name' => 'Aurelien Guichard',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Xuân, Hạ, Thu',
                'style' => 'Chững chạc, Giản dị',
                'price' => '7200000',
                'description' => 'Hương Đầu: Cam Bergamot, Quả lý chua đen, Quả dứa (quả thơm), Quả táo xanh<br>
Hương giữa: Gỗ Bu-lô, Cây hoắc hương, Hoa hồng, Hoa nhài Morocco<br>
Hương cuối: Xạ hương, Rêu cây sồi, Hương Va ni (Vanille), Long diên hương<br>
<br>Aventus được lấy cảm hứng từ cuộc đời đầy kịch tính của Hoàng Đế Napoleon (chiến tranh, hòa bình, lãng mạn). Aventus là dòng nước hoa dành cho nam giới được giới thiệu vào năm 2010. Nó thuộc nhóm hương trái cây Chypre. Người sáng tạo ra dòng nước hoa này là Erwin Creed 7th, Olivier Creed 6th Generation.',
                'thumbnail' => 'perfume_project/perfume/creed_aventus_EDP_1_djxmuq,perfume_project/perfume/creed_aventus_EDP_2_syiehy,perfume_project/perfume/creed_aventus_EDP_3_ntoqrh,perfume_project/perfume/creed_aventus_EDP_4_q4voia,perfume_project/perfume/creed_aventus_EDP_5_ggr5ow,perfume_project/perfume/creed_aventus_EDP_6_trfx3w',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'ANOTHER 13',
                'slug' => 'another_13_edp',
                'sex' => 'Phi giới tính',
                'brand_id' => '8', //Le Labo
                'concentration' => 'Eau de Parfum',
                'volume' => '100ml',
                'origin_id' => '3', //American
                'recommended_age' => 'Trên 25',
                'released_year' => '2010',
                'inventor_name' => 'Nathalie Lorson',
                'incense_level' => 'Rất lâu - Trên 12 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Xuân, Hạ, Thu, Đông',
                'style' => 'Sang trọng, Tinh tế, Nổi bật',
                'price' => '6500000',
                'description' => 'Hương chính: Hương Iso E Super, Hương Amyl Salicylate, Xạ hương, Long diên hương, Cây vông vang, Quả lê<br>
<br>Nước hoa unisex Another 13 phù hợp với người trên 25 tuổi. Đây là dòng nước hoa Le Labo này có độ lưu hương rất lâu - trên 12 giờ, và độ tỏa hương thuộc dạng gần - toả hương trong vòng một cánh tay. Perfumista.vn khuyến cáo Another 13 phù hợp để sử dụng trong bất cứ thời gian nào. Đây là dòng nước hoa Le Labo thuộc nhóm Oriental Woody (Hương gỗ phương đông). Bên cạnh đó, Hương Iso E Super và Hương Amyl Salicylate là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'thumbnail' => 'perfume_project/perfume/another_13_EDP_1_txhnte,perfume_project/perfume/another_13_EDP_2_j6yahr,perfume_project/perfume/another_13_EDP_3_vapqka,perfume_project/perfume/another_13_EDP_4_zcj6h1,perfume_project/perfume/another_13_EDP_5_pjyxwu,perfume_project/perfume/another_13_EDP_6_vw74fu',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'SANTAL 33',
                'slug' => 'santal_33_edp',
                'sex' => 'Phi giới tính',
                'brand_id' => '8', //Le Labo
                'concentration' => 'Eau de Parfum',
                'volume' => '100ml',
                'origin_id' => '3', //American
                'recommended_age' => 'Trên 25',
                'released_year' => '2011',
                'inventor_name' => 'Frank Voelkl',
                'incense_level' => 'Rất lâu - Trên 12 giờ',
                'aroma_level' => 'Xa - Toả hương trong vòng bán kính 2 mét',
                'recommended_time' => 'Ngày, Đêm, Xuân, Thu',
                'style' => 'Độc đáo , Bí ẩn , Quyến rũ',
                'price' => '6500000',
                'description' => 'Hương chính: Gỗ đàn hương, Gỗ tuyết tùng Virginia, Bạch đậu khấu, Hoa tím, Giấy cói, Da thuộc, Hổ phách, Hoa diên vĩ<br>
<br>Nước hoa Santal 33 của thương hiệu Le Labo là nước hoa thuộc dòng hương gỗ thơm dành cho cả nam lẫn nữ và đã được giới thiệu vào năm 2011. Người đã thiết kế nên mùi hương nước hoa này chính là Frank Voelkl. Lấy cảm hứng từ Santal 26, một trong những loại nền thơm mà ít người biết đến, một mùi hương thích hợp cho cả nam và nữ. Santal 33 nhắm đến việc truyền tải lại huyền thoại của những chàng cao bồi: Những vùng đất bao la, những cơn gió sa mạc nóng bức, những chiếc yên ngựa phơi nắng, và khói tỏa ra từ những bếp lửa về đêm.',
                'thumbnail' => 'perfume_project/perfume/santal_33_EDP_1_uy7xtb,perfume_project/perfume/santal_33_EDP_2_mlw8qb,perfume_project/perfume/santal_33_EDP_3_l45uov,perfume_project/perfume/santal_33_EDP_4_cqzwjx,perfume_project/perfume/santal_33_EDP_5_x5vk9i,perfume_project/perfume/santal_33_EDP_6_pmxnwb',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'VIRGIN ISLAND WATER',
                'slug' => 'virgin_island_water_edp',
                'sex' => 'Phi giới tính',
                'brand_id' => '3', //Creed
                'concentration' => 'Eau de Parfum',
                'volume' => '100ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2007',
                'inventor_name' => 'Olivier Creed Sixth Generation',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Hạ',
                'style' => 'Tươi mát , Sảng khoái , Hấp dẫn',
                'price' => '5900000',
                'description' => 'Hương Đầu: Quả chanh xanh, Quả dừa, Quả quýt hồng Sicili, Cam Bergamot trắng<br>
Hương giữa: Gừng, Hoa nhài Ấn Độ, Hoa dâm bụt, Hoa ngọc lan tây<br>
Hương cuối: Xạ hương, Đường, Rượu Rum trắng<br>
<br>Virgin Island Water được lấy cảm hứng từ một chuyến đi thuyền gần đảo Ginger ở Caribbean. Đây là một hòn đảo đẹp có những bãi cát trắng và thiên nhiên hoang sơ. Quần đảo này đã tạo cảm hứng cho Olivier Creed Đệ Lục và con trai của ông là Erwin Creed Đệ Thất sáng tạo ra sản phẩm nước hoa Virgin Island Water (unisex) vào năm 2007. Mùi hương này nhằm ca ngợi mùi hương nhiệt đới tuyệt hảo và kỳ ảo được cơn gió của kênh đào Sir Francis Drake mang lại.',
                'thumbnail' => 'perfume_project/perfume/virgin_island_water_edp_1_nkk0ph,perfume_project/perfume/virgin_island_water_edp_2_xbitxo,perfume_project/perfume/virgin_island_water_edp_3_ubvzu5,perfume_project/perfume/virgin_island_water_edp_4_o9o5iv,perfume_project/perfume/virgin_island_water_edp_5_vgfg0i,perfume_project/perfume/virgin_island_water_edp_6_zxq22m',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'CHANEL NO 5',
                'slug' => 'chanel_no_5_edp',
                'sex' => 'Nữ',
                'brand_id' => '2', //Chanel
                'concentration' => 'Eau de Parfum',
                'volume' => '50ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '1921',
                'inventor_name' => 'Ernest Beaux',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Thu, Đông',
                'style' => 'Cổ điển , Sang trọng , Quyến rũ',
                'price' => '2850000',
                'description' => 'Hương Đầu: Hương An-đê-hít, Hoa cam Neroli, Quả chanh vàng, Cam Bergamot, Hoa ngọc lan tây<br>
Hương giữa: Hoa nhài, Hoa diên vĩ, Rễ cây diên vĩ, Hoa hồng, Hoa linh lan thung lũng<br>
Hương cuối: Cỏ hương bài, Xạ hương, Gỗ đàn hương, Cây hoắc hương, Rêu sồi Moss, Hổ phách, Hương Va ni, Hương cầy<br>
<br>Huyền thoại Chanel No 5 được tinh chế bởi chuyên gia nước hoa Ernest Beaux vào năm 1921 cho nhãn hiệu Coco Chanel và được giới thiệu lần đầu tiên với ba nồng độ: Parfum, Eau de Toilette và Eau de Cologne. Phiên bản có nồng độ parfum được ra mắt với phiên bản chai 7.5ml. Các nồng độ có hương thơm không mấy khác biệt.',
                'thumbnail' => 'perfume_project/perfume/chanel_no5_EDP_1_oa6gil,perfume_project/perfume/chanel_no5_EDP_2_pthq9x,perfume_project/perfume/chanel_no5_EDP_3_cxibbx,perfume_project/perfume/chanel_no5_EDP_4_y65flw,perfume_project/perfume/chanel_no5_EDP_5_jpvvg2,perfume_project/perfume/chanel_no5_EDP_6_qvuslr',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'NARCISO RODRIGUEZ FOR HER',
                'slug' => 'narciso_rodriguez_for_her_edp',
                'sex' => 'Nữ',
                'brand_id' => '9', //Narciso Rodriguez
                'concentration' => 'Eau de Parfum',
                'volume' => '100ml',
                'origin_id' => '3', //American
                'recommended_age' => 'Trên 25',
                'released_year' => '2006',
                'inventor_name' => 'Francis Kurkdjian',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Xuân, Thu, Đông',
                'style' => 'Gợi cảm , Nữ tính , Tính tế',
                'price' => '2450000',
                'description' => 'Hương Đầu: Hoa hồng, Quả đào<br>
Hương giữa: Xạ hương, Hổ phách<br>
Hương cuối: Gỗ đàn hương, Cây hoắc hương<br>
<br>Sau phiên bản EDT ra mắt vào năm 2004, phiên bản Narciso Rodriguez for Her Narciso Rodriguez for Her Eau de Parfum được tiếp tục giới thiệu vào năm 2006 với mẫu thiết kế chai màu hồng và vỏ hộp màu đen. Christine Nagel và Francis Kurkdjian là những chuyên gia nước hoa danh tiếng đã sáng tạo ra mùi hương này. Narciso Rodriguez for Her Eau de Parfum mang đến mùi hương đầy quyến rũ và tràn ngập nữ tính khi kết hợp với những cánh hoa hồng rực rỡ, hương thơm đào tươi mát, xen lẫn với chút hổ phách tinh tế và đặc biệt là một mùi xạ hương gợi cảm đầy nổi bật.',
                'thumbnail' => 'perfume_project/perfume/narciso_rodriguez_EDP_1_myjdrm,perfume_project/perfume/narciso_rodriguez_EDP_2_bztohv,perfume_project/perfume/narciso_rodriguez_EDP_3_z377y7,perfume_project/perfume/narciso_rodriguez_EDP_4_tbjse3,perfume_project/perfume/narciso_rodriguez_EDP_5_olbaw9,perfume_project/perfume/narciso_rodriguez_EDP_6_imeod0',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'MISS DIOR BLOOMING BOUQUET',
                'slug' => 'miss_dior_blooming_bouquet_edt',
                'sex' => 'Nữ',
                'brand_id' => '1', //Christian Dior
                'concentration' => 'Eau de Toilette',
                'volume' => '50ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2014',
                'inventor_name' => 'Francois Demachy',
                'incense_level' => 'Rất kém - Dưới 1 giờ',
                'aroma_level' => 'Rất gần - Thoang thoảng trên làn da',
                'recommended_time' => 'Ngày, Đêm, Xuân, Hạ',
                'style' => 'Nữ tính , Dịu dàng , Yêu đời',
                'price' => '2000000',
                'description' => 'Hương Đầu: Quả quýt hồng Sicili<br>
Hương giữa: Hoa mẫu đơn hồng, Hoa hồng Đan Mạch, Quả mơ, Quả đào<br>
Hương cuối: Xạ hương trắng<br>
<br>Phiên bản mới của Dior Miss chính là Dior Blooming Bouquet được ra mắt vào đầu năm 2014; Nó mang trong mình hỗn hợp mùi hương hoa cỏ tươm tất và thanh lịch tựa như những ngày tuyệt đẹp đầu xuân. Chuyên gia nước hoa chế tạo ra loại nước hoa này là Francois Demachy. Tác giả của Miss Dior Blooming Bouquet đã tạo ra một loại nước hoa có hương thơm mang đến sự nổi bật tột cùng trong sự tinh tế tráng lệ.',
                'thumbnail' => 'perfume_project/perfume/miss_dior_blooming_bouquet_edt_1_yejfdg,perfume_project/perfume/miss_dior_blooming_bouquet_edt_2_fwvf6u,perfume_project/perfume/miss_dior_blooming_bouquet_edt_3_sm4wtm,perfume_project/perfume/miss_dior_blooming_bouquet_edt_4_gynxsx,perfume_project/perfume/miss_dior_blooming_bouquet_edt_5_yltzpi,perfume_project/perfume/miss_dior_blooming_bouquet_edt_6_phksm1',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'GUCCI BLOOM',
                'slug' => 'gucci_bloom_edp',
                'sex' => 'Nữ',
                'brand_id' => '7', //Gucci
                'concentration' => 'Eau de Parfum',
                'volume' => '100ml',
                'origin_id' => '1', //Italy
                'recommended_age' => 'Trên 25',
                'released_year' => '2017',
                'inventor_name' => 'Alberto Morillas',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Rất gần - Thoang thoảng trên làn da',
                'recommended_time' => 'Ngày, Đêm, Xuân, Thu, Đông',
                'style' => 'Quyến rũ, Sang trọng, Quý phái',
                'price' => '2300000',
                'description' => 'Hương chính: Hoa nhài Sambac, Hoa huệ trắng, Rễ cây diên vĩ<br>
<br>Đây là dòng nước hoa Gucci thuộc nhóm Floral (Hương hoa cỏ). Gucci Bloom được cho ra mắt vào năm 2017. Alberto Morillas chính là nhà pha chế ra loại nước hoa này. Bên cạnh đó, Hoa huệ trắng và Rễ cây diên vĩ là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'thumbnail' => 'perfume_project/perfume/gucci_bloom_1_webtpd,perfume_project/perfume/gucci_bloom_2_wus0qp,perfume_project/perfume/gucci_bloom_3_gnn1je,perfume_project/perfume/gucci_bloom_4_tut8ji,perfume_project/perfume/gucci_bloom_5_rz0c3o,perfume_project/perfume/gucci_bloom_6_dmpyg0',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'MON PARIS COUTURE',
                'slug' => 'mon_paris_couture_edp',
                'sex' => 'Nữ',
                'brand_id' => '10', //Ysl
                'concentration' => 'Eau de Parfum',
                'volume' => '90ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2017',
                'inventor_name' => 'Olivier Cresp, Harry Fremont and Dora Baghriche',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Xuân, Hạ',
                'style' => 'Quyến rũ, Thanh lịch, Sang trọng',
                'price' => '2450000',
                'description' => 'Hương Đầu: Cam Bergamot, Quả mâm xôi, Quả vải, Quả bưởi, Quả quýt hồng<br>
Hương giữa: Hoa cà dược, Hoa mẫu đơn, Hoa hồng, Hoa cam<br>
Hương cuối: Cây hoắc hương, Xạ hương trắng, Hương Ambroxan, Hương Cashmeran<br>
<br>Nước hoa nữ Mon Paris Couture phù hợp với người trên 25 tuổi.Đây là dòng nước hoa Yves Saint Laurent này có độ lưu hương lâu - 7 giờ đến 12 giờ. và độ tỏa hương thuộc dạng gần - toả hương trong vòng một cánh tay. Perfumista.vn khuyến cáo Mon Paris Couture phù hợp để sử dụng trong ngày vào mùa xuân, hạ. Đây là dòng nước hoa Yves Saint Laurent thuộc nhóm Chypre Fruity (Hương trái cây SÍP). Bên cạnh đó, Quả bưởi và Quả mâm xôi là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'thumbnail' => 'perfume_project/perfume/mon_paris_couture_edp_1_pahf0p,perfume_project/perfume/mon_paris_couture_edp_2_q1ltri,perfume_project/perfume/mon_paris_couture_edp_3_k85wyl,perfume_project/perfume/mon_paris_couture_edp_4_r2uc4r,perfume_project/perfume/mon_paris_couture_edp_5_wrakh2,perfume_project/perfume/mon_paris_couture_edp_6_lk1srj',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'BLACK OPIUM FLORAL SHOCK',
                'slug' => 'black_opium_floral_shock_edp',
                'sex' => 'Nữ',
                'brand_id' => '10', //Ysl
                'concentration' => 'Eau de Parfum',
                'volume' => '90ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2017',
                'inventor_name' => 'Olivier Cresp',
                'incense_level' => 'Tạm ổn - 3 giờ đến 6 giờ',
                'aroma_level' => 'Rất gần - Thoang thoảng trên làn da',
                'recommended_time' => 'Ngày, Đêm, Xuân, Thu, Đông',
                'style' => 'Tươi mới, Hiện đại, Cuốn hút',
                'price' => '2350000',
                'description' => 'Hương Đầu: Cam Bergamot, Quả chanh vàng, Quả lê, Hoa lan Nam Phi<br>
Hương giữa: Hoa sơn chi, Hoa cam, Solar notes, Hoa trắng<br>
Hương cuối: Amberwood, Xạ hương trắng, Cà phê<br>
<br>Black Opium Floral Shock có độ lưu hương tạm ổn - 3 giờ đến 6 giờ và độ tỏa hương thuộc dạng rất gần - thoang thoảng trên làn da. Perfumista.vn khuyến cáo Black Opium Floral Shock phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa xuân, thu, đông. Bên cạnh đó, Quả lê và Hoa sơn chi là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'thumbnail' => 'perfume_project/perfume/black_opium_floral_shock_edp_1_ih8ijh,perfume_project/perfume/black_opium_floral_shock_edp_2_q9hmba,perfume_project/perfume/black_opium_floral_shock_edp_3_ceq46s,perfume_project/perfume/black_opium_floral_shock_edp_4_xhaxj,perfume_project/perfume/black_opium_floral_shock_edp_5_zxew5a,perfume_project/perfume/black_opium_floral_shock_edp_6_qdcc10',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'VALENTINO DONNA',
                'slug' => 'valentino_donna_edp',
                'sex' => 'Nữ',
                'brand_id' => '6', //Valentino
                'concentration' => 'Eau de Parfum',
                'volume' => '100ml',
                'origin_id' => '4', //Spain
                'recommended_age' => 'Trên 25',
                'released_year' => '2015',
                'inventor_name' => 'Sonia Constant',
                'incense_level' => 'Tạm ổn - 3 giờ đến 6 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Xuân, Thu, Đông',
                'style' => 'Sang trọng, Quyến rũ, Nổi bật',
                'price' => '2250000',
                'description' => 'Hương Đầu: Cam Bergamot<br>
Hương giữa: Hoa hồng Bulgary, Hoa diên vĩ<br>
Hương cuối: Cây hoắc hương, Da thuộc, Hương Va ni<br>
<br>Nước hoa nữ Valentino Donna được cho ra mắt vào năm 2015. Đây là dòng nước hoa Valentino thuộc nhóm Oriental Floral (Hương hoa cỏ phương đông) hướng đến độ tuổi trên 25 tuổi. Antoine Maisondieu, Sonia Constant chính là nhà pha chế ra loại nước hoa này. Valentino Donna có độ lưu hương tạm ổn - 3 giờ đến 6 giờ và độ tỏa hương thuộc dạng gần - toả hương trong vòng một cánh tay. Perfumista.vn khuyến cáo Valentino Donna phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa xuân, thu, đông. Bên cạnh đó, Hoa diên vĩ và Hoa hồng Bulgary là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.',
                'thumbnail' => 'perfume_project/perfume/valentino_donna_edp_1_nybvqk,perfume_project/perfume/valentino_donna_edp_2_avmgir,perfume_project/perfume/valentino_donna_edp_3_kqhqlf,perfume_project/perfume/valentino_donna_edp_4_jdfm74,perfume_project/perfume/valentino_donna_edp_5_fpidq2,perfume_project/perfume/valentino_donna_edp_6_n75duh',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'NARCISO RODRIGUEZ FOR HER',
                'slug' => 'narciso_rodriguez_for_her_edt',
                'sex' => 'Nữ',
                'brand_id' => '9', //Narciso Rodriguez
                'concentration' => 'Eau de Toilette',
                'volume' => '50ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2003',
                'inventor_name' => 'Francis Kurkdjian',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Xuân, Thu, Đông',
                'style' => 'Quyến rũ , Thanh lịch , Nữ tính',
                'price' => '1500000',
                'description' => 'Hương Đầu: Hoa mộc tê, Hoa cam Châu Phi, Cam Bergamot<br>
Hương giữa: Xạ hương, Hổ phách<br>
Hương cuối: Cỏ hương bài, Hương Va ni (Vanille), Cây hoắc hương<br>
<br>Nhà thiết kế trẻ và hiện đại người Mỹ gốc Cuba Narciso Rodriguez khi cho ra mắt dòng nước hoa đầu tiên đã nhanh chóng tạo nên một cơn sốt tại thị trường Mỹ vào lúc bấy giờ. Và không ngừng ở đó, ông đã liên tục sáng tạo và tạo ra nhiều dòng nước hoa khác với hương nước hoa hiện đại và nhắm vào các mẫu người phụ nữ hiện đại, tự do. Và phiên bản nước hoa Narciso Rodriquez for her EDT đầu tiên đã được 2 nhà thiết kế Christine Nagel và Francis Kurkdjian cho ra đời năm 2003 dựa vào ý tưởng trên.',
                'thumbnail' => 'perfume_project/perfume/narciso_rodriguez_for_her_edt_1_n4oqyc,perfume_project/perfume/narciso_rodriguez_for_her_edt_2_z2wcyc,perfume_project/perfume/narciso_rodriguez_for_her_edt_3_p1u5kc,perfume_project/perfume/narciso_rodriguez_for_her_edt_4_uxrwgq,perfume_project/perfume/narciso_rodriguez_for_her_edt_5_idn2ad,perfume_project/perfume/narciso_rodriguez_for_her_edt_6_ojhkkw',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => "NARCISO RODRIGUEZ FOR HER L'ABSOLU",
                'slug' => 'narciso_rodriguez_for_her_labsolu_edp',
                'sex' => 'Nữ',
                'brand_id' => '9', //Narciso Rodriguez
                'concentration' => 'Eau de Parfume',
                'volume' => '50ml',
                'origin_id' => '2', //France
                'recommended_age' => 'Trên 25',
                'released_year' => '2015',
                'inventor_name' => 'Aurelien Guichard',
                'incense_level' => 'Lâu - 7 giờ đến 12 giờ',
                'aroma_level' => 'Gần - Toả hương trong vòng một cánh tay',
                'recommended_time' => 'Ngày, Đêm, Thu, Đông',
                'style' => 'Quyến rũ, Sang trọng, Bí ẩn',
                'price' => '1650000',
                'description' => "Hương Đầu: Hoa huệ trắng, Hoa nhài<br>
Hương giữa: Xạ hương<br>
Hương cuối: Hổ phách, Cây hoắc hương, Gỗ đàn hương<br>
<br >Nước hoa nữ Narciso Rodriguez For Her L'Absolu được cho ra mắt vào năm 2015. Đây là dòng nước hoa I Profumi Del Marmo thuộc nhóm Floral Woody Musk (Hương hoa cỏ Gỗ-Xạ hương) hướng đến độ tuổi trên 25 tuổi. Aurelien Guichard chính là nhà pha chế ra loại nước hoa này. Narciso Rodriguez For Her L'Absolu có độ lưu hương rất lâu - trên 12 giờ và độ tỏa hương thuộc dạng gần - toả hương trong vòng một cánh tay. Perfumista.vn khuyến cáo Narciso Rodriguez For Her L'Absolu phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa thu, đông. Bên cạnh đó, Xạ hương và Hoa huệ trắng là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.",
                'thumbnail' => 'perfume_project/perfume/narciso_rodriguez_for_her_labsolu_edp_1_hxjdq,perfume_project/perfume/narciso_rodriguez_for_her_labsolu_edp_2_ajlc2,perfume_project/perfume/narciso_rodriguez_for_her_labsolu_edp_3_sikgq,perfume_project/perfume/narciso_rodriguez_for_her_labsolu_edp_4_zzpko,perfume_project/perfume/narciso_rodriguez_for_her_labsolu_edp_5_ijpbl,perfume_project/perfume/narciso_rodriguez_for_her_labsolu_edp_6_kbyra',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        Product::insert($products);
    }
}

