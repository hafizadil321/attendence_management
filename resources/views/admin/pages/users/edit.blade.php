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
                        <form method="POST" action="{{ url('admin/updateUser') }}/{{ $employee->id }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $employee->id }}">
                            <div class="form-row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $employee->name }}" id="name" placeholder="Name">
                                    @error('name')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $employee->email }}" id="inputEmail4" placeholder="Email">
                                    @error('email')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Employee ID</label>
                                    <input type="text" class="form-control" name="code" value="{{ $employee->code }}" id="inputPassword4" placeholder="User ID">
                                    @error('user_id')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Designation</label>
                                    <input type="text" class="form-control" name="designation" value="{{ $employee->designation }}" id="designation" placeholder="Designation">
                                    @error('designation')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="previous_role" value="{{ $emp_role }}">
                                    <label for="inputState">Select Role</label>
                                    <select id="inputState" name="role" class="form-control">
                                        <option value="">Choose...</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}" @if($role->name == $emp_role) selected  @endif >{{ $role->display_name }}</option>
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
                                    <input type="number" class="form-control" name="phone" value="{{ $employee->phone }}" id="designation" placeholder="Phone">
                                    @error('phone')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ $employee->address }}" id="address" placeholder="Address">
                                    @error('address')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">CNIC</label>
                                    <input type="text" class="form-control" name="cnic" value="{{ $employee->cnic }}"  placeholder="CNIC">
                                    @error('cnic')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Bank Account</label>
                                    <input type="text" class="form-control" name="bank_account" value="{{ $employee->bank_account }}"  placeholder="Bank Account">
                                    @error('bank_account')
                                        <div class="invalid-feedback" style="display: block;">
                                                   <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Date Of Joining</label>
                                    <input type="date" class="form-control" name="joining_date" value="{{ \Carbon\Carbon::parse($employee->joining_date)->format('Y-m-d')}}"  placeholder="{{ \Carbon\Carbon::parse($employee->joining_date)->format('Y-m-d')}}">
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
                          <button type="submit" class="btn btn-primary mt-3">Update User</button>
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