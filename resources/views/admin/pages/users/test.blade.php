@section('css')
<!-- BEGIN PAGE LEVEL STYLES -->
<!--     <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/datatables.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/forms/theme-checkbox-radio.css')}}">
<link href="{{ asset('assets/assets/css/apps/invoice-list.css')}}" rel="stylesheet" type="text/css" />
@endsection
@extends('admin.layout.main_layout')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            @if ($message = Session::get('success'))
                <div class="alert alert-light-success border-0 mb-4" style="color: green; background-color: #ddf5f0;" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button> {{ $message }} </div>
            @endif
            <div class="widget-content widget-content-area br-6">

                <table id="invoice-list" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Member Since</th>
                            <th>Emp Code</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <div class="usr-img-frame mr-2 rounded-circle">
                                        <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('images/') }}/{{$user->image}}">
                                    </div>
                                    <p class="align-self-center mb-0 user-name"> {{ $user->name }} </p>
                                </div>
                            </td>
                            <td><span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> {{ $user->email }}</span></td>
                            <td><span class="inv-email">{{ $user->designation }}</span></td>

                            <td>
                                <span class="inv-date">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg> {{ Carbon\Carbon::parse($user->joining_date)->format('d M Y') }}
                                </span>
                            </td>
                            <td><span class="badge badge-success inv-status">{{$user->code}}</span></td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                        <a class="dropdown-item action-edit" id="{{ $user->id }}" href="{{ url('admin/editUser/') }}/{{ $user->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>Edit</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
@section('js')
    <script type src="{{asset('assets/plugins/table/datatable/datatables.js')}}"></script>
    <script src="{{asset('assets/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/assets/js/apps/test-list.js')}}"></script>

<script src="{{ asset('assets/plugins/blockui/jquery.blockUI.min.js')}}"></script>
<script src="{{ asset('assets/plugins/blockui/custom-blockui.js')}}"></script>

<script src="{{ asset('assets/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <script type="text/javascript">
        // $(document).ready(function(){
        //     $('.add_new_employee').click(function(e){
        //         e.preventDefault();
        //         $.ajaxSetup({
        //             headers: {
        //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
        //         $.blockUI({
        //             message: '<svg> ... </svg>',
        //             fadeIn: 800, 
        //             timeout: 2000, //unblock after 2 seconds
        //             overlayCSS: {
        //                 backgroundColor: '#1b2024',
        //                 opacity: 0.8,
        //                 zIndex: 1200,
        //                 cursor: 'wait'
        //             },
        //             css: {
        //                 border: 0,
        //                 color: '#fff',
        //                 zIndex: 1201,
        //                 padding: 0,
        //                 backgroundColor: 'transparent'
        //             }
        //         });

        //         if ($('#edit_form').val() == '') {
        //             jQuery.ajax({
        //                 url: "{{ url('/add_employee') }}",
        //                 method: 'post',
        //                 data: {
        //                     name: jQuery('#name').val(),
        //                     position: jQuery('#position').val(),
        //                     email: jQuery('#email').val(),
        //                 },
        //                 success: function(result){
        //                     $.unblockUI();
        //                     if (result.success == false) {
        //                         $('#error_msg').html(result.errors);
        //                     }else{
        //                         $('#registerModal').modal('hide');
        //                         const toast = swal.mixin({
        //                             toast: true,
        //                             position: 'top-end',
        //                             showConfirmButton: false,
        //                             timer: 3000,
        //                             padding: '2em'
        //                         });

        //                         toast({
        //                             type: 'success',
        //                             title: 'Employee Added Successfully',
        //                             padding: '2em',
        //                         })
                                
        //                         location.reload(true);
        //                     }
        //                 }
        //             });
        //         }else{
        //             jQuery.ajax({
        //                 url: "{{ url('/update_employee') }}",
        //                 method: 'post',
        //                 data: {
        //                     id: jQuery('#edit_form').val(),
        //                     name: jQuery('#name').val(),
        //                     position: jQuery('#position').val(),
        //                     email: jQuery('#email').val(),
        //                 },
        //                 success: function(result){
        //                     $.unblockUI();
        //                     if (result.success == false) {
        //                         $('#error_msg').html(result.errors);
        //                     }else{
        //                         $('#registerModal').modal('hide');
        //                         const toast = swal.mixin({
        //                             toast: true,
        //                             position: 'top-end',
        //                             showConfirmButton: false,
        //                             timer: 3000,
        //                             padding: '2em'
        //                         });

        //                         toast({
        //                             type: 'success',
        //                             title: 'Employee Updated Successfully',
        //                             padding: '2em',
        //                         })
                                
        //                         location.reload(true);
        //                     }
        //                 }
        //             });
        //         }
                
        //     });
        //     $('.action-edit').click(function(e){
        //         e.preventDefault();
        //         $.ajaxSetup({
        //             headers: {
        //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
        //         $.blockUI({
        //             message: '<svg> ... </svg>',
        //             fadeIn: 800, 
        //             timeout: 2000, //unblock after 2 seconds
        //             overlayCSS: {
        //                 backgroundColor: '#1b2024',
        //                 opacity: 0.8,
        //                 zIndex: 1200,
        //                 cursor: 'wait'
        //             },
        //             css: {
        //                 border: 0,
        //                 color: '#fff',
        //                 zIndex: 1201,
        //                 padding: 0,
        //                 backgroundColor: 'transparent'
        //             }
        //         });
        //         jQuery.ajax({
        //             url: "{{ url('/get_employee') }}",
        //             method: 'post',
        //             data: {
        //                 id: this.id,
        //             },
        //             success: function(result){
        //                 $.unblockUI();
        //                 if (result.success == false) {
        //                     $('#error_msg').html(result.errors);
        //                 }else{
        //                     $('#registerModal').modal('show');
        //                     $('#edit_form').val(result.data.id);
        //                     $('.add_new_employee').text('Update Employee');
        //                     $('#name').val(result.data.name);
        //                     $('#position').val(result.data.position);
        //                     $('#email').val(result.data.email);
        //                 }
        //             }
        //         });

        //     });
        //     $('.action-delete').click(function(e){
        //         id = this.id;
        //         e.preventDefault();
        //         $.ajaxSetup({
        //             headers: {
        //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
        //         swal({
        //             title: 'Are you sure?',
        //             text: "You want to this record!",
        //             type: 'warning',
        //             showCancelButton: true,
        //             confirmButtonText: 'Delete',
        //             padding: '2em'
        //         }).then(function(result) {
        //             if (result.value) {
        //                 jQuery.ajax({
        //                     url: "{{ url('/delete_employee') }}",
        //                     method: 'post',
        //                     data: {
        //                         id: id,
        //                     },
        //                     success: function(result){
        //                         $.unblockUI();
        //                         if (result.success == false) {
        //                             $('#error_msg').html(result.errors);
        //                         }else{
        //                             location.reload(true);
        //                         }
        //                     }
        //                 });
        //             }
        //         })
                

        //     });
        // });
    </script>
@endsection