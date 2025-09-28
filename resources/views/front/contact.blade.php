@extends('front.layouts.app')
@section('content')
@if(session('success'))
<div class="alert alert-success my-3">
  {{ session('success') }}
</div>
@endif
<main>
    <section class="page-top d-flex justify-content-center align-items-center flex-column text-center ">
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>تواصل معنا</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="index.html">الرئيسية</a> /
          <span class="text-gray">تواصل معنا</span>
        </div>
      </div>
    </section>

    <section class="section-container py-5">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="contact__item h-100 d-flex align-items-center gap-2">
            <div class="contact__icon">
              <i class="fa-solid fa-phone"></i>
            </div>
            <div>
              <h6 class="contact__item-title m-0">اتصل بنا</h6>
              <p class="contact__item-text m-0">01063888667</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="contact__item h-100 d-flex align-items-center gap-2">
            <div class="contact__icon">
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div>
              <h6 class="contact__item-title m-0">راسلنا علي الايميل</h6>
              <p class="contact__item-text m-0">eraasoft@gmail.com</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="contact__item h-100 d-flex align-items-center gap-2">
            <div class="contact__icon">
              <i class="fa-solid fa-location-dot"></i>
            </div>
            <div>
              <h6 class="contact__item-title m-0">العنوان</h6>
              <p class="contact__item-text m-0">دعم فني على مدار اليوم للإجابة على اي استفسار لديك</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="contact__item h-100 d-flex align-items-center gap-2">
            <div class="contact__icon">
              <i class="fa-solid fa-comments"></i>
            </div>
            <div>
              <h6 class="contact__item-title m-0">دعم متواصل</h6>
              <p class="contact__item-text m-0">يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.</p>
            </div>
          </div>
        </div>
      </div>
    </section> 

    <section class="section-container contact d-md-flex align-items-center mb-3">
      <div class="contact__side w-50">
        <h4 class="mb-3">يسعدنا تواصلك معنا في أى وقت</h4>
        <p>إذا كنت تواجه أي مشكلة أو ترغب في إسترجاع أو إستبدال المنتج لا تتردد أبدأ بالتواصل معنا في أي وقت. كل ماعليك هو ملئ النموذج التالي ببيانات صحيحة وسنقوم بمراجعة طلبك في أسرع وقت.</p>
        <form class="contact__form" action="{{ route('contact.store') }}" method="POST">
          @csrf
          <div class="d-flex gap-3 mb-3">
            <div class="w-50">
              <label for="name">الاسم<span class="required">*</span></label>
              <input class="contact__input" id="name" type="text"   value="{{ old('name') }}" name="name">
              @error('name')
             <div class="text-danger small mt-1">{{ $message }}</div>
             @enderror
            </div>
            <div class="w-50">
              <label for="phone">رقم الهاتف<span class="required">*</span></label>
              <input class="contact__input" id="phone" name="phone" type="text" value="{{ old('phone') }}">
              @error('phone')
            <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="email">البريد الالكتروني<span class="required">*</span></label>
            <input class="contact__input" id="email" name="email" type="email" value="{{ old('email') }}">
            @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
          </div>
          <div class="mb-3">
    <label for="reason">سبب التواصل<span class="required">*</span></label>
    <select class="contact__input" id="reason" name="reason">
        <option value="">- اضغط هنا لاختيار السبب -</option>
        <option value="استفسار" {{ old('reason') == 'استفسار' ? 'selected' : '' }}>استفسار</option>
        <option value="استبدال" {{ old('reason') == 'استبدال' ? 'selected' : '' }}>استبدال</option>
        <option value="استرجاع" {{ old('reason') == 'استرجاع' ? 'selected' : '' }}>استرجاع</option>
        <option value="استعجال اوردر" {{ old('reason') == 'استعجال اوردر' ? 'selected' : '' }}>استعجال اوردر</option>
        <option value="اخري" {{ old('reason') == 'اخري' ? 'selected' : '' }}>أخرى</option>
    </select>
    @error('reason')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

          <div>
            <label for="reason">نص الرسالة<span class="required">*</span></label>
            <textarea class="contact__input" id="message" name="message">{{ old('message') }}</textarea>
            @error('message')
          <div class="text-danger small mt-1">{{ $message }}</div>
           @enderror
          </div>
          <button class="primary-button w-100 rounded-2">ارسال الطلب</button>
        </form>
      </div>
      <div class="contact__side w-50 text-center">
        <img class="w-100" src="{{ asset('front-assets/images/contact-1.png')}}" alt="">
      </div>
    </section>

    <div class="section-container my-5 px-4">
      <div class="contact__map"></div>
    </div>
  </main>
@endsection
<script>
    // تحقق من أن الرسالة موجودة في الصفحة
    window.onload = function() {
        var successMessage = document.getElementById('success');
        
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
   <script>
        setTimeout(function () {
            const el = document.getElementById('success');
            if (el) {
                el.style.transition = 'opacity 0.5s ease';
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 500); // إزالة العنصر تمامًا بعد التلاشي
            }
        }, 3000); // 3 ثواني
    </script>