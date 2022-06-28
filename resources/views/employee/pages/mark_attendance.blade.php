@section('css')
<link href="{{ asset('assets/assets/css/elements/infobox.css')}}" rel="stylesheet" type="text/css" />
@endsection
@extends('employee.layout.main_layout')
@section('content')
<!--page-wrapper-->
<div class="container">
    <div class="container">
        <div class="row">
            <div id="flHorizontalForm" class="col-lg-12 layout-spacing layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Hi {{ auth()->user()->name }}</h4>
                            </div>                                                                        
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="form-group row mb-4">
                            <label for="hEmail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Check In</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="text" value="{{ $attendance->check_in ?? '' }}" @isset($attendance->check_in) disabled @endisset class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="hPassword" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Check Out</label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <input type="text" class="form-control" value="{{ $attendance->check_out ?? '' }}" @isset($attendance->check_out) disabled @endisset >
                            </div>
                        </div>
                    </div>
                </div>

            </div>
             <div id="flHorizontalForm" class="col-lg-12 layout-spacing layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Mark Your Today Attendance</h4>
                            </div>                                                                        
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                    	<div class="row">
	                    	<div class="col-md-6 text-center">
	                    		<form action="{{ route('/employee/mark_attendance') }}" method="post">
	                    			@csrf
		                    		<div class="infobox-1">
		                                <button type="submit" class="btn btn-primary p-4" @isset($attendance->check_in) disabled @endisset>Check In</button>
		                            </div>
		                        </form>
	                    		
	                    	</div>
	                    	<div class="col-md-6 text-center">
	                    		<form action="{{ route('/employee/mark_attendance') }}" method="post">
	                    			@csrf
		                    		<div class="infobox-1">
		                                <button type="submit" class="btn btn-primary p-4" @isset($attendance->check_out) disabled @endisset>Check Out</button>
		                            </div>
		                        </form>
	                    	</div>
	                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--end page-wrapper-->
@endsection
@section('js')
<script src="{{asset('assets/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
@endsection('js')