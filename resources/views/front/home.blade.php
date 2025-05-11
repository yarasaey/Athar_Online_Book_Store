
@extends('front.layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success text-center my-3" id="success-message">
        {{ session('success') }}
    </div>
@endif

  <!-- Page Content Start -->
  <main class="pt-4">
    <!-- Hero Section Start -->
    <section class="section-container hero">
      <div class="owl-carousel hero__carousel owl-theme">
        <div class="hero__item">
          <img class="hero__img" src="{{ asset('front-assets/images/back3.png') }}" alt="">
        </div>
        <div class="hero__item">
          <img class="hero__img" src="{{ asset('front-assets/images/back4.png') }}" alt="">
        </div>
        <div class="hero__item">
          <img class="hero__img" src="{{ asset('front-assets/images/back5.png') }}" alt="">
        </div>
      </div>
    </section>
    <!-- Hero Section End -->

    <!-- Offer Section Start -->
    <section class="section-container mb-5 mt-3">
      <div class="offer d-flex align-items-center justify-content-between rounded-3 p-3 text-white">
        <div class="offer__title fw-bolder">
          عروض اليوم
        </div>
        <div class="offer__time d-flex gap-2 fs-6">
          <div class="d-flex flex-column align-items-center">
            <span class="fw-bolder">06</span>
            <div>ساعات</div>
          </div>:
          <div class="d-flex flex-column align-items-center">
            <span class="fw-bolder">10</span>
            <div>دقائق</div>
          </div>:
          <div class="d-flex flex-column align-items-center">
            <span class="fw-bolder">13</span>
            <div>ثواني</div>
          </div>
        </div>
      </div>
    </section>
    <!-- Offer Section End -->
   

    <!-- Products Section Start -->
@if($products->isNotEmpty())
 <section class="section-container mb-5">
   <div class="products__header mb-4 d-flex align-items-center justify-content-between">
     <h4 class="m-0">وصل حديثا</h4>
     <button  onclick="window.location.href='{{ route('products.website') }}'" class="products__btn py-2 px-3 rounded-1">تسوق الان</button>
   </div>
   
   <div class="owl-carousel products__slider owl-theme">
     @foreach ($products as $product)
     <div class="products__item">
       <div class="product__header mb-3">
         <a href="{{ route('product.show', $product->id) }}"> <!-- رابط لصفحة المنتج -->
           <div class="product__img-cont">
             <img class="product__img w-100 h-100 object-fit-cover"
             src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('assets/images/default-product.jpg') }}"
             alt="{{ $product->title }}"
             data-id="white">
           </div>
         </a>
         <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
           وفر 10%
         </div>
         <div class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
           <i class="fa-regular fa-heart"></i>
         </div>
       </div>
       
       <div class="product__title text-center">
         <a class="text-black text-decoration-none" href="{{ route('product.show', $product->id) }}">
           {{ $product->title }}
         </a>
       </div>
       @if($product->author)
       <div class="product__author text-center">{{ $product->author->name }}</div>
       @endif
       <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
         @if($product->compare_price > 0)
           <span class="product__price product__price--old">{{ $product->compare_price }} جنيه</span>
         @endif
         <span class="product__price">{{ $product->price }} جنيه</span>
       </div>
     </div>
     @endforeach
   </div>
 </section>
