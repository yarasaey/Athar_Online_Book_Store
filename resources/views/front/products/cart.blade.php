<div class="nav__cart offcanvas offcanvas-end px-3 py-2" tabindex="-1" id="nav__cart" aria-labelledby="nav__cart">
    <div class="nav__categories-header offcanvas-header align-items-center">
        <h5>سلة التسوق</h5>
        <button type="button" class="border-0 bg-transparent text-danger nav__close" data-bs-dismiss="offcanvas"
            aria-label="Close">
            <i class="fa-solid fa-x fa-1x fw-light"></i>
        </button>
       
    </div>

    <div class="nav__categories-body offcanvas-body pt-4">

        @php
            $cart = session('cart', []);
            $total = 0;
        @endphp

        @if(empty($cart))
            <p>لا توجد منتجات في سلة المشتريات.</p>
        @else
            <div class="cart-products">
                <ul class="nav__list list-unstyled">
                    @foreach($cart as $id => $item)
                        @php
                            $total += $item['price'] * $item['quantity'];
                        @endphp
                        <li class="cart-products__item d-flex justify-content-between gap-2 mb-3">
                            <div class="d-flex gap-2">
                                <div>
                                    <form method="POST" action="{{ route('cart.remove', $id) }}">
                                        @csrf
                                        <button class="cart-products__remove" type="submit">x</button>
                                    </form>
                                <div>
                                    <p class="cart-products__name m-0 fw-bolder">{{ $item['title'] }}</p>
                                    <p class="cart-products__price m-0">{{ $item['quantity'] }} x {{ number_format($item['price'], 2) }} جنيه</p>
                                </div>
                            </div>
                            <div class="cart-products__img" style="width: 50px;">
                             <img class="w-100" src="{{ asset('storage/' . $item['photo']) }}" alt="">
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="d-flex justify-content-between">
                    <p class="fw-bolder">المجموع:</p>
                    <p>{{ number_format($total, 2) }} جنيه</p>
                </div>
            </div>

            <button class="nav__cart-btn text-center text-white w-100 border-0 mb-3 py-2 px-3 bg-success"  onclick="window.location.href='{{ route('cart.checkout') }}'"  >
                اتمام الطلب
            </button>
            <button class="nav__cart-btn text-center w-100 py-2 px-3 bg-transparent">
                تابع التسوق
            </button>
        @endif

    </div>
</div>