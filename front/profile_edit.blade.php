@extends('front.layouts.default')

@section('title', 'Profile Edit')

@section('meta_keyword', 'Profile Edit')

@section('meta_description', 'Profile Edit')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

<style>
    .btn-group,.dropdown-menu{
        width:100% !important;
    }

    /*.multiselect-container>li>a>label>input[type=checkbox] {
        margin-bottom: 5px;
        height: 50%;
        opacity: 15;
        z-index: 1;
    }*/
</style>

<section class="edit-profile">

<div class="container">

@include('front.includes.message')

<form enctype="multipart/form-data" method="post" action="{{ route('profile.store') }}" id="myForm">

    @csrf

    <div class="fill_data">

        <div class="row">

            <div class="col-12">

                <h2><span>Edit Profile</span></h2>

            </div>

            <div class="col-12 text-center edit-photo">

                <figure>

                    <input type="file" id="image" name="image" style="display: none;" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">

                    <div class="divImg">

                        @if(!empty(Auth::user()->image))

                            <img src="{{ url('sitebucket/users') }}/{{ Auth::user()->image }}" alt="Profile image" id="preview">

                        @else  

                            <img src="{{ url('front/images/default.png') }}" alt="Profile image" id="preview">

                        @endif                                 

                    </div>

                    <a href="javascript:" class="edit-click"><span class="icon-photo-camera"></span></a>

                </figure>

            </div>

        </div>

        <div class="row">

            <div class="col-12">

                <div class="form-check-group d-md-flex">

                    <label>I am</label>

                    @if(Auth::user()->type == "influencer")
                    <div class="checkbox">

                        <input type="radio" name="type" @if(Auth::user()->type == "influencer") checked="" @endif class="type" value="influencer" disabled>

                        <label>an Influencer</label>

                    </div>
                    @else
                    <div class="checkbox">

                        <input type="radio" name="type" @if(Auth::user()->type == "business") checked="" @endif class="type" value="business" disabled>

                        <label>a Brand/Business </label>

                    </div>
                    @endif
                </div>

            </div>

        </div>

        <div class="fild-row">

            <div class="row">

                <div class="col-12">

                    <div class="checkbox">

                        <input type="checkbox" name="account_type[]" value="instagram" id="instagram" @if(getUserSocial(Auth::user()->id,'instagram')) checked="" @endif>

                        <label>Instagram</label>

                    </div>

                </div>

            </div>



            <div class="row instagramRow" @if(!getUserSocial(Auth::user()->id,'instagram')) style="display: none;" @endif>

                <div class="col-md-6 col-lg-4">

                    <div class="form-label-group form-group">

                        <label>Username</label>

                        <input type="text"  name="account[instagram][username]" class="form-control" autofocus="" value="{{ getUserSocial(Auth::user()->id,'instagram','username') }}"

                        maxlength="40"

                        data-bv-stringlength-message="The full name must be less than 40 characters"

                        pattern = "(?=.*[a-z])[a-z0-9._]+$"

                        data-bv-regexp-message = "Please enter valid your instagram username"



                        required=""

                        data-bv-notempty-message="Please enter your instagram username"



                        data-bv-remote = "true"

                        data-bv-remote-message= "Opps ! this username already used by someone."

                        data-bv-remote-url = '{{ route('profile.check.username','instagram') }}'

                        >

                    </div>

                </div>

                <div class="col-md-6 col-lg-4">

                    <div class="form-label-group form-group">

                        <label>Number of followers</label>

                        <input type="number" min="0"  name="account[instagram][followers]" class="form-control" autofocus="" value="{{ getUserSocial(Auth::user()->id,'instagram','followers') }}"

                        required=""

                        data-bv-notempty-message="Please enter your number of followers in instagram"

                        >

                    </div>

                </div>

                <div class="col-md-8 col-lg-4 form-group influencerField">

                    <div class="form-label-group">

                        <label>Price per post</label>

                        <div class="form-label-group d-flex align-items-center">

                            <div class="form-group">

                                <div class="m-0 d-flex align-items-center">

                                    <label>from</label>

                                    <input type="number" min="0" name="account[instagram][post][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'instagram','post','from') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter per post price"

                                    >

                                </div>

                            </div>

                            <div class="form-group ml-3">

                                <div class="mb-0 d-flex align-items-center">

                                    <label>to</label>

                                    <input type="number" min="account[instagram][post][from]" name="account[instagram][post][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'instagram','post','to') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter per post price"

                                    >

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-lg-8 influencerField"></div>

                <div class="col-md-8 col-lg-4 mt-2 form-group influencerField">

                    <div class="form-label-group">

                        <label>Price per story</label>

                        <div class="form-label-group d-flex align-items-center">

                            <div class="form-group">

                                <div class=" m-0 d-flex align-items-center">

                                    <label>from</label>

                                    <input type="number" min="0" name="account[instagram][story][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'instagram','story','from') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter price per story"

                                    >

                                </div>

                            </div>

                            <div class="form-group ml-3">
                                
                                <div class="mb-0 d-flex align-items-center">

                                    <label>to</label>

                                    <input type="number" min="account[instagram][story][from]" name="account[instagram][story][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'instagram','story','to') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter price per story"

                                    >

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="fild-row">

            <div class="row">

                <div class="col-12">

                    <div class="checkbox">

                        <input type="checkbox" name="account_type[]" value="facebook" id="facebook" @if(getUserSocial(Auth::user()->id,'facebook')) checked="" @endif>

                        <label>Facebook</label>

                    </div>

                </div>

            </div>



            <div class="row facebookRow" @if(!getUserSocial(Auth::user()->id,'facebook')) style="display: none;"@endif >

                <div class="col-md-6 col-lg-4">

                    <div class="form-label-group form-group">

                        <label>Username</label>

                        <input type="text" name="account[facebook][username]" class="form-control" autofocus="" value="{{ getUserSocial(Auth::user()->id,'facebook','username') }}"

                        pattern = "(?=.*[a-z])[a-z0-9._]+$"

                        data-bv-regexp-message = "Please enter valid your facebook username"

                        maxlength="40"

                        data-bv-stringlength-message="The full name must be less than 40 characters"

                        required=""

                        data-bv-notempty-message="Please enter facebook your username"

                        data-bv-remote = "true"

                        data-bv-remote-message= "Opps ! this username already used by someone."

                        data-bv-remote-url = '{{ route('profile.check.username','facebook') }}' 

                        >

                    </div>

                </div>

                <div class="col-md-6 col-lg-4">

                    <div class="form-label-group form-group">

                        <label>Number of followers</label>

                        <input type="number" min="0"  name="account[facebook][followers]" class="form-control" autofocus="" value="{{ getUserSocial(Auth::user()->id,'facebook','followers') }}"

                        required=""

                        data-bv-notempty-message="Please enter your number of facebook followers"

                        >

                    </div>

                </div>

                <div class="col-md-8 col-lg-4 influencerField">

                    <div class="form-label-group">

                        <label>Price per post</label>

                        <div class="form-label-group d-flex align-items-center">

                            <div class="form-group">

                                <div class=" m-0 d-flex align-items-center">

                                    <label>from</label>

                                    <input type="number" min="0" name="account[facebook][post][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'facebook','post','from') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter price"   

                                    >

                                </div>

                            </div>

                            <div class="form-group ml-3">

                                <div class="mb-0 d-flex align-items-center">

                                    <label>to</label>

                                    <input type="number" name="account[facebook][post][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'facebook','post','to') }}"

                                    required=""

                                    min = "account[facebook][post][from]"

                                    data-bv-notempty-message="Please enter price"

                                    >

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="fild-row">

            <div class="row">

                <div class="col-12">

                    <div class="checkbox">

                        <input type="checkbox" name="account_type[]" value="youtube" id="youtube" @if(getUserSocial(Auth::user()->id,'youtube')) checked="" @endif>

                        <label>YouTube</label>

                    </div>

                </div>

            </div>



            <div class="row youtubeRow" @if(!getUserSocial(Auth::user()->id,'youtube')) style="display: none;" @endif >

                <div class="col-md-6 col-lg-4">

                    <div class="form-label-group form-group">

                        <label>Channel Name</label>

                        <input type="text"  name="account[youtube][username]" class="form-control" autofocus="" value="{{ getUserSocial(Auth::user()->id,'youtube','username') }}"

                        required=""

                        data-bv-notempty-message="Please enter your youtube channel name"

                        maxlength="40"

                        data-bv-stringlength-message="The full name must be less than 40 characters"

                        data-bv-remote = "true"

                        data-bv-remote-message= "Opps ! this channel name already used by someone."

                        data-bv-remote-url = '{{ route('profile.check.username','youtube') }}'

                        >

                    </div>

                </div>

                <div class="col-md-6 col-lg-4">

                    <div class="form-label-group form-group">

                        <label>Number of subscribers</label>

                        <input type="number" min="0"  name="account[youtube][followers]" class="form-control" autofocus="" value="{{ getUserSocial(Auth::user()->id,'youtube','followers') }}"

                        required=""

                        data-bv-notempty-message="Please enter your number of subscribers in youtube"

                        >

                    </div>

                </div>

                <div class="col-md-8 col-lg-4 form-group influencerField">

                    <div class="form-label-group">

                        <label>Price per video</label>

                        <div class="form-label-group d-flex align-items-center">

                            <div class="form-group">

                                <div class="m-0 d-flex align-items-center">

                                    <label>from</label>

                                    <input type="number" min="0" name="account[youtube][video][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'youtube','video','from') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter price per video"

                                    >

                                </div>
                                
                            </div>

                            <div class="form-group ml-3">
                                
                                <div class="mb-0 d-flex align-items-center">

                                    <label>to</label>

                                    <input type="number" min="account[youtube][video][from]" name="account[youtube][video][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'youtube','video','to') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter price per video"

                                    >

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        

        <div class="fild-row">

            <div class="row">

                <div class="col-12">

                    <div class="checkbox">

                        <input type="checkbox" name="account_type[]" value="twitter" id="twitter" @if(getUserSocial(Auth::user()->id,'twitter')) checked="" @endif>

                        <label>Twitter</label>

                    </div>

                </div>

            </div>



            <div class="row twitterRow" @if(!getUserSocial(Auth::user()->id,'twitter')) style="display: none;" @endif >

                <div class="col-md-6 col-lg-4">

                    <div class="form-label-group form-group">

                        <label>Handle</label>

                        <input type="text"  name="account[twitter][handle]" class="form-control" autofocus="" value="{{ getUserSocial(Auth::user()->id,'twitter','handle') }}"

                        required=""

                        data-bv-notempty-message="Please enter your twitter handle"

                        maxlength="40"

                        data-bv-stringlength-message="The full name must be less than 40 characters" 

                        >

                    </div>

                </div>

                <div class="col-md-6 col-lg-4">

                    <div class="form-label-group form-group">

                        <label>Number of followers</label>

                        <input type="number" min="0" name="account[twitter][followers]" class="form-control" autofocus="" value="{{ getUserSocial(Auth::user()->id,'twitter','followers') }}"

                        required=""

                        data-bv-notempty-message="Please enter your number of followers in twitter"

                        >

                    </div>

                </div>

                <div class="col-md-8 col-lg-4 influencerField form-group">

                    <div class="form-label-group">

                        <label>Price per post</label>

                        <div class="form-label-group d-flex align-items-center">

                            <div class="form-group">

                                <div class="m-0 d-flex align-items-center">

                                    <label>from</label>

                                    <input type="number" min="0" name="account[twitter][post][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'twitter','post','from') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter price per post"

                                    >

                                </div>

                            </div>

                            <div class="form-group ml-3">

                                <div class="mb-0 d-flex align-items-center">

                                    <label>to</label>

                                    <input type="number" min="account[twitter][post][from]" name="account[twitter][post][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'twitter','post','to') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter price per post"

                                    >

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <div class="fild-row">

            <div class="row">

                <div class="col-12">

                    <div class="checkbox">

                        <input type="checkbox" name="account_type[]" value="tiktok" id="tiktok" @if(getUserSocial(Auth::user()->id,'tiktok')) checked="" @endif>

                        <label>TikTok</label>

                    </div>

                </div>

            </div>



            <div class="row tiktokRow" @if(!getUserSocial(Auth::user()->id,'tiktok')) style="display: none;" @endif >

                <div class="col-md-6 col-lg-4">

                    <div class="form-label-group form-group">

                        <label>Handle</label>

                        <input type="text" name="account[tiktok][handle]" class="form-control" autofocus="" value="{{ getUserSocial(Auth::user()->id,'tiktok','handle') }}"

                        required=""

                        maxlength="40"

                        data-bv-stringlength-message="The full name must be less than 40 characters"

                        data-bv-notempty-message="Please enter your tiktok handle"

                        >

                    </div>

                </div>

                <div class="col-md-6 col-lg-4">

                    <div class="form-label-group form-group">

                        <label>Number of followers</label>

                        <input type="number" min="0" name="account[tiktok][followers]" class="form-control" autofocus="" value="{{ getUserSocial(Auth::user()->id,'tiktok','followers') }}"

                        required=""

                        data-bv-notempty-message="Please enter your number of followers in tiktok"

                        >

                    </div>

                </div>

                <div class="col-md-8 col-lg-4 influencerField form-group">

                    <div class="form-label-group">

                        <label>Price per video</label>

                        <div class="form-label-group d-flex align-items-center">

                            <div class="form-group">

                                <div class="m-0 d-flex align-items-center">

                                    <label>from</label>

                                    <input type="number" min="0" name="account[tiktok][video][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'tiktok','video','from') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter price per video"

                                    >

                                </div>
                                
                            </div>

                            <div class="form-group ml-3">

                                <div class="mb-0 d-flex align-items-center">

                                    <label>to</label>

                                    <input type="number" min="account[tiktok][video][from]" name="account[tiktok][video][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'tiktok','video','to') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter price per video"

                                    >

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <div class="fild-row">

            <div class="row">

                <div class="col-12">

                    <div class="checkbox">

                        <input type="checkbox" name="account_type[]" value="website" id="website" @if(getUserSocial(Auth::user()->id,'website')) checked="" @endif >

                        <label>Website</label>

                    </div>

                </div>

            </div>



            <div class="row websiteRow" @if(!getUserSocial(Auth::user()->id,'website')) style="display: none;" @endif >

                <div class="col-md-6 col-lg-4">

                    <div class="form-label-group form-group">

                        <label>Site name</label>

                        <input type="text" name="account[website][username]" class="form-control" autofocus="" value="{{ getUserSocial(Auth::user()->id,'website','username') }}"

                        required=""

                        data-bv-notempty-message="Please enter your site name"

                        pattern = "[a-z0-9._%+-]+[a-z0-9.-]+\.[a-z]+$"

                        data-bv-regexp-message = "Please enter valid site name"

                        maxlength="40"

                        data-bv-stringlength-message="The full name must be less than 40 characters"



                        data-bv-remote = "true"

                        data-bv-remote-message= "Opps ! this site name already used by someone."

                        data-bv-remote-url = '{{ route('profile.check.username','website') }}'

                        >

                    </div>

                </div>

                <div class="col-md-8 col-lg-4 influencerField"></div>

                <div class="col-md-8 col-lg-4 form-group influencerField">

                    <div class="form-label-group">

                        <label>Price per blog post</label>

                        <div class="form-label-group d-flex align-items-center">

                            <div class="form-group">

                                <div class="m-0 d-flex align-items-center">

                                    <label>from</label>

                                    <input type="number" min="0" name="account[website][blog][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'website','blog','from') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter price per blog"

                                    >

                                </div>

                            </div>

                            <div class="form-group ml-3">
                                
                                <div class="mb-0 d-flex align-items-center">

                                    <label>to</label>

                                    <input type="number" min="account[website][blog][from]" name="account[website][blog][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice(Auth::user()->id,'website','blog','to') }}"

                                    required=""

                                    data-bv-notempty-message="Please enter price per blog"

                                    >

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        

        <hr>



        <div class="influencerField">

            @if(count($locations) == 0)

            <div class="row">

                <div class="col-md-6 staticRow">

                    <div class="form-label-group form-group location">

                        <label>Location</label>

                        <div class="d-flex align-items-center">

                            <input type="text" class="form-control" autofocus="" value="" name="location[]"

                            required=""

                            data-bv-notempty-message="Please enter your location"

                            >

                        </div>

                    </div>

                </div>

                <div class="col-md-6 col-lg-4 ml-lg-auto">

                    <div class="form-label-group">

                        <label>Demographic</label>

                        <div class="form-label-group d-flex align-items-center">

                            <div class="form-group">

                                <div class="m-0 d-flex align-items-center">
                                    
                                    <label>Ages</label>
                                    <input type="number" min="0" name="demographic_from" class="form-control" autofocus="" value="{{ Auth::user()->demographic_from }}"

                                    

                                    

                                    >

                                </div>

                            </div>

                            <div class="form-group ml-3">

                                <div class="mb-0 d-flex align-items-center">

                                    <label>to</label>

                                    <input type="number" min="0" name="demographic_to" class="form-control" autofocus="" value="{{ Auth::user()->demographic_to }}"

                                    

                                    

                                    >

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @else

                @foreach($locations as $key=>$value)

                    @if($key < 1)

                    <div class="row">

                        <div class="col-md-6 staticRow">

                            <div class="form-label-group form-group location">

                                <label>Location</label>

                                <div class="d-flex align-items-center">

                                    <input type="text" class="form-control" autofocus="" value="{{ $value['location'] }}" name="location[]"

                                    required=""

                                    data-bv-notempty-message="Please enter your location"

                                    >

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6 col-lg-4 ml-lg-auto">

                            <div class="form-label-group">

                                <label>Demographic</label>

                                <div class="form-label-group d-flex align-items-center">

                                    <div class="form-group">

                                        <div class="m-0 d-flex align-items-center">

                                            <label>Ages</label>

                                            <input type="number" min="0" name="demographic_from" class="form-control" autofocus="" value="{{ Auth::user()->demographic_from }}"

                                            

                                            

                                            >

                                        </div>
                                        
                                    </div>

                                    <div class="form-group ml-3">

                                        <div class="mb-0 d-flex align-items-center">

                                            <label>to</label>

                                            <input type="number" min="0" name="demographic_to" class="form-control" autofocus="" value="{{ Auth::user()->demographic_to }}"

                                            

                                            

                                            >

                                        </div>
                                        
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    @else

                    <div class="row rows">

                        <div class="col-md-6">

                            <div class="form-label-group form-group location">

                                <div class="d-flex align-items-center">

                                    <input type="text" class="form-control" autofocus="" value="{{ $value['location'] }}" name="location[]"

                                    required=""

                                    data-bv-notempty-message="Please enter your location"

                                    >

                                    <a href="javascript:void(0);" class="plus-row ml-2 remove_location">-</a>

                                </div>

                            </div>

                        </div>

