@extends('front.layouts.default')

@section('title', 'Profile')

@section('meta_keyword', 'Profile')

@section('meta_description', 'Profile')

@section('content')

<section class="pv-top-card">

    <div>

        <div class="mt-2">

            @include('front.includes.message')

        </div>

        <div class="profile-Bgimage"></div>
        <div class="container-profile align-items-end profile-bgCard">
            <div class="row">
                <div class="col-md-4 order-md-2 profile-photo">

                    <figure>

                        <div class="divImg">

                            @if(!empty($user->image))

                            <img src="{{ url('sitebucket/users') }}/{{ $user->image }}" alt="Profile image">

                            @else

                            <img src="{{ url('front/images/default.png') }}" alt="Profile image">

                            @endif

                        </div>

                        <figcaption>

                            <b>{{ $user->first_name." ". $user->last_name }}</b>

                            <span>@if($user->type == "business") {{ "Brand/Business" }} @else {{ "Influencer" }} @endif</span>

                        </figcaption>

                    </figure>

                </div>

                @if($type['view'] == "false")

                    <div class="col-md-4 order-md-3 profile-edit">

                    <a href="{{ route('profile.edit') }}"><i class='bx bxs-edit-alt'></i><span>Edit Profile</span></a>

                    {{-- @else

                        <a href="{{ URL::previous() }}">< Back</a> --}}
                    </div>
                @endif

                @if($type['view']=="true" )
                    <div class="col-md-4 order-md-3 profile-edit">

                        <ul class="add-contact list-unstyled">

                            @if(!checkUserContact(Auth::id(),$user->id))

                            <li><a href="javascript:" class="add_to_contact"><span class="icon-copy"></span>Add To Contact</a></li>

                            @endif

                            <li><a href="{{ route('message.create',\Crypt::encrypt($user->id)) }}" title="Send Message"><span class="icon-email mr-2"></span>Send Message</a>
                            </li>

                        </ul>

                    </div>

                @endif

                <div class="col-md-4 order-md-1">

                    <!--                    <ul class="review list-unstyled d-flex align-items-center">

                        @for($i = 0; $i < getUserAvgReview($user->id); $i++)

                        <li class="active"><span class="icon icon-staaar"></span></li>

                        @endfor

                        @for($i = 0; $i < 5 - getUserAvgReview($user->id); $i++)

                        <li><span class="icon icon-staaar"></span></li>

                        @endfor

                        <li><span class="review-total">( {{ getUserTotalReview($user->id) }} )</span></li>

                    </ul>-->

                </div>

            </div>
            <div>
                <a href="#section-reviews">{!! getRate(getUserAvgReview($user->id),true,getUserTotalReview($user->id)) !!}</a>
            </div>
        </div>

        <div class="container-profile user-info-container">

            <div class="row">

                <div class="col-md-3 profile-about">

                    <div class="pr-card">

                        <ul class="pr-info list-unstyled">

                            @if($user->type == "influencer")

                            <li class="pr-ulist-icon">
                                <i class="bx bxs-map"></i>
                                <div class="pr-icon-info">
                                    @if(count($locations) > 0)

                                    @foreach ($locations as $location)

                                    <p class="pr-info-bold" style="margin-top: 5px; margin-bottom: 5px;">{{ $location->location }}</p>

                                    @endforeach

                                    @else

                                    <p style="margin-top: 5px; margin-bottom: 0px;">No Location Found.</p>

                                    @endif
                                </div>

                            </li>

                            <li class="pr-ulist-icon">
                                <i class='bx bxs-user-circle' ></i>
                                <div class="pr-icon-info">
                                    @if(!empty(Auth::user()->demographic_from))
                                    <p class="pr-info-bold demographic-title">Demographic</p>
                                    <p class="age">{{Auth::user()->demographic_from}} - {{Auth::user()->demographic_to}}</p>
                                    @endif
                                </div>
                            </li>

                            @endif

                            @if($user->about_me)

                            <li class="pr-info-outer">

                                <b>About Me</b>
                                <div class="about-line"></div>
                                <p>{{ $user->about_me }}</p>

                            </li>

                            @endif


                            <li class="pr-info-outer">

                                <b>Industry </b>

                                <p class="badges">{!! getUserIndustry($user->id) !!}</p>

                                {{-- <p>
                                    @foreach($user_category as $key)
                                        <span class="badge badge-pill">{{ $key->sub_category->category->name." : ".$key->sub_category->name }}</span>
                                    @endforeach
                                </p> --}}

                            </li>


                        </ul>

                        @if($type['view']=="true" )
                            <div class="profile-contact">
                                <a href="javascript:" class="contact-btns"><i class='bx bxs-message-rounded-add contact-btn-icon'></i>SEND MESSAGE</a>
                                <a href="javascript:" class="contact-btns"><i class='bx bxs-user-plus contact-btn-icon'></i>ADD TO CONTACTS</a>
                            </div>
                        @endif

                    </div>



                </div>

                <div class="col-md-9 profile-accs">

                    <div class="row">

                        @if(count($socials) != 0)

                        @foreach($socials as $social)

                        <div class="col-sm-6 col-md-6 col-lg-4 outer-account-container">
                            <div class="account-container">
                                <div class="overlay"></div>
                                @if($social->account_type == "website")

                                        <p>
                                            <box-icon name='desktop' type='logo' size="60px" color="#FFF"></box-icon>
                                            <span class="handle">{{ ucfirst($social->account_type) }} </span>

                                            {{ $social->username }}
                                        </p>

                                        @else

                                        <p>
                                            @if($social->account_type == "instagram")
                                            <box-icon name='instagram' type='logo' size="60px" color="#FFF"></box-icon>
                                            @elseif($social->account_type == "facebook")
                                            <box-icon name='facebook' type='logo' size="60px" color="#FFF"></box-icon>
                                            @elseif($social->account_type == "youtube")
                                            <box-icon name='youtube' type='logo' size="60px" color="#FFF"></box-icon>
                                            @elseif($social->account_type == "twitter")
                                            <box-icon name='twitter' type='logo' size="60px" color="#FFF"></box-icon>
                                            @else
                                            <img src="{{ asset('/front/images/icons8-tiktok-60.png') }}"></img>
                                            @endif
                                            <span class="handle">@<span>{{$social->username }}{{ $social->handle }}</span></span>

                                            {{ $social->followers }} @if($social->account_type == "youtube") subscribers @else followers @endif
                                        </p>

                                        @endif
                                </div>
                                <div class="prices">
                                    @foreach($social->prices as $price)

                                            <li class="col">

                                                <p>price per {{ $price->type }}</p>

                                                <b>${{ $price->from }} - ${{ $price->to }}</b>

                                            </li>
                                            @if($price->type == "story")
                                                <div class="divider"></div>
                                                @endif
                                            @endforeach
                                </div>
                                </div>
                            <!--<div class="pr-card">

                                <ul class="pr-insta list-unstyled">

                                    <li>

                                        @if($social->account_type == "website")

                                        <b>{{ ucfirst($social->account_type) }} </b>

                                        <p>{{ $social->username }}</p>

                                        @else

                                        <b>{{ ucfirst($social->account_type) }} @ {{ $social->username }} {{ $social->handle }}</b>

                                        <p>{{ $social->followers }} @if($social->account_type == "youtube") subscribers @else followers @endif</p>

                                        @endif

                                    </li>

                                    <li>

                                        <ul class="list-unstyled">

                                            @foreach($social->prices as $price)

                                            <li>

                                                <b>price per {{ $price->type }}</b>

                                                <p>${{ $price->from }} - ${{ $price->to }}</p>

                                            </li>

                                            @endforeach

                                        </ul>

                                    </li>

                                </ul>

                            </div>

                        </div>-->

                        @endforeach

                        @else

                        <div class="col-md-12">

                            <div class="pr-card">

                                @if($type['view']=="true")
                                <p style="margin-top: 5px;">No socials account added.</p>
                                @else
                                    <p style="margin-top: 5px;">Please edit profile to enter social media accounts.</p>
                                @endif

                            </div>

                        </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<section class="container-profile">
    <h2 class="profile-header"><span class="header">Recent Posts</span></h2>
    <div class="row post-header-space">
        <!--placeholder image row with placeholder link to post-->
        <div class="col-12 col-sm-6 col-md-4 col-lg-2"><a href="#"><img class="recent-post-img" src="https://via.placeholder.com/500" alt="Recent post image"></a></div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2"><a href="#"><img class="recent-post-img" src="https://via.placeholder.com/150" alt="Recent post image"></a></div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2"><a href="#"><img class="recent-post-img" src="https://via.placeholder.com/150" alt="Recent post image"></a></div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2"><a href="#"><img class="recent-post-img" src="https://via.placeholder.com/150" alt="Recent post image"></a></div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2"><a href="#"><img class="recent-post-img" src="https://via.placeholder.com/150" alt="Recent post image"></a></div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2"><a href="#"><img class="recent-post-img" src="https://via.placeholder.com/150" alt="Recent post image"></a></div>
    </div>
