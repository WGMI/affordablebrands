@extends('master')
@section('content')
@include('includes.carousel')

	<!-- Women Banner Section Begin -->
	<hr>
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/pattern.png">
                        <h2>Detergents</h2>
                        <a href="{{url('/shop')}}">Find More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="product-slider owl-carousel">
                        @foreach($products as $p)
                            @include('includes.partials.singleproduct')
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/pattern.png">
                        <h2>Spices</h2>
                        <a href="{{url('/shop')}}">Find More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="product-slider owl-carousel">
                        @foreach($section2 as $p)
                            @include('includes.partials.singleproduct')
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/pattern.png">
                        <h2>Health & Beauty</h2>
                        <a href="{{url('/shop')}}">Find More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="product-slider owl-carousel">
                        @foreach($section3 as $p)
                            @include('includes.partials.singleproduct')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
	<hr>
	<div class="row justify-content-center">
		<a href="{{url('/shop')}}" class="primary-btn">More Products</a>
	</div>
	<hr>
    <!-- Women Banner Section End -->


@endsection
@section('extra-js')
  <script type="text/javascript" src="{{URL::asset('js/addproduct.js')}}"/>
@endsection