<!--                                <div class="col-md-6 col-lg-4 ml-lg-auto">

                            <div class="form-label-group">

                                <div class="form-label-group d-flex align-items-center">

                                    <div class="form-group m-0 d-flex align-items-center">

                                        <input type="number" min="0" name="demographic_from[]" class="form-control" autofocus="" value="{{ $value['demographic_from'] }}"

                                        required=""

                                        

                                        >

                                    </div>

                                    <div class="form-group w-100 mb-0 ml-3 d-flex align-items-center">

                                        <label>to</label>

                                        <input type="number" min="0" name="demographic_to[]" class="form-control" autofocus="" value="{{ $value['demographic_to'] }}"

                                        required=""

                                        data-bv-notempty-message="Please enter your demographic"

                                        >

                                    </div>

                                </div>

                            </div>

                        </div>-->

                    </div>

                    @endif

                @endforeach

            @endif

            <div class="row rows" id="dynamicRow" style="display: none;">

                <div class="col-md-6">

                    <div class="form-label-group form-group location">

                        <div class="d-flex align-items-center">

                            <input type="text" class="form-control" autofocus="" value="" name="location[]" 

                            required=""

                            data-bv-notempty-message="Please enter your location">

                            <a href="javascript:void(0);" class="plus-row ml-2 remove_location">-</a>

                        </div>

                    </div>

                </div>

