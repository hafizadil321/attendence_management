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
                            <li><label>Subscriber Details</label></li>
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
                                <h2 class="card__title_heading">Subscriber Details</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-3">
                        <form class="row" method="post" action="{{ route('subscribers') }}">
                            @csrf
                            <div class="col-lg-12">
                                <div class="search__table_title">
                                    <h5>Search by Location</h5>
                                </div>
                            </div>
                            <div class="col-lg-4 pr-0">
                                <div class="search___input_tables">
                                    <input type="text" name="city" value="@if(isset($_POST['city'])){{$_POST['city']}}@endif" placeholder="City">
                                </div>
                            </div>
                            <div class="col-lg-4 pr-0">
                                <div class="search___select_tables">
                                    @php $c=''; @endphp
                                    @if (isset($_POST['country'])) @php $c=$_POST['country']; @endphp @endif
                                    <select name="country">
                                        <option value="">Country</option>
                                        <option value="pakistan" @if ($c == 'pakistan') selected @endif>Pakistan</option>
                                        <option value="usa" @if ($c == 'usa') selected @endif>Usa</option>
                                        <option value="canada" @if ($c == 'canada') selected @endif>Canada</option>
                                        <option value="rome" @if ($c == 'rome') selected @endif>Rome</option>
                                        <option value="madrid" @if ($c == 'madrid') selected @endif>Madrid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="table__form_search_btn">
                                    <button class="btn__style_6">
                                        search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-7 mt-3">
                        <form class="row" method="GET" action="#" id="plan_filter">
                            <div class="offset-lg-1 col-lg-11">
                                <div class="search__table_title">
                                    <h5>Filter by</h5>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-11">
                                <div class="filter___main_checkbok">

                                    <div class="filter__label">
                                        <div class="filter__main_checkbox">
                                            <label class="checkbox__custom_animation bounce">
                                                <input type="checkbox" @if (isset($_GET['plan_1'])) checked @endif name="plan_1" class="checkbox">
                                                <svg viewBox="0 0 21 21">
                                                    <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="checkbox__label">
                                            <label>Plan 1(32)</label>
                                        </div>
                                    </div>

                                    <div class="filter__label">
                                        <div class="filter__main_checkbox">
                                            <label class="checkbox__custom_animation bounce">
                                                <input type="checkbox" @if (isset($_GET['plan_2'])) checked @endif name="plan_2" class="checkbox">
                                                <svg viewBox="0 0 21 21">
                                                    <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="checkbox__label">
                                            <label>Plan 2(32)</label>
                                        </div>
                                    </div>

                                    <div class="filter__label">
                                        <div class="filter__main_checkbox">
                                            <label class="checkbox__custom_animation bounce">
                                                <input type="checkbox" @if (isset($_GET['plan_3'])) checked @endif name="plan_3" class="checkbox">
                                                <svg viewBox="0 0 21 21">
                                                    <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="checkbox__label">
                                            <label>Plan 3(50)</label>
                                        </div>
                                    </div>

                                    <div class="filter__label">
                                        <div class="filter__main_checkbox">
                                            <label class="checkbox__custom_animation bounce">
                                                <input type="checkbox" name="plan_gifted" @if (isset($_GET['plan_gifted'])) checked @endif class="checkbox">
                                                <svg viewBox="0 0 21 21">
                                                    <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="checkbox__label">
                                            <label>Gifted(5)</label>
                                        </div>
                                    </div>
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
                                                <th scope="col" class="width__18">Name</th>
                                                <th scope="col">Located</th>
                                                <th scope="col">Plan Subscribed</th>
                                                <th scope="col">Subscribtion Time</th>
                                                <th scope="col">Subscribtion Expire</th>
                                                <th scope="col" class="width___15">Events Created</th>
                                            </tr>
                                        </thead>
                                        <tbody class="full__content_control">
                                        @foreach ($subscribers as $subscriber)
                                            <tr>
                                                <td class="width__18">
                                                    <div class="table__profile_name_holder">
                                                        <div class="table__profile_img">
                                                            @if(isset($subscriber->user->image))
                                                            <img src="{{ asset('images/profile_image/'.$subscriber->user->image) }}">
                                                            @else   
                                                            <img src="assets/images/avatars/dummy.png">
                                                            @endif
                                                            <div class="subsctipion__crwon">
                                                                <img src="{{ asset('images/plans/'.$subscriber->plan->plan_image)}}">
                                                            </div>
                                                        </div>
                                                        <div class="table__profile_content">
                                                            <label>{{ $subscriber->user->name }}</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="width__10">
                                                    <div class="tbl__label_setting">
                                                        <label>{{ $subscriber->user->city }}, {{ $subscriber->user->country }}</label>
                                                    </div>
                                                </td>
                                                <td class="width__12">
                                                    <div class="gifted__plan_crown">
                                                        <span>@if(isset($subscriber->plan->plan_name)){{ $subscriber->plan->plan_name }}@endif<img src="{{ asset('images/plans/'.$subscriber->plan->plan_image)}}"></span>
                                                    </div>
                                                </td>
                                                <td class="width___15">
                                                    <div class="tbl__label_setting">
                                                        <label>{{ date('d.m.Y',strtotime($subscriber->startDate)) }}</label>
                                                    </div>
                                                </td>
                                                <td class="width__10">
                                                    <div class="tbl__label_setting">
                                                        <label>{{ date('d.m.Y',strtotime($subscriber->endDate)) }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="event__created_btn">
                                                        <div class="event__count">
                                                            <label>{{ $subscriber->user->user_events->count() }}</label>
                                                        </div>
                                                        <div class="event__view_btn">
                                                            <a href="{{ url('subscriber-events/'.$subscriber->user->id) }}">View All</a>
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
                                                    <label>Showing <span>{{($subscribers->currentpage()-1)*$subscribers->perpage()+1}}-{{$subscribers->currentpage()*$subscribers->perpage()}}</span> of <strong>{{ $subscribers->total() }}</strong> Subscribers</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            {{ $subscribers->links('vendor.pagination.custom_pagination') }}
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
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
    $('.checkbox').on('change',function(){
        $('#plan_filter').submit();
    });
</script>   
@endsection