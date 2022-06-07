@extends('admin.layout.main_layout')
@section('content')
<!--page-wrapper-->
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            

            <div class="chat-wrapper">
                <div class="chat-header">
                    <div class="chat__content_wrapper d-flex">
                        <div class="chat__subscriber_wrapper">
                            <div class="chat__subscriber">
                                <p>Subscriber</p>
                                <h4>{{ $message->user->name }}</h4>
                            </div>
                        </div>
                        <div class="chat__event_name">
                            <h4>{{ $message->event->name }}</h4>
                        </div>
                        <div class="chat__view_btn">
                            <a href="{{ route('events.show',$message->event->id) }}" class="hvr-sweep-to-right">Event Details</a>
                        </div>
                        <div class="chat__mobile_menu">
                            <button id="drop__div_toggle"><i class="fas fa-caret-down"></i></button>
                            <div id="chat__mobile_content">
                                <div class="chat__mobile_content_wrapper d-flex ">
                                    <div class="chat__mobile_event_name mobile__view_control">
                                        <h4>{{ $message->event->name }}</h4>
                                    </div>
                                    <div class="chat__view_btn mobile_view_btn">
                                        <a href="{{ route('events.show',$message->event->id) }}" class="hvr-sweep-to-right">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-content">
                    
                </div>
                <div class="chat-footer d-flex align-items-center">
                    <div class="flex-grow-1 pr-2">
                        <div class="input__chat_wrapper">
                            <input type="text" name="" id="btn-input" placeholder="Type Your Message here">
                            <div class="input__location_icon_wrapper">
                                <a href="#"><i class="fas fa-map-marker"></i></a>
                            </div>
                            <div class="chat__submit_btn" >
                                <button class="send-button" id="btn-chat">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--start chat overlay-->
                <div class="overlay chat-toggle-btn-mobile"></div>
                <!--end chat overlay-->
            </div>

        </div>
    </div>
    <!--end page-content-wrapper-->
</div>
<!--end page-wrapper-->
@endsection
    <script  src="https://www.gstatic.com/firebasejs/7.13.2/firebase-app.js"></script>
    <script  src="https://www.gstatic.com/firebasejs/7.13.2/firebase-auth.js"></script>
    <script  src="https://www.gstatic.com/firebasejs/7.13.2/firebase-firestore.js"></script>
    <script  src="https://www.gstatic.com/firebasejs/7.13.2/firebase-storage.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
@section('js')
<script>
new PerfectScrollbar('.chat-content');
$('#drop__div_toggle').click(function () {
    $('#chat__mobile_content').slideToggle({
      direction: "left"
    }, 300);
    $(this).toggleClass('clientsClose');
}); // end click

var firebaseConfig = {

    apiKey: "AIzaSyDp4DqcFmD18W_N67_lmCGivDSzZIqVGcs",
    authDomain: "wakeup-event.firebaseapp.com",
    projectId: "wakeup-event",
    storageBucket: "wakeup-event.appspot.com",
    messagingSenderId: "766081299371",
    appId: "1:766081299371:web:e4acacb8269469852598ee",
    measurementId: "G-7R3MX21YNG"

    // apiKey: "AIzaSyBvZUYJgGUSesemkAdR5DEh52kiI0eGDkE",
    // authDomain: "laravel-firebase-f6db9.firebaseapp.com",
    // databaseURL: "https://laravel-firebase-f6db9.firebaseio.com",
    // projectId: "laravel-firebase-f6db9",
    // storageBucket: "laravel-firebase-f6db9.appspot.com",
    // messagingSenderId: "797507934375",
    // appId: "1:797507934375:web:d60684998811838c44a382"
  };
  // Initialize Firebase
firebase.initializeApp(firebaseConfig);
var db = firebase.firestore();

console.log("Firebase connected");

// get current username
var id = {{ $message->user->id }};
var chatId = '{{ $message->user->id }}{{ auth::user()->id}}';
var senderID = '{{ auth::user()->id}}';
var recieverID = '{{ $message->user->id }}';


var epoch = moment().unix(); // do I need to do .local()?
var momentDate = moment.unix(epoch);
var epochTime = momentDate._i;

// Getting all message and listeing real time chat

