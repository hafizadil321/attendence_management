@extends('admin.layout.main_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<style type="text/css">
   /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
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
</style>
<main class="content" style="padding: 1rem 2rem 1.5rem 2rem !important;">
   <div class="container-fluid p-0">
      <div class="row">
         <div class="col-lg-12">
            <h4 class="main-title-cus">Add Your Events Details Here</h4>
         </div>
      </div>
      <form class="row mt-3" method="post" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
         @csrf
         @method('PATCH')
         <div class="col-lg-12 mb-3">
            <label class="form-label form-label-reset">Event Name:</label>
            <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ $event->name }}" placeholder="Add Event Name Here">
         </div>
         <div class="col-lg-6 mb-3">
            <label class="form-label form-label-reset">Date:</label>
            <input type="date" name="start_date" value="{{ $event->start_date }}" class="form-control form-control-lg @error('start_date') is-invalid @enderror" style="padding: .4rem 0.3rem;">
         </div>
         <div class="col-lg-3 mb-3">
            <label class="form-label form-label-reset">Start Time:</label>
            <input type="time" name="start_time" value="{{ $event->start_time }}" class="form-control form-control-lg @error('start_time') is-invalid @enderror" style="padding: .4rem 0.3rem;">
         </div>
         <div class="col-lg-3 mb-3">
            <label class="form-label form-label-reset">End Time:</label>
            <input type="time" name="end_time" value="{{ $event->end_time }}" class="form-control form-control-lg @error('end_time') is-invalid @enderror" style="padding: .4rem 0.3rem;">
         </div>
         <div class="col-lg-12 mb-3 dropify-control">
            <label class="form-label form-label-reset" style="width: 100%;">Featured Photo:</label>
            <div class="file-input-setting">
               <label>Uplaod File</label>
               <label for="choose-file" class="custom-file-upload" id="choose-file-label">
                  Uplaod Image
               </label>
               <input type="file" name="event_images[]" value="{{ old('event_images') }}" class="dropify @error('event_images[]') is-invalid @enderror" multiple class="file-input-setting" id="choose-file" style="display: none;" />
               <!-- <input type="file" class="file-input-setting" id="choose-file" style="display: none;" /> -->
            </div>
         </div>
         <div class="col-lg-6">
            <div class="row">
               <div class="col-lg-6 w-100">
                  <label class="form-label form-label-reset">Location:</label>
                  <input type="text" class="form-control form-control-lg mb-4 mt-2 col-blue" value="{{ $event->lat }}" name="lat" id="lat" placeholder="Enter Latitude">
                  <input type="text" class="form-control form-control-lg col-blue" value="{{ $event->lng }}" name="lng" id="lng" placeholder="Enter Longitude">
               </div>
               <div class="col-lg-6 w-100">
                  <button type="button" class="btn btn-primary" onclick="SetMarker(0)">show location</button>
               </div>
               <div class="col-lg-6 w-100 mt-3">
                  <label class="form-label form-label-reset">Address:</label>
                  <div class="row">
                     <div class="col-lg-6">
                        <select class="form-select form-control-lg" name="country">
                           <option>Please Select Country</option>
                           <option value="London" @if($event->country == 'London') selected @endif>London</option>
                           <option value="New York" @if($event->country == 'New York') selected @endif>New York</option>
                           <option value="Canada" @if($event->country == 'Canada') selected @endif>Canada</option>
                        </select>
                     </div>
                     <div class="col-lg-6">
                        <select class="form-select form-control-lg" name="city">
                           <option>Please Select City</option>
                           <option value="London" @if($event->city == 'London') selected @endif>London</option>
                           <option value="New York" @if($event->city == 'New York') selected @endif>New York</option>
                           <option value="Canada" @if($event->city == 'Canada') selected @endif>Canada</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-12 w-100 mt-4">
                     <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="4" placeholder="Address">{{ $event->location }}</textarea>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div id="map"></div>
         </div>
         <div class="col-lg-6">
            <div class="select-all-chk" style="text-align: left;">
               <label class="form-check-label form-label-reset" for="flexSwitchCheckDefault">Make This an Online Event:</label>
               <div class="form-check form-switch">
                  <input class="form-check-input main-check" type="checkbox" id="flexSwitchCheckDefault" @if($event->online_link != null) checked @endif>
               </div>
            </div>
         </div>
         <div class="col-lg-6"></div> 
         <div class="col-lg-12 mt-4" id="online_event" @if($event->online_link != null) style="display:block;" @endif>
            <label class="form-label form-label-reset">Add link to your online event:</label>
            <input type="text" class="form-control form-control-lg" value="{{ $event->online_link }}" name="online_link" placeholder="Add Link To Your Online Event">
         </div>
         <div class="col-lg-12 mt-4">
            <label class="form-label form-label-reset mt-3">Description:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description"  rows="4" placeholder="Discription">{{ $event->description }}</textarea>
         </div>
         <div class="col-lg-12">
            <div class="fom-btns mt-3" style="text-align: right;">
               <button class="btn btn-secondary padding-set">Cancle</button>
               <button type="submit" class="btn btn-primary padding-set">Update Event</button>
            </div>
         </div>
      </form>
   </div>
</main>
<!-- /.content-wrapper -->
@endsection
@section('js')
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
      window.onload = function () {
            LoadMap();
        };

      var map;
        var marker;
        var zoom = 15;
        function LoadMap() {
         //const uluru = { lat: 31.438813429062925, lng: 74.31283607579748 };
            map = new google.maps.Map(document.getElementById("map"), {
             zoom: 15,
         });
         SetMarker(0);
        };
        function SetMarker(position) {
            //position.preventDefault();
            console.log(position);
            //Remove previous Marker.
            if (marker != null) {
                marker.setMap(null);
            }

            //Set Marker on Map.
            lati = $('#lat').val();
            lngi = $('#lng').val();
            console.log(lati);
            console.log(lngi);
            if (lati == "") {
               lati = {{ $event->lat }}
            }else{
               zoom = 25;
            }
            if (lngi == "") {
               lngi = {{ $event->lng }}
            }
            var myLatlng = new google.maps.LatLng(lati, lngi);
            marker = new google.maps.Marker({
                position: myLatlng,
                zoom: zoom,
                map: map,
                title: 'Hello Hafiz'
            });
            map.panTo(myLatlng);

        };
   </script>
<script type="text/javascript">
   $(function () {
      $("#flexSwitchCheckDefault").click(function () {
         if ($(this).is(":checked")) {
            $("#online_event").show();
         } else {
            $("#online_event").hide();
         }
      });
   });
</script>
<script type="text/javascript">
$(document).ready(function () {
   $('#choose-file').change(function () {
      var i = $(this).prev('label').clone();
      var file = $('#choose-file')[0].files[0].name;
      $(this).prev('label').text(file);
   }); 
});
</script>
@endsection