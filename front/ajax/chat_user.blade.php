@if($user)

    <div class="user_profile">

        <img src="{{ (empty($user->image)) ?  asset('/front/images/default.png')  : url('sitebucket/users').'/'.$user->image }}" alt="">

    </div>

    <div class="text">

        <span class="seen-time">Last activity: <strong>{{ getUserLoginDateTime($user->id) }}</strong></span>

        <h4>{{ $user->first_name}} {{$user->last_name }}</h4>

        <h5 style="text-transform: capitalize;">@if($user->type == "business") {{ "Brand/Business" }} @else {{ "Influencer" }} @endif</h5>

        <h4>{{ getUserLastLocation($user->id) }}</h4>

        <div class="rating" style="pointer-events:none">

            <ul>

                @for($i = 0; $i < getUserAvgReview($user->id); $i++)

                <li class="active"><i class="icon-staaar"></i></li>

                @endfor

                @for($i = 0; $i < 5 - getUserAvgReview($user->id); $i++)

                <li><i class="icon-staaar"></i></li>

                @endfor

            </ul>

            <span>( {{ getUserTotalReview($user->id) }} )</span>

        </div>

    </div>

    <div class="view_btn">

        <a class="btn_sub" href="javascript;" data-toggle="modal" data-target="#rateUserModel">Rate This User</a>

    </div>

@endif