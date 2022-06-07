@extends('admin.layout.main_layout')
@section('content')
<!--page-wrapper-->
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="event___attendees__main_wrapper common__card_wrapper">
                        <div class="event___attendees__header">
                            <div class="event___attendees__header_title">
                                <h2 class="card__title_heading mt-2">Event Attendees</h2>
                            </div>
                            <div class="event___attendees__header_dropdown">
                                <div class="event___attendees__select__placeholder">
                                    <select>
                                        <option>Sort by A-Z</option>
                                        <option>Sort by Z-A</option>
                                        <option>Sort by A</option>
                                    </select>
                                    <div class="event___attendees__select__icon">
                                        <img src="assets/images/filters.svg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="event___attendees__body_wrapper">
                        <div class="row mt-4">
                        @foreach ($attendees as $attendee)
                            <div class="col-lg-4 mt-3">
                                <div class="attendee_profile_wrapper">
                                    <div class="attendee_profile_main">
                                        <div class="attendee_profile_img">
                                            <img src="{{ asset('images/profile_image/'. $attendee->user->image) }}">
                                        </div>
                                        <div class="attendee_profile_name">
                                            <span>{{ $attendee->user->name }}</span>
                                        </div>
                                    </div>
                                    <div class="attendee_profile_sms">
                                        <a href=""><img src="{{ asset('assets/images/sms.svg') }}"></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="event__pagination_wrppear mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="tab__count__result_wrapper">
                                        <div class="tab__count__result">
                                            <label>Showing <span>{{($attendees->currentpage()-1)*$attendees->perpage()+1}}-{{$attendees->currentpage()*$attendees->perpage()}}</span> of <strong>{{ $attendees->total() }}</strong> Attendees</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    {{ $attendees->links('vendor.pagination.custom_pagination') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
</script>   
@endsection