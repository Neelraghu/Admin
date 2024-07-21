@if(count($listcontact) > 0)

@foreach($listcontact as $key=>$value)
	@php
		$contact = checkUserContact(Auth::id(),$value->id,true);
	@endphp
<div class="user_list {{-- @if($key==0) active @endif --}} remove_contact_{{$contact->id}}" id="{{\Crypt::encrypt($contact->id)}}">

    <span class="user"><img src="{{ (empty($value->image))?  asset('/front/images/default.png')  : url('sitebucket/users').'/'.$value->image }}" alt=""></span>

    <span class="name">{{$value->first_name}} {{$value->last_name}}</span>

    <span class="edit">

        <a class="is_fav_change" data-id='{{\Crypt::encrypt($contact->id)}}' href="javascript::"><i class="bx @if($contact->is_fav) bxs-heart @else bx-heart @endif"></i></a>

        <a href="javascript::" data-id='{{\Crypt::encrypt($contact->id)}}' class="delete_contact"><i class="bx bxs-trash-alt"></i></a>

    </span>

</div>

@endforeach

@elseif(!isset($fav))

<p style="margin-top: 30px;text-align: center;">No Record found !</p>

@endif


{{-- Old  --}}
{{-- @if(count($listcontact) > 0)

@foreach($listcontact as $key=>$value)

<div class="user_list @if($key==0) active @endif remove_contact_{{$value->id}}" id="{{\Crypt::encrypt($value->id)}}">

    <span class="user"><img src="{{ (empty($value->ContactUser->image))?  asset('/front/images/default.png')  : url('sitebucket/users').'/'.$value->ContactUser->image }}" alt=""></span>

    <span class="name">{{$value->ContactUser->first_name}} {{$value->ContactUser->last_name}}</span>

    <span class="edit">

        <a class="is_fav_change" data-id='{{\Crypt::encrypt($value->id)}}' href="javascript::"><i class="icon-heart @if($value->is_fav) is_fav @endif"></i></a>

        <a href="javascript::" data-id='{{\Crypt::encrypt($value->id)}}' class="delete_contact"><i class="icon-trash"></i></a>

    </span>

</div>

@endforeach

@else

<p style="margin-top: 30px;text-align: center;">No Record found !</p>

@endif --}}
