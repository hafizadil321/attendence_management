@extends('admin.layout.main_layout')
@section('content')
<style type="text/css">
   #map {
  height: 100%;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

#description {
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
}

#infowindow-content .title {
  font-weight: bold;
}

#infowindow-content {
  display: none;
}

#map #infowindow-content {
  display: inline;
}

.pac-card {
  background-color: #fff;
  border: 0;
  border-radius: 2px;
  box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
  margin: 10px;
  padding: 0 0.5em;
  font: 400 18px Roboto, Arial, sans-serif;
  overflow: hidden;
  font-family: Roboto;
  padding: 0;
}

#pac-container {
  padding-bottom: 12px;
  margin-right: 12px;
}

.pac-controls {
  display: inline-block;
  padding: 5px 11px;
}

.pac-controls label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 400px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

#title {
  color: #fff;
  background-color: #4d90fe;
  font-size: 25px;
  font-weight: 500;
  padding: 6px 12px;
}

#target {
  width: 345px;
}
</style>
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
                     <li><label>Update Events</label></li>
                  </ul>
               </div>
            </div>
            <!-- breadcrumbs Mobile+Dasktop --End's Here -->

            <div class="col-lg-12">
               <form class="create__event_wrapper common__card_wrapper" id="create_event" method="post" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <div class="create__event_header_content">
                     <div class="create__event_header_title">
                        <h2 class="card__title_heading mt-2">Update Event</h2>
                     </div>
                     <div class="create__event_btns">
                        <ul>
                           <li><a href="#" id="reset_button" class="btn__style_7"><i class="fas fa-redo"></i><span class="create___event_mobile_none">Reset</span></a></li>
                           <li><a href="#" onclick="event.preventDefault();
                                                     document.getElementById('create_event').submit();" class="btn__style_8"><i class="fas fa-plus"></i><span class="create___event_mobile_none">Update Event</span></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="main__form_inputs mt-4">
                     <div class="row">
                        <div class="col-lg-12 mb-0">
                           <div class="form__titles_small">
                              <label>Update Event Details</label>
                           </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                           <div class="custom__form_group">
                              <label>Event Name:</label>
                              <input type="text" name="name" id="event_name" class="@error('name') is-invalid @enderror" placeholder="Add Event name here" value="{{ $event->name }}">
                           </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                           <div class="custom__form_group">
                              <label>Start Date Time:</label>
                              <input type="datetime-local" name="start_time" value="{{ date('Y-m-d\TH:i', strtotime($event->start_time)) }}" class="@error('start_time') is-invalid @enderror">
                           </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                           <div class="custom__form_group time__lock">
                              <label>End Date Time:</label>
                              <input type="datetime-local" name="end_time" value="{{ date('Y-m-d\TH:i', strtotime($event->end_time)) }}" class=" @error('end_time') is-invalid @enderror">
                           </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                           <div class="custom__form_group time__lock">
                              <label>Duration:</label>
                              <input type="text" name="duration" value="{{ $event->duration }}" placeholder="3 Hours">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="custom__form_group mt-3">
                              <label>Discription:</label>
                              <textarea rows="4" class="@error('description') is-invalid @enderror" name="description" placeholder="Event Discription">{{ $event->description }}</textarea>
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
                                 <input type="checkbox" class="custom-control-input" id="event__online">
                                 <label class="custom-control-label" for="event__online"></label>
                              </div>
                           </div>
                        </div>
                        <div class="location__options" id="event__online_section">
                           <div class="custom__form_group">
                              <input type="text" name="online_link" value="{{ $event->online_link }}" placeholder="make this event online">
                           </div>
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="custom__form_group position__control_group mt-3">
                                    <label>Add Venue:</label>
                                    <input type="text" name="vanue" id="vanue" placeholder="Qiba Rd. Dubai" value="{{ $event->vanue  }}">
                                    <div class="icon__control">
                                       <img src="{{ asset('assets/images/pin.svg') }}" data-toggle="modal" data-target="#exampleModalCenter">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <!-- <div class="recent_place_title mt-3">
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
                                 </div> -->
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
                                       <input type="checkbox" class="custom-control-input" id="attendence___btn">
                                       <label class="custom-control-label" for="attendence___btn"></label>
                                    </div>
                                 </div>
                              </div>
                              <div class="attendence___limit_wrapper" id="number__input_1">
                                 <div class="custom___input_number">
                                    <input type="text" class="qtyValue" name="no_of_attendees" value="{{ $event->no_of_attendees }}" />
                                    <div class="value__changer_btns_wrapper">
                                       <div class="value__changer_btns">
                                          <i class="fas fa-minus decreaseQty"></i>
                                          <i class="fas fa-plus increaseQty"></i>
                                       </div>
                                    </div> 
                                 </div>
                              </div>
                           </div>
                           <input type="hidden" name="lat" id="lat">
                           <input type="hidden" name="lng" id="lng">
                           <input type="hidden" name="country" id="country">
                           <input type="hidden" name="city" id="city">
                           <!-- <div class="col-lg-6">
                              <div class="group__form_with_toggle_switch">
                                 <div class="toggle__title">
                                    <label>Allow Guest</label>
                                 </div>
                                 <div class="main__toggle_switch">
                                    <div class="custom-control custom-switch">
                                       <input type="checkbox" class="custom-control-input" id="attendence___btn_2">
                                       <label class="custom-control-label" for="attendence___btn_2"></label>
                                    </div>
                                 </div>
                              </div>
                              <div class="attendence___limit_wrapper" id="number__input_2">
                                 <div class="custom___input_number"> 
                                    <input type="text" class="qtyValue" value="1" />
                                    <div class="value__changer_btns_wrapper">
                                       <div class="value__changer_btns">
                                          <i class="fas fa-minus decreaseQty"></i>S
                                          <i class="fas fa-plus increaseQty"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div> -->
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
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Search and Select location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height:400px;">
         <input
      id="pac-input"
      class="controls"
      type="text"
      placeholder="Search Box"
    />
        <div id="map"></div>
      </div>
      <div class="modal-footer">
        <button type="button" id="reload_map" class="btn btn-secondary">Reload Map</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsl1zsOxbyO0ipnqpr_S_EAts_y3XlGZ8&callback=initMap&libraries=places&v=weekly" async></script>
