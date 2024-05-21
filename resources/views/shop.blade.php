@extends('master')
@section('content')

<div class="container">
	<!-- Feature Product -->
	<div id="featured-products" class="featured-products bottom-shadow">
		<!-- container -->
		<div class="container">
			<div class="category-box-main product-box-main">
				<div class="row">
                    @forelse($products as $p)
                        @include('includes.partials.singleproduct')
                    @empty
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <h3>No items</h3>
                            <br><br>
                            <h4>Please check back later</h4>
                            <br><br><br><br><br>
                        </div> 
                    @endforelse
					<div class="col-12 col-sm-6 col-md-6 col-lg-3 main-product" style="visibility: hidden">
						<div class="category-box product-box">
							<span class="sale">sales</span>
							<div class="inner-product">
								<img src="images/featured/featured-1.jpg" alt="featured-img" />
								<div class="product-box-inner">
									<ul>
										<li><a title="Eye Icon" href="images/featured/featured-1.jpg"><i
													class="fa fa-eye"></i></a></li>
										<li><a title="Heart Icon" href="#"><i class="fa fa-heart"></i></a></li>
									</ul>
									<a title="Add to cart" href="#" class="btn">add to cart</a>
								</div>
							</div>
						</div>
						<a title="Fashionable Pink Top" href="#" class="product-title">Bodycon Dress</a>
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
					<div class="col-12 col-sm-6 col-md-6 col-lg-3 main-product" style="visibility: hidden">
						<div class="category-box product-box">
							<span class="sale">sales</span>
							<div class="inner-product">
								<img src="images/featured/featured-1.jpg" alt="featured-img" />
								<div class="product-box-inner">
									<ul>
										<li><a title="Eye Icon" href="images/featured/featured-1.jpg"><i
													class="fa fa-eye"></i></a></li>
										<li><a title="Heart Icon" href="#"><i class="fa fa-heart"></i></a></li>
									</ul>
									<a title="Add to cart" href="#" class="btn">add to cart</a>
								</div>
							</div>
						</div>
						<a title="Fashionable Pink Top" href="#" class="product-title">Bodycon Dress</a>
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
					<div class="col-12 col-sm-6 col-md-6 col-lg-3 main-product" style="visibility: hidden">
						<div class="category-box product-box">
							<span class="sale">sales</span>
							<div class="inner-product">
								<img src="images/featured/featured-1.jpg" alt="featured-img" />
								<div class="product-box-inner">
									<ul>
										<li><a title="Eye Icon" href="images/featured/featured-1.jpg"><i
													class="fa fa-eye"></i></a></li>
										<li><a title="Heart Icon" href="#"><i class="fa fa-heart"></i></a></li>
									</ul>
									<a title="Add to cart" href="#" class="btn">add to cart</a>
								</div>
							</div>
						</div>
						<a title="Fashionable Pink Top" href="#" class="product-title">Bodycon Dress</a>
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
					<div class="col-12 col-sm-6 col-md-6 col-lg-3 main-product" style="visibility: hidden">
						<div class="category-box product-box">
							<span class="sale">sales</span>
							<div class="inner-product">
								<img src="images/featured/featured-1.jpg" alt="featured-img" />
								<div class="product-box-inner">
									<ul>
										<li><a title="Eye Icon" href="images/featured/featured-1.jpg"><i
													class="fa fa-eye"></i></a></li>
										<li><a title="Heart Icon" href="#"><i class="fa fa-heart"></i></a></li>
									</ul>
									<a title="Add to cart" href="#" class="btn">add to cart</a>
								</div>
							</div>
						</div>
						<a title="Fashionable Pink Top" href="#" class="product-title">Bodycon Dress</a>
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
	</div>
@endsection
@section('extra-js')
  <script type="text/javascript" src="{{URL::asset('js/addproduct.js')}}"/>
@endsection