db.collection("chat").doc(chatId).collection("messages").orderBy("timestamp").onSnapshot(function(snapshot){

    snapshot.docChanges().forEach(function(change,ind){
        var data = change.doc.data();
        console.log(data);
        // if new message added
        if(change.type == "added"){

            if(data.sender_id == id){ //Which message i sent 
                var datetime = moment(data.timestamp).format('lll');
                var html = `<div class="chat-content-rightside">
                        <div class="media">

                            <div class="media-body mr-3">
                                <p class="chat-right-msg">${data.message}</p>
                                <p class="chat-time text-left"><span>Sent at:</span> ${datetime}</p>
                            </div>
                            <div class="chat__img_position_holder">
                                <img src="${data.photo_url}" width="66" height="66" class="rounded-circle" alt="">
                                <div class="chat__img_crown_holder down__ward">
                                    <img src="http://127.0.0.1:8000/assets/images/crowns/green-crown.svg" width="22" height="22">
                                </div>
                            </div>
                        </div>
                    </div>`;

                $('.chat-content').append(html);

            }else{
                var datetime = moment(data.timestamp).format('lll');
                // var datetime = new moment(data.timestamp,'yyyyMMddHHmmssfff').toDate();
                console.log("DateTime"+datetime);
                var html = `<div class="chat-content-leftside">
                        <div class="media">
                            <div class="chat__img_position_holder">
                                <img src="${data.photo_url}" width="66" height="66" class="rounded-circle" alt="">
                                <div class="chat__img_crown_holder">
                                    <img src="http://127.0.0.1:8000/assets/images/crowns/orange-crown.svg" width="22" height="22">
                                </div>
                            </div>
                            <div class="media-body ml-3">
                                <p class="chat-left-msg">${data.message}</p>
                                <p class="chat-time"><span>Sent at:</span> ${datetime}</p>
                            </div>
                        </div>
                    </div>`;

                $('.chat-content').append(html);

            }
            if(snapshot.docChanges().length - 1 == ind){ // we will scoll down on last message
                // auto scroll
                $(".panel-body").animate({ scrollTop: $('.panel-body').prop("scrollHeight")}, 1000);
            }
        }

        if(change.type == "modified"){

        }

        if(change.type == "removed"){

            $("#"+change.doc.id+"-message").html("this message has been deleted")

        }

    })  

})

function sendMessage(object){
    console.log(object)
    // .collection('chat')
    //       .doc(chatId)
    //       .collection('messages')
    //       .add(msg);
    db.collection("chat").doc(chatId).collection('messages').add(object).then(added => {
        console.log("message sent ",added)
    }).catch(err => {
        console.err("Error occured",err)
    })

}

function recentChatforSender(object) {
    console.log(object);
    db.collection('users').doc(senderID).collection('recent_chats').get()
    .then(function(querySnapshot) {
        if (!querySnapshot.empty) {
            querySnapshot.forEach(function(doc) {
                userData = doc.data();
                console.log(userData);
                if (userData.chat_id == chatId) {
                    db.collection("users").doc(senderID).collection('recent_chats').doc(doc.id).update({last_message: object.last_message, isVisible: true});
                }else{
                    db.collection("users").doc(senderID).collection('recent_chats').add(object).then(added => {
                        console.log("Recent Chat sent ",added)
                    }).catch(err => {
                        console.err("Error occured",err)
                    }) 
                }
            });
        }else{
            db.collection("users").doc(senderID).collection('recent_chats').add(object).then(added => {
                console.log("Recent Chat sent ",added)
            }).catch(err => {
                console.err("Error occured",err)
            })
        }
            
    })
}
function recentChatforReciever(object) {
    db.collection('users').doc(recieverID).collection('recent_chats').get()
    .then(function(querySnapshot) {
        if (!querySnapshot.empty) {
            querySnapshot.forEach(function(doc) {
                userData = doc.data();
                if (userData.chat_id == chatId) {
                    db.collection("users").doc(recieverID).collection('recent_chats').doc(doc.id).update({last_message: object.last_message, isVisible: true});
                }else{
                    db.collection("users").doc(recieverID).collection('recent_chats').add(object).then(added => {
                        console.log("Recent Chat sent ",added)
                    }).catch(err => {
                        console.err("Error occured",err)
                    }) 
                }
                
            });
        }else{
            db.collection("users").doc(recieverID).collection('recent_chats').add(object).then(added => {
                console.log("Recent Chat sent ",added)
            }).catch(err => {
                console.err("Error occured",err)
            })
        }
            
    })
}
function deleteMessage(doc_id){
    var flag = window.confirm("Are you sure to want delete ?")

    if(flag){

        db.collection("chat").doc(doc_id).delete();
        console.log("Deleted");

    }
}

