<div class="reminder-back">
	<i class="bx bx-chevron-left"></i>&nbsp;Back
</div>
@if($new)

@foreach($new as $key)

	<div class="trow">

	  <div class="date_chat">

	    <span class="date" data-org="{{ $key->date }}">{{ getUserDate($key->date)}}</span>

	    <h6>{{ $key->title }}</h6>

	    <p>{{ $key->description }}</p>

			<p>
				{{ $key->user['first_name'] . " " . $key->user['last_name'] }}
			</p>

	  </div>

	  <div class="edit_dlt">

	    <a href="javascript:" data-id="{{ $key->id }}" data-for_user_id="{{ $key->for_user_id }}" class="editReminder"><i class="bx bxs-edit-alt"></i></a>

	    <a href="javascript:" data-id="{{ $key->id }}" class="deleteReminder"><i class="bx bxs-trash-alt"></i></a>

	  </div>

	</div>

@endforeach

@endif



@if($old)

@foreach($old as $key)

	<div class="trow">

	  <div class="date_chat">

	    <span class="date" data-org="{{ $key->date }}">{{ getUserDate($key->date)}}</span>

	    <h6>{{ $key->title }}</h6>

	    <p>{{ $key->description }}</p>

			<p>
				&commat;{{ $key->user['first_name'] . " " . $key->user['last_name'] }}
			</p>

	  </div>

	  <div class="edit_dlt">

	    <a href="javascript:" data-id="{{ $key->id }}" data-for_user_id="{{ $key->for_user_id }}" class="editReminder"><i class="bx bxs-edit-alt"></i></a>

	    <a href="javascript:" data-id="{{ $key->id }}" class="deleteReminder"><i class="bx bxs-trash-alt"></i></a>

	  </div>

	</div>

@endforeach

@endif



@if(count($old) == 0  && count($new) == 0)

	<div class="trow">

	  <div class="date_chat">

	    <p class="text-center">Reminder Not Found !</p>

	  </div>

	</div>

@endif
