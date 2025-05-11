@extends('front.layouts.app') 

@section('content')
<main>

    <section
      class="page-top d-flex justify-content-center align-items-center flex-column text-center"
    >
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>إتمام الطلب</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="index.html">الرئيسية</a> /
          <span class="text-gray">إتمام الطلب</span>
        </div>
      </div>
    </section>

    <section class="section-container my-5 py-5 d-lg-flex">
      <div class="checkout__form-cont w-50 px-3 mb-5">
        <h4>الفاتورة </h4>
        @php
        $cart = session('cart', []);
        $total = 0;
    @endphp
        <form class="checkout__form" action="{{ route('checkout.process') }}" method="POST">
          @csrf
          <div class="d-flex gap-3 mb-3">
            <div class="w-50">
              <label for="first_name"  >الاسم الأول <span class="required">*</span></label>
              <input class="form__input" type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" />
              @error('first_name')
              <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
            </div>
            <div class="w-50">
              <label for="last_name"
                >الاسم الأخير <span class="">*</span></label
              >
              <input class="form__input" type="text" id="last_name" name="last_name"  value="{{ old('last_name') }}"/>
              @error('last_name')
              <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="city">المدينة / المحافظة<span class="required">*</span></label >
            <select
            name="city"
              class="form__input bg-transparent"
              type="text"
              id="city"
            >
              <option  value="القاهرة" {{ old('city') == 'القاهرة' ? 'selected' : '' }}>القاهرة</option>
              <option value="اسكندرية" {{ old('city') == 'اسكندرية' ? 'selected' : '' }}>اسكندرية</option>
              <option value="محافظة اخرى" {{ old('city') == 'محافظة اخرى'? 'selected' : '' }}>محافظة اخرى </option>
            </select>
            @error('city')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
          </div>
          <div class="mb-3">
            <label for="address"
              >العنوان بالكامل ( المنطقة -الشارع - رقم المنزل)<span
                class="required"
                >*</span
              ></label
            >
            <input
              class="form__input"
              placeholder="رقم المنزل او الشارع / الحي"
              type="text"
              id="address"
              name="address"
            />
            @error('address')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
          </div>
          <div class="mb-3">
            <label for="mobile"
              >رقم الهاتف<span class="required">*</span></label
            >
            <input class="form__input" type="text" id="mobile" name="mobile" />
            @error('mobile')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
          </div>
          <div class="mb-3">
            <label for="email"
              >البريد الإلكتروني (اختياري)<span class="required"
                >*</span
              ></label
            >
            <input class="form__input" type="email" id="email" name="email" value="{{ old('email') }}" />
          </div>
          <div class="mb-3">
            <h2>معلومات اضافية</h2>
            <label for="notes"
              >ملاحظات الطلب (اختياري)<span class="required"></span></label
            >
            <textarea
              class="form__input"
              placeholder="ملاحظات حول الطلب, مثال: ملحوظة خاصة بتسليم الطلب."
              type="text"
              id="notes"
              name="notes"
            >{{ old('notes') }}</textarea>
          </div>
        <div class="mb-3">
       <label for="coupon_code">كود الخصم (اختياري)</label>
       <input class="form__input" type="text" id="coupon_code" name="coupon_code" />
      </div>
          <button class="primary-button w-100 py-2" type="submit" >تاكيد الطلب</button>
        </form>
      </div>
     
      <div class="checkout__order-details-cont w-50 px-3">
        <h4>طلبك</h4>
        <div>
          <table class="w-100 checkout__table">
            <thead>
              <tr class="border-0">
                <th>المنتج</th>
                <th>المجموع</th>
              <th>صورة المنتج</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cart as $id => $item)
                        @php
                            $total += $item['price'] * $item['quantity'];
                        @endphp
              <tr>
                <td>{{ $item['title'] }}</td>
                <td>
                  <div
                    class="product__price text-center d-flex gap-2 flex-wrap"
                  >
                    {{-- <span class="product__price product__price--old">
                      
                    </span> --}}
                                <span class="product__price"> {{ $item['quantity'] }} x {{ number_format($item['price'], 2) }} جنيه</span>
                  </div>
                  <div class="cart-products__img" style="width: 50px;">
                    <img class="w-100" src="{{ asset('storage/' . $item['photo']) }}" alt="">
                   </div>

                </td>
              </tr>
              @endforeach
              {{-- <tr>
                <td>كوتش كاجوال -رجالى - بنى, 43 × 1</td>
                <td>
                  <div
                    class="product__price text-center d-flex gap-2 flex-wrap"
                  >
                    <span class="product__price product__price--old">
                      300.00 جنيه
                    </span>
                    <span class="product__price"> 150.00 جنيه </span>
                  </div>
                </td>
              </tr> --}}
              <tr>
                <th>المجموع</th>
                <td class="fw-bolder">{{ number_format($total, 2) }} جنيه</td>
              </tr>
              {{-- <tr class="bg-green">
                <th>قمت بتوفير</th>
                <td class="fw-bolder">370.00 جنيه</td>
              </tr> --}}
              <tr>
                <th>الإجمالي</th>
                <td class="fw-bolder">{{ number_format($total, 2) }} جنيه</td>
              </tr>
             
            </tbody>
          </table>
        </div>


        <div class="checkout__payment py-3 px-4 mb-3">
          <p class="m-0 fw-bolder">الدفع نقدا عند الاستلام</p>
        </div>

        <p>الدفع عند التسليم مباشرة.</p>
      </div>
    </section>
  </main>
@endsection