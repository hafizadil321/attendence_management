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
                            <li><label>Award Plan</label></li>
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
                                <h2 class="card__title_heading">Award Plan</h2>
                            </div>
                            <div class="gifted__award_btn">
                                <a href="{{route('award')}}" class="btn__style_5">All Person List</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-3">
                        <div class="award__table_wrapper">
                            <h5>Gifted Person Details:</h5>
                        </div>
                    </div>
                    <div class="col-lg-7 mt-3">
                        <form class="row" action="#" method="get">
                            <div class="offset-lg-1 col-lg-11">
                                <div class="search__table_title">
                                    <h5>Search by Category</h5>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-4">
                                <div class="search___input_tables">
                                    <input type="text" name="username" placeholder="Username/email" value="@if(isset($_GET['username'])){{$_GET['username']}}@endif">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="search___input_tables">
                                    <input type="text" name="citycountry" placeholder="City/Country" value="@if(isset($_GET['citycountry'])){{$_GET['citycountry']}}@endif">
                                </div>
                            </div>
                            <div class="col-lg-3">
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
                                                <th scope="col">
                                                    <label class="checkbox__custom_animation bounce custom__header_check">
                                                        <input type="checkbox" id="some1"  data-check-pattern="[name^='user_id']">
                                                        <svg viewBox="0 0 21 21">
                                                            <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                        </svg>
                                                    </label>
                                                </th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">City/Country</th>
                                                <th scope="col" class="width__12">Plan To Gift</th>
                                                <th scope="col">Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody class="full__content_control">
                                            @foreach ($subscribers as $subscriber)
                                            <tr>
                                                <td style="width: 2%;">
                                                    <label class="checkbox__custom_animation bounce">
                                                        <input type="checkbox" name="user_id" value="{{ $subscriber->id }}" id="{{ $subscriber->id }}">
                                                        <svg viewBox="0 0 21 21">
                                                            <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                        </svg>
                                                    </label>
                                                </td>
                                                <td class="width__18">
                                                    <div class="table__profile_name_holder">
                                                        <div class="table__profile_img">
                                                            <img src="assets/images/avatars/avatar-1.png">
                                                        </div>
                                                        <div class="table__profile_content">
                                                            <label>{{ $subscriber->name }}</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="width__10">
                                                    <div class="tbl__label_setting">
                                                        <label>{{ $subscriber->email }}</label>
                                                    </div>
                                                </td>
                                                <td class="width__12">
                                                    <div class="tbl__label_setting">
                                                        <label>{{ $subscriber->city }}, {{ $subscriber->country }}</label>
                                                    </div>
                                                </td>
                                                <td class="width__12">
                                                    <div class="select__wrapper">
                                                        <select class="select__settings_table">
                                                            @foreach ($plans as $plan)
                                                                <option value="{{ $plan->id }}" @if((isset($subscriber->subscription->plan)) && ($subscriber->subscription->plan->id == $plan->id)) selected @endif>Gift Plan - {{ $plan->plan_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="multiselect__wrapper">
                                                        <div>
                                                            <input type="date" name="">
                                                        </div>
                                                        <div>
                                                            <input type="date" name="">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <form class="table__footer_selection" id="award_footer_form">
                                    <div class="footer__table_section_1_wrapper">
                                        <div class="selection_person_wrapper">
                                            <div class="person_select_content">
                                                {{-- <div class="person__checkedbox">
                                                    <label class="checkbox__custom_animation bounce">
                                                        <input type="checkbox">
                                                        <svg viewBox="0 0 21 21">
                                                            <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                                        </svg>
                                                    </label>
                                                </div> --}}
                                                <div class="person__checkedbox_content">
                                                    <p><span>(<span id="selected" style="margin-right: 0px;"></span>)</span>Person Selected</p>
                                                </div>
                                            </div>
                                            <div class="plan__to_gift_wrapper">
                                                <div class="plan__to_gift_label">
                                                    <label>Plan to Gift:</label>
                                                </div>
                                                <div class="plan__to_gift_selection">
                                                    <select class="select__settings_table" name="plan" id="plan">
                                                        @foreach ($plans as $plan)
                                                            <option value="{{ $plan->id }}">Gift Plan - {{ $plan->plan_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="duration__main_wrapper">
                                            <p>Duration</p>
                                            <div class="duration__date_wrappers">
                                                <div class="multiselect__wrapper">
                                                    <div>
                                                        <input type="text" name="" id="startDate" value="{{ Carbon\Carbon::now() }}" readonly>
                                                    </div>
                                                    <div>
                                                        <input type="date" name="" id="endDate">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="save__btn_wrapper">
                                            <div class="wapper_list_btn">
                                                <ul>
                                                    <li><a href="#" class="btn__style_7">cancle</a></li>
                                                    <li><a href="#"  id="planToGift" class="btn__style_8" >Save</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

		jQuery(function() {
			jQuery('[data-check-pattern]').checkAll();
		});

		;(function($) {
			'use strict';
			const selectedElm = document.getElementById('selected');
			$.fn.checkAll = function(options) {
				return this.each(function() {
					var mainCheckbox = $(this);
					var selector = mainCheckbox.attr('data-check-pattern');
					var onChangeHandler = function(e) {
						var $currentCheckbox = $(e.currentTarget);
						var $subCheckboxes;

						if ($currentCheckbox.is(mainCheckbox)) {
							$subCheckboxes = $(selector);
							$subCheckboxes.prop('checked', mainCheckbox.prop('checked'));
							selectedElm.innerHTML = document.querySelectorAll('input[name=user_id]:checked').length;
							$("#award_footer_form").show("slow");
						} else if ($currentCheckbox.is(selector)) {
							$subCheckboxes = $(selector);
							mainCheckbox.prop('checked', $subCheckboxes.filter(':checked').length === $subCheckboxes.length);
							selectedElm.innerHTML = document.querySelectorAll('input[name=user_id]:checked').length;
							$("#award_footer_form").show("slow");
						}
					};
					$(document).on('change', 'input[type="checkbox"]', onChangeHandler);
				});
			};
		}(jQuery));




    // const selectedElm = document.getElementById('selected');
	// 	function showChecked(){
	// 		selectedElm.innerHTML = document.querySelectorAll('input[name=user_id]:checked').length;
	// 		// $("#award_footer_form").css("display", "block");
	// 		$("#award_footer_form").show("slow");
	// 	}
	// 	document.querySelectorAll("input[name=user_id]").forEach(i=>{
	// 		i.onclick = () => showChecked();
	// 	});
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#planToGift').on('click', function(e) {
        alert('poikk');
        e.preventDefault();
        user_ids = [];
        $("input:checkbox[name=user_id]:checked").each(function(){
            user_ids.push($(this).val());
        });
        var plan = $('#plan').val();
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        $.ajax({
            type:'POST',
            url:'{{ route('award-plan-user') }}',
            data:{user_ids:user_ids,plan:plan,startDate:startDate,endDate:endDate, _token: '{{csrf_token()}}' },
            success:function(data) {
                location.reload();
            }
        });
    });
</script>
@endsection