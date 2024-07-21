@if($UserContact)

<div class="user_view_profile">
  <div class="back-arrow">
    <i class="bx bx-chevron-left"></i>
  </div>
  <div class="profile" data-contact-id="{{\Crypt::encrypt($UserContact->id)}}">
    <div class="profile-picture">
      <a href="{{ route('contact.profile', \Crypt::encrypt($UserContact->ContactUser->id)) }}">
        <img src="{{ (empty($UserContact->ContactUser->image))?  asset('/front/images/default.png')  : url('sitebucket/users').'/'.$UserContact->ContactUser->image }}" alt="{{$UserContact->ContactUser->first_name}} {{$UserContact->ContactUser->last_name}} profile picture">
      </a>
    </div>
    <div class="profile-info">
      <div class="headline">
        <div class="name-type">
          <a href="{{ route('contact.profile', \Crypt::encrypt($UserContact->ContactUser->id)) }}">
            <div class="name">{{$UserContact->ContactUser->first_name}} {{$UserContact->ContactUser->last_name}}</div>
          </a>
          <div class="account-type">@if ($UserContact->ContactUser->type == 'business') {{ "Brand/Business" }} @else {{ "Influencer" }} @endif</div>
        </div>
        <div class="rating">
          <ul>

              @for($i = 0; $i < getUserAvgReview($UserContact->ContactUser->id); $i++)

              <li class="active"><i class="icon-staaar"></i></li>

              @endfor

              @for($i = 0; $i < 5 - getUserAvgReview($UserContact->ContactUser->id); $i++)

              <li><i class="icon-staaar"></i></li>

              @endfor

          </ul>
        </div>
      </div>
      <div class="description">
        <p>@if (!empty($UserContact->ContactUser->about_me)) {{ $UserContact->ContactUser->about_me }} @else {{ "No description provided" }} @endif</p>
      </div>
      <div class="actions">
        <a class="button light send-message" href="{{ route('message.create',\Crypt::encrypt($UserContact->ContactUser->id)) }}"><i class="bx bxs-message-rounded-add"></i>Send Message</a>

        <a class="button dark add_new_notes" href="javascript:return false;"><i class="bx bx-notepad"></i>Add New Note</a>
      </div>
    </div>
  </div>
  <div class="notes-container">
    @foreach($UserContact->Notes as $key=>$value)

    <div class="notes mt-4" id="notes_remove_{{$value->id}}">

        <div class="d-flex justify-content-between mb-3">

            {{-- <span class="date">Added: <strong>{{\Carbon\Carbon::parse($value->created_at)->format('m/d/y')}}</strong></span> --}}
            <span class="date">Added: <strong>{{ getUserDate($value->created_at) }}</strong></span>

            <div class="edit_dlt">

                <a style="display: none;" href="javascript:" class="save_note" data-bind="{{\Crypt::encrypt($value->id)}}" data-id="notes_{{$value->id}}" title="Save Note"><i class="bx bxs-save"></i></a>

                <a href="javascript:" title="Edit Note" class="edit_note" data-id="notes_{{$value->id}}"><i class="bx bxs-edit-alt"></i></a>

                <a href="javascript:" class="deletemodel" data-id="{{\Crypt::encrypt($value->id)}}"><i class="bx bxs-trash-alt"></i></a>

            </div>

        </div>

        <textarea id="notes_{{$value->id}}" disabled="">{{$value->note}}</textarea>

    </div>

    @endforeach

  </div>

    <!--<div class="user_profile">

        <img src="{{ (empty($UserContact->ContactUser->image))?  asset('/front/images/default.png')  : url('sitebucket/users').'/'.$UserContact->ContactUser->image }}" alt="">

    </div>

    <input type="hidden" name="contact_id" value="{{\Crypt::encrypt($UserContact->id)}}"/>

    <div class="text">

        <h4>{{$UserContact->ContactUser->first_name}} {{$UserContact->ContactUser->last_name}}</h4>

        <h5 style="text-transform: capitalize;">@if($UserContact->ContactUser->type == "business") {{ "Brand/Business" }} @else {{ "Influencer" }} @endif</h5>

        <h4>{{ getUserLastLocation($UserContact->ContactUser->id) }}</h4>

        <div class="rating" style="pointer-events:none !important">

            <ul>

                @for($i = 0; $i < getUserAvgReview($UserContact->ContactUser->id); $i++)

                <li class="active"><i class="icon-staaar"></i></li>

                @endfor

                @for($i = 0; $i < 5 - getUserAvgReview($UserContact->ContactUser->id); $i++)

                <li><i class="icon-staaar"></i></li>

                @endfor

            </ul>

            <span>( {{ getUserTotalReview($UserContact->ContactUser->id) }} )</span>

        </div>

    </div>

    <div class="view_btn">

        <a class="btn_sub sm_bt mb-2 btn_boder" href="{{ route('message.create',\Crypt::encrypt($UserContact->ContactUser->id)) }}">Send Message</a><br>

        <a class="btn_sub sm_bt" href="{{ route('contact.profile',\Crypt::encrypt($UserContact->ContactUser->id)) }}">View Profile</a>

    </div>-->

</div>

<!--@foreach($UserContact->Notes as $key=>$value)

<div class="notes mt-4" id="notes_remove_{{$value->id}}">

    <div class="d-flex justify-content-between mb-3">

        {{-- <span class="date">Added: <strong>{{\Carbon\Carbon::parse($value->created_at)->format('m/d/y')}}</strong></span> --}}
        <span class="date">Added: <strong>{{ getUserDate($value->created_at) }}</strong></span>

        <div class="edit_dlt">

            <a style="display: none;" href="javascript:" class="save_note" data-bind="{{\Crypt::encrypt($value->id)}}" data-id="notes_{{$value->id}}" title="Save Note"><i class="icon-add"></i></a>

            <a href="javascript:" title="Edit Note" class="edit_note" data-id="notes_{{$value->id}}"><i class="icon-edit"></i></a>

            <a href="javascript:" class="deletemodel" data-id="{{\Crypt::encrypt($value->id)}}"><i class="icon-trash"></i></a>

        </div>

    </div>

    <textarea id="notes_{{$value->id}}" disabled="">{{$value->note}}</textarea>

</div>

@endforeach

<div class="mt-4"><a class="btn_sub sm_bt btn_boder add_new_notes" href="javascript:">Add New Note</a></div>-->

@else

<p style="margin-top: 10px; text-align: center">No Record found !</p>

@endif
