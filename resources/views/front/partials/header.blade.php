  <!-- Header Content Start -->
  <div>
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
      <!--    -->
      <nav class="nav">
        <div class="section-container w-100 d-flex align-items-center gap-4 h-100">
          <div class="nav__categories-btn align-items-center justify-content-center rounded-1 d-none d-lg-flex">
            <button class="border-0 bg-transparent" data-bs-toggle="offcanvas" data-bs-target="#nav__categories">
              <i class="fa-solid fa-align-center fa-rotate-180"></i>
            </button>
          </div>
          <div class="nav__logo">
            <a href="index.html">
              <img class="h-100" src="{{ asset('front-assets/images/logo34.png') }}" alt="">
            </a>
          </div>
          {{-- <div class="nav__search w-100">
            <input class="nav__search-input w-100" type="search" placeholder="أبحث هنا عن اي شئ تريده...">
            <span class="nav__search-icon">
              <i class="fa-solid fa-magnifying-glass"></i>
            </span>
          </div> --}}
          <div class="nav__search w-100">
  <form action="{{ route('product.index') }}" method="GET" class="d-flex w-100">
    <input 
      class="nav__search-input w-100" 
      type="search" 
      name="search" 
      placeholder="أبحث هنا عن اي شئ تريده..." 
      value="{{ request('search') }}"
    >
    <button type="submit" class="nav__search-icon border-0 bg-transparent">
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>
  </form>
