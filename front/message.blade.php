@extends('front.layouts.default')

@section('title', 'Message')

@section('meta_keyword', '')

@section('meta_description', 'message')

@section('content')



<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<style>

    .info_tab.reminderTab{

    	/*width: 100%;*/

	    position: relative;

	    background: #cccccc;

	    padding: 10px;

	    text-align: center;

	    height: 69px;

	    display: flex;

	    align-items: center;

	    justify-content: center;

    }
    .mCustomScrollbar {
    	display: inline-block !important;
    	overflow: auto !important;
    }

</style>

<section>

    <div class="container messages">

        <div class="contact_middle messages_chat">

            <div class="contact_list conversationsTab">

              <div class="conversations-bar">

        			<div class="selected">

        				<a href="javascript:;">

        				<h3>Messages</h3>

                <span class="icon">

        					<i class="bx bx-chevron-down"></i>

        				</span>

        				</a>

        			</div>

        			<div class="selecte-options">

        				<ul class="list-unstyled">

        				<li><a class="select-messages" href="javascript:;">Messages</a></li>

        				<li><a href="javascript:;">Unread</a></li>

        				<li><a href="javascript:;">Reminder</a></li>

        				<li><a href="javascript:;">Favorites</a></li>

        				</ul>

        			</div>

        			</div>

                <!-- <div class="conversations-bar">

	                <div class="selected">

	                  <a href="javascript:;">

	                    <span class="icon">

	                      <span></span>

	                      <span></span>

	                      <span></span>

	                    </span>

	                    <h3>Conversations</h3>

	                  </a>

	                </div>

	                <div class="selecte-options">

	                  <ul class="list-unstyled">

	                    <li><a href="javascript:;">Conversations</a></li>

	                    <li><a href="javascript:;">Unread</a></li>

	                    <li><a href="javascript:;">Reminder</a></li>

	                  </ul>

	                </div>

	            </div> -->

                <div class="inbox_chat">



                </div>

            </div>



            <div class="info_tab conversationsTab">

            	<div class="chatbox">

                  <div class="top-bar">
                    &nbsp;
                  </div>

            	</div>



            	<div class="bottom-send-bar type_msg" style="display: none;">

				        <input type="hidden" class="send_to">

				        <input type="file" name="image" id="image" style="display: none" accept=".jpg,.png,.jpeg">

				        <a href="javascript:" class="camera"><span><i class="bx bx-image-alt"></i></span></a>

				        {{-- <input class="form-control chat-input" type="text" placeholder="Type your message"> --}}

				        <textarea class="form-control chat-input pt-2" placeholder="Type your message"></textarea>

				        <!--<button class="btn_sub msg_send_btn" type="button">Send</button>-->

								<a id="send-message"><i class="bx bxs-paper-plane"></i></a>

			    		</div>



            </div>



            {{-- <div class="info_tab reminderTab" style="display: none;">

            </div> --}}

        </div>

    </div>



    <div class="container">

        <!--<div class="user_view_profile rate-user conversationsTab" style="display: none;">



        </div>-->



	    <div class="reminderTab reminderList" style="display: none;">



	    </div>



    </div>



</section>



<!-- Rate User Modal -->

<div class="modal fade" id="rateUserModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title text-center" id="exampleModalLabel">Rating to User</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <form id="rateUserForm">

                <div class="modal-body">

                    <div class="row">

                    	<input type="hidden" name="rate_user_id" id="rate_user_id">

                    	<input type="hidden" name="user_id" value="{{ Auth::id() }}">

                        {{-- <div class="col-md-12">

                            <label>Company Name</label>

                            <input type="text" class="form-control" name="company" placeholder="Enter company name">

                        </div> --}}

                    </div>

                    {{-- <div class="row">

                        <div class="col-md-12">

                            <label>Position</label>

                            <input type="text" class="form-control" name="tagline" placeholder="Enter Position">

                        </div>

                    </div> --}}

                    <div class="row mb-2">

                        <div class="col-md-12">

                            <label>Rate</label>

                            <span class="search_textbox ml-3">

                            	<i class="fas fa-star stars" value="1"></i>

                            	<i class="far fa-star stars" value="2"></i>

                            	<i class="far fa-star stars" value="3"></i>

                            	<i class="far fa-star stars" value="4"></i>

                            	<i class="far fa-star stars" value="5"></i>

                            </span>

                            <input type="hidden" name="rate" class="form-control rate" value="1">

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <label>Review</label>

                            <textarea class="form-control" name="description" style="height: 75%"></textarea>

                        </div>

                    </div>



                </div>

                <div class="modal-footer justify-content-center">

					<div class="bottom_btn">

						<button type="button" class="btn_sub btn_boder" data-dismiss="modal">Close</button>

						<button type="submit" class="btn_sub rate_user_btn">Save</button>

					</div>

                </div>

            </form>

        </div>

    </div>

