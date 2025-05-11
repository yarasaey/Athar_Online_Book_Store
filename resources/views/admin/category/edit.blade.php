@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2"> 
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="{{ route('categories.store') }}" method="POST" id="categoryform" name="categoryform">
            @method('PUT')
            @csrf
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $category->name }}">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug"value="{{ $category->slug }}">
                                <p></p>	
                            </div>
                        </div>
                        {{--  <div class="col-md-6">
                            <div class="mb-3">
                                <input type="hidden" id="image_id"  name="image_id" value="">
                                <label for="image">Image</label>
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">    
                                        <br>Drop files here or click to upload.<br><br>                                            
                                    </div>
                                </div>
                            </div>
                            @if (!empty($category->image ))
                            <div>
                                <img width="250" src="{{ asset('upload/category/thumb'.$category->image) }}" alt="">
                            </div>
                            @endif --}}
                           

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Status</label>
                                <select  name="status" id="status" class="form-control" >	
                                    <option {{ ($category->status==1)?'selected':''}}  value="1">Active</option>
                                    <option  {{ ($category->status==0)?'selected':''}} value="0">Block</option>
                                    </select>
                            </div>
                        </div>	
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Show On Home</label>
                                <select  name="showhome" id="status" class="form-control">	
                                    <option  {{ ($category->showhome=='Yes')?'selected':''}}value="Yes">Yes</option>
                                    <option {{ ($category->showhome=='No')?'selected':''}}value="">No</option>
                                    </select>
                            </div>
                        </div>
                    </div>								
                </div>
            </div>	
                    <div class="pb-5 pt-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="#" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </form>
            
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

	

@endsection
@section('customer')

   

{{-- <div id="image" class="dropzone dz-clickable">
    <div class="dz-message needsclick">    
        <br>Drop files here or click to upload.<br><br>                                            
    </div>
</div> --}}


<script>


// Dropzone.autoDiscover = false;

// const dropzone = $("#image").dropzone({
//     init: function () {
//         this.on('addedfile', function (file) {
//             if (this.files.length > 1) {
//                 this.removeFile(this.files[0]);
//             }
//         });
//     },
//     url: "{{ route('temp-images.create') }}",
//     maxFiles: 1,
//     paramName: 'image',
//     addRemoveLinks: true,
//     acceptedFiles: "image/jpeg,image/png,image/gif",
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     },
//     success: function (file, response) {
//         $("#image_id").val(response.image_id);
//     }
// });

//$("#categoryform").submit(function (event) {
   // event.preventDefault();

    // استخدام FormData بدلاً من serializeArray
    //var form = $(this)[0];
   // var formData = new FormData(form);
//    $('#your-form-id').on('submit', function (e) {
//     e.preventDefault(); // يمنع الفورم من الإرسال العادي

//     var formData = new FormData(this);

$('#categoryform').on('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    var formData = $(this).serialize(); // Serialize form data

    $.ajax({
        url: '{{ route('categories.update', $category->id) }}',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
            // If the request was successful and the category was updated
            if (response.status) {
                window.location.href = response.redirect_url; // Redirect to categories list
            } else {
                // If there were validation errors, display them
                if (response.errors) {
                    // Show validation errors next to the input fields
                    if (response.errors.name) {
                        $('#name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(response.errors.name);
                    } else {
                        $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                    }

                    if (response.errors.slug) {
                        $('#slug').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(response.errors.slug);
                    } else {
                        $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                    }
                }
            }
        },
        error: function(xhr, status, error) {
            console.error('An error occurred:', error);
        }
    });
});





    //     success: function (response) {
    //         if (response["status"] === true) {
    //             alert("تمت إضافة التصنيف بنجاح!");

    //             // تحويل للصفحة اللي راجعة من الـ Controller
    //             setTimeout(function () {
    //                 window.location.href = response.redirect_url;
    //             }, 1000);
    //         } else if (response["status"] === false && response['errors']) {
    //             var errors = response['errors'];

    //             if (errors['name']) {
    //                 $('#name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['name']);
    //             } else {
    //                 $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
    //             }

    //             if (errors['slug']) {
    //                 $('#slug').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['slug']);
    //             } else {
    //                 $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
    //             }
    //         }
    //     },
    //     error: function (jqXHR, exception) {
    //         console.log("حدث خطأ أثناء إرسال البيانات");
    //     }
    // });

</script>
@endsection

