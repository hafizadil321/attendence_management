@extends('admin.layout.main_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<main class="content" style="padding: 1rem 2rem 1.5rem 2rem !important;">
   <div class="container-fluid p-0">
      <div class="row">
         <div class="col-lg-12">
            <h4 class="main-title-cus">Add Your Events Details Here</h4>
         </div>
      </div>
      <form class="row mt-3" method="post" action="{{ route('events.store') }}" enctype="multipart/form-data">
         @csrf
         <div class="col-lg-6">
            <div class="form-inputs">
               <label class="form-label form-label-reset">Event Name:</label>
               <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Add Event Name Here">
            </div>
            <div class="row">
               <div class="col-lg-4">
                  <div class="form-inputs mt-3">
                     <label class="form-label form-label-reset">Date:</label>
                     <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control form-control-lg @error('start_date') is-invalid @enderror" style="padding: .4rem 0.3rem;">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-inputs mt-3">
                     <label class="form-label form-label-reset">Start Time:</label>
                     <input type="time" name="start_time" value="{{ old('start_time') }}" class="form-control form-control-lg @error('start_time') is-invalid @enderror" style="padding: .4rem 0.3rem;">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-inputs mt-3">
                     <label class="form-label form-label-reset">End Time:</label>
                     <input type="time" name="end_time" value="{{ old('end_time') }}" class="form-control form-control-lg @error('end_time') is-invalid @enderror" style="padding: .4rem 0.3rem;">
                  </div>
               </div>
            </div>
            <!-- <div class="form-inputs mt-3">
               <label class="form-label form-label-reset">Duration:</label>
               <input type="number" name="duration" class="form-control form-control-lg" placeholder="2 Hours" min="0">
            </div> -->
            <div class="form-inputs mt-3">
               <label class="form-label form-label-reset">Featured Photo:</label>
               <input type="file" name="feature_image" value="{{ old('feature_image') }}" class="dropify @error('feature_image') is-invalid @enderror" />
            </div>
            <div class="form-inputs mt-3">
               <label class="form-label form-label-reset">Featured Photo:</label>
               <input type="file" name="event_images[]" value="{{ old('event_images') }}" class="dropify @error('event_images[]') is-invalid @enderror" multiple />
            </div>
            <div class="form-inputs mt-3">
               <label class="form-label form-label-reset">Discription:</label>
               <textarea class="form-control @error('description') is-invalid @enderror" name="description"  rows="4" placeholder="Discription">{{ old('description') }}</textarea>
            </div>
            <div class="mt-3">
               <label class="form-label form-label-reset">Location:</label>
               <label class="form-check">
                  <input class="form-check-input" onclick="toggle(this);" type="checkbox" value="">
                  <label>Make This An Online Event</label>
               </label>
            </div>
            <div class="form-inputs mt-3">
               <label class="form-label form-label-reset">Add Venue:</label>
               <input type="text" name="vanue" value="{{ old('vanue') }}" class="form-control form-control-lg @error('vanue') is-invalid @enderror" placeholder="Venue">
            </div>
            <div class="venue_area mt-5">
               <h6>tarnaki sabeen</h6>
               <p>orginal</p>
            </div>
            <div class="d-flex mt-4">
               <div class="w-50">
                  <label class="form-check-label form-label-reset" for="repeat_event_chk">Repeat Event:</label>
               </div>
               <div class="form-check form-switch w-50">
                  <input class="form-check-input main-check @error('repeat') is-invalid @enderror" name="repeat" value="{{ old('repeat') }}" type="checkbox" id="repeat_event_chk" style="float: right;">
               </div>
            </div>
            <div class="d-flex mt-4">
               <div class="w-50">
                  <label class="form-check-label form-label-reset" for="attendance_chk">Attendance Limit:</label>
               </div>
               <div class="form-check form-switch w-50">
                  <input class="form-check-input main-check"  type="checkbox" id="attendance_chk" style="float: right;">
               </div>
            </div>
            <div class="mt-2">
               <input type="number" class="form-control form-control-lg @error('limit') is-invalid @enderror" name="limit" value="{{ old('limit') }}" id="attendance_chk_input" placeholder="2" min="0">
            </div>
            <div class="d-flex mt-4">
               <div class="w-50">
                  <label class="form-check-label form-label-reset" for="allow_gst_chk">Allow Guest:</label>
               </div>
               <div class="form-check form-switch w-50">
                  <input class="form-check-input main-check" type="checkbox" id="allow_gst_chk" style="float: right;">
               </div>
            </div>
            <div class="mt-2">
               <input type="number" class="form-control form-control-lg @error('allowed') is-invalid @enderror" name="allowed" value="{{ old('allowed') }}" id="allow_gst_input" placeholder="2" min="0">
            </div>
            <div class="fom-btns mt-3" style="text-align: right;">
               <button class="btn btn-secondary padding-set">Cancle</button>
               <button type="submit" class="btn btn-primary padding-set">Create Event</button>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="about_wake_up_event">
               <h6>About Wake Up Event</h6>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
         </div>
      </form>
   </div>
</main>
<!-- /.content-wrapper -->
@endsection
@section('js')
<script type="text/javascript">
      $('.dropify').dropify();
   </script>
   <script type="text/javascript">
      $(function () {
        $("#attendance_chk").click(function () {
            if ($(this).is(":checked")) {
                $("#attendance_chk_input").show();
            } else {
                $("#attendance_chk_input").hide();
            }
        });
        $("#allow_gst_chk").click(function () {
            if ($(this).is(":checked")) {
                $("#allow_gst_input").show();
            } else {
                $("#allow_gst_input").hide();
            }
        });
    });
   </script>
@endsection