<!--                        <div class="col-md-6 col-lg-4 ml-lg-auto">

                    <div class="form-label-group">

                        <div class="form-label-group d-flex align-items-center">

                            <div class="form-group m-0 d-flex align-items-center">

                                <input type="number" min="0" name="demographic_from[]" class="form-control" autofocus="" value=""

                                required=""

                                data-bv-notempty-message="Please enter your demographic"

                                >

                            </div>

                            <div class="form-group w-100 mb-0 ml-3 d-flex align-items-center">

                                <label>to</label>

                                <input type="number" min="0" name="demographic_to[]" class="form-control" autofocus="" value=""

                                required=""

                                data-bv-notempty-message="Please enter your demographic"

                                >

                            </div>

                        </div>

                    </div>

                </div>    -->

            </div>

            <div class="row">

                <div class="col-md-12">

                    <a href="javascript:" class="add_location"><img src="{{ url('front') }}/images/add.png" alt="add"></a>

                </div>

            </div>

            <hr>

        </div>



        <div class="section-description">

            <div class="row">

                <div class="col-12 form-group">

                    <h6>Description</h6>

                    <textarea name="about_me" class="form-control" rows="15"

                    required=""

                    data-bv-notempty-message="Please enter your description"

                    >{{ Auth::user()->about_me }}</textarea>

                </div>

            </div>

        </div>

        <hr>

        <div class="section-description">

            <div class="row">

                <div class="col-5 form-group">

                    <h6>Industry</h6>

                    <select class="form-control" id="sub_category" multiple="multiple" name="sub_category[]">
                        @foreach($category as $key)
                        <optgroup label="{{ $key->name }}">
                            @foreach($key->sub_category as $sub)
                                <option value="{{ $sub->id }}" @if(in_array($sub->id, $user_category)) selected="" @endif>{{ $sub->name }}</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>

                </div>

            </div>

        </div>

        <hr>


        <div class="section-portfolio">

            <div class="row">

                <div class="col-12">

                    <h6>Photos

                    <a data-toggle="modal" href="javascript:" data-target="#portfolioModal" class="add_portfolio" title="Add Your Photos"><img src="{{ url('front') }}/images/add.png" alt="add"></a></h6>  

                </div>

                <div class="col-12">

                    <ul class="portfolio-list list-unstyled">

                        {{-- @if(count($portfolios) > 0)

                        @foreach($portfolios as $key)

                        <li>

                            <a data-fancybox="gallery" href="{{ url('sitebucket/portfolio') }}/{{ $key->file }}">

                            @if($key->type =="image")

                                <img class="lazy" src="{{ url('sitebucket/portfolio') }}/{{ $key->file }}" alt="portfolio image">

                            @else

                                <video class="lazy" style="width: 100%" controls>

                                  <source src="{{ url('sitebucket/portfolio') }}/{{ $key->file }}" type="video/mp4">

                                  <source src="{{ url('sitebucket/portfolio') }}/{{ $key->file }}" type="video/ogg">

                                </video>

                            @endif

                            </a>

                            <div class="px-2 d-flex justify-content-between">

                                <a href="javascript:" data-id="{{ $key->id }}" class="delete_portfolio">delete</a>

                            </div>

                        </li>

                        @endforeach

                        @endif --}}

                    </ul>



                    <div class="more-btns" id="more-btns-portfolio">

                        {{-- <a href="javascript:" class="btn btn_sub col-md-6 load_more_portfolio">Load More</a> --}}

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="bottom_btn">

        <button class="btn_sub" type="submit">Save</button>

        <a class="btn_sub btn_boder" href="{{ route('profile.index') }}" >Cancel</a>

    </div>

