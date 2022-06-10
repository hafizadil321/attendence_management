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
            <div class="widget-content widget-content-area br-6">
                <table id="invoice-list" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Member Since</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $emp)
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <div class="usr-img-frame mr-2 rounded-circle">
                                        <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset('assets/assets/img/profile-12.jpg')}}">
                                    </div>
                                    <p class="align-self-center mb-0 user-name"> {{ $emp->name }} </p>
                                </div>
                            </td>
                            <td><span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> {{ $emp->email }}</span></td>
                            <td><span class="inv-email">{{ $emp->position }}</span></td>

                            <td>
                                <span class="inv-date">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg> {{ Carbon\Carbon::parse($emp->created_at)->format('d M Y') }}
                                </span>
                            </td>
                            <td><span class="badge badge-success inv-status">Paid</span></td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                        <a class="dropdown-item action-edit" id="{{ $emp->id }}" href="apps_invoice-edit.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>Edit</a>
                                        <a class="dropdown-item action-delete" id="{{ $emp->id }}" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>Delete</a>
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
<div class="modal fade show" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header" id="registerModalLabel">
            <h4 class="modal-title">Add New Employee</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
          </div>
          <div class="modal-body">
            <div id="error_msg" class="text-center text-danger mb-2"></div>
            <form class="mt-0">
                <input type="hidden" class="" id="edit_form">
               <div class="form-group">
                <label>Employee Name</label>
                <input type="text" class="form-control mb-2" id="name" name="name" placeholder="Enter Name">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control mb-2" id="email" placeholder="Enter Email">
              </div>
              <div class="form-group">
                <label>Position</label>
                <input type="text" class="form-control mb-2" id="position" placeholder="Enter Employee Position">
              </div>
              <!-- <div class="form-group">
                <input type="password" class="form-control mb-4" id="exampleInputPassword2" placeholder="Password">
              </div> -->
              <button type="submit" class="btn btn-primary mt-2 mb-2 btn-block add_new_employee">Add New Employee</button>
            </form>

            <!-- <div class="division">
                  <span>OR</span>
            </div>

            <div class="social">
                <a href="javascript:void(0);" class="btn social-fb"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg> <span class="brand-name">Facebook</span></a>
                <a href="javascript:void(0);" class="btn social-github"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg> <span class="brand-name">Github</span></a>
            </div> -->

          </div>
          <div class="modal-footer justify-content-center">
            <div class="forgot login-footer">
               <!--  <span>Already have <a href="javascript:void(0);">Login</a>?</span> -->
            </div>
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
        $(document).ready(function(){
            $('.add_new_employee').click(function(e){
                e.preventDefault();
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

                if ($('#edit_form').val() == '') {
                    jQuery.ajax({
                        url: "{{ url('/add_employee') }}",
                        method: 'post',
                        data: {
                            name: jQuery('#name').val(),
                            position: jQuery('#position').val(),
                            email: jQuery('#email').val(),
                        },
                        success: function(result){
                            $.unblockUI();
                            if (result.success == false) {
                                $('#error_msg').html(result.errors);
                            }else{
                                $('#registerModal').modal('hide');
                                const toast = swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    padding: '2em'
                                });

                                toast({
                                    type: 'success',
                                    title: 'Employee Added Successfully',
                                    padding: '2em',
                                })
                                
                                location.reload(true);
                            }
                        }
                    });
                }else{
                    jQuery.ajax({
                        url: "{{ url('/update_employee') }}",
                        method: 'post',
                        data: {
                            id: jQuery('#edit_form').val(),
                            name: jQuery('#name').val(),
                            position: jQuery('#position').val(),
                            email: jQuery('#email').val(),
                        },
                        success: function(result){
                            $.unblockUI();
                            if (result.success == false) {
                                $('#error_msg').html(result.errors);
                            }else{
                                $('#registerModal').modal('hide');
                                const toast = swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    padding: '2em'
                                });

                                toast({
                                    type: 'success',
                                    title: 'Employee Updated Successfully',
                                    padding: '2em',
                                })
                                
                                location.reload(true);
                            }
                        }
                    });
                }
                
            });
            $('.action-edit').click(function(e){
                e.preventDefault();
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
                    url: "{{ url('/get_employee') }}",
                    method: 'post',
                    data: {
                        id: this.id,
                    },
                    success: function(result){
                        $.unblockUI();
                        if (result.success == false) {
                            $('#error_msg').html(result.errors);
                        }else{
                            $('#registerModal').modal('show');
                            $('#edit_form').val(result.data.id);
                            $('.add_new_employee').text('Update Employee');
                            $('#name').val(result.data.name);
                            $('#position').val(result.data.position);
                            $('#email').val(result.data.email);
                        }
                    }
                });

            });
            $('.action-delete').click(function(e){
                id = this.id;
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                swal({
                    title: 'Are you sure?',
                    text: "You want to this record!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    padding: '2em'
                }).then(function(result) {
                    if (result.value) {
                        jQuery.ajax({
                            url: "{{ url('/delete_employee') }}",
                            method: 'post',
                            data: {
                                id: id,
                            },
                            success: function(result){
                                $.unblockUI();
                                if (result.success == false) {
                                    $('#error_msg').html(result.errors);
                                }else{
                                    location.reload(true);
                                }
                            }
                        });
                    }
                })
                

            });
        });
    </script>
@endsection