<header class="header bg-white">
    <div class="container px-lg-3">
      <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0">
        <a class="navbar-brand" href="index.html">
            <span class="fw-bold text-uppercase text-dark">محلات صبايا</span>
        </a>
        <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <!-- Link--><a class="nav-link active" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <!-- Link--><a class="nav-link" href="{{ route('shop') }}">Shop</a>
            </li>
            {{-- <li class="nav-item">
              <!-- Link--><a class="nav-link" href="#">Product detail</a>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
              <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown">
                <a class="dropdown-item border-0 transition-link" href="index.html">Homepage</a>
                <a class="dropdown-item border-0 transition-link" href="shop.html">Category</a>
                <a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a>
                <a class="dropdown-item border-0 transition-link" href="cart.html">Shopping cart</a>
                <a class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a></div>
            </li> --}}
          </ul>
          <ul class="navbar-nav ms-auto">
            @auth
                <livewire:frontend.cart-count-component />
                <livewire:frontend.wishlist-count-component />
            @endauth
            @guest
                @if (Route::has('login'))
                 <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"> <i class="fas fa-user me-1 text-gray fw-normal"></i>Login</a></li>
                @endif
                @if (Route::has('register'))
                 <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"> Register</a></li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->full_name}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a href="{{ route('customer.dashboard') }}" class="dropdown-item" >My Profile</a>
                        @if(Auth::user()->roles()->first()->name == 'admin' || Auth::user()->roles()->first()->name == 'super_admin')
                          <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            <i class="ft-power"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
          </ul>
        </div>
      </nav>
    </div>
</header>
