@extends('front.layouts.app')
@section('content')
@if(session('success'))
    <div class="alert alert-success text-center my-3" id="success-message">
        {{ session('success') }}
    </div>
@endif
<main>
  <div class="page-top d-flex justify-content-center align-items-center flex-column text-center">
    <div class="page-top__overlay"></div>
    <div class="position-relative">
      <div class="page-top__title mb-3">
        <h2>المتجر</h2>
      </div>
      <div class="page-top__breadcrumb">
        <a class="text-gray" href="index.html">الرئيسية</a> / 
        <span class="text-gray">المتجر</span>
      </div>
    </div>
  </div>
  <div class="section-container d-block d-lg-flex gap-5 shop mt-5 pt-5">
    <div class="shop__products col-12">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="m-0">عرض 1 - 40 من أصل 144 نتيجة</p>
        <form action="">
          <div class="filter__search position-relative">
            <input class="w-100 py-1 ps-2" type="text" placeholder="بتدور علي ايه؟" />
            <div class="filter__search-icon position-absolute h-100 top-0 end-0 p-2 d-flex justify-content-center align-items-center">
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
          </div>
        </form>
      </div>
      <div class="row products__list">
        @if($products->isNotEmpty())
        <div class="mb-4">
          <h5>منتجات هذا التصنيف:</h5>
          @foreach ($products as $product)
              <div></div>
          @endforeach
      </div>
          @foreach ($products as $product)
            <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
              <div class="product__header mb-3">
                <a href="single-product.html">
                  <div class="product__img-cont position-relative overflow-hidden rounded" style="height: 300px;">
                    <img class="w-100 h-100 object-fit-cover"
                         src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('assets/images/default-product.jpg') }}"
                         alt="{{ $product->title }}" />
                  </div>
                </a>
                <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">وفر 10%</div>
                <div class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                  <i class="fa-regular fa-heart"></i>
                </div>
              </div>
              <div class="product__title text-center">
                <a class="text-black text-decoration-none" href="single-product.html">{{ $product->title }}</a>
              </div>
              <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                <span class="product__price product__price--old">{{ number_format($product->price, 2) }} جنيه</span>
                <span class="product__price">350.00 جنيه</span>
              </div>
              <div class="d-flex w-100 gap-2 mb-3">
                <div class="single-product__quanitity position-relative">
                  <input id="quantity-input-{{ $product->id }}" class="single-product__input text-center px-3" type="number" value="1" min="1" placeholder="---">
                  <button type="button" class="single-product__increase border-0 bg-transparent position-absolute end-0 h-100 px-3" onclick="increaseQuantity({{ $product->id }})">+</button>
                  <button type="button" class="single-product__decrease border-0 bg-transparent position-absolute start-0 h-100 px-3" onclick="decreaseQuantity({{ $product->id }})">-</button>
                </div>
                <button class="single-product__add-to-cart primary-button w-100" onclick="addToCart({{ $product->id }})">أضف إلى السلة</button>
              </div>
              <div class="single-product__favourite d-flex align-items-center gap-2 mb-4">
                <i class="fa-regular fa-heart"></i>
                اضافة للمفضلة
              </div>
            </div>
          @endforeach
        @else
          <p>No products available</p>
        @endif
      </div>
{{--  --}}
      {{-- <section class="section-container mb-5">
        @if($products->isNotEmpty())
        <div class="mb-4">
          <h5>منتجات هذا التصنيف:</h5>
          @foreach ($products as $product)
              <div></div>
          @endforeach
      </div>
      @foreach ($products as $product)
        <div class="products__header mb-4 d-flex align-items-center justify-content-between">
          <h4 class="m-0"></h4>
          <button class="products__btn py-2 px-3 rounded-1">تسوق الان</button>
        </div>
        <div class="owl-carousel products__slider owl-theme">
            <div class="products__item">
              <div class="product__header mb-3">
                <a href="{{ route('product.show', $product->id) }}">
                  <div class="product__img-cont">
                    <img class="product__img w-100 h-100 object-fit-cover"
                         src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('assets/images/default-product.jpg') }}"
                         alt="{{ $product->title }}" data-id="white" />
                  </div>
                </a>
                <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">وفر 10%</div>
                <div class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                  <i class="fa-regular fa-heart"></i>
                </div>
              </div>
              <div class="product__title text-center">
                <a class="text-black text-decoration-none" href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a>
              </div>
              @if($product->author)
                <div class="product__author text-center">{{ $product->author->name }}</div>
              @endif
              <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                @if($product->compare_price > 0)
                  <span class="product__price">{{ $product->compare_price }} جنيه</span>
                @endif
                <span class="product__price product__price--old">{{ $product->price }} جنيه</span>
              </div>
            </div>
          @endforeach
         
          @else
            <p>No products available</p>
          @endif
        </div>
      </section>
    </div>
  </div> --}}
  <section class="section-container mb-5">
    @if($products->isNotEmpty())
        <div class="mb-4">
            <h5>منتجات هذا التصنيف:</h5>
        </div>

        <div class="products__header mb-4 d-flex align-items-center justify-content-between">
            <h4 class="m-0">منتجات مميزة</h4>
            <button class="products__btn py-2 px-3 rounded-1">تسوق الآن</button>
        </div>

        <div class="owl-carousel products__slider owl-theme">
            @foreach ($products as $product)
                <div class="products__item">
                    <div class="product__header mb-3">
                        <a href="{{ route('product.show', $product->id) }}">
                            <div class="product__img-cont">
                                <img class="product__img w-100 h-100 object-fit-cover"
                                    src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('assets/images/default-product.jpg') }}"
                                    alt="{{ $product->title }}" />
                            </div>
                        </a>
                        <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">وفر 10%</div>
                        <div class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                    <div class="product__title text-center">
                        <a class="text-black text-decoration-none" href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a>
                    </div>
                    @if($product->author)
                        <div class="product__author text-center">{{ $product->author->name }}</div>
                    @endif
                    <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                        @if($product->compare_price > 0)
                            <span class="product__price">{{ $product->compare_price }} جنيه</span>
                        @endif
                        <span class="product__price product__price--old">{{ $product->price }} جنيه</span>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted text-center">لا توجد منتجات حالياً في هذا التصنيف</p>
    @endif
</section>

</main>

<script>
  function increaseQuantity(productId) {
    var quantityInput = document.getElementById('quantity-input-' + productId);
    quantityInput.value = parseInt(quantityInput.value) + 1;
  }

  function decreaseQuantity(productId) {
    var quantityInput = document.getElementById('quantity-input-' + productId);
    if (parseInt(quantityInput.value) > 1) {
      quantityInput.value = parseInt(quantityInput.value) - 1;
    }
  }

  function addToCart(productId) {
    const quantityInput = document.getElementById('quantity-input-' + productId);
    const quantity = quantityInput ? quantityInput.value : 1;

    fetch("{{ route('cart.add') }}", {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": "{{ csrf_token() }}",
        "Content-Type": "application/json",
        "Accept": "application/json",
      },
      body: JSON.stringify({
        product_id: productId,
        quantity: quantity
      })
    })
    .then(response => response.json())
    .then(data => {
      document.getElementById('cart-count').textContent = data.cart_count;
      alert(data.message);
    })
    .catch(error => console.error('Error adding to cart:', error));
  }
</script>