</div>





{{-- Delete --}}

<div class="modal fade align-middle" id="deleteModal">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h3 class="modal-title text-center">Delete Conversation</h3>

                <button class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-center">

                <p><b>Are you sure you want to delete this conversation ?</b></p>

            </div>

            <div class="modal-footer justify-content-center">

                <div class="bottom_btn">

                    <a href="javascript:" class="btn_sub sm_bt deleteid">Delete</a>

                    <button class="btn_sub sm_bt btn_boder" type="submit" data-dismiss="modal">Cancel</button>

                </div>

            </div>

        </div>

    </div>

</div>



<!-- Reminder Modal -->

<div class="modal fade" id="reminderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title text-center" id="exampleModalLabel">Add New Reminder</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <form id="reminderForm">

                <div class="modal-body">

                	<input type="hidden" name="for_user_id" class="for_user_id">

                    <div class="row">

                        <div class="col-md-12">

                            <label>Title</label>

                            <input type="text" class="form-control" name="title" placeholder="Enter title">

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <label>Description</label>

                            <textarea class="form-control" name="description" placeholder="Enter description"></textarea>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">

                            <label>Date</label>

                            <input type="text" class="form-control datepicker" name="date" placeholder="YYYY-MM-DD" value="{{ date("Y-m-d",strtotime("+1 days")) }}" readonly="">

                        </div>

                    </div>

                </div>

                <div class="modal-footer justify-content-center">

					<div class="bottom_btn">

						<button type="button" class="btn_sub btn_boder" data-dismiss="modal">Close</button>

						<button type="submit" class="btn_sub">Save changes</button>

					</div>

				</div>

            </form>

        </div>

    </div>

</div>



{{-- Delete --}}

<div class="modal fade align-middle" id="deleteReminderModal">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h3 class="modal-title text-center">Delete Reminder</h3>

                <button class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-center">

                <p><b>Are you sure you want to delete this reminder ?</b></p>

            </div>

            <div class="modal-footer justify-content-center">

                <div class="bottom_btn">

                    <a href="javascript:" class="btn_sub sm_bt deleteReminderId">Delete</a>

                    <button class="btn_sub sm_bt btn_boder" type="submit" data-dismiss="modal">Cancel</button>

                </div>

            </div>

        </div>

    </div>

</div>



@stop

@section('pagescript')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>



{{-- 192.249.121.94:3001 --}}

{{-- <script src="http://192.249.121.94:3001/socket.io/socket.io.js"></script>
 --}}
<script>



