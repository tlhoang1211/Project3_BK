@if($errors->any())
		<div class="popup_wrapper" style="z-index: 0;">
			<div class="popup_content">
				<span class="popup_close">X</span>
				<ul>
			@foreach($errors->all() as $error)
						<li>{{$error}}</li>
			@endforeach
				</ul>
			</div>
		</div>
@endif