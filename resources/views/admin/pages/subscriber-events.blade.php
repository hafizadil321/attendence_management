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
                            <li><a href="#">Subscriber Details <i class=""></i></a></li>
                            <li><i class="fas fa-chevron-right"></i></li>
                            <li><label>View All</label></li>
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
                                <h2 class="card__title_heading">Events of {{ $user->name }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="award__table_wrapper">
                            <h5>Event Details:</h5>
                        </div>
                    </div>
                    <div class="col-lg-8 mt-3">
                        
                    </div>
                    <div class="col-lg-12 mt-4">
                        <div class="table_main_wrapper" >
                            <div class="table-responsive table__setting" >
                                <div class="table__main_head_wrapper table__body_height">
                                    <table class="table mb-0" >
                                        <thead class="header__fixed_clear">
                                            <tr>
                                                <th scope="col" class="width__18">Event Name</th>
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
                                                        <label>{{ $event->name }}</label>
                                                    </div>
                                                </td>
                                                <td class="width__10">
                                                    <div class="tbl__label_setting">
                                                        <label>{{ $event->city }}, {{ $event->country }}</label>
                                                    </div>
                                                </td>
                                                <td class="width__12">
                                                    <div class="tbl__label_setting">
                                                        <label>{{ date('d-m-Y', strtotime($event->start_time)) }}</label>
                                                    </div>
                                                </td>
                                                <td class="width___15">
                                                    <div class="table__event_imgs_wrapper">
                                                        <ul>
                                                        @if(isset($event->gallery))
                                                            @foreach ($event->gallery as $keye => $gallery)
                                                            @if($keye < 3)
                                                            <li>
                                                                <div>
                                                                    <a class="fancybox" rel="group{{ $key }}" href="{{ asset('images/events-gallery/'.$gallery->banner) }}"><img src="{{ asset('images/events-gallery/'.$gallery->banner) }}" alt="" class="img-fluid" /></a>
                                                                </div>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        @endif
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td class="width__10" style="text-align: right;">
                                                    <div class="dropdown custom__control_dropdown">
                                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu custom__control_panel subscribe_setting detail_view" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item custom__drop_down_item" href="{{ route('events.show',$event->id) }}">
                                                                <img src="{{ asset('assets/images/view-orange.svg') }}" width="20" height="20">
                                                                <span>View Event</span>
                                                            </a>
                                                            <a class="dropdown-item custom__drop_down_item" href="{{ route('events.edit',$event->id) }}">
                                                                <img src="{{ asset('assets/images/edit-red.svg') }}" width="20" height="20">
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