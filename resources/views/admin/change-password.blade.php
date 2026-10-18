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
                    <h1>Change Password</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="{{ route('admin.password.change') }}" method="POST" id="changePassword" name="changePassword" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="old_password">Old Password</label>
                                    <input type="text" name="old_password" id="old_password" class="form-control" placeholder="Old Password" >	
                                     @error('old_password') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="new_password">New Password</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" >
                                     @error('new_password') <p class="text-danger">{{ $message }}</p> @enderror	
                                </div>
                            </div>
                        </div>
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" >
                                   @error('confirm_password') <p class="text-danger">{{ $message }}</p> @enderror	
                                </div>
                            </div>
                        </div>
                        
                        <div class="pb-5 pt-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
        $('#old_password, #new_password,#confirm_password').on('input', function() {
            $(this).next('p.text-danger').fadeOut();
        });
    });
</script>
<script>
    $(document).ready(function() {
       
        $('#old_password, #new_password,#confirm_password').on('input', function() {
            $(this).next('p.text-danger').fadeOut();
        });

       
        setTimeout(function () {
            $('.alert-success').fadeOut('slow');
        }, 3000);
    });
</script>
@endsection