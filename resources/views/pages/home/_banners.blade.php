<ul id="banners_grid" class="clearfix">

	{{-- section Female --}}
	<li>
		<a href="{{route('product_search', ['sex' => 'Nữ'])}}" class="img_container">
			<img
					src='https://res.cloudinary.com/vernom/image/upload/c_scale,w_700/v1596722168/perfume_project/female_ueuy87.png'
					data-src="https://res.cloudinary.com/vernom/image/upload/c_scale,w_700/v1596722168/perfume_project/female_ueuy87.png"
					alt="" class="lazy">
			<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<h3>BST Nữ</h3>
				<div><span class="btn_1">Xem ngay</span></div>
			</div>
		</a>
	</li>

	{{-- section Male --}}
	<li>
		<a href="{{route('product_search', ['sex' => 'Nam'])}}" class="img_container">
			<img
					src='https://res.cloudinary.com/vernom/image/upload/v1596722166/perfume_project/male_hy7gxe.jpg'
					data-src="https://res.cloudinary.com/vernom/image/upload/v1596722166/perfume_project/male_hy7gxe.jpg"
					alt="" class="lazy">
			<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<h3>BST Nam</h3>
				<div><span class="btn_1">Xem ngay</span></div>
			</div>
		</a>
	</li>

	{{-- section Unisex  --}}
	<li>
		<a href="{{route('product_search', ['sex' => 'Phi giới tính'])}}" class="img_container">
			<img
					src='https://res.cloudinary.com/vernom/image/upload/v1596722169/perfume_project/unisex_phbqbj.jpg'
					data-src="https://res.cloudinary.com/vernom/image/upload/v1596722169/perfume_project/unisex_phbqbj.jpg"
					alt="" class="lazy">
			<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<h3>BST đa giới</h3>
				<div><span class="btn_1">Xem ngay</span></div>
			</div>
		</a>
	</li>
</ul>
<!--/banners_grid -->
