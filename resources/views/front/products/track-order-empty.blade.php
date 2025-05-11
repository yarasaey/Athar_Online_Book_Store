@extends('front.layouts.app') 
@section('content')
<div class="text-center my-5">
    <h2>لا يوجد طلبات بعد</h2>
    <p>عند قيامك بعملية شراء، ستتمكن من تتبعها هنا.</p>
    <a href="{{ route('home') }}" class="btn btn-primary">تصفح المنتجات</a>
</div>

@endsection