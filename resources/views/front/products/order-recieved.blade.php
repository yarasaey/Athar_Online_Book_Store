@extends('front.layouts.app') 

@section('content')
  <main>
      <section
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
      </section>

      <section class="section-container profile my-5 py-5">
        <div class="text-center mb-5">
          <div class="success-gif m-auto">
            <img class="w-100" src="assets/images/success.gif" alt="" />
          </div>
         <div class="text-center p-4 rounded shadow-sm bg-light border border-secondary-subtle">
  <h4 class="mb-3 text-success"> جاري تجهيز طلبك الآن</h4>
  <h3 class="mb-3 text-success">نتمنى أن نكون قد تركنا لكم أثراً جميلاً </h3>
  <p class="mb-0 text-muted fs-5">
    سيقوم أحد ممثلي خدمة العملاء بالتواصل معك قريبًا لتأكيد الطلب.
  </p>
  <p>برجاء الرد على الأرقام الغير مسجلة</p>
          <a href="{{ route('products.website') }}" class="btn btn-outline-success px-4 py-2 rounded-pill fw-semibold shadow-sm">
  تصفح منتجات أخرى
</a>

</div>
        </div>
        <div>
          <p>شكرًا لك. تم استلام طلبك.</p>
          <div class="d-flex flex-wrap gap-2">
            <div class="success__details">
              <p class="success__small">رقم الطلب:</p>
              <p class="fw-bolder">{{ $order->id }}</p>
            </div>
            <div class="success__details">
              <p class="success__small">التاريخ:</p>
              <p class="fw-bolder">{{ $order->created_at->format('M d, Y') }}</p>
            </div>
            <div class="success__details">
              <p class="success__small">البريد الإلكتروني:</p>
              <p class="fw-bolder">{{ $order->email }}</p>
            </div>
            <div class="success__details">
              <p class="success__small">الإجمالي:</p>
              <p class="fw-bolder"> {{ number_format($order->grand_total, 2) }}  جنيه</p>
            </div>
          </div>
        </div>
      </section>

      <section class="section-container">
        <h2>تفاصيل الطلب</h2>
        <table class="success__table w-100 mb-5">
          <thead>
            <tr class="border-0 bg-main text-white">
              <th>المنتج</th>
              <th class="d-none d-md-table-cell">الإجمالي</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order->orderItems as $item)
            <tr>
              <td>
                <div>
                  <a href="">{{ $item->name }}</a>x {{ $item->qty }}
                </div>
              </td>
              <td>{{ number_format($item->total, 2) }} جنيه</td>
            </tr>
            @endforeach
            
            <tr>
              <th>الإجمالي:</th>
              <td class="fw-bold">{{ number_format($order->grand_total, 2) }} جنيه</td>
            </tr>
          </tbody>
        </table>
      </section>
      <section class="section-container mb-5">
        <h2>عنوان الفاتورة</h2>
        <div class="border p-3 rounded-3">
          <p class="mb-1">{{ $order->first_name }} {{ $order->last_name }}</p>
          <p class="mb-1">{{ $order->address }}</p>
          <p class="mb-1">{{ $order->city }}</p>
          <p class="mb-1">{{ $order->mobile }}</p>
          <p class="mb-1">{{ $order->email }}</p>
        </div>
      </section>
    </main>
@endsection