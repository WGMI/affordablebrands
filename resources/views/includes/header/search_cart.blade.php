<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-align: left;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}


</style>
<div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="{{asset('img/logo2.png')}}" alt="Qikapu"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <a type="button" class="category-btn">Search Items</a>
                            <div class="input-group">
                                <form action="{{url('search')}}" method="GET">    
                                    <input name="query" type="text" placeholder="Enter products and brands" value="{{request()->input('query')}}">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            @guest
                            <a href="{{route('login')}}" style="color: black">Login/Register</a>
                            @else
                            <div class="dropdown">
                                <a class="dropbtn">Welcome, {{Auth::user()->name}}</a>
                                    <div class="dropdown-content">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        @if(auth()->user()->role_id == 1)
                                            <a class="dropdown-item" href="{{ url('admin') }}">Admin</a>
                                        @else
                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Change User Type</a>
                                        @endif
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                            </div>
                            <!--<a href="#" style="color: black">Welcome, {{Auth::user()->name}}</a>-->
                            @endguest
                            <li class="cart-icon">
                                <a href="{{url('/cart')}}">
                                    <i class="icon_bag_alt"></i>
                                    <span class="countbadge">{{Cart::count()}}</span>
                                </a>
                                @if(Cart::count() > 0)
                                    <!--
                                    <div class="cart-hover">
                                        <div class="select-items">
                                            <table>
                                                <tbody>
                                                    @foreach(Cart::content() as $item)
                                                    <tr>
                                                        <td class="si-pic"><img src="img/select-product-1.jpg" alt=""></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>$60.00 x 1</p>
                                                                <h6>Kabino Bedside Table</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i class="ti-close"></i>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>$120.00</h5>
                                        </div>
                                        <div class="select-button">
                                            <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                            <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                        </div>
                                    </div>
                                    -->
                                @endif
                            </li>
                        </ul>
                    </div>
                    @auth
                    @if(Auth::user()->outlet_code == null)
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Switch Failed</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Your outlet code is unverified. Please contact the administrator</p>
                                        <p>Admin Number: +254 708 000 111</p>
                                    </div>
                                    @auth
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" style="color:white;">OK</button>
                                            <!-- <a type="button" class="btn btn-primary" href="#" style="color:white;">OK</a> -->
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Change User Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @auth
                                            <p>You are currently logged in as a {{auth()->user()->role->name}}</p>
                                        @endauth
                                    </div>
                                    @auth
                                        <div class="modal-footer">
                                            <a type="button" class="btn btn-primary" href="{{ route('switchuser', ['id' => auth()->user()->id]) }}" style="color:white;">Switch to {{auth()->user()->role->name == 'Regular User' ? 'Wholesaler' : 'Regular User'}}</a>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>     
                    @endif
                    @endauth
                </div>
            </div>
        </div>