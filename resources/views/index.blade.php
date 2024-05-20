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
					<img src="images/slider/slide-1.jpg" alt="slide-1">
					<div class="container">
						<div class="slider-box">
							<button class="btn">Button</button>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img src="images/slider/slide-2.jpg" alt="slide-1">
					<div class="container">
						<div class="slider-box">
							<button class="btn">Button</button>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img src="images/slider/slide-3.jpg" alt="slide-2">
					<div class="container">
						<div class="slider-box">
							<button class="btn">Button</button>
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
			<div class="row">
				<div class="col-12 col-md-3 col-lg-3 categories-title">
					<h3>Special Offer’s and Discount</h3>
					<p>Vivamus nec urna luctus, dignissim est</p>
				</div>
				<div class="col-12 col-md-6 col-lg-6">
					<h3>70,000+ Collection</h3>
					<h4>500+ Stylish Brand’s</h4>
				</div>
				<div class="col-12 col-md-3 col-lg-3 categories-title">
					<h3>Free 30 Days Returns</h3>
					<p>Sed at justo eget nulla placerat</p>
				</div>
			</div>
			<div class="category-box-main categories-slider">
				<!-- Owl Carousel -->
				<div class="our-partner">
					<div id="categories-list" class="owl-carousel owl-theme">
						<div class="item">
							<div class="category-box">
								<span class="sale">+786</span>
								<a title="Women’s Wear" href="./02_categories.html">
									<img src="images/category/cat-img-1.jpg" alt="cat-img" />
									<span>Women’s Wear</span>
									<div class="cat-hover"></div>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="category-box">
								<a title="Accessories" href="./02_categories.html">
									<img src="images/category/cat-img-2.jpg" alt="cat-img" />
									<span>Accessories </span>
									<div class="cat-hover"></div>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="category-box">
								<span class="new">New</span>
								<a title="Kids Wear" href="./02_categories.html">
									<img src="images/category/cat-img-3.jpg" alt="cat-img" />
									<span>Women Shopping</span>
									<div class="cat-hover"></div>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="category-box">
								<a title="Women Accessories" href="./02_categories.html">
									<img src="images/category/cat-img-4.jpg" alt="cat-img" />
									<span>Women Cosmetic</span>
									<div class="cat-hover"></div>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="category-box">
								<span class="new">New</span>
								<a title="Kids Wear" href="./02_categories.html">
									<img src="images/category/cat-img-5.jpg" alt="cat-img" />
									<span>Kids Wear</span>
									<div class="cat-hover"></div>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="category-box">
								<a title="Women Accessories" href="./02_categories.html">
									<img src="images/category/cat-img-6.jpg" alt="cat-img" />
									<span>Women Accessories</span>
									<div class="cat-hover"></div>
								</a>
							</div>
						</div>
					</div>
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
				<p>Nam ac egestas est. Mauris et pulvinar risus, at tincidunt lorem. Maecenas tristique sit amet odio
					sit amet aliquet. Quisque a pharetra quam. Sed in ultrices diam, eget sodales ligula. Sed ut
					tincidunt lacus.</p>
			</div><!-- Section Header /- -->

			<div class="category-box-main product-box-main row">
				<div class="col-lg-3 col-md-6 col-12">
					<div class="main-product">
					<div class="category-box product-box">
						<span class="sale">sales</span>
						<div class="inner-product">
							<img src="images/featured/featured-1.jpg" alt="featured-img" />
							<div class="product-box-inner">
								<ul>
									<li><a title="Eye" href="images/featured/featured-1.jpg"><i
												class="fa fa-eye"></i></a></li>
									<li><a title="Heart" href="#"><i class="fa fa-heart"></i></a></li>
								</ul>
								<a title="Add to cart" href="04_single_product.html" class="btn">add to cart</a>
							</div>
						</div>
					</div>
					<a href="04_single_product.html" class="product-title">Skater Dress</a>
					<ul class="star">
						<li>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</li>
					</ul>
					<span class="amount"><del>&dollar;24.99</del> &dollar;19.99</span>
				  </div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="main-product">
					<div class="category-box product-box">
						<div class="inner-product">
							<img src="images/featured/featured-2.jpg" alt="featured-img" />
							<div class="product-box-inner">
								<ul>
									<li><a title="Eye" href="images/featured/featured-2.jpg"><i
												class="fa fa-eye"></i></a></li>
									<li><a title="Heart" href="#"><i class="fa fa-heart"></i></a></li>
								</ul>
								<a title="Add to cart" href="04_single_product.html" class="btn">add to cart</a>
							</div>
						</div>
					</div>
					<a title="Fashionable Pink Top" href="04_single_product.html" class="product-title">Mini Dress</a>
					<ul class="star">
						<li>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</li>
					</ul>
					<span class="amount"><del>&dollar;24.99</del> &dollar;19.99</span>
				</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="main-product">
					<div class="category-box product-box">
						<span class="sale">sales</span>
						<div class="inner-product">
							<img src="images/featured/featured-3.jpg" alt="featured-img" />
							<div class="product-box-inner">
								<ul>
									<li><a title="Eye" href="images/featured/featured-3.jpg"><i
												class="fa fa-eye"></i></a></li>
									<li><a title="Heart" href="#"><i class="fa fa-heart"></i></a></li>
								</ul>
								<a title="Add to cart" href="04_single_product.html" class="btn">add to cart</a>
							</div>
						</div>
					</div>
					<a href="04_single_product.html" class="product-title">Off Shoulder Dress</a>
					<ul class="star">
						<li>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</li>
					</ul>
					<span class="amount"><del>&dollar;24.99</del> &dollar;19.99</span>
				</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="main-product">
					<div class="category-box product-box">
						<div class="inner-product">
							<img src="images/featured/featured-4.jpg" alt="featured-img" />
							<div class="product-box-inner">
								<ul>
									<li><a title="Eye" href="images/featured/featured-4.jpg"><i
												class="fa fa-eye"></i></a></li>
									<li><a title="Heart" href="#"><i class="fa fa-heart"></i></a></li>
								</ul>
								<a href="04_single_product.html" class="btn">add to cart</a>
							</div>
						</div>
					</div>
					<a href="04_single_product.html" class="product-title">Sweater Dress</a>
					<ul class="star">
						<li>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</li>
					</ul>
					<span class="amount"><del>&dollar;24.99</del> &dollar;19.99</span>
				</div>
				</div>
			</div>
			<div class="category-box-main product-box-main row">
				<div class="col-lg-3 col-md-6 col-12">
					<div class="main-product">
					<div class="category-box product-box">
						<span class="sale">sales</span>
						<div class="inner-product">
							<img src="images/featured/featured-5.jpg" alt="featured-img" />
							<div class="product-box-inner">
								<ul>
									<li><a title="Eye" href="images/featured/featured-5.jpg"><i
												class="fa fa-eye"></i></a></li>
									<li><a title="Heart" href="#"><i class="fa fa-heart"></i></a></li>
								</ul>
								<a title="Add to cart" href="04_single_product.html" class="btn">add to cart</a>
							</div>
						</div>
					</div>
					<a href="04_single_product.html" class="product-title">Tie Detail Dress</a>
					<ul class="star">
						<li>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</li>
					</ul>
					<span class="amount"><del>&dollar;24.99</del> &dollar;19.99</span>
				</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="main-product">
					<div class="category-box product-box">
						<div class="inner-product">
							<img src="images/featured/featured-6.jpg" alt="featured-img" />
							<div class="product-box-inner">
								<ul>
									<li><a title="Eye" href="images/featured/featured-6.jpg"><i
												class="fa fa-eye"></i></a></li>
									<li><a title="Heart" href="#"><i class="fa fa-heart"></i></a></li>
								</ul>
								<a title="Add to cart" href="04_single_product.html" class="btn">add to cart</a>
							</div>
						</div>
					</div>
					<a href="04_single_product.html" class="product-title">Peplum Dress</a>
					<ul class="star">
						<li>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</li>
					</ul>
					<span class="amount"><del>&dollar;24.99</del> &dollar;19.99</span>
				</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="main-product">
					<div class="category-box product-box">
						<span class="sale">sales</span>
						<div class="inner-product">
							<img src="images/featured/featured-7.jpg" alt="featured-img" />
							<div class="product-box-inner">
								<ul>
									<li><a title="Eye" href="images/featured/featured-7.jpg"><i
												class="fa fa-eye"></i></a></li>
									<li><a title="Heart" href="#"><i class="fa fa-heart"></i></a></li>
								</ul>
								<a href="04_single_product.html" class="btn">add to cart</a>
							</div>
						</div>
					</div>
					<a href="04_single_product.html" class="product-title"> Backless Dress</a>
					<ul class="star">
						<li>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</li>
					</ul>
					<span class="amount"><del>&dollar;24.99</del> &dollar;19.99</span>
				</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="main-product">
					<div class="category-box product-box">
						<div class="inner-product">
							<img src="images/featured/featured-8.jpg" alt="featured-img" />
							<div class="product-box-inner">
								<ul>
									<li><a title="Eye" href="images/featured/featured-8.jpg"><i
												class="fa fa-eye"></i></a></li>
									<li><a title="Heart" href="#"><i class="fa fa-heart"></i></a></li>
								</ul>
								<a title="Add to cart" href="04_single_product.html" class="btn">add to cart</a>
							</div>
						</div>
					</div>
					<a title="Fashionable Pink Top" href="04_single_product.html" class="product-title">Fringe Detail Dress</a>
					<ul class="star">
						<li>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</li>
					</ul>
					<span class="amount"><del>&dollar;24.99</del> &dollar;19.99</span>
				</div>
				</div>
			</div>
		</div><!-- container /- -->
	</section>
	<!-- Feature Product /- -->

	<!-- Feature Product -->

@endsection