$(document).ready(function() {





	$('.mCustomScrollbar').on('keyup keypress', function(e) {

	  var keyCode = e.keyCode || e.which;

	  if (keyCode === 13) {

	    e.preventDefault();

	    return false;

	  }

	});



	const socket = io('http://<?php echo env('APP_HOSTNAME', 'livelikeminded.com'); ?>:3031')
	//Add User

	socket.emit('adduser','{{ Auth::id() }}')

	const chat = document.querySelector('.chat-form')

	var active_chat_user = "";










	/*Conversation*/

	function viewChatbox($user_id){

		$('.chatbox').html('');

		$('.rate-user').html('');



		$this = $('.user_name[data-user_id="'+$user_id+'"]').children('.user_list')

		if($this.hasClass("no-read")){

			$this.removeClass('no-read');

		}



		loaderShow();

		$.ajax({

			url: '{{ route("message.detail") }}',

			type: 'POST',

			data: {

				_token: '{{ csrf_token() }}',

				user_id:$user_id

			},

		})

		.done(function(data) {

			loaderHide();

			if (data.status == false) {

                toastr.error(data.message);

            }else{

            	$('.chatbox').html(data.data);

            	$('.rate-user').html(data.user);

              $('.back-arrow').on('click', function() {
                $('.messages_chat').removeClass('message-open');
              });


			    $('.type_msg').show();

			    $('.send_to').val($user_id);



            	if(data.messages != 0){

				    //$('.msg_history').mCustomScrollbar();

				    //$('.msg_history').mCustomScrollbar("scrollTo","last");

            	}



            	if($(".conversations-bar .selected h3").text() == "Unread"){

            		$('.chatbox').find('.icon-email').remove();

            		//$('.chatbox').find('.favourite').remove();

            	}



			    if(data.rate.length !=0){

			    	/*$('#rateUserForm').find('input[name="company"]').val(data.rate.company);

			    	$('#rateUserForm').find('input[name="tagline"]').val(data.rate.tagline);*/

			    	$('#rateUserForm').find('textarea[name="description"]').text(data.rate.description);

			    	$('#rateUserForm').find('.stars[value="'+data.rate.rate+'"]').click();

			    }else{

			    	// $('#rateUserForm').find('input[name="company"]').val("");

			    	// $('#rateUserForm').find('input[name="tagline"]').val("");

			    	$('#rateUserForm').find('textarea[name="description"]').text("");

			    	$('#rateUserForm').find('.stars[value="1"]').click();

			    }

			    $(".msg_history").scrollTop(9999999);

            }

		})

		.fail(function() {

			loaderHide();

			toastr.error("error");

		});

	}



	/*Conversation List*/

	function getChatInbox($type = null,$unread = false,$favorites = false){



		$('.inbox_chat').html('');

		$('.type_msg').hide();

		$('.chatbox').html('');

		$('.rate-user').html('');



		$url = '{{ route("message.list") }}';

		if($unread){

			$url = '{{ route("message.list.unread") }}';

		}

		if($favorites){

			$url = '{{ route("message.list.favorites") }}';

		}



		loaderShow();

		$.ajax({

			url: $url,

			type: 'POST',

			data: {

				_token: '{{ csrf_token() }}',

			},

		})

		.done(function(data) {

			loaderHide();

			$('.inbox_chat').html(data);

			//$('.inbox_chat').mCustomScrollbar({autoHideScrollbar: true});



			if($type == "first"){

				//$('.inbox_chat .read:first').click();
				active_chat_user = $('.inbox_chat .read:first').parent().attr('data-user_id');

        viewChatbox(active_chat_user);

			}else if($type != "first" || $type != "null"){

				$('a[data-user_id='+active_chat_user+']').children('.user_list').click();

			}



		})

		.fail(function() {

			loaderHide();

			toastr.error("error");

		});

	}



	/*Store Message*/

	function storeMessage($message,$sender_id,$message_type = "text"){

		$.ajax({

			url: '{{ route("message.store") }}',

			type: 'POST',

			data: {

				_token: '{{ csrf_token() }}',

				message : $message,

				sender_id : $sender_id,

				message_type : $message_type

			},

		})

		.done(function(data) {

			if (data.status == false) {

				loaderHide();

                toastr.error(data.message);

            }

		})

		.fail(function() {

			loaderHide();

			toastr.error("error");

		});

	}



	/*Reminder List*/

	function getReminderList(){

		$('.reminderList').html(' ');



		$.ajax({

			url: '{{ route('message.reminder.list') }}',

		})

		.done(function(data) {

			$('.reminderList').html(data);

      $('.reminder-back').on('click', function() {
        $('.select-messages').click();
      })

		});

	}





	@if(isset($userData))

		active_chat_user = '{{ $userData->id }}';

		/*viewChatbox('{{-- $userData->id --}}');*/

		getChatInbox('{{ $userData->id }}');



	@else

		getChatInbox("first");

		//getChatInbox(null);

	@endif





	$('#send-message').click(function(event) {

		var send = $('.send_to').val();

		var message = $('.chat-input').val();

		var from = '{{ Auth::id() }}';



		if(message == ""){

	        toastr.error("Please Enter message");

		}else{



			storeMessage(message,send,"text");



			socket.emit('msg_user',send, from, message,'text');



			$data = '<div class="chat-row">'+

									'<span class="chat-time">{{ getUserDate(date("Y-m-d H:i:s")) }}</span>'+

			            '<div class="chat-popup right">'+

			                '<p>'+message+'</p>'+

			            '</div>'+

			        '</div>';

			$('.user_name[data-user_id="'+send+'"] p').text(message);

			$('.msg_history').append($data);

			$('.chat-input').val('');

			/*$('.msg_history').mCustomScrollbar("destroy");

			$('.msg_history').mCustomScrollbar();

			$('.msg_history').mCustomScrollbar("scrollTo","last");*/

			$(".msg_history").scrollTop(9999999);
		}

	});



	/*For receive message */

	socket.on('msg_user_handle', data => {



		if(data.to == {{ Auth::id() }} && data.from == active_chat_user){



			if(data.type == "text"){

				$message = '<p>'+data.message+'</p>';

			}else{

				$message = '<div class="img-tag">'+

                                '<img src="{{ url('sitebucket/conversation')}}/'+data.message+'" alt="">'+

                            '</div>';

			}

			$data = '<div class="chate-row">'+

			            '<div class="chate-popup">'+

			                '<span class="chat-time">{{ getUserDate(date("Y-m-d H:i:s")) }}</span>'+

			                $message+

			            '</div>'+

			        '</div>';



			//alert($('.chate-row').length);

		    $('.msg_history').append($data);

		    if($('.chate-row').length >= 10){

			    /*$('.msg_history').mCustomScrollbar("destroy");

				$('.msg_history').mCustomScrollbar();

				$('.msg_history').mCustomScrollbar("scrollTo","last");*/

		    }

			$this = $('.user_name[data-user_id="'+active_chat_user+'"]').children('.user_list')

			$this.removeClass('no-read');

			$(".msg_history").scrollTop(9999999);

		}



		if(data.to == {{ Auth::id() }}){

			getChatInbox();

			/*var url = '{{ route("message.sendby", [":id"]) }}';

			$tid = btoa(data.from);

        	url = url.replace(':id', $tid);


        	toastr.options.timeOut = 0;
			toastr.options.extendedTimeOut = 0;
			toastr.success("<a href='"+url+"'>New Message</a>");*/

		}

	})

	$(document).on('click', '.user_name', function(event) {

		event.preventDefault();


		//console.log(event);



		$('.user_list').removeClass('active');

		$(this).children('.user_list').addClass('active');



		$user_id = $(this).attr('data-user_id');

		$name = $(this).attr('data-name');



		active_chat_user = $user_id;

		viewChatbox($user_id);

    $('.messages_chat').addClass('message-open');


		$('#rateUserModel .modal-title').text("Rating "+$name);

		$('#rate_user_id').val($user_id);

	});



	$(document).on('click', '.stars', function(event) {

        event.preventDefault();

	    $('.rate').val($(this).attr('value'));



	    $('.stars').each(function(index, el) {

	        if(index < $('.rate').val()){

	            $(this).removeClass('far');

	            $(this).addClass('fas');

	        }else{

	            $(this).removeClass('fas');

	            $(this).addClass('far');

	        }

	    });

	});





	$('#rateUserForm').submit(function(e) {

		e.preventDefault();

		var formData = new FormData(this);

		$.ajax({

			url: '{{ route('message.rate') }}',

			type: 'POST',

			data: formData,

			cache: false,

	        contentType: false,

	        processData: false,

			headers: {

	            'X-CSRF-TOKEN': '{{ csrf_token() }}'

	        },

		})

		.done(function(data) {

			if (data.status == false) {

	            toastr.error(data.message);

	        }else{

	            toastr.success(data.message);

				$('#rateUserModel').modal('hide');

				viewChatbox($('#rate_user_id').val());

	        }

		})

		.fail(function() {

			console.log("error");

	        toastr.error("Error !");

		});



	});



	/*Start Delete Conversation*/

	$(document).on('click', '.delete', function(event) {

		event.preventDefault();

		$id = $(this).attr('data-id');



		$('#deleteModal').find('.deleteid').attr('data-id',$id);

		$('#deleteModal').modal('show');

	});





	$(document).on('click', '.deleteid', function(event) {

		event.preventDefault();

		$id = $(this).attr('data-id');

		$text = $(".conversations-bar .selected h3").text();



		$.ajax({

			url: '{{ route('message.delete') }}',

			type: 'POST',

			data: {_token: '{{ csrf_token() }}',id:$id},

		})

		.done(function(data) {

			if(data.status == false){

				toastr.error(data.message);

			}else{

				toastr.success(data.message);



				$('#deleteModal').modal('hide');



				/*if($text == "Unread"){

					getChatInbox(null,true);

				}else{

					getChatInbox("first");

				}*/

				if($text == "Unread"){

					getChatInbox(null,true);

				}else if($text == "Favorites"){

					getChatInbox("first",false,true);

				}else{
					getChatInbox("first");
				}

			}

		})

		.fail(function() {

			toastr.error("error");

		});



	});

	/*End Delete Conversation*/



	$(document).on('click', '.favourite', function(event) {

		event.preventDefault();

		$id = $(this).attr('data-id');

		$user_id = $(this).attr('data-user_id');

		$text = $(".conversations-bar .selected h3").text();





		$.ajax({

			url: '{{ route('message.favourite') }}',

			type: 'POST',

			data: {_token: '{{ csrf_token() }}',id:$id},

		})

		.done(function(data) {

			if(data.status == false){

				toastr.error(data.message);

			}else{

				toastr.success(data.message);



				if($('.favourite').hasClass("is_fav")){

					$('.favourite').removeClass('is_fav');

				}else{

					$('.favourite').addClass('is_fav');

				}



				if($text == "Unread"){

					getChatInbox(null,true);

				}else if($text == "Favorites"){

					getChatInbox("first",false,true);

				}else{
					getChatInbox("first");
				}

				//getChatInbox($user_id);



			}

		})

		.fail(function() {

			toastr.error("error");

		});

	});



	/*Start Send Image*/

	$(document).on('click', '.camera', function(event) {

		event.preventDefault();

        $('#image').trigger('click');

	});



	$("#image").change(function(e) {

	    var val = $(this).val();



	    if (val.match(/(?:jpg|png|jpeg)$/)) {



		    var form_data = new FormData();



		    form_data.append("image", document.getElementById('image').files[0]);



	    	$.ajax({

	    		url: '{{ route('message.store.image') }}',

	    		type: 'POST',

	    		contentType: false,

    			processData: false,

                dataType:"json",

	    		data: form_data,

	    		headers: {

		            'X-CSRF-TOKEN': '{{ csrf_token() }}'

		        },

	    	})

	    	.done(function(data) {

	    		if(data.status == true){



					var send = $('.send_to').val();

					var from = '{{ Auth::id() }}';



	    			storeMessage(data.name,send,"image");



					socket.emit('msg_user',send, from, data.name,'image');



	    			$data = '<div class="chat-row">'+

									'<span class="chat-time">{{ getUserDate(date("Y-m-d H:i:s")) }}</span>'+

			            '<div class="chat-popup right">'+

			                '<div class="img-tag">'+

                                '<img src="{{ url('sitebucket/conversation')}}/'+data.name+'" alt="" class="mCS_img_loaded">'+

                            '</div>'+

			            '</div>'+

			        '</div>';



			        $('.user_name[data-user_id="'+send+'"] p').html('<i class="icon-file-picture"> Image');

					$('.msg_history').append($data);

					$(this).val('');

					$('.chat-input').val('');

					/*$('.msg_history').mCustomScrollbar("destroy");

					$('.msg_history').mCustomScrollbar();

					$('.msg_history').mCustomScrollbar("scrollTo","last");*/

					$(".msg_history").scrollTop(9999999);





	    		}else{

	    			toastr.error("Error !");

	    		}

	    	})

	    	.fail(function() {

	    		toastr.error("Error !");

	    	});



	    }else{

	        toastr.error("Please upload .jpg, .png, .jpeg file");

	    }

	});



	/*End Send Image*/



	/*Start Reminder*/

	$(document).on('click', '.addReminder', function(event) {

		event.preventDefault();

		$('.datepicker').datepicker({

			format: 'yyyy-mm-dd',

    		startDate: '+1d',

    		todayHighlight:true,

    		defaultViewDate:'+1d',

    		autoclose:true

		});



		$('.for_user_id').val(active_chat_user);

		$('#reminderModal').modal("show");

	});



	$('#reminderForm').submit(function (e) {

        e.preventDefault();

        var formData = new FormData(this);

        var url = "{{ route('message.reminder.store') }}";

        loaderShow();

        $.ajax({

            url: url,

            type: 'POST',

            data: formData,

            cache: false,

            contentType: false,

            processData: false,

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}'

            },

            success: function (data) {

                if (data.status == false) {

                    loaderHide();

                    $.each(data.message, function(index, val) {

                    	toastr.error(val);

                    });

                } else {

                    loaderHide();

                    toastr.success(data.message);

                    $('#reminderForm').find('input[name="title"]').val("");

                    $('#reminderForm').find('textarea[name="description"]').val(" ");

					$('#reminderModal').find('input[name="date"]').val("");



                    $('#reminderModal').modal("hide");



                    if($('input[name="id"]').length){

                    	getReminderList();

                    	$('#reminderForm').find('input[name="id"]').remove();

					}

                }

            }

        });

    });



	$(document).on('click', '.deleteReminder', function(event) {

		event.preventDefault();

		$id = $(this).attr('data-id');



		$('#deleteReminderModal').find('.deleteReminderId').attr('data-id',$id);

		$('#deleteReminderModal').modal('show');

	});





	$(document).on('click', '.deleteReminderId', function(event) {

		event.preventDefault();

		loaderShow();

		$id = $(this).attr('data-id');



		$.ajax({

			url: '{{ route('message.reminder.delete') }}',

			type: 'POST',

			data: {_token: '{{ csrf_token() }}',id:$id},

		})

		.done(function(data) {

			if(data.status == false){

				toastr.error(data.message);

			}else{

				toastr.success(data.message);

				getReminderList();

				$('#deleteReminderModal').modal('hide');

			}

		})

		.fail(function() {

			toastr.error("error");

		});

		loaderHide();

	});



	$(document).on('click', '.editReminder', function(event) {

		event.preventDefault();

		var id = $(this).attr('data-id');

		var for_user_id = $(this).attr('data-for_user_id');

		var title = $(this).closest('.trow').find('h6').text();

		var description = $(this).closest('.trow').find('p').text();

		var date = $(this).closest('.trow').find('.date').attr('data-org');



		$('.datepicker').datepicker({

			format: 'yyyy-mm-dd',

    		//startDate: '+1d',

    		todayHighlight:true,

    		defaultViewDate:'+1d',

    		autoclose:true

		});



		input = '<input type="hidden" name="id" value="'+id+'">';

		$(input).insertBefore('.for_user_id');



		$('#reminderModal').find('input[name="for_user_id"]').val(for_user_id);

		$('#reminderModal').find('input[name="title"]').val(title);

		$('#reminderModal').find('textarea[name="description"]').val(description);

		$('#reminderModal').find('input[name="date"]').val(date);



		$('#reminderModal').modal("show");

	});

	/*End Reminder*/



	/*Unread Message*/

	$(document).on('click', '.unread', function(event) {

		event.preventDefault();



		$id = $(this).attr('data-id');

		$text = $(".conversations-bar .selected h3").text();

		//alert($id);



		$.ajax({

			url: '{{ route('message.unread') }}',

			type: 'POST',

			data: {

				_token: '{{ csrf_token() }}',

				id: $id

			},

		})

		.done(function(data) {

			if(data.status == false){

				toastr.error(data.message);

			}else{

				toastr.success(data.message);

			}

			if($text == "Unread"){

				getChatInbox(null,true);

			}else if($text == "Favorites"){

				getChatInbox("first",false,true);

			}else{
				getChatInbox("first");
			}

			/*getChatInbox("first");*/

		})

		.fail(function() {

			toastr.error("error");

		});



	});



	/*Sidebar*/

	$(".conversations-bar .selecte-options a").click(function () {

		var text = $(this).html();

		$(this).parents('.conversations-bar').children('.selected').children('a').children('h3').html(text);

		$(this).parents('.conversations-bar').children('.selecte-options').slideUp();

		$(this).parents('.conversations-bar').removeClass('open-list');

		$(this).parents('.selecte-options').find('li').css('display', 'block')

		$(this).parent('li').css('display', 'none')



		if(text == "Messages"){

			$(".messages_chat").show();

			$(".reminderTab").hide();

			getChatInbox("first");



		}else if(text == "Reminder"){

			$(".reminderTab").show();

			$(".messages_chat").hide();

			getReminderList();



		}else if(text == "Unread"){

			$(".reminderTab").hide();

			$(".messages_chat").show();

			getChatInbox(false,true);

		}else if(text == "Favorites"){

			$(".reminderTab").hide();

			$(".messages_chat").show();

			getChatInbox("first",false,true);

		}

	});



});



</script>

@endsection
