<div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All Categories</span>
                        <ul class="depart-hover">
                            @include('includes.partials.categories')
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{Request::is('/') ? 'active':''}}{{request()->routeIs('home') ? 'active':''}}"><a href="{{url('/')}}">Home</a></li>
                        <li class="{{activateLink('shop')}}{{activateLink('search')}}"><a href="{{url('/shop')}}">Shop</a></li>
						<!--
                        <li><a href="#">Collection</a>
                            <ul class="dropdown">
                                <li><a href="#">Men's</a></li>
                                <li><a href="#">Women's</a></li>
                                <li><a href="#">Kid's</a></li>
                            </ul>
                        </li>
						-->
                        <li class="{{activateLink('cart')}}"><a href="{{url('/cart')}}">Cart</a></li>
                        <li class="{{activateLink('checkout')}}"><a href="{{url('/checkout')}}">Checkout</a></li>
                        <!--<li><a href="{{url('/contact')}}">Contact</a></li>-->
						<!--
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./blog-details.html">Blog Details</a></li>
                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                <li><a href="./check-out.html">Checkout</a></li>
                                <li><a href="./faq.html">Faq</a></li>
                                <li><a href="./register.html">Register</a></li>
                                <li><a href="./login.html">Login</a></li>
                            </ul>
                        </li>
						-->
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>