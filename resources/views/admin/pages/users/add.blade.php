@section('css')
<link href="{{ asset('assets/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@extends('admin.layout.main_layout')
@section('content')
<!--page-wrapper-->
<div class="container">
    <div class="container">
        <div class="row">
            <div id="flFormsGrid" class="col-lg-12 layout-spacing layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Create New User</h4>
                            </div>                                                                        
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form method="POST" action="{{ route('create_user') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Name">
                                    @error('name')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputEmail4" placeholder="Email">
                                    @error('email')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Confirm Password</label>
                                    <input type="password" class="form-control" name="c_password" id="inputPassword4" placeholder="Password">
                                    @error('c_password')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Employee ID</label>
                                    <input type="text" class="form-control" name="user_id" value="{{ old('user_id') }}" id="inputPassword4" placeholder="Employee ID">
                                    @error('user_id')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Designation</label>
                                    <input type="text" class="form-control" name="designation" value="{{ old('designation') }}" id="designation" placeholder="Designation">
                                    @error('designation')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Select Role</label>
                                    <select id="inputState" name="role" class="form-control">
                                        <option value="">Choose...</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->display_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Phone</label>
                                    <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" id="designation" placeholder="Phone">
                                    @error('phone')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ old('designation') }}" id="address" placeholder="Address">
                                    @error('address')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">CNIC</label>
                                    <input type="text" class="form-control" name="cnic" value="{{ old('designation') }}"  placeholder="CNIC">
                                    @error('cnic')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Bank Account</label>
                                    <input type="text" class="form-control" name="bank_account" value="{{ old('bank_account') }}"  placeholder="Bank Account">
                                    @error('bank_account')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Date Of Joining</label>
                                    <input type="date" class="form-control" name="joining_date" value="{{ old('joining_date') }}"  placeholder="CNIC">
                                    @error('joining_date')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">User Image</label>
                                    <label class="custom-file-container__custom-file">
                                            <input type="file" name="file" class="custom-file-container__custom-file__custom-file-input" multiple="">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                                            <span class="custom-file-container__custom-file__custom-file-control">Choose file...<span class="custom-file-container__custom-file__custom-file-control__button"> Browse </span></span>
                                        </label>
                                    @error('file')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                          <button type="submit" class="btn btn-primary mt-3">Create User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!--end page-wrapper-->
@endsection
@section('js')
<script src="{{asset('assets/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
@endsection('js')