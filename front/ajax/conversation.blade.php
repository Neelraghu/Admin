@if($user)

	<div class="top-bar">

						<div class="back-arrow"><i class="bx bx-chevron-left"></i></div><h3><a class="view-profile" href="{{ route('profile.index', \Crypt::encrypt($user->id)) }}" title="View Profile">{{ $user->first_name . " " . $user->last_name }}</a></h3>

        <div class="click-view">

            <a href="javascript:" class="unread" data-id="{{ $conversation->id }}" title="Un-read"><i class="bx bxs-envelope"></i></a>

            <a href="javascript:" class="favourite" data-id="{{ $conversation->id }}" title="Favorite" data-user_id = "{{ $user->id }}"><i class="bx bxs-heart @if($is_fav) is_fav @endif"></i></a>

            <a href="javascript:" class="addReminder" data-id="{{ $conversation->id }}" title="Reminder"><i class="bx bxs-time"></i></a>

            <a href="javascript:" class="delete" data-id="{{ $conversation->id }}" title="Delete" ><i class="bx bxs-trash-alt"></i></a>

        </div>

    </div>

    <div class="chat-box mCustomScrollbar mCS_no_scrollbar msg_history">



    	@foreach($messages as $key)

    		<div class="chat-row @if ($key->user_id == Auth::id()) right @endif">

							<div class="chat-time">{{ getUserDate($key->created_at) }}</div>

	            <div class="chat-popup">

                    @if($key->message_type == "text")

	                <p>{{ $key->message }}</p>

                    @else

                    <div class="img-tag">

                        <img src="{{ url('sitebucket/conversation')."/".$key->message }}" alt="">

                    </div>

                    @endif

	            </div>

	        </div>

		@endforeach



    </div>

@endif