</form>

</div>

</section>





<!-- Portfolio Modal -->

<div class="modal fade" id="portfolioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog" role="document">

<div class="modal-content">

<div class="modal-header">

    <h5 class="modal-title" id="exampleModalLabel">Upload</h5>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        <span aria-hidden="true">&times;</span>

    </button>

</div>

<form id="portfolioForm"  enctype="multipart/form-data" action="">

@csrf

<div class="modal-body">

    <div class="row">

        <div class="form-group col-md-12">

            <label>File Type</label>

            <select class="form-control" name="type" id="file_type" required="">

                <option value="image">image</option>

                <option value="video">video</option>

            </select>

        </div>

        <div class="form-group col-md-12">

            <label>Upload file</label>

            <input type="file" name="file" 

            id="file_upload" class="form-control dropify" 



            required="" 

            data-bv-notempty-message="Please upload file"

            

            {{-- 5MB --}}

            data-bv-file="true"

            {{-- data-bv-file-extension = "jpeg,png,jpg" --}}

            data-bv-file-maxsize = "10485760"

            >

        </div>

    </div>

</div>

<div class="modal-footer">

    <button type="button" class="btn_sub btn_boder" data-dismiss="modal">Close</button>

<!--            <a href="javascript:" class="btn_sub portfolio_save">Save changes</a>-->

    <button type="submit" class="btn_sub portfolio_save">Save changes</button>