</div>

          <ul class="nav__links gap-3 list-unstyled d-none d-lg-flex m-0">
            <!-- <li class="nav__link nav__link-user">
              <a class="d-flex align-items-center gap-2">
                حسابي
                <i class="fa-regular fa-user"></i>
                <i class="fa-solid fa-chevron-down fa-2xs"></i>
              </a>
              <ul class="nav__user-list position-absolute p-0 list-unstyled bg-white">
                <li class="nav__link nav__user-link"><a href="profile.html">لوحة التحكم</a></li>
                <li class="nav__link nav__user-link"><a href="orders.html">الطلبات</a></li>
                <li class="nav__link nav__user-link"><a href="account_details.html">تفاصيل الحساب</a></li>
                <li class="nav__link nav__user-link"><a href="favourites.html">المفضلة</a></li>
                <li class="nav__link nav__user-link"><a href="">تسجيل الخروج</a></li>
              </ul>
            </li> -->
            <li class="nav__link">
                <a class="d-flex align-items-center gap-2" href="{{ url('/') }}">
                    الرئيسية
                  <i class="fa-regular fa-user"></i>
                </a>
              </li>
              <li class="nav__link nav-item dropdown">
                @if(Auth::guard('website_user')->check())
                    <div class="d-flex flex-column align-items-start text-end">
                        <p class="mb-1 fw-bold text-dark">مرحبًا، {{ Auth::guard('website_user')->user()->name }}</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">تسجيل الخروج</button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login.form') }}" class="nav-link text-primary fw-semibold">
                        تسجيل الدخول
                    </a>
                @endif
            </li>
            
              {{-- <li class="nav__link relative flex items-center space-x-4 rtl:space-x-reverse">
                @if(Auth::guard('website_user')->check())
                    <div class="flex flex-col items-start text-right">
                        <p class="text-sm font-medium text-gray-700 dark:text-white">مرحبًا، {{ Auth::guard('website_user')->user()->name }}</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="mt-1 inline-block text-sm text-red-600 hover:text-red-800 font-semibold transition duration-200">
                                تسجيل الخروج
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login.form') }}"
                       class="text-sm font-medium text-blue-600 hover:text-blue-800 transition duration-200">
                        تسجيل الدخول
                    </a>
                @endif
            </li> --}}
{{--              
              <li class="nav__link">
                @if(Auth::guard('website_user')->check())
                <p>مرحبًا، {{ Auth::guard('website_user')->user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">تسجيل الخروج</button>
                </form>
            @else
                <a href="{{ route('login.form') }}">تسجيل الدخول</a>
            @endif
              </li> --}}
              @auth('website_user')
  <li class="nav__link"><a  class="d-flex align-items-center gap-2" href="{{ route('order.track') }}">تتبع الطلب <i class="fa-regular fa-user"></i></a></li>
@endauth
              <li class="nav__link">
                <a class="d-flex align-items-center gap-2" href="{{ route('about') }}">
                  معلومات
                  <i class="fa-regular fa-user"></i>
                </a>
              </li>
              <li class="nav__link">
                <a class="d-flex align-items-center gap-2" href="{{ route('contact') }}">
                 تواصل معنا
                  <i class="fa-regular fa-envelope"></i>
                </a>
              </li>
            
            <li class="nav__link">
              <a class="d-flex align-items-center gap-2" href="favourites.html">
                المفضلة
                <div class="position-relative">
                  <i class="fa-regular fa-heart"></i>
                  <div class="nav__link-floating-icon">
                    0
                  </div>
                </div>
              </a>
            </li>
            {{-- <li class="nav__link">
              <a class="d-flex align-items-center gap-2" data-bs-toggle="offcanvas" data-bs-target="#nav__cart">
                عربة التسوق
                <div class="position-relative">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <div class="nav__link-floating-icon">
                    0
                  </div>
                </div>
              </a>
            </li> --}}
            @php
            $cart = session('cart', []);
            $cart_count = array_sum(array_column($cart, 'quantity'));
        @endphp
        
        <li class="nav__link">
            <a class="d-flex align-items-center gap-2" data-bs-toggle="offcanvas" data-bs-target="#nav__cart">
                عربة التسوق
                <div class="position-relative">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div id="cart-count" class="nav__link-floating-icon">
                        {{ $cart_count }}
                    </div>
                </div>
            </a>
        </li>
        
          </ul>
        </div>
        <div class="nav-mobile fixed-bottom d-block d-lg-none">
          <ul class="nav-mobile__list d-flex justify-content-around gap-2 list-unstyled  m-0 border-top">
            <li class="nav-mobile__link">
              <a class="d-flex align-items-center flex-column gap-1 text-decoration-none" href="index.html">
                <i class="fa-solid fa-house"></i>
                الرئيسية
              </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1" data-bs-toggle="offcanvas"
              data-bs-target="#nav__categories">
              <i class="fa-solid fa-align-center fa-rotate-180"></i>
              الاقسام
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
              <a class="d-flex align-items-center flex-column gap-1 text-decoration-none" href="profile.html">
                <i class="fa-regular fa-user"></i>
                حسابي 
              </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
              <a class="d-flex align-items-center flex-column gap-1 text-decoration-none" href="favourites.html">
                <i class="fa-regular fa-heart"></i>
                المفضلة 
              </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1" data-bs-toggle="offcanvas"
              data-bs-target="#nav__cart">
              <i class="fa-solid fa-cart-shopping"></i>
              السلة
            </li>
          </ul>
          <!--  -->
        </div>
      </nav>

      @include('front.products.categories')

      {{-- <div class="nav__cart offcanvas offcanvas-end px-3 py-2" tabindex="-1" id="nav__cart" aria-labelledby="nav__cart">
        <div class="nav__categories-header offcanvas-header align-items-center">
          <h5>سلة التسوق</h5>
          <button type="button" class="border-0 bg-transparent text-danger nav__close" data-bs-dismiss="offcanvas"
            aria-label="Close">
            <i class="fa-solid fa-x fa-1x fw-light"></i>
          </button>
        </div>
        <div class="nav__categories-body offcanvas-body pt-4">
          <p>لا توجد منتجات في سلة المشتريات.</p>
          <div class="cart-products">
            <ul class="nav__list list-unstyled">
              <li class="cart-products__item d-flex justify-content-between gap-2">
                <div class="d-flex gap-2">
                  <div>
                    <button class="cart-products__remove">x</button>
                  </div>
                  <div>
                    <p class="cart-products__name m-0 fw-bolder">Flutter Apprentice</p>
                    <p class="cart-products__price m-0">1 x 350.00 جنيه</p>
                  </div>
                </div>
                <div class="cart-products__img">
                  <img class="w-100" src="{{ asset('front-assets/images/product-1.webp') }}" alt="">
                </div>
              </li>
            </ul>
            <div class="d-flex justify-content-between">
              <p class="fw-bolder">المجموع:</p>
              <p>350.00 جنيه</p>
            </div>
          </div>
          <button class="nav__cart-btn text-center text-white w-100 border-0 mb-3 py-2 px-3 bg-success">اتمام الطلب</button>
          <button class="nav__cart-btn text-center w-100 py-2 px-3 bg-transparent">تابع التسوق</button>
        </div>
      </div> --}}
    @include('front.products.cart')
    
    </div>


    <!-- News Content Start -->
    <section class="sales text-center p-2 d-block d-lg-none">
      شحن مجاني للطلبات 💥 عند الشراء ب 699ج او اكثر
    </section>
    <!-- News Content End -->
  </div>
  <!-- Header Content End -->
  