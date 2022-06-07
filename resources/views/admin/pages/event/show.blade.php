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
                     <li><label>Event Details</label></li>
                  </ul>
               </div>
            </div>
            <!-- breadcrumbs Mobile+Dasktop --End's Here -->
            <input type="hidden" id="event_id" value="{{ $event->id }}">
            <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
            <div class="col-lg-12">
               <div class="event__detail_card common__card_wrapper">
                  <div class="event__detail_card_header">
                     <div class="create__event_header_content">
                        <div class="create__event_header_title">
                           <div class="event__indicator">
                              @if ($event->status == 'Upcoming')
                              <p class="green__event">{{ $event->status }}</p>
                              @else
                              <p class="grey__event">{{ $event->status }}</p>
                              @endif
                           </div>
                           <h2 class="card__title_heading">{{ $event->name }}</h2>
                        </div>
                        <div class="create__event_btns">
                           <ul>
                              <li><a href="{{ route('events.edit',$event->id) }}" class="btn__style_7"><span class="desktop__icon_reomve"><i class="fas fa-edit"></i></span><span class="mobile___d_none">Edit</span></a></li>
                              <li>
                                 <form action="{{ route('events.destroy', $event->id)}}" method="post">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                 <button href="#" class="btn__style_8" onclick="return confirm('Are you sure you want to delete this item?');" type="submit">
                                    
                                       
                                       <span class="desktop__icon_reomve"><i class="fas fa-trash"></i></span>
                                       <span class="mobile___d_none">Delete</span>
                                    
                                 </button>
                              </form>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="event__details_card_body mt-4">
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="event__details__mini_card mini__common_card">
                              <div class="mini__card__header">
                                 <h4 class="mini__card_title">Event Details</h4>
                              </div>
                              <div class="mini__card_body_wrapper">
                                 <ul>
                                    <li>
                                       <div class="event__detail_list_wrapper">
                                          <div class="event___list_icon">
                                             <label><i class="fas fa-star"></i>Event Name:</label>
                                          </div>
                                          <div class="event___list_icon_content">
                                             <label>{{ $event->name }}</label>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="event__detail_list_wrapper">
                                          <div class="event___list_icon">
                                             <label><i class="fas fa-map-marker"></i>location:</label>
                                          </div>
                                          <div class="event___list_icon_content">
                                             <a href="http://maps.google.com/maps?ll={{ $event->lat }},{{ $event->lng }}">{{ $event->city }}, {{ $event->country }}<i class="fas fa-external-link-alt"></i></a>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="event__detail_list_wrapper">
                                          <div class="event___list_icon">
                                             <label><i class="fas fa-calendar"></i>Date:</label>
                                          </div>
                                          <div class="event___list_icon_content">
                                             <label>{{ date('Y-m-d', strtotime($event->start_time)) }}</label>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="event__detail_list_wrapper">
                                          <div class="event___list_icon">
                                             <label><i class="fas fa-clock"></i>Time:</label>
                                          </div>
                                          <div class="event___list_icon_content">
                                             <label>{{ date("g:i A", strtotime($event->start_time)) }}</label>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <div class="mini__card_footer_wrapper">
                                 <div class="peoples__event_list">
                                    <h6>People Details:</h6>
                                    <div class="people__list_main">
                                       @if ($event->user_joined_count != 0)
                                       <div class="people__list_pics">
                                          <ul>
                                          @foreach ($event->user_joined as $keyss => $user)
                                             @if ($keyss < 4)
                                                <li><img src="{{ asset('images/profile_image/'.$user->user->image)}}"></li>
                                             @endif 
                                          @endforeach
                                          </ul>
                                       </div>
                                       @endif
                                       <div class="people__list_pics_contect">
                                          @if ($event->user_joined_count != 0)
                                             @if ($event->user_joined_count > 4)
                                                <label>{{ $event->user_joined[4]->user->name }} & {{ $event->user_joined_count - 4 }} others</label>
                                             @endif
                                          @else
                                             <label>No user join this event</label>
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                                 <div class="view___prople_btn">
                                    <a href="{{ url('event-attendees',$event->id) }}">View All <i class="fas fa-arrow-right"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="Event__description_mini_card mini__common_card">
                              <div class="mini__card__header">
                                 <h4 class="mini__card_title">Discription:</h4>
                              </div>
                              <div class="Event__description">
                                 <p>{{ $event->description }}</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="event__location_mini_card mini__common_card">
                              <div class="mini__card__header">
                                 <h4 class="mini__card_title">Pin Location:</h4>
                              </div>
                              <div class="event__location_mini_wrapper">
                                 <div class="location__map">
                                    <iframe src="https://maps.google.com/maps?q={{ $event->vanue }} &t=&z=14&ie=UTF8&iwloc=&output=embed"style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d435401.1907915663!2d74.10135966542543!3d31.508451645989133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190535c18be70b%3A0x158c5a43bad5fe8b!2sCyber%20Advance%20Solutions!5e0!3m2!1sen!2s!4v1632223757838!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                                    <div class="overlay__map_address">
                                       <h6>Address:</h6>
                                       <p>{{ $event->vanue }}</p>
                                    </div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                           <div class="components__title">
                              <h5 class="components__title_light">Featured Images</h5>
                           </div>
                        </div>
                        @foreach($event->gallery as $gallery)
                        <div class="col-lg-3 mt-4">
                           <a class="fancybox" rel="group" href="{{asset('images/events-gallery/'.$gallery->banner)}}"><img src="{{asset('images/events-gallery/'.$gallery->banner)}}" alt=""  class="img-fluid" /></a>
                        </div>
                        @endforeach
                        <div class="col-lg-12 mt-4">
                           <div class="components___main_wrapper">
                              <div class="components__title">
                                 <h5 class="components__title_light">Comments</h5>
                              </div>
                              <div class="commnent__hide_show">
                                 <ul>
                                    <li><button  id="view___all_commnet">View All</button></li>
                                    <li><button href="#" id="hide___all_commnet">Hide</button></li>
                                 </ul>
                              </div>
                           </div>
                        </div>

                        <div class="col-lg-12 mt-4 hide___Side__commnet">
                           <div class="commnet_input_main_wrapper">
                              <div class="comment__pics">
                                 <img src="{{asset('images/profile_image/'.auth()->user()->image) }}">
                                 <div class="comment__pics_crown">
                                    <img src="{{asset('assets/images/crowns/green-crown.svg')}}">
                                 </div>
                              </div>
                              <div class="inputt__comments">
                                 <input type="" name="new_comment_" id="new_comment_" placeholder="Type Your Message Here">
                                 <div class="commnet__input_submit_btn">
                                    <button onclick="newComment('new_comment')"><i class="fas fa-paper-plane"></i><span class="commnet__input_submit_btn_d_none">Send</span></button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12 mt-4 hide___Side__commnet" id="insert_new_comment">
                           <!-- Double Commnet -->
                           @foreach($comments as $comment)
                           <div class="double__commnet_main_wrapper">
                              <div class="commnet_feed_double_wrapper mt-4">
                                 <div class="commnet_feed_pic">
                                    <img src="{{asset('images/profile_image/'.$comment->user->image) }}">
                                    <div class="comment__feed_crown_up">
                                       <img src="{{asset('assets/images/crowns/blue-crown.svg')}}">
                                    </div>
                                 </div>
                                 <div class="comment__feed_content">
                                    <div class="comment__feed_content_header">
                                       <div class="comment__feed_content_name">
                                          <h4>{{ $comment->user->name }}<span>{{ (new Carbon\Carbon($comment->created_at))->diffForHumans() }}</span></h4>
                                       </div>
                                       <div class="comment__feed_content_action_btns">
                                          <ul>
                                             <li>
                                                <div class="feed__like" onclick="likeDislike({{ Auth::user()->id }}, {{ $comment->id }})">
                                                   <span class="span_click"><i class="@if($comment->is_like == 1) fas fa-heart @else far fa-heart @endif"></i><span class="span_number"><span id="span_number_{{ $comment->id }}">{{ $comment->user_liked_count }}</span> Likes</span></span>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="feed__commnet" onclick="displyReply({{$comment->id}})">
                                                   <span><i class="fas fa-share"></i></span>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="feed__delete" onclick="deleteComment({{ $comment->id }})">
                                                   <a href="#"><i class="fas fa-trash"></i></a>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="comment__feed_content_desc">
                                       <p>{{ $comment->comment }}</p>
                                    </div>
                                    <div id="append_reply_comment_{{ $comment->id }}">
                                    <!-- Replay start Here -->
                                    @if(isset($comment->reply))
                                    @foreach($comment->reply as $reply)
                                    <div class="commnet_feed_double_wrapper mt-3">
                                       <div class="commnet_feed_pic ">
                                          <img src="{{asset('images/profile_image/'.$reply->user->image) }}">
                                          <div class="comment__feed_crown">
                                             <img src="{{ asset('assets/images/crowns/green-crown.svg')}}">
                                          </div>
                                       </div>
                                       <div class="comment__feed_content reply__section">
                                          <div class="comment__feed_content_header">
                                             <div class="comment__feed_content_name">
                                                <h4>{{ $reply->user->name }}<span>{{ (new Carbon\Carbon($reply->created_at))->diffForHumans() }}</span></h4>
                                             </div>
                                             <div class="comment__feed_content_action_btns">
                                                <ul>
                                                   <li>
                                                      <div class="feed__like" onclick="likeDislike({{ Auth::user()->id }}, {{ $reply->id }})">
                                                         <span class="span_click"><i class="@if($reply->is_like == 1) fas fa-heart @else far fa-heart @endif"></i><span class="span_number"><span id="span_number_{{ $reply->id }}">{{ count($reply->user_liked) }}</span> Likes</span></span>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="feed__commnet" onclick="displyReply({{$comment->id}})">
                                                         <span><i class="fas fa-share"></i></span>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="feed__delete" onclick="deleteComment({{ $reply->id }})">
                                                         <a href="#"><i class="fas fa-trash"></i></a>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="comment__feed_content_desc">
                                             <p>{{ $reply->comment }}</p>
                                          </div>

                                       </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    <!-- Replay Ends Here -->
                                    <!-- Input Replay -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="inputt__comments padding__control_input mb-2 display_{{ $comment->id }}" id="in__commnet" >
                              <input type="" name="reply_comment" id="reply_comment_{{$comment->id}}" placeholder="Type Your Message Here">
                              <div class="commnet__input_submit_btn">
                                 <button onclick="replyComment('reply_comment', {{$comment->id}})"><i class="fas fa-paper-plane"></i><span class="commnet__input_submit_btn_d_none">Send</span></button>
                              </div>
                           </div>
                           @endforeach
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
<script>
   $(document).ready(function(){
      $("#hide___all_commnet").click(function(){
         $("#view___all_commnet").css("color","#888888");
         $("#hide___all_commnet").css("color","#FF8800");
         $(".hide___Side__commnet").hide("slow");
      });
      $("#view___all_commnet").click(function(){
         $("#view___all_commnet").css("color","#FF8800");
         $("#hide___all_commnet").css("color","#888888");
         $(".hide___Side__commnet").show("slow");
      });
   });
   // $('.feed__commnet span').click(function() {
   //    $('#in__commnet_1').toggle('slow');
   // });
   $('.span_click').click(function(){
      $(".span_number").show();
      $(this).find('i').toggleClass('far fa-heart fas fa-heart');
   });
   $(document).ready(function() {
      $(".fancybox").fancybox();
   });
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
   });
   function displyReply(comment_id) {
      $('.display_'+comment_id).toggle('slow');
   }
   function likeDislike(user_id, comment_id) {
      $.ajax({
         type:'POST',
         url:'{{ route('LikeDislikeComment') }}',
         data:{user_id:user_id, comment_id:comment_id, _token: '{{csrf_token()}}' },
         success:function(data) {
            var $span = $('#span_number_'+comment_id);
            if (data == "liked") {
               $span.text(Number($span.text()) + 1);
            }else{
               $span.text(Number($span.text()) - 1);
            }
         }
     });
   }
   function newComment(new_comment) {
      if (new_comment == 'new_comment') {
         var comment = $('#new_comment_').val();
         var user_id = $('#user_id').val();
         var event_id = $('#event_id').val();
         $.ajax({
            type:'POST',
            url:'{{ route('newComment') }}',
            data:{comment:comment, user_id:user_id, event_id:event_id, _token: '{{csrf_token()}}' },
            success:function(data) {
               $('#insert_new_comment').append(data);
            }
        });
      }  
   }
   function replyComment(reply_comment, comment_id) {
      alert(reply_comment);
      if (reply_comment == 'reply_comment') {
         var comment = $('#reply_comment_'+comment_id).val();
         var user_id = $('#user_id').val();
         var event_id = $('#event_id').val();
         $.ajax({
            type:'POST',
            url:'{{ route('replyComment') }}',
            data:{comment:comment, user_id:user_id, event_id:event_id, comment_id:comment_id, _token: '{{csrf_token()}}' },
            success:function(data) {
               $('#append_reply_comment_'+comment_id).append(data);
            }
        });
      }  
   }
   function deleteComment(comment_id) {
      var comment_id = comment_id;
      $.ajax({
         type:'POST',
         url:'{{ route('deleteComment') }}',
         data:{comment_id:comment_id, _token: '{{csrf_token()}}' },
         success:function(data) {
            location.reload();
         }
     });
   }  
</script>
@endsection