</div>

</form>

</div>

</div>

</div>



<div class="modal fade align-middle" id="deleteModal">

<div class="modal-dialog modal-dialog-centered">

<div class="modal-content">

    <div class="modal-header">

        <h3 class="modal-title text-center">Delete File</h3>

        <button class="close" data-dismiss="modal">&times;</button>

    </div>

    <div class="modal-body text-center">

        <p><b>Are you sure you want to delete this File</b></p>

    </div>

    <div class="modal-footer justify-content-center">

        <div class="bottom_btn">

            <a href="javascript:" class="btn_sub sm_bt deleteportfolioid">Delete</a>

            <button class="btn_sub sm_bt btn_boder" type="submit" data-dismiss="modal">Cancel</button>

        </div>

    </div>

</div>

</div>

</div>


{{-- Image Upload Model --}}
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <form id="imageUploadForm" enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                    <div class="row">

                        <div class="form-group col-md-12">

                            <label>Upload</label>

                            <div class="dropzone" id="myDropzone"></div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn_sub btn_boder" data-dismiss="modal">Close</button>

                    {{-- <a href="javascript:" class="btn_sub image_save">Save changes</a> --}}

                    {{-- <button type="submit" class="btn_sub image_save">Save changes</button> --}}

                </div>

            </form>

        </div>

    </div>

