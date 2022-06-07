@extends('admin.layout.main_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<main class="content" style="padding: 1rem 2rem 1.5rem 2rem !important;">
   @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <!-- <button type="button" class="close" data-dismiss="alert">×</button>  -->   
        <strong>{{ $message }}</strong>
    </div>
    @endif
      
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->    
        <strong style="padding: 15px;">{{ $message }}</strong>
    </div>
    @endif
   <div class="container-fluid p-0">
      <form class="row" action="{{ route('send_notifications') }}" method="POST">
         @csrf
         <div class="col-lg-12">
            <textarea class="notification-form notifications-form" name="notification_text" placeholder="Notifications:"  rows="3"></textarea>
         </div>
         <div class="col-lg-12">
            <div class="sent-btn" style="text-align:right;">
               <button class="btn btn-primary padding-set">Send</button>
            </div>
         </div>

      
      <div class="row">
         <div class="col-lg-12">
            <div class="select-all-chk">
               <label>Send to All</label>
               <label class="form-check">
                  <input class="form-check-input" onclick="toggle(this);" type="checkbox" value="">
               </label>
            </div>
         </div>
         @foreach($users as $user)
         <div class="col-lg-12">
            <div class="notifications-list-detail">
               <div class="person-img">
                  <img src="{{ asset('images/profile_image/').'/'.$user->image}}" class="img-fluid rounded-circle" width="50" height="50">
               </div>
               <div class="notifications-msgs">
                  <h4>{{ $user->name }} | <span>{{$user->country}}</span></h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
               </div>
               <div>
                  <label class="form-check">
                     <input class="form-check-input" name="user_id[]" type="checkbox" value="{{ $user->id }}">
                  </label>
               </div>
            </div>
         </div>         
         @endforeach
      </form>

   </div>
</main>
<!-- /.content-wrapper -->
@endsection
@section('js')
<script type="text/javascript">
      function toggle(source) {
         var checkboxes = document.querySelectorAll('input[type="checkbox"]');
         for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
               checkboxes[i].checked = source.checked;
         }
      }
   </script>
@endsection