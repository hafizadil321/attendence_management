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
                                <h4>Docusign</h4>
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