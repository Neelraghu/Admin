@if(isset($is_fav))

	@if($list)

		@foreach ($list as $key)



			@if($key->sender_id == Auth::id())

				@php $user = $key->receiver @endphp

				@php $fav = $key->sender_fav @endphp

			@else

				@php $user = $key->sender @endphp

				@php $fav = $key->receiver_fav @endphp

			@endif



			@if($fav)

				<a href="javascript:" class="user_name" data-user_id="{{ $user->id }}" data-user_id_encrypt="{{ Crypt::encrypt($user->id) }}" data-name="{{ $user->first_name." ".$user->last_name }}">

					<div class="user_list @if(checkConversationUnread($key->id)) no-read @else read @endif">

				        <span class="user">

				        	@if(!empty($user->image))

				            <img src="{{ url('sitebucket/users') }}/{{ $user->image }}" alt="Profile image">

				            @else

				            <img src="{{ url('front/images/default.png') }}" alt="Profile image">

				            @endif

				        </span>

				        <div class="user-name-info">

				            <span class="name">{{ $user->first_name." ".$user->last_name }}</span>

				            @if(getConversationLastData($key->id,'message_type') == "image")

				            	<p><i class="bx bx-image-alt"></i> Image</p>

				            @else

				            	<p>{{ getConversationLastData($key->id,'message') }}</p>

				            @endif

										<span class="time">{{ getUserDate(getConversationLastData($key->id,'created_at')) }}</span>

				        </div>

				    </div>

				</a>

			@endif



		@endforeach

	@endif



@else



	@if($list)

		@foreach ($list as $key)



			@if($key->sender_id == Auth::id())

				@php $user = $key->receiver @endphp

				@php $fav = $key->sender_fav @endphp

			@else

				@php $user = $key->sender @endphp

				@php $fav = $key->receiver_fav @endphp

			@endif



			@if(!$fav)

			<a href="javascript:" class="user_name" data-user_id="{{ $user->id }}" {{-- data-user_id_encrypt="{{ Crypt::encrypt($user->id) }}" --}} data-name="{{ $user->first_name." ".$user->last_name }}">

				<div class="user_list @if(checkConversationUnread($key->id)) no-read @else read @endif">

			        <span class="user">

			        	@if(!empty($user->image))

			            <img src="{{ url('sitebucket/users') }}/{{ $user->image }}" alt="Profile image">

			            @else

			            <img src="{{ url('front/images/default.png') }}" alt="Profile image">

			            @endif

			        </span>

			        <div class="user-name-info">

			            <span class="name">{{ $user->first_name." ".$user->last_name }}</span>

			            @if(getConversationLastData($key->id,'message_type') == "image")

			            	<p><i class="bx bx-image-alt"></i> Image</p>

			            @else

			            	<p>{{ getConversationLastData($key->id,'message') }}</p>

			            @endif

									<span class="time">{{ getUserDate(getConversationLastData($key->id,'created_at')) }}</span>

			        </div>

			    </div>

			</a>

			@endif



		@endforeach

	@endif



@endif