@endif
    <!-- Categories Section Start -->
    <section class="section-container mb-5">
      <div class="categories row gx-4">
        <div class="col-md-6 p-2">
          <div class="p-4 border rounded-3">
            <img class="w-100" src="{{ asset('front-assets/images/category-1.jpg') }}" alt="">
          </div>
        </div>
        <div class="col-md-6 p-2">
          <div class="p-4 border rounded-3">
            <img class="w-100" src="{{ asset('front-assets/images/category-2.jpg') }}" alt="">
          </div>
        </div>
      </div>
    </section>
    <!-- Best Sales Section Start -->
    @if($products->isNotEmpty())
    <section class="section-container mb-5">
      <div class="products__header mb-4 d-flex align-items-center justify-content-between">
        <h4 class="m-0">وصل حديثا</h4>
        <button   onclick="window.location.href='{{ route('products.website') }}'"  class="products__btn py-2 px-3 rounded-1">تسوق الان</button>
      </div>
      
      <div class="owl-carousel products__slider owl-theme">
        @foreach ($products as $product)
        <div class="products__item">
          <div class="product__header mb-3">
            <a href="{{ route('product.show', $product->id) }}"> <!-- رابط لصفحة المنتج -->
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover"
                src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('assets/images/default-product.jpg') }}"
                alt="{{ $product->title }}"
                data-id="white">
              </div>
            </a>
            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
              وفر 10%
            </div>
            <div class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
          
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="{{ route('product.show', $product->id) }}">
              {{ $product->title }}
            </a>
          </div>
          @if($product->author)
          <div class="product__author text-center">{{ $product->author->name }}</div>
          @endif
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            @if($product->compare_price > 0)
              <span class="product__price product__price--old">{{ $product->compare_price }} جنيه</span>
            @endif
            <span class="product__price">{{ $product->price }} جنيه</span>
          </div>
        </div>
        @endforeach
      </div>
    </section>
@endif
    <!-- Best Sales Section End -->

    <!-- Newest Section Start -->
    @if($products->isNotEmpty())
    <section class="section-container mb-5">
      <div class="products__header mb-4 d-flex align-items-center justify-content-between">
        <h4 class="m-0">الاكثر مبيعا</h4>
        <button   onclick="window.location.href='{{ route('products.website') }}'" class="products__btn py-2 px-3 rounded-1">تسوق الان</button>
      </div>
      
      <div class="owl-carousel products__slider owl-theme">
        @foreach ($products as $product)
        <div class="products__item">
          <div class="product__header mb-3">
            <a href="{{ route('product.show', $product->id) }}"> <!-- رابط لصفحة المنتج -->
              <div class="product__img-cont">
                <img class="product__img w-100 h-100 object-fit-cover"
                src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('assets/images/default-product.jpg') }}"
                alt="{{ $product->title }}"
                data-id="white">
              </div>
            </a>
            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
              وفر 10%
            </div>
            <div class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
              <i class="fa-regular fa-heart"></i>
            </div>
          </div>
          
          <div class="product__title text-center">
            <a class="text-black text-decoration-none" href="{{ route('product.show', $product->id) }}">
              {{ $product->title }}
            </a>
          </div>
          @if($product->author)
          <div class="product__author text-center">{{ $product->author->name }}</div>
          @endif
          <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
            @if($product->compare_price > 0)
              <span class="product__price product__price--old">{{ $product->compare_price }} جنيه</span>
            @endif
            <span class="product__price">{{ $product->price }} جنيه</span>
          </div>
        </div>
        @endforeach
      </div>
    </section>
@endif

    <!-- Newest Section End -->
  </main>
  <!-- Page Content End -->
@endsection
<script>
  // تحقق من أن الرسالة موجودة في الصفحة
  window.onload = function() {
      var successMessage = document.getElementById('success-message');
      
      // إذا كانت الرسالة موجودة، قم بتطبيق التأثير
      if (successMessage) {
          setTimeout(function() {
              // تطبيق التأثير على الرسالة للاختفاء
              successMessage.style.transition = "opacity 1s ease-out";
              successMessage.style.opacity = "0";

              // بعد فترة من الزمن (1 ثانية) يتم إزالة الرسالة من الصفحة
              setTimeout(function() {
                  successMessage.remove();
              }, 1000); // بعد 1000 ميلي ثانية (1 ثانية)
          }, 3000); // الانتظار لمدة 3 ثوانٍ قبل إخفاء الرسالة
      }
  }
</script>





  


  
  
  