// on click function
$('.send-button').click(function(){

    var message = $('#btn-input').val();

    if(message){
        // docRef = db.collection('users').doc(senderID).collection('recent_chats').get().then(snapshot => {
        //     // var data = snapshot.docs.map({'sender_id', '==', senderID});
        //     snapshot.docs.map(function(doc) {
        //         console.log("DDDDDD"+doc);
        //     })
            
        // })
        // return false;
        // insert message 

        sendMessage({
            sender_id: {{ auth::user()->id }},
            receiver_id: {{ $message->user->id }},
            photo_url: 'https://i.picsum.photos/id/1011/5472/3648.jpg?hmac=Koo9845x2akkVzVFX3xxAc9BCkeGYA9VRVfLE4f0Zzk',
            sender_name: '{{ auth::user()->name }}',
            receiver_name: '{{ $message->user->name }}',
            message: message,
              notDeletedBy: [
                "{{ auth::user()->id }}",
                "{{ $message->user->id }}"
              ],
              timestamp: epochTime
        });

        recentChatforSender({
            sender_id: {{ auth::user()->id }},
            receiver_id: {{ $message->user->id }},
            photo_url: 'https://i.picsum.photos/id/1011/5472/3648.jpg?hmac=Koo9845x2akkVzVFX3xxAc9BCkeGYA9VRVfLE4f0Zzk',
            sender_name: '{{ auth::user()->name }}',
            receiver_name: '{{ $message->user->name }}',
            last_message: message,
            timestamp: epochTime,
            device_id: 'test',
            chat_id: chatId,
            is_archived: false,
            isVisible:true
        });
        recentChatforReciever({
            sender_id: {{ $message->user->id }},
            receiver_id: {{ auth::user()->id }},
            photo_url: 'https://i.picsum.photos/id/1011/5472/3648.jpg?hmac=Koo9845x2akkVzVFX3xxAc9BCkeGYA9VRVfLE4f0Zzk',
            sender_name: '{{ $message->user->name }}',
            receiver_name: '{{ auth::user()->name }}',
            last_message: message,
            timestamp: epochTime,
            device_id: 'testing',
            chat_id: chatId,
            is_archived: false,
            isVisible:true
        });

        $('#btn-input').val("")
    }

})

// also we will send message when user enter key
$('#btn-input').keyup(function(event) {

    // get key code of enter
    if(event.keyCode == 13){ // enter
       var message = $('#btn-input').val();

        if(message){
            // insert message 

            sendMessage({
                sender_id: {{ auth::user()->id }},
                receiver_id: {{ $message->user->id }},
                photo_url: 'https://i.picsum.photos/id/1011/5472/3648.jpg?hmac=Koo9845x2akkVzVFX3xxAc9BCkeGYA9VRVfLE4f0Zzk',
                sender_name: '{{ auth::user()->name }}',
                receiver_name: '{{ $message->user->name }}',
                message: message,
                notDeletedBy: [
                    "{{ auth::user()->id }}",
                    "{{ $message->user->id }}"
                ],
                timestamp: epochTime
            });

            recentChatforSender({
                sender_id: {{ auth::user()->id }},
                receiver_id: {{ $message->user->id }},
                photo_url: 'https://i.picsum.photos/id/1011/5472/3648.jpg?hmac=Koo9845x2akkVzVFX3xxAc9BCkeGYA9VRVfLE4f0Zzk',
                sender_name: '{{ auth::user()->name }}',
                receiver_name: '{{ $message->user->name }}',
                last_message: message,
                timestamp: epochTime,
                device_id: 'test',
                chat_id: chatId,
                is_archived: false,
                isVisible:true
            });
            recentChatforReciever({
                sender_id: {{ $message->user->id }},
                receiver_id: {{ auth::user()->id }},
                photo_url: 'https://i.picsum.photos/id/1011/5472/3648.jpg?hmac=Koo9845x2akkVzVFX3xxAc9BCkeGYA9VRVfLE4f0Zzk',
                sender_name: '{{ $message->user->name }}',
                receiver_name: '{{ auth::user()->name }}',
                last_message: message,
                timestamp: epochTime,
                device_id: 'testing',
                chat_id: chatId,
                is_archived: false,
                isVisible:true
            });

            $('#btn-input').val("")
        }
    }
    // console.log("Key pressed");
})
</script>
@endsection