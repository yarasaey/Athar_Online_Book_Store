@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a  href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" name="productform" id="productform">
            @method('PUT')
            @csrf
            <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">								
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title', $product->title) }}">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="slug">Slug</label>
                                          <input type="hidden"  name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" value="{{ old('slug', $product->slug)  }}">
                                            @error('slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description" class="form-label fw-bold text-dark"> Description</label>
                                        <textarea 
                                            name="description" 
                                            class="form-control @error('description') is-invalid @enderror" 
                                            id="description" 
                                            placeholder="description "
                                            style="resize: vertical; height: 300px; border: 1px solid #ced4da; border-radius: 0.5rem;"
                                        >{{ old('description', $product->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>                                           
                                </div>
                            </div>	                                                                      
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Media</h2>
                                <div class="border p-4 rounded">
                                    @if($product->photo)
                                        <div class="mb-3">
                                            <img src="{{ asset('storage/' . $product->photo) }}" width="150">
                                        </div>
                                    @endif
                                    <input type="file" name="photo" id="photo">
                                    <br>Drop files here or click to upload.
                                </div>
                            </div>	                                                                      
                        </div>
                        {{-- <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Media</h2>								
                                <div id="image" class="dropzone dz-clickable border p-4 rounded">
                                    <div class="dz-message needsclick">   
                                        <input  type="file"  name="photo" id="photo" >  
                                        <br>Drop files here or click to upload.<br><br>                                            
                                    </div>
                                </div>
                            </div>	                                                                      
                        </div> --}}
                        {{-- <input type="file" name="photo" id="photo">
                      <div class="form-group">
                     <label for="photo-dropzone">Product Image</label>
                     <div class="dropzone" id="photo-dropzone"></div>
                     </div> --}}
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>								
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Price" value="{{ old('price', $product->price) }}">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="compare_price">Compare at Price</label>
                                            <input type="text" name="compare_price" id="compare_price" class="form-control @error('compare_price') is-invalid @enderror" placeholder="Compare Price"  value="{{ old('compare_price', $product->compare_price) }}">
                                            <p class="text-muted mt-3">
                                                To show a reduced price, move the product's original price into Compare at price. Enter a lower value into Price.
                                            </p>
                                            @error('compare_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>                                            
                                </div>
                            </div>	                                                                      
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Inventory</h2>								
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sku">SKU (Stock Keeping Unit)</label>
                                            <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror" placeholder="sku"  value="{{ old('sku', $product->sku) }}">
                                            @error('sku')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" name="barcode" id="barcode" class="form-control @error('barcode') is-invalid @enderror" placeholder="Barcode" value="{{ old('barcode', $product->barcode) }}">
                                            @error('barcode')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="hidden" name="track_qty" value="No">
                                                <input class="custom-control-input @error('track_qty') is-invalid @enderror" type="checkbox" id="track_qty" name="track_qty" value="Yes" {{ old('track_qty', 'Yes') == 'Yes' ? 'checked' : '' }}>
                                                <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                            </div>
                                            @error('track_qty')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" min="0" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" placeholder="Qty" value="{{ old('qty',$product->qty) }}">
                                            @error('qty')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>                                         
                                </div>
                            </div>	                                                                      
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">	
                                <h2 class="h4 mb-3">Product status</h2>
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Block</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div> 
                        <div class="card">
                            <div class="card-body">	
                                <h2 class="h4 mb-3">Product category</h2>
                                <div class="mb-3">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                        <option value="">Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                        <div class="card mb-3">
                            <div class="card-body">	
                                <h2 class="h4 mb-3">Author</h2>
                                <div class="mb-3">
                                    <select name="author_id" id="author_id" class="form-control @error('author_id') is-invalid @enderror">
                                        <option value="">Select the Author</option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}" {{ old('author_id', $product->author_id) == $author->id ? 'selected' : '' }}>
                                                {{ $author->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('author_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div> 
                        <div class="card mb-3">
                            <div class="card-body">	
                                <h2 class="h4 mb-3">Featured product</h2>
                                <div class="mb-3">
                                    <select name="is_featured" id="is_featured" class="form-control @error('is_featured') is-invalid @enderror">
                                        <option value="No" {{ old('is_featured', $product->is_featured) == 'No' ? 'selected' : '' }}>No</option>
                                        <option value="Yes" {{ old('is_featured', $product->is_featured) == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                    @error('is_featured')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>                                 
                    </div>
                </div>
                
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
@endsection
@section('customr')

<script>   
    $(document).ready(function () {

// Handle validation error removal for inputs and textareas
$('input, textarea').on('input', function () {
    $(this).removeClass('is-invalid');
    $(this).closest('.mb-3').find('.invalid-feedback, .text-danger').fadeOut();
});

// Handle validation error removal for dropdowns
$('select').on('change', function () {
    $(this).removeClass('is-invalid');
    $(this).closest('.mb-3').find('.invalid-feedback, .text-danger').fadeOut();
});

// Special case for checkbox (track_qty)
$('#track_qty').on('change', function () {
    $(this).removeClass('is-invalid');
    $(this).closest('.mb-3').find('.invalid-feedback, .text-danger').fadeOut();
});

// Optional: auto-hide success/error alerts after 3 seconds
setTimeout(function () {
    $('.alert').fadeOut('slow');
}, 3000);

// Auto-generate slug from title input
$('#title').on('blur', function () {
    var title = $(this).val();
    if (title) {
        $('#slug').val(title.toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, ''));
    }
});
});

</script>


@endsection 
