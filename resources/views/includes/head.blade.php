<!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section -->
	<header id="header" class="header">
		<!-- top-header -->
		<div class="top-header">
			<!-- container -->
			<div class="container">
				<div class="row">
					<ul class="top-social col-12 col-md-12 col-lg-6">
						<li><a title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a title="Twitter" href="#"><svg viewBox="0 0 512 512">
									<path
										d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
								</svg></a></li>
						<li><a title="Google" href="#"><svg viewBox="0 0 448 512">
									<path
										d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
								</svg></a></li>
					</ul>
					<div
						class="col-12 col-md-12 col-lg-6 ow-right-padding  ow-right-padding2 d-flex align-content-center justify-content-end">
						<!-- <ul class="top-menu">
							<li><a title="My whishlist" href="#">My whishlist</a></li>
							<li><a title="CheckOut" href="#">CheckOut &nbsp;</a></li>
						</ul> -->
                        @guest
						<ul class="top-menu">
							<li><a title="Login" href="{{route('login')}}">Login</a></li>
							<li><a title="Register" href="{{route('register')}}" >Register</a></li>
						</ul>
                        @else
                        <ul class="top-menu">
							<li><a title="Login" href="07_login_register.html">Login</a></li>
							<li><a title="Register" href="05_register.html">Register</a></li>
						</ul>
                        @endguest
					</div>
				</div>
			</div><!-- container /- -->
		</div><!-- top-header /- -->

		<!-- logo-search-block -->
		<div class="logo-search-block">
			<!-- container -->
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-12 col-lg-3 ow-left-padding  d-flex align-items-center ">
						<div class="input-group input-group1">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
							</span>
                            <form action="{{url('search')}}" method="GET">    
                                <input type="text" name="query" class="form-control" placeholder="Search products" value="{{request()->input('query')}}">
                            </form>
						</div><!-- /input-group -->
					</div>
					<div class="col-12 col-md-12 col-lg-6 logo-block">
						<a title="Logo" href="{{url('/')}}">
							Hokela Store
						</a>
					</div>
					<div class="col-12 col-md-12 col-lg-3 ow-right-padding ">
						<div class="row">
							<div class="col-12 col-sm-6 col-md-6 col-lg-5 cart-link ow-right-padding">
								<svg width="16px" height="15px" viewBox="0 0 533.334 533.335">
									<g>
										<path
											d="M441.26,300.001c18.333,0,37.454-14.423,42.49-32.052l48.353-169.231c5.036-17.627-5.844-32.05-24.177-32.05H166.667   c0-36.819-29.848-66.667-66.667-66.667H0v66.667h100v283.333c0,27.614,22.386,50,50,50h316.667   c18.409,0,33.334-14.924,33.334-33.333s-14.925-33.334-33.334-33.334h-300v-33.333H441.26z M166.667,133.334h301.461l-28.573,100   H166.667V133.334z M200,491.668c0,22.916-18.75,41.666-41.667,41.666h-16.667c-22.917,0-41.667-18.75-41.667-41.666v-16.667   c0-22.917,18.75-41.667,41.667-41.667h16.667c22.917,0,41.667,18.75,41.667,41.667V491.668z M500,491.668   c0,22.916-18.75,41.666-41.667,41.666h-16.667c-22.916,0-41.666-18.75-41.666-41.666v-16.667c0-22.917,18.75-41.667,41.666-41.667   h16.667c22.917,0,41.667,18.75,41.667,41.667V491.668z" />
									</g>
								</svg>
								cart ({{Cart::count()}})
								<div class="cart-dropdown">
									<table>
										<tr>
											<td class="product-thumb"><a href="#"><img src="images/cart-hover-1.png"
														alt="cart-hover" /></a></td>
											<td><a title="Red Cotton Top" href="#">Red Cotton Top</a></td>
											<td>x1</td>
											<td>$92.00</td>
											<td><a title="close" href="#"><i class="fa fa-close"></i></a></td>
										</tr>
										<tr>
											<td class="product-thumb"><a href="#"><img src="images/cart-hover-2.png"
														alt="cart-hover" /></a></td>
											<td><a title="Red Cotton Top" href="#">Red Cotton Top</a></td>
											<td>x1</td>
											<td>$92.00</td>
											<td><a title="close" href="#"><i class="fa fa-close"></i></a></td>
										</tr>
									</table>
									<div class="sub-total">
										<p><span>Sub Total</span> $160.00</p>
										<p><span>Total</span> $160.00</p>
									</div>
									<div class="cart-button">
										<a title="Add to cart" href="#">add to cart</a>
										<a title="Checkout" href="#">Checkout</a>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div><!-- container /- -->
		</div><!-- logo-add-block /- -->

		<!-- menu-block -->
		<div class="menu-block">
			<!-- container -->
			<div class="container">
				<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-static-top">
					<div class="navbar-header">
						<a href="index.html" class="logo"><img src="images/logo.png" alt="logo"></a>
						<button class="navbar-toggler collapsed" aria-controls="navbar" aria-expanded="false"
							data-bs-target="#navbar" data-bs-toggle="collapse" type="button"
							aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="navbar">
						<ul class="nav navbar-nav">
							<li class="nav-item active"><a class="nav-link active" title="Home"
									href="{{url('/')}}">Home</a></li>
							<li class="nav-item active"><a class="nav-link active" title="Shop"
									href="{{url('shop')}}">Shop</a></li>

                            <li class="nav-item active"><a class="nav-link active" title="Home"
									href="{{url('/cart')}}">Cart</a></li>
                            <li class="nav-item dropdown">
								<a title="categories" class="nav-link dropdown-toggle"
									data-bs-toggle="dropdown">Categories</a>
                                    <ul class="dropdown-menu row">
									<div class="row">
                                        @foreach(App\Category::all() as $c)
                                            <li><a href="{{route('shop.index',['category' => $c->slug])}}">{{$c->name}}</a></li>
                                        @endforeach
									</div>
								</ul>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</nav>
			</div><!-- container /- -->
		</div><!-- menu-block /- -->
	</header>
	<!-- Header Section /- -->
