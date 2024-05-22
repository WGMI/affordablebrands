@extends('master')
@section('content')

<a id="top"></a>

	<!-- Slider Section -->
	<div id="slider-section" class="slider-section">
		<div id="carouselexamplegeneric" class="carousel slide slider-indexone" data-bs-ride="carousel">
			<!-- Indicators -->
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselexamplegeneric" data-bs-slide-to="0"
					class="active"></button>
				<button type="button" data-bs-target="#carouselexamplegeneric" data-bs-slide-to="1"></button>
				<button type="button" data-bs-target="#carouselexamplegeneric" data-bs-slide-to="2"></button>
			</div>
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<img src="images/slider/slide-1.png" alt="slide-1">
					<div class="container">
						<div class="slider-box">
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img src="images/slider/slide-1.png" alt="slide-1">
					<div class="container">
						<div class="slider-box">
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img src="images/slider/slide-1.png" alt="slide-2">
					<div class="container">
						<div class="slider-box">
						</div>
					</div>
				</div>
			</div>
			<!-- Controls -->
			<a title="Previous" class="carousel-control-prev" data-bs-target="#carouselexamplegeneric" role="button"
				data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</a>
			<a title="Next" class="carousel-control-next" data-bs-target="#carouselexamplegeneric" role="button"
				data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</a>
		</div>

	</div>
	<!-- Slider Section /- -->

	<!-- Category Section -->
	<div id="category-section" class="category-section bottom-shadow">
		<!-- container -->
		<div class="container">
			<div class="category-box-main categories-slider">
				<!-- Owl Carousel -->
				<div class="our-partner">
					
				</div>
			</div>
		</div><!-- container /- -->
	</div><!-- Category Section /- -->

	<!-- Feature Product -->
	<Section id="featured-products" class="featured-products bottom-shadow">
		<!-- container -->
		<div class="container">
			<!-- Section Header -->
			<div class="section-header">
				<h3>Featured products</h3>
			</div><!-- Section Header /- -->

			<div class="category-box-main product-box-main row">
				@foreach ($first as $p)
					@include('includes.partials.singleproduct')
				@endforeach
			</div>
			<div class="category-box-main product-box-main row">
				@foreach ($second as $p)
					@include('includes.partials.singleproduct')
				@endforeach
			</div>
		</div><!-- container /- -->
	</section>
	<!-- Feature Product /- -->

	<!-- Feature Product -->

@endsection