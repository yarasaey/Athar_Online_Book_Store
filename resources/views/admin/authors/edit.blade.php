@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    {{-- alert part --}}
    <section class="content-header">					
        <div class="container-fluid my-2"> 
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Author</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('authors.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="{{ route('authors.update', $author->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name', $author->name) }}">	
                                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pio">Bio</label>
                                    <input type="text" name="pio" id="pio" class="form-control" placeholder="Bio" value="{{ old('pio', $author->pio) }}">
                                    @error('pio') <p class="text-danger">{{ $message }}</p> @enderror	
                                </div>
                            </div>
                        </div>
                        
                        <div class="pb-5 pt-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('authors.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
@endsection
@section('customer')
<script>
    $(document).ready(function() {
        $('#name, #pio').on('input', function() {
            $(this).next('p.text-danger').fadeOut();
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Hide error message on typing
        $('#name, #pio').on('input', function() {
            $(this).next('p.text-danger').fadeOut();
        });

        // Auto-fade success message after 3 seconds
        setTimeout(function () {
            $('.alert-success').fadeOut('slow');
        }, 3000);
    });
</script>
@endsection


