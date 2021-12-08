<!DOCTYPE html>
<html lang="en">

@include('layouts._header')

<body>

{{--<x-facebook-chat />--}}

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

<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "107025061828658");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v12.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- COMMON SCRIPTS -->
<script src={{asset('assets/js/common_scripts.min.js')}}></script>
<script src={{asset('assets/js/main.js')}}></script>
<script src={{asset('assets/js/bootstrap.bundle.min.js')}}></script>
<script src={{asset('assets/js/toastr.min.js')}}></script>
<script src={{asset('assets/js/SaveScrollPosition.js')}}></script>
<!-- SPECIFIC SCRIPTS -->
@yield('specific_js')

</body>
