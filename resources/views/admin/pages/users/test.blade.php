@section('css')
<!-- BEGIN PAGE LEVEL STYLES -->
<!--     <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/datatables.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/forms/theme-checkbox-radio.css')}}">
<link href="{{ asset('assets/assets/css/apps/invoice-list.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/assets/css/forms/switches.css')}}" rel="stylesheet" type="text/css" />
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
                            <th>Employee ID</th>
                            <th>Member Since</th>
                            <th>Status</th>
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
                                    <p class="align-self-center mb-0 user-name"> <a href="{{ url('admin/attendance/') }}/{{ $user->id }}">{{ $user->name }}</a> </p>
                                </div>
                            </td>
                            <td><span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> {{ $user->email }}</span></td>
                            <td><span class="inv-email">{{ $user->designation }}</span></td>
                            <td><span class="inv-email">{{ $user->code }}</span></td>

                            <td>
                                <span class="inv-date">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg> {{ Carbon\Carbon::parse($user->joining_date)->format('d M Y') }}
                                </span>
                            </td>
                            <td><label class="switch s-icons s-outline  s-outline-success mr-2">
                                    <input type="checkbox" class="user_status" id="{{ $user->id }}" value="{{ $user->id }}" @if($user->status == 1) checked @endif>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                        <a class="dropdown-item action-edit" id="{{ $user->id }}" href="{{ url('admin/editUser/') }}/{{ $user->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>Edit</a>
                                        <a class="dropdown-item action-edit" id="{{ $user->id }}" href="{{ url('admin/attendance/') }}/{{ $user->id }}"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 116.42 122.88" style="enable-background:new 0 0 116.42 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;} .st1{fill-rule:evenodd;clip-rule:evenodd;fill:#3AAF3C;}</style><g><path class="st0" d="M5.95,112.26c-5.1-0.39-6.33-4.06-5.86-8.29c2.79-24.96,30.78-17.73,42.03-27.86l0,0 c5.61,16.5,29.05,17.11,34.31,0c1.21,1.09,2.89,2.01,4.87,2.82c-1.81,1.1-3.52,2.43-5.09,4c-7.93,7.92-9.88,19.57-5.86,29.33H5.95 L5.95,112.26z M41.97,59.56c2.13,3.37,4.36,6.83,7.12,9.37c2.66,2.43,5.9,4.09,10.16,4.1c4.64,0.01,8.01-1.7,10.76-4.28 c2.86-2.67,5.11-6.34,7.34-10l5.98-9.84c1.11-2.55,1.52-4.25,1.26-5.25c-0.16-0.59-0.81-0.88-1.92-0.93 c-0.23-0.01-0.48-0.01-0.72-0.01c-0.26,0.01-0.54,0.03-0.84,0.05c-0.17,0.01-0.31,0-0.46-0.03c-0.52,0.03-1.08-0.01-1.63-0.09 l2.04-9.06c-15.19,2.39-26.55-8.88-42.59-2.25l1.16,10.67c-0.63,0.04-1.25,0.01-1.82-0.07C28.6,42.24,40.16,56.67,41.97,59.56 L41.97,59.56L41.97,59.56L41.97,59.56z M84.74,40.01c1.47,0.45,2.41,1.38,2.8,2.89c0.43,1.67-0.04,4.03-1.46,7.25l0,0 c-0.03,0.06-0.05,0.12-0.09,0.17l-6.04,9.95c-2.33,3.84-4.69,7.69-7.85,10.63c-3.26,3.06-7.3,5.1-12.81,5.08 c-5.14-0.01-9.02-1.97-12.2-4.89c-3.84-3.52-21.52-25.66-13.62-30.99c0.39-0.25,0.82-0.48,1.28-0.65 c-0.35-4.58-0.47-10.34-0.25-15.17c0.12-1.14,0.34-2.28,0.65-3.43c1.35-4.85,4.76-8.75,8.96-11.43c2.32-1.48,4.87-2.59,7.51-3.33 c1.68-0.48-1.43-5.87,0.3-6.03c8.41-0.87,22.05,6.82,27.93,13.19c2.93,3.18,4.8,7.41,5.2,13L84.74,40.01L84.74,40.01L84.74,40.01 L84.74,40.01L84.74,40.01L84.74,40.01z"/><path class="st1" d="M95.32,80.66c11.66,0,21.11,9.45,21.11,21.11c0,11.66-9.45,21.11-21.11,21.11c-11.66,0-21.11-9.45-21.11-21.11 C74.21,90.11,83.66,80.66,95.32,80.66L95.32,80.66L95.32,80.66L95.32,80.66z M87.77,100.17c1.58,0.91,2.61,1.67,3.83,3.02 c3.17-5.11,6.62-7.94,11.1-11.97l0.44-0.17h4.91c-6.58,7.3-11.68,13.33-16.24,22.13c-2.38-5.08-4.5-8.59-9.23-11.84L87.77,100.17 L87.77,100.17L87.77,100.17z"/></g></svg>Attendance</a>
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
        // $(document).ready(function(){
            $(document).on('click', '.user_status', function(e){
                id = this.id;
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.blockUI({
                    message: '<svg> ... </svg>',
                    fadeIn: 800, 
                    timeout: 2000, //unblock after 2 seconds
                    overlayCSS: {
                        backgroundColor: '#1b2024',
                        opacity: 0.8,
                        zIndex: 1200,
                        cursor: 'wait'
                    },
                    css: {
                        border: 0,
                        color: '#fff',
                        zIndex: 1201,
                        padding: 0,
                        backgroundColor: 'transparent'
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/admin/changeUserStatus') }}",
                    method: 'post',
                    data: {
                        id: id,
                    },
                    success: function(result){
                        $.unblockUI();
                        if (result.success == false) {
                            $('#error_msg').html(result.errors);
                        }
                    }
                });

            });
        // });
    </script>
@endsection