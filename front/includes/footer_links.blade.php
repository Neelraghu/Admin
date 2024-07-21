<script src="{{ asset('/front/js/jquery.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>

<script src="{{ asset('/front/js/bootstrap.min.js') }}"></script>

{{-- <script src="{{ asset('/front/js/custom.js') }}"></script> --}}

<script src="{{ asset('/front/js/mCustomScrollbar.min.js') }}"></script>

<script src="{{ asset('/front/js/custom.js') }}"></script>

<script src="{{ asset('/theme/vendors/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js"></script>



<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>

<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

<script>

	$(".lazy").lazy();

	function loaderShow(){

		$.LoadingOverlay("show");

    }

    function loaderHide(){

		$.LoadingOverlay("hide");

    }

</script>

<script src="http://{{ env('APP_HOSTNAME', 'livelikeminded.com') }}:3031/socket.io/socket.io.js"></script>



{{-- For Message Notification --}}
@if( !in_array( Route::currentRouteName(), ['message','message.create']) )
<script>
	const socket = io('http://{{ env('APP_HOSTNAME', 'livelikeminded.com') }}:3031')
	/*Add User*/

	socket.emit('adduser','{{ Auth::id() }}')

	socket.on('msg_user_handle', data => {

		if(data.to == {{ Auth::id() }}){

			//getChatInbox();

			var url = '{{ route("message.sendby", [":id"]) }}';

			$tid = btoa(data.from);

        	url = url.replace(':id', $tid);


        	var userurl = '{{ route("getuser", [":id"]) }}';

        	userurl = userurl.replace(':id', data.from);


        	$.ajax({
        		url: userurl,
        	})
        	.done(function(data) {
	        	toastr.options.timeOut = 0;
				toastr.options.extendedTimeOut = 0;
				toastr.success("<a href='"+url+"'>New Message From "+data.first_name+" "+data.last_name+"</a>");
        	});

    		/*$(document).find('.message-count').html("("+'{{getUserUnreadConversationCount(Auth::id()) + "1" }}'+")");
    		console.log('{{getUserUnreadConversationCount(Auth::id()) }}');*/
		}
	})
</script>
@endif
