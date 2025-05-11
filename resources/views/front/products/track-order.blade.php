@extends('front.layouts.app') 
@section('content')
 <main>
      <div
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
      >
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>تتبع طلبك</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="index.html">الرئيسية</a> /
            <span class="text-gray">تتبع طلبك</span>
          </div>
        </div>
      </div>

      <section class="section-container my-5 py-5">
        <p>
          تم تقديم الطلب #79917 في يوليو 26, 2023 وهو الآن بحالة قيد التنفيذ.
        </p>

        <section>
          <h2>تفاصيل الطلب</h2>
          <table class="success__table w-100 mb-5">
            <thead>
              <tr class="border-0 bg-danger text-white">
                <th>المنتج</th>
                <th class="d-none d-md-table-cell">الإجمالي</th>
              </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
              <tr>
                <td>
                  <div>
                    <a href="">{{ $item->name }}</a>x {{ $item->qty }}</a> x 1
                  </div>
                </td>
                <td>{{ number_format($item->total, 2) }} جنيه</td>
              </tr>
              <tr>
                {{-- <th>المجموع:</th>
                <td class="fw-bolder">{{ number_format($order->grand_total, 2) }} جنيه</td> --}}
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
      </section>
    </main>
@endsection