<script type="text/javascript">
   function initMap() {
      const myLatlng = { lat: {{ $event->lat }}, lng: {{ $event->lng }} };
      const map = new google.maps.Map(document.getElementById("map"), {
         zoom: 14,
         center: myLatlng,
      });
      // Create the search box and link it to the UI element.
      const input = document.getElementById("pac-input");
      const searchBox = new google.maps.places.SearchBox(input);

      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      // Bias the SearchBox results towards current map's viewport.
      map.addListener("bounds_changed", () => {
         searchBox.setBounds(map.getBounds());
      });

      let markers = [];

      // Listen for the event fired when the user selects a prediction and retrieve
      // more details for that place.
      searchBox.addListener("places_changed", () => {
         const places = searchBox.getPlaces();

         if (places.length == 0) {
            return;
         }

         // Clear out the old markers.
         markers.forEach((marker) => {
            marker.setMap(null);
         });
         markers = [];

         // For each place, get the icon, name and location.
         const bounds = new google.maps.LatLngBounds();

         places.forEach((place) => {
            if (!place.geometry || !place.geometry.location) {
               console.log("Returned place contains no geometry");
               return;
            }

            const icon = {
               url: place.icon,
               size: new google.maps.Size(71, 71),
               origin: new google.maps.Point(0, 0),
               anchor: new google.maps.Point(17, 34),
               scaledSize: new google.maps.Size(25, 25),
            };

            // Create a marker for each place.
            markers.push(
               new google.maps.Marker({
                  map,
                  icon,
                  title: place.name,
                  position: place.geometry.location,
               })
            );
            if (place.geometry.viewport) {
               // Only geocodes have viewport.
               bounds.union(place.geometry.viewport);
            } else {
               bounds.extend(place.geometry.location);
            }
         });
         map.fitBounds(bounds);
      });
      // Create the initial InfoWindow.
      let infoWindow = new google.maps.InfoWindow({
         content: "Click the map to get Lat/Lng!",
         position: myLatlng,
      });
      infoWindow.open(map);
      // Configure the click listener.
      map.addListener("click", (mapsMouseEvent) => {
         // Close the current InfoWindow.
         infoWindow.close();
         // Create a new InfoWindow.
         infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
         });
         infoWindow.setContent(
            JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
         );
         infoWindow.open(map);
         lati = mapsMouseEvent.latLng.toJSON()['lat'];
         lngi = mapsMouseEvent.latLng.toJSON()['lng'];
         var latlng = new google.maps.LatLng(lati, lngi);
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({ 'latLng': latlng },  (results, status) =>{
           if (status !== google.maps.GeocoderStatus.OK) {
               alert(status);
           }
           // This is checking to see if the Geoeode Status is OK before proceeding
           if (status == google.maps.GeocoderStatus.OK) {
               console.log(results);
               console.log("country: "+results[0].address_components[4].long_name);
               var address = (results[0].formatted_address);
               var  value=address.split(",");
               count=value.length;
               country=value[count-1];
               city=value[count-3];
               // var country = results[0]
               $('#vanue').val(address);
               $('#lat').val(lati);
               $('#lng').val(lngi);
               $('#country').val(country);
               $('#city').val(city);
           }
         });

      });
   }
   $('#reload_map').on('click', function () {
      initMap();
   })
   let preloaded = [
      <?php foreach ($event->gallery as $key => $value) { ?>
         {id: <?php echo $value->id ?>, src: 'http://127.0.0.1:8000/images/events-gallery/<?php echo $value->banner ?>'},
      <?php } ?>
   ];
   $('.input-images-1').imageUploader({
       preloaded: preloaded,
       imagesInputName: 'images',
       preloadedInputName: 'old',
   });
   var online_link = '{{ $event->online_link }}';
   var vanue = '{{ $event->vanue }}';
   if (online_link == "" && vanue == "") {
      $("#event__online_section").hide();
   }else{
      $("#event__online").attr('checked',true);
      $("#event__online_section").show();
   }
   var no_of_attendees = '{{ $event->no_of_attendees }}';
   if (no_of_attendees == "") {
      $("#number__input_1").hide();
   }else{
      $("#attendence___btn").attr('checked',true);
      $("#number__input_1").show();
   }
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
   $('#reset_button').click(function(){
      // $('#event_name').val('');
      // $('#event_name').attr('value', '');
      // $("#event_name").val(null);
      // $('#update_event').each(function(){ 
      //    console.log(this);
      //    this.reset();
      // });
      $(this).closest('form').find('input[type=text], input[type=datetime-local]').attr('value', '');
      $(this).closest('form').find('textarea').val('');
      $(".uploaded").empty();
   });
</script>
@endsection