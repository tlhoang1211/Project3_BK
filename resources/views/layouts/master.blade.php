<!DOCTYPE html>
<html lang="en">

@include('layouts._header')

<body>


@include('layouts.menu_bar')

@yield('content')

@php
    if(!isset($withFooter)) $withFooter = true;
@endphp
@if($withFooter)
    @include('layouts._footer')
@endif
<!-- Back to top button -->
<div id="toTop"></div>

<!-- COMMON SCRIPTS -->
<script src={{asset('assets/js/common_scripts.min.js')}}></script>
<script src={{asset('assets/js/main.js')}}></script>
<script src={{asset('assets/js/bootstrap.bundle.min.js')}}></script>
<script src={{asset('assets/js/toastr.min.js')}}></script>
<script src={{asset('assets/js/SaveScrollPosition.js')}}></script>
<!-- SPECIFIC SCRIPTS -->
@yield('specific_js')

<x-facebook-chat/>

</body>
