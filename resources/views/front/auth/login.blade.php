@extends('front.layouts.app')
@section('content')
<main>
    <div class="page-top d-flex justify-content-center align-items-center flex-column text-center">
        <div class="page-top__overlay"></div>
        <div class="position-relative">
            <div class="page-top__title mb-3">
                <h2>تسجيل الدخول</h2>
            </div>
            <div class="page-top__breadcrumb">
                <a class="text-gray" href="{{ url('/') }}">الرئيسية</a> /
                <span class="text-gray">تسجيل الدخول</span>
            </div>
        </div>
    </div>

    <div class="page-full pb-5">
        <div class="account account--login mt-5 pt-5">
            <form method="POST" action="{{ route('login.form') }}" class="mb-5">
                @csrf
                <div class="input-group rounded-1 mb-3">
                    <input type="email" name="email" class="form-control p-3" placeholder="البريد الالكتروني"
                        value="{{ old('email') }}" required />
                    <span class="input-group-text login__input-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                </div>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="input-group rounded-1 mb-3">
                    <input type="password" name="password" class="form-control p-3" placeholder="كلمة السر" required />
                    <span class="input-group-text login__input-icon">
                        <i class="fa-solid fa-key"></i>
                    </span>
                </div>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="login__bottom d-flex justify-content-between mb-3">
                    <a class="login__forget-btn" href="">نسيت كلمة المرور؟</a>
                    <div>
                        <input type="checkbox" name="remember" />
                        <label>تذكرني</label>
                    </div>
                </div>

                <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
                    تسجيل الدخول
                </button>
            </form>
        </div>
    </div>
</main>
@endsection
