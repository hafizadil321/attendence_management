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
                     <li><label>Create Events</label></li>
                  </ul>
               </div>
            </div>
            <!-- breadcrumbs Mobile+Dasktop --End's Here -->

            <div class="col-lg-12">
               <form class="create__event_wrapper common__card_wrapper" id="create_event" method="post" action="{{ route('events.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="create__event_header_content">
                     <div class="create__event_header_title">
                        <h2 class="card__title_heading mt-2">Create Event</h2>
                     </div>
                     <div class="create__event_btns">
                        <ul>
                           <li><a href="#" class="btn__style_7">Reset</a></li>
                           <li><a href="#" onclick="event.preventDefault();
                                                     document.getElementById('create_event').submit();" class="btn__style_8">Create Event</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="main__form_inputs mt-4">
                     <div class="row">
                        <div class="col-lg-12 mb-2">
                           <div class="form__titles_small">
                              <label>Add Event Details</label>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="custom__form_group">
                              <label>Event Name:</label>
                              <input type="text" name="name" class="@error('name') is-invalid @enderror" placeholder="Add Event name here" value="{{ old('name') }}">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="custom__form_group">
                              <label>Date:</label>
                              <input type="date" name="start_date" value="{{ old('start_date') }}" class="@error('start_date') is-invalid @enderror">
                           </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                           <div class="custom__form_group time__lock">
                              <label>Start Time:</label>
                              <input type="time" name="start_time" value="{{ old('start_time') }}" class=" @error('start_time') is-invalid @enderror">
                           </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                           <div class="custom__form_group time__lock">
                              <label>End Time:</label>
                              <input type="time" name="end_time" value="{{ old('end_time') }}" class=" @error('end_time') is-invalid @enderror">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="custom__form_group mt-3">
                              <label>Duration:</label>
                              <input type="text" name="duration" value="{{ old('duration') }}" placeholder="3 Hours">
                           </div>
                           <div class="custom__form_group mt-3">
                              <label>Discription:</label>
                              <textarea rows="4" class="@error('description') is-invalid @enderror" name="description" placeholder="Event Discription">{{ old('description') }}</textarea>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="custom__form_group mt-3">
                              <label>Featured Photos</label>
                              <div class="input-images-1" style="padding-top: .5rem;"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12 mt-3 pl-0 pr-0">
                        <div class="form__location_title">
                           <label>Location</label>
                        </div>
                        <div class="group__form_with_toggle_switch">
                           <div class="toggle__title">
                              <label>Make this Event Online</label>
                           </div>
                           <div class="main__toggle_switch">
                              <div class="custom-control custom-switch">
                                 <input type="checkbox" class="custom-control-input" name="online_link" id="event__online">
                                 <label class="custom-control-label" for="event__online"></label>
                              </div>
                           </div>
                        </div>
                        <div class="location__options" id="event__online_section">
                           <div class="custom__form_group">
                              <input type="text" name=""  placeholder="make this event online">
                           </div>
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="custom__form_group position__control_group mt-3">
                                    <label>Add Venue:</label>
                                    <input type="text" name="vanue" placeholder="Qiba Rd. Dubai">
                                    <div class="icon__control">
                                       <img src="{{asset('assets/images/pin.svg')}}">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="recent_place_title mt-3">
                                    <label>Recent Places:</label>
                                 </div>
                                 <div class="recent__place_holder_wrapper">
                                    <div class="check__box_inputGroup">
                                       <input id="option1" name="option1" type="checkbox"/>
                                       <label for="option1">Qiba Rd. Dubai</label>
                                    </div>
                                    <div class="check__box_inputGroup">
                                       <input id="option2" name="option1" type="checkbox"/>
                                       <label for="option2">Qiba Rd. Dubai</label>
                                    </div>
                                    <div class="check__box_inputGroup">
                                       <input id="option3" name="option1" type="checkbox"/>
                                       <label for="option3">Qiba Rd. Dubai</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                     <div class="col-lg-12 mt-3 pl-0 pr-0">
                        <div class="form__location_title">
                           <label>Optional Details:</label>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="group__form_with_toggle_switch">
                                 <div class="toggle__title">
                                    <label>Attendence Limit</label>
                                 </div>
                                 <div class="main__toggle_switch">
                                    <div class="custom-control custom-switch">
                                       <input type="checkbox" class="custom-control-input"  id="attendence___btn">
                                       <label class="custom-control-label" for="attendence___btn"></label>
                                    </div>
                                 </div>
                              </div>
                              <div class="attendence___limit_wrapper" id="number__input_1">
                                 <div class="custom___input_number">
                                    <input type="text" class="qtyValue" name="attendees_limit" value="1" />
                                    <div class="value__changer_btns_wrapper">
                                       <div class="value__changer_btns">
                                          <i class="fas fa-minus decreaseQty"></i>
                                          <i class="fas fa-plus increaseQty"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="group__form_with_toggle_switch">
                                 <div class="toggle__title">
                                    <label>Allow Guest</label>
                                 </div>
                                 <div class="main__toggle_switch">
                                    <div class="custom-control custom-switch">
                                       <input type="checkbox" class="custom-control-input"  id="attendence___btn_2">
                                       <label class="custom-control-label" for="attendence___btn_2"></label>
                                    </div>
                                 </div>
                              </div>
                              <div class="attendence___limit_wrapper" id="number__input_2">
                                 <div class="custom___input_number">
                                    <input type="text" class="qtyValue" name="no_of_attendees" value="1" />
                                    <div class="value__changer_btns_wrapper">
                                       <div class="value__changer_btns">
                                          <i class="fas fa-minus decreaseQty"></i>
                                          <i class="fas fa-plus increaseQty"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
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
   $('.input-images-1').imageUploader();
   $("#attendence___btn").click(function () {
         if ($(this).is(":checked")) {
             $("#number__input_1").show();
         } else {
             $("#number__input_1").hide();
         }
   });
   $("#attendence___btn_2").click(function () {
      if ($(this).is(":checked")) {
         $("#number__input_2").show();
      } else {
         $("#number__input_2").hide();
      }
   });
   $("#event__online").click(function () {
      if ($(this).is(":checked")) {
          $("#event__online_section").show();
      } else {
          $("#event__online_section").hide();
      }
   });
   var minVal = 1, maxVal = 20; // Set Max and Min values
   // Increase product quantity on cart page
   $(".increaseQty").on('click', function(){
      var $parentElm = $(this).parents(".custom___input_number");
      $(this).addClass("clicked");
         setTimeout(function(){
            $(".clicked").removeClass("clicked");
         },100);
      var value = $parentElm.find(".qtyValue").val();
      if (value < maxVal) {
         value++;
      }
      $parentElm.find(".qtyValue").val(value);
   });
   // Decrease product quantity on cart page
   $(".decreaseQty").on('click', function(){
      var $parentElm = $(this).parents(".custom___input_number");
      $(this).addClass("clicked");
      setTimeout(function(){
         $(".clicked").removeClass("clicked");
      },100);
      var value = $parentElm.find(".qtyValue").val();
      if (value > 1) {
         value--;
      }
      $parentElm.find(".qtyValue").val(value);
   });
</script>
@endsection