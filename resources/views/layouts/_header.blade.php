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

	<!-- section FAVICONS -->
	<link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon"
	      href={{ asset('assets/img/apple-touch-icon-57x57-precomposed.png') }}>
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
	      href={{ asset('assets/img/apple-touch-icon-72x72-precomposed.png') }}>
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
	      href={{ asset('assets/img/apple-touch-icon-114x114-precomposed.png') }}>
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
	      href={{ asset('assets/img/apple-touch-icon-144x144-precomposed.png') }}>

	<!-- section FONT AWESOME -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
	      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<!-- section GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

	<!-- section BASE CSS -->
	{{--	<link href={{ URL::asset('assets/css/bootstrap.custom.min.css') }} rel="stylesheet">--}}
	<link href="{{ asset('assets/css/fonts.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/Bootstrap/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/scss/style.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/layout.css') }}" rel="stylesheet">

	<!-- section SPECIFIC CSS -->
	{{--Use in view extended this layout--}}
	@yield('specific_css')

<!-- section YOUR CUSTOM CSS -->
	{{--    <link href={{ asset('assets/css/custom.css') }} rel="stylesheet">--}}
	<link href={{ asset('assets/css/custom-hung.css') }} rel="stylesheet">

</head>
