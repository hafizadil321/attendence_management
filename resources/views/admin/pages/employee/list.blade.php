@section('css')
<!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/dt-global_style.css')}}">
    <!-- END PAGE LEVEL STYLES -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('assets/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/assets/css/components/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/forms/theme-checkbox-radio.css')}}">
<link href="{{ asset('assets/assets/css/apps/invoice-list.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endsection
@extends('admin.layout.main_layout')
@section('content')
<!--page-wrapper-->
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="dt--top-section">
                    <div class="row">
                        <!-- <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target=".bd-example-modal-lg">Large</button> -->
                        <button type="button" class="btn btn-primary btn-sm ml-4 mb-2 mr-2" data-toggle="modal" data-target="#registerModal"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                            <span>Add</span></button>
                    </div>
                </div>
                <table id="default-ordering" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Member Since</th>
                            <th>Salary</th>
                            <th class="dt-no-sorting text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $emp)
                        <tr>
                            <td>{{ $emp->name }}</td>
                            <td>{{ $emp->email }}</td>
                            <td>{{ $emp->position }}</td>
                            <td>{{ $emp->created_at }}</td>
                            <td>$320,800</td>
                            <td class="text-center"><button class="btn btn-info btn-sm" id="{{ $emp->id }}">Edit</button><button class="btn btn-danger btn-sm" id="{{ $emp->id }}">Delete</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Member Since</th>
                            <th>Salary</th>
                            <th class="invisible"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>

</div>
<!--end page-wrapper-->
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
<script src="{{ asset('assets/plugins/table/datatable/datatables.js')}}"></script>
<script src="{{ asset('assets/plugins/highlight/highlight.pack.js')}}"></script>
<script src="{{ asset('assets/assets/js/scrollspyNav.js')}}"></script>
<script src="{{ asset('assets/plugins/blockui/jquery.blockUI.min.js')}}"></script>
<script src="{{ asset('assets/plugins/blockui/custom-blockui.js')}}"></script>
<script src="{{ asset('assets/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
<script>        
    $('#default-ordering').DataTable( {
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "order": [[ 3, "desc" ]],
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7,
        drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered'); }
    } );

    $('.add_new_employee').on('click', function(){

    })
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
                        
                        // location.reload(true);
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
    $('.btn-info').click(function(e){
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
    $('.btn-danger').click(function(e){
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
<!-- END PAGE LEVEL SCRIPTS -->
@endsection