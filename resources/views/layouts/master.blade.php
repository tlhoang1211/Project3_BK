<!DOCTYPE html>
<html lang="en">

{{-- section Header--}}
@include('layouts._header')

<body>

@include('layouts.menu_bar')

@yield('content')

{{-- section Footer --}}
@php
	if(!isset($withFooter)) $withFooter = true
@endphp

@if($withFooter)
	@include('layouts._footer')
@endif
<!-- Back to top button -->
<div id="toTop"><i class="fad fa-arrow-up"></i></div>

<!-- section COMMON SCRIPTS -->
<script src={{asset('assets/js/common_scripts.min.js')}}></script>
<script src={{asset('assets/js/main.js')}}></script>
<script src={{asset('assets/js/Bootstrap/bootstrap.bundle.min.js')}}></script>
<script src={{asset('assets/js/toastr.min.js')}}></script>
<script src={{asset('assets/js/SaveScrollPosition.js')}}></script>
<script src={{asset('assets/js/enable_tooltip.js')}}></script>
<script src={{asset('assets/js/config_toastr.js')}}></script>

<!-- section SPECIFIC SCRIPTS -->
@yield('specific_js')
@stack('specific_js')

<x-facebook-chat/>

</body>