</section>

<section class="container-profile">
        <h2 class="profile-header"><span class="header">Photos</span></h2>
        <div class="row post-header-space">

            <div class="col-12">

                <ul class="portfolio-list list-unstyled">

                </ul>

                <!--<div class="more-btns" id="more-btns-portfolio">

                    <a href="javascript:" class="btn btn_sub col-md-6 load_more_portfolio">Load More</a>

                </div>-->

            </div>

        </div>

</section>

<section class="container-profile">

    <div>
        <div class="title" id="section-reviews">

            <h2 class="profile-header"><span class="header">Reviews</span>

            @if($type['view']=="true")
            <a class="btn_sub sm_bt mb-2 btn_boder float-right" href="javascript;" data-toggle="modal" data-target="#rateUserModel">Rate This User</a>
            @endif
            </h2>

        </div>
        <div class="row post-header-space">
            <div class="col-12">

                <ul class="reviews-list list-unstyled">

                </ul>

                <div class="more-btns" id="more-btns-review">

                    <a href="javascript:" class="btn btn_sub load_more">Load More</a>

                </div>

            </div>

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

                        <input type="hidden" name="rate_user_id" id="rate_user_id" value="{{ $user->id }}">

                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                    </div>

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


@stop

@section('pagescript')

<script>

    load_review();



    function load_review($id = "") {

        loaderShow();

        $.ajax({

                url: '{{ route("profile.review") }}',

                type: 'POST',

                dataType: 'json',

                data: {

                    id: $id,

                    _token: '{{ csrf_token() }}',

                    user_id: '{{ $user->id }}'

                },

            })

            .done(function(data) {

                loaderHide();

                $('.load_more').remove();

                $('.reviews-list').append(data.output);

                $('#more-btns-review').append(data.button);

            })

            .fail(function() {

                console.log("error");

            });

        loaderHide();

    }



    $(document).on('click', '.load_more', function(event) {

        event.preventDefault();

        $id = $(this).attr('data-id');

        $(this).text('Loading....');

        load_review($id);

    });

    /*Load portfolio*/

    load_portfolio();



    function load_portfolio($id = "") {

        loaderShow();

        $.ajax({

                url: '{{ route("portfolio.list") }}',

                type: 'POST',

                dataType: 'json',

                data: {

                    id: $id,

                    _token: '{{ csrf_token() }}',

                    user_id: '{{ $user->id }}'

                },

            })

            .done(function(data) {

                loaderHide();

                $('.load_more_portfolio').remove();

                $('.portfolio-list').append(data.output).ready(function() {
                  $('.portfolio-list').imagesLoaded(function() {
                    $('.portfolio-list').masonry({
                      itemSelector: '.portfolio-list li'
                    });
                  })
                });

                $('#more-btns-portfolio').append(data.button);


            })

            .fail(function() {

                console.log("error");

            });

        loaderHide();

        /*$('.portfolio-list').masonry({
          itemSelector: '.portfolio-list li'
        });*/

    }



    $(document).on('click', '.load_more_portfolio', function(event) {

        event.preventDefault();

        $id = $(this).attr('data-id');

        $(this).text('Loading....');

        load_portfolio($id);

    });

    $(document).on('click', '.read_more_desc', function() {

        $(this).parent('.short_review').next('.full_review').show();

        $(this).parent('.short_review').hide();

    })

    $(document).on('click', '.add_to_contact', function(event) {
        event.preventDefault();
        $.ajax({
            url: '{{ route('profile.contact',\Crypt::encrypt($user->id)) }}',
        })
        .done(function(result) {
            if (result = true) {
                toastr.success("User add successfully into your contact list.");
                $('.add_to_contact').hide();
            } else {
                toastr.error("Error !");
            }
        })
        .fail(function() {
            toastr.error("Error !");
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

                $('.reviews-list').html("");

                load_review();

                toastr.success(data.message);

                $('#rateUserModel').modal('hide');

            }

        })

        .fail(function() {

            console.log("error");

            toastr.error("Error !");

        });
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

    @if($rate)
        $('#rateUserForm').find('textarea[name="description"]').text('{{ $rate->description }}');

        $('#rateUserForm').find('.stars[value="{{ $rate->rate }}"]').click();
    @else
        $('#rateUserForm').find('textarea[name="description"]').text("");

        $('#rateUserForm').find('.stars[value="1"]').click();

    @endif

</script>

@endsection
