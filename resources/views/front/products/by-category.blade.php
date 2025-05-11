@extends('front.layouts.app') 




@section('content')
    <div class="container">
        {{-- <h2>المنتجات في تصنيف: {{ $category->name }}</h2> --}}
        {{-- <h2 class="my-4 py-2 px-3 text-white bg-primary rounded shadow-sm text-center fs-4">
            المنتجات في تصنيف: {{ $category->name }}
        </h2> --}}
        <div class="my-4 p-4 bg-light border-start border-4 border-primary rounded shadow-sm">
            <h2 class="m-0 text-capitalize fw-semibold text-primary" style="font-size: 1.5rem;">
                {{ $category->name }}
            </h2>
        </div>
        

        @if($category->products->count())
            <div class="row">
                @foreach($category->products as $product)
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <a href="{{ route('product.show', $product->id) }}">
                            <div class="product__img-cont">
                                <img class="product__img w-100 h-100 object-fit-cover"
                                src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('assets/images/default-product.jpg') }}"
                                alt="{{ $product->title }}"
                                data-id="white">
                              </div>
                            </a>
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
                    </div>
                @endforeach
            </div>
        @else
            <p>لا توجد منتجات في هذا التصنيف.</p>
        @endif
    </div>  
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let images = document.querySelectorAll('.product__img');
        images.forEach(function(img) {
            img.style.height = '300x'; // اختاري الارتفاع المناسب
            img.style.objectFit = 'cover';
        });
    });
</script>
