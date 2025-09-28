@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2"> 
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Copoun Code</h1>
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
        <form action="{{ route('categories.store') }}" method="POST" id="categoryform" name="categoryform" enctype="multipart/form-data">
            @csrf
            @method('Put')
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                                <label for="code">Code</label>
                                <input type="text" name="code" id="code" class="form-control" placeholder="copoun code" >
                                <p></p>	
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder=" copoun code name">	
                                <p></p>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Description</label>
                                <input type="text" name="description" id="description" class="form-control" placeholder=" copoun code description">	
                                <p></p>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Max Uses</label>
                                <input type="number" name="max_uses" id="max_uses" class="form-control" placeholder=" Max Uses">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
    <div class="mb-3">
        <label for="maxs_uses_users">Max Uses Per User</label>
        <input type="number" name="maxs_uses_users" id="maxs_uses_users" class="form-control" placeholder="Max Uses Per User">	
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label for="type">Discount Type</label>
        <select name="type" id="type" class="form-control">
            <option value="fixed">Fixed</option>
            <option value="percent">Percent</option>
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label for="min_amount">Minimum Amount</label>
        <input type="text" name="min_amount" id="min_amount" class="form-control" placeholder="Minimum Amount">
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label for="starts_at">Starts At</label>
        <input type="datetime-local" name="starts_at" id="starts_at" class="form-control">
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label for="expires_at">Expires At</label>
        <input type="datetime-local" name="expires_at" id="expires_at" class="form-control">
    </div>
</div>

                      
                        

                        {{--  image part <div class="col-md-6">
                            <div class="mb-3">
                                <input type="hidden" id="image_id"  name="image_id" value="">
                                <label for="image">Image</label>
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">    
                                        <br>Drop files here or click to upload.<br><br>                                            
                                    </div>
                                </div>
                            </div>--}}

                        </div>
                       
                    </div>								
                </div>
            </div>	
                    <div class="pb-5 pt-3">
                        <button class="btn btn-primary" type="submit">Edit</button>
                        <a href="#" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </form>
            
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

	

@endsection
@section('customer')

<script>


Dropzone.autoDiscover = false;

const dropzone = $("#image").dropzone({
    init: function () {
        this.on('addedfile', function (file) {
            if (this.files.length > 1) {
                this.removeFile(this.files[0]);
            }
        });
    },
    url: "{{ route('temp-images.create') }}",
    maxFiles: 1,
    paramName: 'image',
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg,image/png,image/gif",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function (file, response) {
        $("#image_id").val(response.image_id);
    }
});

$("#categoryform").submit(function (event) {
    event.preventDefault();

    var form = $(this);
    var formData = form.serializeArray();  // استخدام serializeArray لإرسال البيانات
    let url = $('meta[name="store-url"]').attr('content');

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,  // إرسال البيانات باستخدام serializeArray
        dataType: 'json',
        success: function (response) {
            $("button[type=submit]").prop('disabled', false);

            if (response["status"] === true) {
                window.location.href = "{{ route('categories.index') }}";
            } else if (response["status"] === false && response['errors']) {
                var errors = response['errors'];

                if (errors['name']) {
                    $('#name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['name']);
                } else {
                    $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                }

                if (errors['slug']) {
                    $('#slug').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['slug']);
                } else {
                    $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                }
            }
        },
        error: function (jqXHR, exception) {
            console.log("حدث خطأ");
            console.log(jqXHR.responseText);
            console.log("نص الاستجابة:", jqXHR.responseText);
        }
    });
});



</script>
<script>
    document.getElementById('name').addEventListener('input', function() {
        const name = this.value;
        const slug = name.trim().toLowerCase().replace(/[\s\W-]+/g, '-');
        document.getElementById('slug').value = slug;
    });
    </script>
@endsection