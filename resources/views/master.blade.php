<!doctype html>
<html class="">

<head>
	<meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
    <title>@yield('title')Qikapu</title>

	<link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
	<link href="{{asset('libraries/bootstrap/bootstrap.min.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('libraries/fuelux/jquery-ui.min.css')}}">
	<linK href="{{asset('libraries/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet" />
	<linK href="{{asset('libraries/owl-carousel/owl.theme.default.min.css')}}" rel="stylesheet" />
	<link href="{{asset('libraries/fonts/font-awesome.min.css')}}" rel="stylesheet" />
	<link href="{{asset('libraries/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{asset('libraries/flexslider/flexslider.css')}}" rel="stylesheet" /> <!-- flexslider -->
	<link href="{{asset('libraries/magnific-popup.css')}}" rel="stylesheet" /> <!-- Light Box -->
	<link href="{{asset('css/components.css')}}" rel="stylesheet" />
	<link href="{{asset('css/style.css')}}" rel="stylesheet" />
	<link href="{{asset('css/media.css')}}" rel="stylesheet" />
	<link id="color" href="{{asset('css/color-schemes/default.css')}}" rel="stylesheet" />

	<link href='http://fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic' rel='stylesheet'
		type='text/css'>
	<link
		href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,400italic,300italic,500,500italic,700,700italic,900,900italic'
		rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic'
		rel='stylesheet' type='text/css'>

</head>

<body data-offset="200" data-spy="scroll" data-target=".primary-navigation">
	<!-- <div class="color-switcher" id="choose_color">
		<a href="#." class="picker_close">
			<i class="fa fa-gear fa-spin"></i>
		</a>
		<div class="theme-colours">
			<p>Choose Colour style</p>
			<ul>
				<li><a href="#." class="blue" id="default"></a></li>
				<li><a href="#." class="cyan" id="cyan"></a></li>
				<li><a href="#." class="dark-blue" id="dark-blue"></a></li>
				<li><a href="#." class="green" id="green"></a></li>
				<li><a href="#." class="red" id="red"></a></li>
				<li><a href="#." class="yellow" id="yellow"></a></li>
				<li><a href="#." class="light-green" id="light-green"></a></li>
				<li><a href="#." class="orange" id="orange"></a></li>
			</ul>
		</div>
	</div> -->

	@include('includes.head')

	@yield('content')

	@include('includes.footer')
</body>

</html>