</div>

@stop

@section('pagescript')

<link href="https://unpkg.com/dropzone/dist/dropzone.css" rel="stylesheet"/>
<script src="https://unpkg.com/dropzone"></script>

<link href="https://unpkg.com/croppie/croppie.css" rel="stylesheet"/>
<script src="https://unpkg.com/croppie"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>



<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API') }}&libraries=places"></script>

{{-- <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" type="text/css" /> --}}


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css"/> --}}


<script type="text/javascript">
    $(document).ready(function() {
        $('#sub_category').multiselect({
            enableCollapsibleOptGroups: true,
            includeSelectAllOption: true  ,
            enableClickableOptGroups: true,
            buttonWidth: '200px'  
            //includeSelectAllOption: true
        });
    });
</script>


<script>



initMap();

function initMap(){



$($('input[name="location[]"]')).each(function(index, el) {

    var autocomplete = new google.maps.places.Autocomplete($(this)[0], {});



    google.maps.event.addListener(autocomplete, 'place_changed', function() {

        var place = autocomplete.getPlace();

        console.log(place.address_components);

    });

});

}


$('#myForm').on('keyup keypress', function(e) {

var keyCode = e.keyCode || e.which;

if (keyCode === 13) { 

e.preventDefault();

return false;

}

});



$('.dropify').dropify();



/*$(document).on('change', '#file_type', function(event) {

event.preventDefault();



$('#file_upload').removeAttr('data-bv-file-extension');

if($(this).val() == "image"){

    $ext = "jpeg,jpg,png";

}else{

    $ext = "mp4,webm,avi,3gp,mpg";

}

$(".dropify-clear").trigger("click");

$('#file_upload').attr('data-bv-file-extension',$ext);

$('#portfolioForm').bootstrapValidator('resetForm',false);



});*/

//    $('#portfolioForm').bootstrapValidator();

$('#myForm').bootstrapValidator({});

$(document).ready(function() {

$('#facebook').click(function(event) {

    $('.facebookRow').hide();

    if($(this).prop('checked') == true){

        $('.facebookRow').show();

    }
    $('#myForm').bootstrapValidator('resetForm',false);


});



$('#instagram').click(function(event) {

    $('.instagramRow').hide();

    if($(this).prop('checked') == true){

        $('.instagramRow').show();

    }
    $('#myForm').bootstrapValidator('resetForm',false);


});



$('#youtube').click(function(event) {

    $('.youtubeRow').hide();

    if($(this).prop('checked') == true){

        $('.youtubeRow').show();

    }
    $('#myForm').bootstrapValidator('resetForm',false);


});



$('#twitter').click(function(event) {

    $('.twitterRow').hide();

    if($(this).prop('checked') == true){

        $('.twitterRow').show();

    }
    $('#myForm').bootstrapValidator('resetForm',false);


});



$('#tiktok').click(function(event) {

    $('.tiktokRow').hide();

    if($(this).prop('checked') == true){

        $('.tiktokRow').show();

    }
    $('#myForm').bootstrapValidator('resetForm',false);
});



$('#website').click(function(event) {

    $('.websiteRow').hide();

    if($(this).prop('checked') == true){

        $('.websiteRow').show();

    }
    $('#myForm').bootstrapValidator('resetForm',false);

});



$('.edit-click').click(function(event) {

    $("#imageModal").modal('show');
    //$('#image').trigger('click');

});



$(".add_location").click(function(){

    var $template = $('#dynamicRow'),

    $clone  = $template

                        .clone()

                        //.attr('class','rows')

                        .removeAttr('id')

                        .removeAttr('style')

                        .insertBefore($template);



    $option   = $clone.find('[name="location[]"]');

//            $option1   = $clone.find('[name="demographic_from[]"]');

//            $option2   = $clone.find('[name="demographic_to[]"]');



    // Add new field

    $('#myForm').bootstrapValidator('addField', $option);

//            $('#myForm').bootstrapValidator('addField', $option1);

//            $('#myForm').bootstrapValidator('addField', $option2);



    initMap();

});



$(document).on('click', '.remove_location', function(event) {

    event.preventDefault();



    if (confirm("Are you sure you want to remove this location?")) {

        

        $clone = $(this).closest('.rows');



        $option   = $clone.find('[name="location[]"]');

//                $option1   = $clone.find('[name="demographic_from[]"]');

//                $option2   = $clone.find('[name="demographic_to[]"]');



        // Add new field

        $('#myForm').bootstrapValidator('removeField', $option);

//                $('#myForm').bootstrapValidator('removeField', $option1);

//                $('#myForm').bootstrapValidator('removeField', $option2);



        $clone.remove();



        initMap();



    }

});





@if(Auth::user()->type == "influencer") 

    $('.influencerField').show();

@else

    $('.influencerField').hide();

@endif



$(document).on('change', '.type', function(event) {

    event.preventDefault();

    $type = $(this).val();



    if (confirm("Are you sure want change ?")) {

        loaderShow();

        $('.influencerField').hide();

        if($type == 'influencer'){

            $('.influencerField').show();

        }

        loaderHide();

    }else{

        $(this).prop('checked', false);

        

        if($type == 'influencer'){

            $('.influencerField').hide();

            $type = 'business'; 

        }else{

            $('.influencerField').show();

            $type = 'influencer'; 

        }

        

        $('input[value="'+$type+'"]').prop('checked', true);

    }

});





});





$(document).on('click', '.delete_portfolio', function () {

var id = $(this).data('id');

$(document).find('.deleteportfolioid').attr('id', id);

$(document).find('#deleteModal').modal('show');

});

$(document).on('click', '.deleteportfolioid', function () {

var id = $(this).attr('id');

var e = $(this);

var url = '{{ route("portfolio.delete", [":id"]) }}';

url = url.replace(':id', id);

$.ajax({

    url: url,

    type: 'GET',

    headers: {

        'X-CSRF-TOKEN': '{{ csrf_token() }}'

    },

    success: function (result) {

        if (result.status == true) {

            $(document).find('#deleteModal').modal('hide');

            toastr.success(result.Message);

            load_portfolio();

            //location.reload();

        } else {

            toastr.error(result.Message);

        }

    }

});

});



/*Load portfolio*/

load_portfolio();

function load_portfolio($id = ""){

$('.portfolio-list').html(" ");

$('#more-btns-portfolio').html(" ");

loaderShow();

$.ajax({

    url: '{{ route('portfolio.list') }}',

    type: 'POST',

    dataType:'json',

    data: {

            id: $id,

            action: 'edit',

            _token:'{{ csrf_token() }}',

            user_id:'{{ Auth::user()->id }}'

        },

})

.done(function(data) {

    loaderHide();

    $('.load_more_portfolio').remove();

    $('.portfolio-list').append(data.output);

    $('#more-btns-portfolio').append(data.button);

})

.fail(function() {

    console.log("error");

});

loaderHide();

}



$(document).on('click', '.load_more_portfolio', function(event) {

event.preventDefault();

$id = $(this).attr('data-id');

$(this).text('Loading....');

load_portfolio($id);

});

$('#portfolioForm').submit(function(e){

    e.preventDefault();

    var formData = new FormData(this);

    var url = "{{ route('portfolio.store') }}";

    loaderShow();

    $.ajax({

        url: url,

        type: 'POST',

        data:formData,

        cache:false,

        contentType: false,

        processData: false,

        headers: {

            'X-CSRF-TOKEN': '{{ csrf_token() }}'

        },

        success: function (result) {

            if (result.status == false) {

                $.each(result.data, function( key, value) {

                   toastr.error(value);

                });

                loaderHide();

                //portRefresh();

            } else {

                loaderHide();

                toastr.success('Photos uploaded.');

                $('#portfolioModal').modal('hide');

                $('.portfolio-list').html("");

                $('#more-btns-portfolio').html("");

                $('.dropify-clear').click();

                load_portfolio();

            }

        }

    });

});

</script>

<script>
    Dropzone.options.myDropzone = {
        paramName: "newfile", // The name that will be used to transfer the file
        maxFilesize: 5, //MB
        addRemoveLinks:true,
        acceptedFiles:'image/*',
        maxFiles:1,
        url: '{{ route('image.store') }}',
        parallelUploads: 1,
        dictMaxFilesExceeded: "You can upload only one image.",
        //dictRemoveFile: "Delete",
        init: function () {
            //this.removeAllFiles();
            this.on('maxfilesexceeded', function (file) {
                this.removeAllFiles();
                this.addFile(file);
            });

        },
        transformFile: function(file, done) {

            var myDropZone = this;

            // Create the image editor overlay
            var editor = document.createElement('div');
            editor.style.position = 'absolute';
            editor.style.left = 0;
            editor.style.right = 0;
            editor.style.top = 0;
            editor.style.bottom = 0;
            editor.style.zIndex = 9999;
            editor.style.backgroundColor = '#000';
            //document.body.appendChild(editor);
            document.getElementById('myDropzone').appendChild(editor);
            

            
            // Create the confirm button
            var confirm = document.createElement('button');
            confirm.style.position = 'absolute';
            confirm.style.left = '10px';
            confirm.style.top = '10px';
            confirm.style.zIndex = 9999;
            confirm.textContent = 'Confirm';
            confirm.addEventListener('click', function() {

                // Get the output file data from Croppie
                croppie.result({
                    type:'blob',
                    size: {
                        width: 256,
                        height: 256
                    }
                }).then(function(blob) {

                    // Update the image thumbnail with the new image data
                    myDropZone.createThumbnail(
                        blob,
                        myDropZone.options.thumbnailWidth,
                        myDropZone.options.thumbnailHeight,
                        myDropZone.options.thumbnailMethod,
                        false, 
                        function(dataURL) {

                            // Update the Dropzone file thumbnail
                            myDropZone.emit('thumbnail', file, dataURL);

                            // Return modified file to dropzone
                            done(blob);
                        }
                    );

                });

                // Remove the editor from view
                editor.parentNode.removeChild(editor);

            });
            editor.appendChild(confirm);

            var cancel = document.createElement('button');
            cancel.style.position = 'absolute';
            cancel.style.left = '110px';
            cancel.style.top = '10px';
            cancel.style.zIndex = 9999;
            cancel.textContent = 'Cancel';
            cancel.addEventListener('click', function() {

                 // Remove the editor from view
                editor.parentNode.removeChild(editor);
                myDropZone.removeAllFiles(true);

            });
            editor.appendChild(cancel);


            // Create the croppie editor
            var croppie = new Croppie(editor, {
                enableResize: true
            });

            // Load the image to Croppie
            croppie.bind({
                url: URL.createObjectURL(file)
            });

        },
        success: function (file,response) {
            //console.log(response);
            if(response.status == true){
                toastr.success(response.msg);
                $('#imageModal').modal("hide");
                $('#preview').removeAttr('src');
                $('#preview').attr('src', '{{ url('sitebucket/users') }}/'+response.name);
                this.removeAllFiles(true);
            }
        }
    };

</script>

@endsection

