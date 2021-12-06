<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title','Wanderlust') </title>

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
          href={{ asset('assets/img/apple-touch-icon-57x57-precomposed.png') }}>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href={{ asset('assets/img/apple-touch-icon-72x72-precomposed.png') }}>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href={{ asset('assets/img/apple-touch-icon-114x114-precomposed.png') }}>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href={{ asset('assets/img/apple-touch-icon-144x144-precomposed.png') }}>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    {{--	<link href={{ URL::asset('assets/css/bootstrap.custom.min.css') }} rel="stylesheet">--}}
    <link href={{ asset('assets/css/fonts.css') }} rel="stylesheet">
    <link href={{ asset('assets/css/bootstrap.css') }} rel="stylesheet">
    <link href={{ asset('assets/css/style.css') }} rel="stylesheet">
    <link href={{ asset('assets/css/toastr.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/css/layout.css') }} rel="stylesheet">

    <!-- SPECIFIC CSS -->
    @yield('specific_css')
    @stack('component_css')

<!-- YOUR CUSTOM CSS -->
    {{--    <link href={{ asset('assets/css/custom.css') }} rel="stylesheet">--}}
    <link href={{ asset('assets/css/custom-hung.css') }} rel="stylesheet">

</head>
