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
                            <li><label>Subscriber Events</label></li>
                        </ul>
                    </div>
                </div>
                <!-- breadcrumbs Mobile+Dasktop --End's Here -->
            </div>
            <section class="award__plan_main_wrapper common__card_wakeupevents">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="award__header_wrapper">
                            <div class="award__card__title_wrapper">
                                <h2 class="card__title_heading">Subscriber Events</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="award__table_wrapper">
                            <h5>Event Details:</h5>
                        </div>
                    </div>
                    <div class="col-lg-8 mt-3">
                        <form class="row" method="GET" action="#">
                            <div class="col-lg-12 pl-0">
                                <div class="search__table_title">
                                    <h5>Search by Category</h5>
                                </div>
                            </div>
                            <div class="col-lg-3 pl-0">
                                <div class="search___input_tables">
                                    <input type="text" name="username" @if(isset($_GET['username'])) value="{{ $_GET['username'] }}" @endif placeholder="Username/email">
                                </div>
                            </div>
                            <div class="col-lg-3 pl-0">
                                <div class="search___input_tables">
                                    <input type="text" name="citycountry" @if(isset($_GET['citycountry'])) value="{{ $_GET['citycountry'] }}" @endif placeholder="City/Country">
                                </div>
                            </div>
                            <div class="col-lg-3 pl-0 pr-0">
                                <div class="search___input_tables">
                                    <input type="text" name="event_name" placeholder="Event Name" @if(isset($_GET['event_name'])) value="{{ $_GET['event_name'] }}" @endif>
                                </div>
                            </div>
                            <div class="col-lg-3 ">
                                <div class="table__form_search_btn">
                                    <button class="btn__style_6">
                                        search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <div class="table_main_wrapper" >
                            <div class="table-responsive table__setting" >
                                <div class="table__main_head_wrapper table__body_height">
                                    <table class="table mb-0" >
                                        <thead class="header__fixed_clear">
                                            <tr>
                                                <th scope="col" class="width__18">Event Name</th>
                                                <th scope="col">Created by</th>
                                                <th scope="col">Located</th>
                                                <th scope="col">Date</th>
                                                <th scope="col" class="width___15">Images</th>
                                                <th scope="col" class="width__10"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="full__content_control">
                                            @foreach ($events as $key => $event)
                                            <tr>
                                                <td class="width__18">
                                                    <div class="tbl__label_setting">
                                                        <label>{{ $event->name }}-{{ date('Y', strtotime($event->start_time))}}</label>
                                                    </div>
                                                </td>
                                                <td class="width__18">
                                                    <div class="table__profile_name_holder">
                                                        <div class="table__profile_img">
                                                            @if (isset($event->user))
                                                            <img src="{{ asset('images/profile_image/'.$event->user->image)}}">
                                                            @else
                                                            <img src="{{ asset('images/profile_image/1632733508.jpg')}}">
                                                            @endif
                                                            <div class="subsctipion__crwon">
                                                                <img src="assets/images/crowns/orange-crown.svg">
                                                            </div>
                                                        </div>
                                                        <div class="table__profile_content">
                                                            <label>@if(isset($event->user->name)) {{ $event->user->name }} @endif</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="width__10">
                                                    <div class="tbl__label_setting">
                                                        <label>{{$event->city, $event->country}}</label>
                                                    </div>
                                                </td>
                                                <td class="width__12">
                                                    <div class="tbl__label_setting">
                                                        <label>{{ date('m.d.Y', strtotime($event->start_time)) }}</label>
                                                    </div>
                                                </td>
                                                <td class="width___15">
                                                    <div class="table__event_imgs_wrapper">
                                                        <ul>
                                                            @foreach ($event->gallery as $gallery)
                                                            <li>
                                                                <div>
                                                                    <a class="fancybox" rel="group{{ $key }}" href="{{asset('images/events-gallery/'.$gallery->banner)}}"><img src="{{asset('images/events-gallery/'.$gallery->banner)}}" alt="" class="img-fluid" /></a>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td class="width__10" style="text-align: right;">
                                                    <div class="dropdown custom__control_dropdown">
                                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu custom__control_panel subscribe_setting" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item custom__drop_down_item" href="{{ route('events.show', $event->id) }}">
                                                                <img src="assets/images/view-orange.svg" width="20" height="20">
                                                                <span>View Event</span>
                                                            </a>
                                                            <a class="dropdown-item custom__drop_down_item" href="{{ route('events.edit', $event->id) }}">
                                                                <img src="assets/images/edit-red.svg" width="20" height="20">
                                                                <span>Edit Event</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="event__pagination_wrppear mt-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="tab__count__result_wrapper">
                                                <div class="tab__count__result">
                                                    <label>Showing <span>{{($events->currentpage()-1)*$events->perpage()+1}}-{{$events->currentpage()*$events->perpage()}}</span> of <strong>{{ $events->total() }}</strong> Events</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            {{ $events->links('vendor.pagination.custom_pagination') }}
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
    new PerfectScrollbar('.table__body_height');

    $(document).ready(function() {
			$(".fancybox").fancybox();
		});
</script>   
@endsection