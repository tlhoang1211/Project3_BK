<!DOCTYPE html>
<html lang="en">

{{-- section Header --}}
@include('layouts._header')

<body>

{{-- section Menu bar--}}
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

{{-- section Scripts--}}
@include('layouts._scripts')

{{-- section Facebook chat--}}
<x-facebook-chat/>

</body>
