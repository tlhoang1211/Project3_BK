@extends('layouts.master')
@section('specific_css')
	<link href="{{asset('assets/css/listing.css')}}" rel="stylesheet">
@endsection
@section('specific_js')
	<script src="{{asset('assets/js/sticky_sidebar.min.js')}}"></script>
	<script src="{{asset('assets/js/specific_listing.min.js')}}"></script>
	<script>
        $("#reset_filter").click(function ()
        {
            $("#filter_form").trigger("reset");
        });
	</script>
@endsection
@section('content')
	<main>
		<div class="container margin_30">
			<div class="row">

				{{-- section Filters --}}
				@include('pages.products._filter')

				<div class="col-lg-9">

					{{-- section Top banner --}}
					@include('pages.products._top_banner')

					<div id="stick_here"></div>
					<div class="toolbox elemento_stick add_bottom_30">
					</div>

					{{-- section Products --}}
					<div class="row small-gutters">
						@foreach($products as $product)
							<div class="col-6 col-md-4">
								<x-product.grid-item :product="$product"/>
							</div>
						@endforeach
					</div>

					{{-- section Pagination --}}
					<div class="pagination__wrapper">
						{{ $products->links() }}
					</div>

				</div>
			</div>
		</div>
	</main>

@endsection

