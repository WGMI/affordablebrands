<!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section -->
	<header style="background-color: #fed702; padding: 1rem 0; width: 100%;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 1rem;">
        <div>
            <a href="{{ url('/') }}" style="text-decoration: none;">
                <img src="{{ asset('images/icon/logo.png') }}" alt="Site Logo" style="height: 80px; width: auto;">
            </a>
        </div>
        
        <div style="display: flex; flex-direction: column; gap: 1rem;">
            <!-- Top Row: Social Icons and Contacts -->
            <div style="display: flex; align-items: center; gap: 2rem;">
                <div style="display: flex; gap: 1rem;">
                    <a href="https://facebook.com" target="_blank" style="color: #0F460E; font-size: 1.2rem; text-decoration: none; transition: color 0.3s ease;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" style="color: #0F460E; font-size: 1.2rem; text-decoration: none; transition: color 0.3s ease;">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/0700550550" target="_blank" style="color: #0F460E; font-size: 1.2rem; text-decoration: none; transition: color 0.3s ease;">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
                <div style="display: flex; gap: 0.5rem; background-color: #0F460E; padding: 0.5rem 1rem; border-radius: 4px;">
                    <a href="tel:0700550550" style="color: white; text-decoration: none; font-size: 0.9rem;">
                        <i class="fas fa-phone" style="margin-right: 0.5rem;"></i>0700550550
                    </a>
                    <span style="color: white; margin: 0 0.5rem;">|</span>
                    <a href="mailto:info@ketepa.com" style="color: white; text-decoration: none; font-size: 0.9rem;">
                        <i class="fas fa-envelope" style="margin-right: 0.5rem;"></i>info@ketepa.com
                    </a>
                </div>
            </div>

            <!-- Bottom Row: Search -->
            <div style="width: 100%; border-top: 1px solid #0F460E; padding-top: 0.5rem;">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    @auth
                        <div class="nav-item dropdown">
                            <a href="#" style="color: #0F460E; text-decoration: none; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem;" class="dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i>
                                <span>Welcome, {{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu">
                                @if(auth()->user()->role_id == 1)
                                    <a class="dropdown-item" href="{{ url('admin') }}">Admin</a>
                                @endif
                                <a class="dropdown-item" href="{{route('orders')}}">Orders</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <a href="{{url('/cart')}}" style="color: #0F460E; text-decoration: none; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Cart</span>
                        </a>
                    @else
                        <a href="{{route('login')}}" style="color: #0F460E; text-decoration: none; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-user"></i>
                            <span>Account</span>
                        </a>
                        <a href="{{url('/cart')}}" style="color: #0F460E; text-decoration: none; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Cart</span>
                        </a>
                    @endauth
                    <form action="{{ url('search') }}" method="GET" style="position: relative;">
                        <input type="text" name="query" placeholder="Search products..." 
                            style="width: 250px; padding: 0.5rem 2.5rem 0.5rem 1rem; border: 1px solid #333; border-radius: 20px; outline: none; background-color: transparent;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
	<!-- Header Section /- -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
