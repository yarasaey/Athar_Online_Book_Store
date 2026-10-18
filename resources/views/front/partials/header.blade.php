<!-- Header Start -->
<div class="header-container fixed-top border-bottom">
    <header>
        <div class="section-container d-flex justify-content-between">
            <div class="header__email d-flex gap-2 align-items-center">
                <i class="fa-regular fa-envelope"></i>
                Athar@gmail.com
            </div>
            <div class="header__info d-none d-lg-block">
                شحن مجاني للطلبات 💥 عند الشراء ب 699ج او اكثر
            </div>
            <div class="header__branches d-flex gap-2 align-items-center">
                <a class="text-white text-decoration-none" href="branches.html">
                    <i class="fa-solid fa-location-dot"></i>
                    فروعنا
                </a>
            </div>
        </div>
    </header>

    <nav class="nav">
        <div class="section-container w-100 d-flex align-items-center gap-4 h-100">
            <!-- Categories Button -->
            <div class="nav__categories-btn align-items-center justify-content-center rounded-1 d-none d-lg-flex">
                <button class="border-0 bg-transparent" data-bs-toggle="offcanvas" data-bs-target="#nav__categories">
                    <i class="fa-solid fa-align-center fa-rotate-180"></i>
                </button>
            </div>

            <!-- Logo -->
            <div class="nav__logo">
                <a href="{{ url('/') }}">
                    <img class="h-100" src="{{ asset('front-assets/images/logo34.png') }}" alt="Logo">
                </a>
            </div>

            <!-- Search -->
            <div class="nav__search w-100">
                <form action="{{ route('front.home') }}" method="GET" class="d-flex w-100">
                    <input 
                        class="nav__search-input w-100" 
                        type="search" 
                        name="search" 
                        placeholder="{{ __('messages.search_placeholder') }}" 
                        value="{{ request('search') }}"
                    >
                    <button type="submit" class="nav__search-icon border-0 bg-transparent">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <!-- Navigation Links -->
            <ul class="nav__links gap-3 list-unstyled d-none d-lg-flex m-0">
                <!-- Language Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                        🌐 {{ strtoupper(app()->getLocale()) }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('lang.change', 'ar') }}">العربية</a></li>
                        <li><a class="dropdown-item" href="{{ route('lang.change', 'en') }}">English</a></li>
                    </ul>
                </div>

                <!-- Main Links -->
                <li class="nav__link"><a href="{{ url('/') }}">@lang('messages.home')</a></li>
                <li class="nav__link"><a href="{{ route('about') }}">@lang('messages.about')</a></li>
                <li class="nav__link"><a href="{{ route('contact') }}"> @lang('messages.contact')</a></li>
                <li class="nav__link"><a href="favourites.html">@lang('messages.wishlist')</a></li>

                <!-- Auth Links -->
                <li class="nav__link nav-item dropdown">
                    @auth('website_user')
                        <div class="d-flex flex-column align-items-start text-end">
                            <p class="mb-1 fw-bold text-dark">@lang('messages.hello') {{ Auth::guard('website_user')->user()->name }}</p>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('messages.logout') }}</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login.form') }}" class="nav-link text-primary fw-semibold">{{ __('messages.login') }}</a>
                    @endauth
                </li>

                @auth('website_user')
                <li class="nav__link">
                    <a href="{{ route('order.track') }}">{{ __('messages.track_order') }}</a>
                </li>
                @endauth

                <!-- Cart -->
                @php
                    $cart = session('cart', []);
                    $cart_count = array_sum(array_column($cart, 'quantity'));
                @endphp
                <li class="nav__link">
                    <a data-bs-toggle="offcanvas" data-bs-target="#nav__cart" class="d-flex align-items-center gap-2">
                        {{ __('messages.cart') }}
                        <div class="position-relative">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <div id="cart-count" class="nav__link-floating-icon">{{ $cart_count }}</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Mobile Navigation -->
        <div class="nav-mobile fixed-bottom d-block d-lg-none">
            <ul class="nav-mobile__list d-flex justify-content-around gap-2 list-unstyled m-0 border-top">
                <li class="nav-mobile__link"><a href="{{ url('/') }}"><i class="fa-solid fa-house"></i></a></li>
                <li class="nav-mobile__link" data-bs-toggle="offcanvas" data-bs-target="#nav__categories"><i class="fa-solid fa-align-center fa-rotate-180"></i></li>
                <li class="nav-mobile__link"><a href="{{ route('login.form') }}"><i class="fa-regular fa-user"></i></a></li>
                <li class="nav-mobile__link"><a href="favourites.html"><i class="fa-regular fa-heart"></i></a></li>
                <li class="nav-mobile__link" data-bs-toggle="offcanvas" data-bs-target="#nav__cart"><i class="fa-solid fa-cart-shopping"></i></li>
            </ul>
        </div>
    </nav>

    @include('front.products.categories')
    @include('front.products.cart')
</div>
<!-- Header End -->
