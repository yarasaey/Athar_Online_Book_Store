@extends('front.layouts.app')
@section('content')
@if(session('success'))
    <div class="alert alert-success text-center my-3" id="success-message">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div id="flash-error" class="alert alert-danger text-center mb-3">
        {{ session('error') }}
    </div>

    <script>
        setTimeout(function () {
            const el = document.getElementById('flash-error');
            if (el) {
                el.style.transition = 'opacity 0.5s ease';
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 500); // إزالة العنصر تمامًا بعد التلاشي
            }
        }, 3000); // 3 ثواني
    </script>
@endif

<main>
    <div
      class="page-top d-flex justify-content-center align-items-center flex-column text-center"
    >
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>حسابي</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="index.html">الرئيسية</a> /
          <span class="text-gray">حسابي</span>
        </div>
      </div>
    </div>

    <div class="page-full pb-5">
      <div class="account account--login mt-5 pt-5">
        <div class="account__tabs w-100 d-flex mb-3">
          <div
            class="account__tab account__tab--login text-center fs-6 py-3 w-50"
          >
            تسجيل الدخول
          </div>
          <div
            class="account__tab account__tab--register text-center fs-6 py-3 w-50"
          >
            حساب جديد
          </div>
        </div>
        <div class="account__login w-100" >
          <form class="mb-5" method="POST" action="{{ route('login.form') }}">
            @csrf
            <div class="input-group rounded-1 mb-3">
              <input
              name="email"
                type="email"
                class="form-control p-3"
                placeholder="البريد الالكتروني"
                aria-label="Email"
                aria-describedby="basic-addon1"
                value="{{ old('email') }}" required
              />
              <span
                class="input-group-text login__input-icon"
                id="basic-addon1"
              >
                <i class="fa-solid fa-envelope"></i>
              </span>
            </div>
            @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
            <div class="input-group rounded-1 mb-3">
              <input
              name="password"
                type="password"
                class="form-control p-3"
                placeholder="كلمة السر"
                aria-label="Password"
                aria-describedby="basic-addon1"
                required
              />
              <span
                class="input-group-text login__input-icon"
                id="basic-addon1"
              >
                <i class="fa-solid fa-key"></i>
              </span>
            </div>
            @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror

            <div class="login__bottom d-flex justify-content-between mb-3">
              <a class="login__forget-btn" href="">نسيت كلمة المرور؟</a>
              <div>
                <input type="checkbox" />
                <label for="">تذكرني</label>
              </div>
            </div>

            <button
              class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1"
            >
              تسجيل الدخول
            </button>
          </form>
        </div>
        <div class="account__register w-100" >
          <form class="mb-5" method="POST" action="{{ route('register.form') }}">
            @csrf
            <div class="input-group rounded-1 mb-3">
              <input
               name="name"
                type="text"
                class="form-control p-3"
                placeholder="الاسم كامل"
                aria-label="Username"
                aria-describedby="basic-addon1"
                 value="{{ old('name') }}"
              />
              <span
                class="input-group-text login__input-icon"
                id="basic-addon1"
              >
                <i class="fa-solid fa-user"></i>
              </span>
            </div>
            @error('name')
              <small class="text-danger">{{ $message }}</small>
                @enderror
            <div class="input-group rounded-1 mb-3">
              <input
                type="email" name="email"
                class="form-control p-3"
                placeholder="البريد الالكتروني"
                aria-label="Email"
                aria-describedby="basic-addon1"
                value="{{ old('email') }}"
              />
              <span
                class="input-group-text login__input-icon"
                id="basic-addon1"
              >
                <i class="fa-solid fa-envelope"></i>
              </span>
            </div>
            @error('email')
            <small class="text-danger">{{ $message }}</small>
              @enderror
            <div class="input-group rounded-1 mb-3">
              <input
              name="password"
                type="password"
                class="form-control p-3"
                placeholder="كلمة السر"
                aria-label="Password"
                aria-describedby="basic-addon1"
                value="{{ old('password') }}"
              />
              <span
                class="input-group-text login__input-icon"
                id="basic-addon1"
              >
                <i class="fa-solid fa-key"></i>
              </span>
            </div>
            @error('password')
            <small class="text-danger">{{ $message }}</small>
              @enderror
            <div class="input-group rounded-1 mb-3">
                <input
                name="password_confirmation"
                  type="password"
                  class="form-control p-3"
                  placeholder="تأكيد كلمة السر "
                  aria-label="Password"
                  aria-describedby="basic-addon1"
                  value="{{ old('password_confirmation') }}"
                />
                <span
                  class="input-group-text login__input-icon"
                  id="basic-addon1"
                >
                  <i class="fa-solid fa-key"></i>
                </span>
                </div>
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                  @enderror

            <button
              class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1"
            >
              حساب جديد
            </button>
          </form>
        </div>
        <div class="account__forget">
          <p>
            فقدت كلمة المرور الخاصة بك؟ الرجاء إدخال عنوان البريد الإلكتروني
            الخاص بك. ستتلقى رابطا لإنشاء كلمة مرور جديدة عبر البريد
            الإلكتروني.
          </p>
          <form action="">
            <div class="input-group rounded-1 mb-3">
              <input
                type="text"
                class="form-control p-3"
                placeholder="البريد الالكتروني"
                aria-label="Username"
                aria-describedby="basic-addon1"
              />
              <span
                class="input-group-text login__input-icon"
                id="basic-addon1"
              >
                <i class="fa-solid fa-envelope"></i>
              </span>
            </div>
            <button
              class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1"
            >
              اعادة تعيين كلمة المرور
            </button>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
<!-- JavaScript لعمل الاختفاء بعد فترة -->
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
