<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Coming Soon | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/assets/img/favicon.ico')}}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/assets/css/pages/coming-soon/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/css/forms/switches.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/css/elements/alert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/css/components/cards/card.css')}}">
</head>
<body class="coming-soon">    

    <div class="coming-soon-container">
        <div class="coming-soon-cont">
            <div class="coming-soon-wrap">
                <div class="coming-soon-container">
                    <div class="coming-soon-content">

                        <h4 class="">Attendance</h4>
                        <p class="">We will be here in a shortwhile.....</p>
                        <div id="error_msg"></div>
                        <div class="card component-card_4">
                            <div class="card-body">
                                <div class="user-profile">
                                    <img height="50" width="50" src="{{ asset('assets/assets/img/user_image.png') }}" class="" alt="..." id="emp_image">
                                </div>
                                <div class="user-info">
                                    <h5 class="card-user_name" id="emp_name">Luke Ivory</h5>
                                    <p class="card-user_occupation" id="emp_position">Manager</p>  
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card component-card_1">
                            <div class="card-body">
                                <div class="icon-svg">
                                    <img src="" id="emp_image">
                                </div>
                                <h5 class="card-title mt-4" id="emp_name"></h5>
                                <p class="card-text" id="emp_position"> </p>
                            </div>
                        </div> -->

                        <h3>Enter your attendance code!</h3>

                        <form class="text-left">
                            <div class="coming-soon">

                                <div class="">
                                    <div id="email-field" class="field-wrapper input">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                                        <input id="code" name="code" class="form-control" type="number" value="" placeholder="Enter Code" required="required">
                                        <button class="btn btn-primary">Enter</button>
                                    </div>                                    
                                </div>

                            </div>
                        </form>

                        <ul class="social list-inline">
                            <li class="list-inline-item"><a class="" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></a></li>
                            <li class="list-inline-item"><a class="" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a></li>
                            <li class="list-inline-item"><a class="" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a></li>
                            <li class="list-inline-item"><a class="" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></a></li>
                        </ul>

                        <p class="terms-conditions">© 2021 All Rights Reserved. <a href="index-2.html">CORK</a> is a product of Designreset. <a href="javascript:void(0);">Cookie Preferences</a>, <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.</p>

                    </div>                    
                </div>
            </div>
        </div>
        <div class="coming-soon-image">
            <div class="l-image">
                <div class="img-content">
                    <img src="{{asset('assets/assets/img/mindset.svg')}}" alt="coming_soon">
                </div>
            </div>
        </div>
    </div>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('assets/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/blockui/custom-blockui.js')}}"></script>

    <script src="{{ asset('assets/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.btn-primary').click(function(e){
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
                    url: "{{ url('/attendance') }}",
                    method: 'post',
                    data: {
                        code: $('#code').val(),
                    },
                    success: function(result){
                        $.unblockUI();
                        $('#error_msg').html('');
                        if (result.success == false) {
                            $('#emp_image').attr("src","");
                            $('#emp_name').html("");
                            $('#emp_position').html("");
                            $('#error_msg').append('<div class="alert alert-light-danger border-0 mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Error!</strong> '+ result.errors +' </div>');
                        }else{
                            $('#code').val();
                            $('#emp_image').attr("src","http://127.0.0.1:8000/assets/assets/img/profile-7.jpg");
                            $('#emp_name').html(result.data.name);
                            $('#emp_position').html(result.data.position);
                        }
                    }
                });

            });
        });
    </script>

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo4/pages_coming_soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jun 2022 14:00:54 GMT -->
</html>