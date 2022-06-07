@extends('admin.layout.main_layout')
@section('content')
<!--page-wrapper-->
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <!-- breadcrumbs Mobile+Dasktop --Start Here -->
                <div class="col-lg-12">
                    <div class="mobile__breadcrumb breadcrumbs__placeholder">
                        <ul>
                            <li><a href="#"><i class="fas fa-arrow-left"></i></a></li>
                            <li><a href="main-dashboard.html">Dashboard <i class=""></i></a></li>
                            <li><i class="fas fa-chevron-right"></i></li>
                            <li><label>Message</label></li>
                        </ul>
                    </div>
                </div>
                <!-- breadcrumbs Mobile+Dasktop --End's Here -->
            </div>
            
            <section class="message__list_wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card__title_wrapper">
                            <h2 class="card__title_heading">All Events</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 text__align_right">
                        <div class="card__tabs_pills_wrapper ">
                            <ul class="nav nav-pills pilles__settings" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Upcoming Events</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Past Events</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <div class="tabs__pills_content_wrapper">
                            <div class="tab-content" id="pills-tabContent">
                                <!-- Upcoming Events Start Here  -->
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <!-- Upcoming Events End's Here  -->
                                @foreach ($messages as $key1 => $message)
                                @if($message->event->start_time >  Carbon\Carbon::today())
                                <!-- Signle Message List Item Start Here -->
                                <div class="single__message_list_wrapper hvr-float">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <a href="chat.html">
                                                <div class="single__message_list_img_wrapper">
                                                    <div class="single__message_list_img">
                                                        <img src="{{ asset('images/profile_image/'.$message->user->image) }}" class="ornage__color_border">
                                                        <div class="crown__placeholder">
                                                            <img src="{{ asset('assets/images/crowns/orange-crown.svg') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-5 pl-0">
                                            <div class="single__message_list_content_wrapper">
                                                <div class="single__message_list_content">
                                                    <div class="profile__name_posting_date">
                                                        <ul>
                                                            <li>
                                                                <a href="chat.html">
                                                                    <h4 class="orange__color_heading">{{ $message->user->name }}</h4></a>
                                                            </li>
                                                            <li>{{ Carbon\Carbon::parse($message->event->start_time)->format('d M, g:i A' ) }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="single__message_desc">
                                                        <p>{{ $message->event->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="single__message_list_event_imgs_wrapper">
                                                <div class="single__message_list_event">
                                                    <div class="event__heading_list">
                                                        <h5>Event Name & Images: <span><a href="#">{{ $message->event->name }}</a></span></h5>
                                                    </div>
                                                    <div class="single__message_list_event_imgs">
                                                        <ul>
                                                        @foreach ($message->event->gallery as $key11 => $gallery)
                                                        @if($key11 < 3)
                                                            <li>
                                                                <div>
                                                                    <a class="fancybox" rel="group{{ $key1 }}" href="{{asset('images/events-gallery/'.$gallery->banner) }}"><img src="{{asset('images/events-gallery/'.$gallery->banner) }}" alt="" class="img-fluid" /></a>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="single__message_list_btns">
                                                <a href="{{ url('event-messages/').'/' }}{{$message->user->id}}/{{$message->event->id}}"><i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Signle Message List Item End's Here -->
                                @endif
                                @endforeach
                                </div>

                                <!-- Upcoming Events Start Here  -->
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    
                                @foreach ($messages as $key2=> $message)
                                @if($message->event->start_time <  Carbon\Carbon::today())
                                <!-- Signle Message List Item Start Here -->
                                <div class="single__message_list_wrapper hvr-float">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <a href="chat.html">
                                                <div class="single__message_list_img_wrapper">
                                                    <div class="single__message_list_img">
                                                        <img src="{{ asset('images/profile_image/'.$message->user->image) }}" class="ornage__color_border">
                                                        <div class="crown__placeholder">
                                                            <img src="{{ asset('assets/images/crowns/orange-crown.svg') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-5 pl-0">
                                            <div class="single__message_list_content_wrapper">
                                                <div class="single__message_list_content">
                                                    <div class="profile__name_posting_date">
                                                        <ul>
                                                            <li>
                                                                <a href="chat.html">
                                                                    <h4 class="orange__color_heading">{{ $message->user->name }}</h4></a>
                                                            </li>
                                                            <li>{{ Carbon\Carbon::parse($message->event->start_time)->format('d M, g:i A' ) }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="single__message_desc">
                                                        <p>{{ $message->event->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="single__message_list_event_imgs_wrapper">
                                                <div class="single__message_list_event">
                                                    <div class="event__heading_list">
                                                        <h5>Event Name & Images: <span><a href="#">{{ $message->event->name }}</a></span></h5>
                                                    </div>
                                                    <div class="single__message_list_event_imgs">
                                                        <ul>
                                                        @foreach ($message->event->gallery as $key22 => $gallery)
                                                        @if($key22 < 3)
                                                            <li>
                                                                <div>
                                                                    <a class="fancybox" rel="group{{ $key2 }}" href="{{asset('images/events-gallery/'.$gallery->banner) }}"><img src="{{asset('images/events-gallery/'.$gallery->banner) }}" alt="" class="img-fluid" /></a>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="single__message_list_btns">
                                                <a href="{{ url('event-messages/').'/' }}{{$message->event->id}}"><i class="fas fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Signle Message List Item End's Here -->
                                @endif
                                @endforeach

                                

                                </div>
                                <!-- Upcoming Events End's Here  -->
                                <div class="event__pagination_wrppear mt-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="tab__count__result_wrapper">
                                                <div class="tab__count__result">
                                                    <label>Showing <span>{{($messages->currentpage()-1)*$messages->perpage()+1}}-{{$messages->currentpage()*$messages->perpage()}}</span> of <strong>{{ $messages->total() }}</strong> Messages</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            {{ $messages->links('vendor.pagination.custom_pagination') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!--end page-content-wrapper-->
</div>
<!--end page-wrapper-->
@endsection
@section('js')
<script type="text/javascript">
    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 3000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>   
@endsection