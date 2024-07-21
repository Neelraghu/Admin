<div class="tab-pane" id="social" role="tabpanel">
    
    <form id="social_form" method="post" action="{{ route('admin.socials.update') }}">
        @csrf
        <input type="hidden" name="user_id" value="{{ $editdata->id }}">


        {{-- Instagram --}}
        <div class="mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="checkbox">
                        <input type="checkbox" name="account_type[]" value="instagram" id="instagram" @if(getUserSocial($editdata->id,'instagram')) checked="" @endif>
                        <label>Instagram</label>
                    </div>
                </div>
            </div>

            <div class="row instagramRow" @if(!getUserSocial($editdata->id,'instagram')) style="display: none;" @endif>
                <div class="col-md-6 col-lg-4">
                    <div class="form-label-group">
                        <label>Username</label>
                        <input type="text"  name="account[instagram][username]" class="form-control" autofocus="" value="{{ getUserSocial($editdata->id,'instagram','username') }}"

                        pattern = "(?=.*[a-z])[a-z0-9._]+$"
                        data-bv-regexp-message = "Please enter valid your instagram username"

                        required=""
                        data-bv-notempty-message="Please enter your instagram username"

                        data-bv-remote = "true"
                        data-bv-remote-message= "Opps ! this username already used by someone."
                        data-bv-remote-url = '{{ route('admin.socials.check.username',['type'=>'instagram','id'=>$editdata->id]) }}'
                        >
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-label-group">
                        <label>Number of followers</label>
                        <input type="number" min="0"  name="account[instagram][followers]" class="form-control" autofocus="" value="{{ getUserSocial($editdata->id,'instagram','followers') }}"
                        required=""
                        data-bv-notempty-message="Please enter your number of followers in instagram"
                        >
                    </div>
                </div>
                <div class="col-md-8 col-lg-4 form-group influencerField">
                    <div class="form-label-group">
                        <label>Price per post</label>
                        <div class="form-label-group d-flex align-items-center">
                            <div class="f m-0 d-flex align-items-center">
                                <label>from</label>
                                <input type="number" min="0" name="account[instagram][post][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'instagram','post','from') }}"
                                required=""
                                data-bv-notempty-message="Please enter per post price"
                                >
                            </div>
                            <div class="mb-0 ml-3 d-flex align-items-center">
                                <label>to</label>
                                <input type="number" min="account[instagram][post][from]" name="account[instagram][post][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'instagram','post','to') }}"
                                required=""
                                data-bv-notempty-message="Please enter per post price"
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-8 influencerField"></div>
                <div class="col-md-8 col-lg-4 mt-2 form-group influencerField">
                    <div class="form-label-group">
                        <label>Price per story</label>
                        <div class="form-label-group d-flex align-items-center">
                            <div class=" m-0 d-flex align-items-center">
                                <label>from</label>
                                <input type="number" min="0" name="account[instagram][story][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'instagram','story','from') }}"
                                required=""
                                data-bv-notempty-message="Please enter price per story"
                                >
                            </div>
                            <div class=" mb-0 ml-3 d-flex align-items-center">
                                <label>to</label>
                                <input type="number" min="account[instagram][story][from]" name="account[instagram][story][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'instagram','story','to') }}"
                                required=""
                                data-bv-notempty-message="Please enter price per story"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Facebook --}}
        <div class="mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="checkbox">
                        <input type="checkbox" name="account_type[]" value="facebook" id="facebook" @if(getUserSocial($editdata->id,'facebook')) checked="" @endif>
                        <label>Facebook</label>
                    </div>
                </div>
            </div>

            <div class="row facebookRow" @if(!getUserSocial($editdata->id,'facebook')) style="display: none;"@endif >
                <div class="col-md-6 col-lg-4">
                    <div class="form-label-group">
                        <label>Username</label>
                        <input type="text" name="account[facebook][username]" class="form-control" autofocus="" value="{{ getUserSocial($editdata->id,'facebook','username') }}"
                        
                        pattern = "(?=.*[a-z])[a-z0-9._]+$"
                        data-bv-regexp-message = "Please enter valid your facebook username"

                        required=""
                        data-bv-notempty-message="Please enter facebook your username"

                        data-bv-remote = "true"
                        data-bv-remote-message= "Opps ! this username already used by someone."
                        data-bv-remote-url = '{{ route('admin.socials.check.username',['type'=>'facebook','id'=>$editdata->id]) }}' 
                        >
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-label-group">
                        <label>Number of followers</label>
                        <input type="number" min="0"  name="account[facebook][followers]" class="form-control" autofocus="" value="{{ getUserSocial($editdata->id,'facebook','followers') }}"
                        required=""
                        data-bv-notempty-message="Please enter your number of facebook followers"
                        >
                    </div>
                </div>
                <div class="col-md-8 col-lg-4 form-group influencerField">
                    <div class="form-label-group">
                        <label>Price per post</label>
                        <div class="form-label-group d-flex align-items-center">
                            <div class=" m-0 d-flex align-items-center">
                                <label>from</label>
                                <input type="number" min="0" name="account[facebook][post][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'facebook','post','from') }}"
                                required=""
                                data-bv-notempty-message="Please enter price"   
                                >
                            </div>
                            <div class="mb-0 ml-3 d-flex align-items-center">
                                <label>to</label>
                                <input type="number" name="account[facebook][post][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'facebook','post','to') }}"
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

        {{-- Youtube --}}
        <div class="mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="checkbox">
                        <input type="checkbox" name="account_type[]" value="youtube" id="youtube" @if(getUserSocial($editdata->id,'youtube')) checked="" @endif>
                        <label>YouTube</label>
                    </div>
                </div>
            </div>

            <div class="row youtubeRow" @if(!getUserSocial($editdata->id,'youtube')) style="display: none;" @endif >
                <div class="col-md-6 col-lg-4">
                    <div class="form-label-group">
                        <label>Channel Name</label>
                        <input type="text"  name="account[youtube][username]" class="form-control" autofocus="" value="{{ getUserSocial($editdata->id,'youtube','username') }}"
                        required=""
                        data-bv-notempty-message="Please enter your youtube channel name"

                        data-bv-remote = "true"
                        data-bv-remote-message= "Opps ! this channel name already used by someone."
                        data-bv-remote-url = '{{ route('admin.socials.check.username',['type'=>'youtube','id'=>$editdata->id]) }}'
                        >
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-label-group">
                        <label>Number of subscribers</label>
                        <input type="number" min="0"  name="account[youtube][followers]" class="form-control" autofocus="" value="{{ getUserSocial($editdata->id,'youtube','followers') }}"
                        required=""
                        data-bv-notempty-message="Please enter your number of subscribers in youtube"
                        >
                    </div>
                </div>
                <div class="col-md-8 col-lg-4 form-group influencerField">
                    <div class="form-label-group">
                        <label>Price per video</label>
                        <div class="form-label-group d-flex align-items-center">
                            <div class="m-0 d-flex align-items-center">
                                <label>from</label>
                                <input type="number" min="0" name="account[youtube][video][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'youtube','video','from') }}"
                                required=""
                                data-bv-notempty-message="Please enter price per video"
                                >
                            </div>
                            <div class="mb-0 ml-3 d-flex align-items-center">
                                <label>to</label>
                                <input type="number" min="account[youtube][video][from]" name="account[youtube][video][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'youtube','video','to') }}"
                                required=""
                                data-bv-notempty-message="Please enter price per video"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Twitter --}}
        <div class="mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="checkbox">
                        <input type="checkbox" name="account_type[]" value="twitter" id="twitter" @if(getUserSocial($editdata->id,'twitter')) checked="" @endif>
                        <label>Twitter</label>
                    </div>
                </div>
            </div>

            <div class="row twitterRow" @if(!getUserSocial($editdata->id,'twitter')) style="display: none;" @endif >
                <div class="col-md-6 col-lg-4">
                    <div class="form-label-group">
                        <label>Handle</label>
                        <input type="text"  name="account[twitter][handle]" class="form-control" autofocus="" value="{{ getUserSocial($editdata->id,'twitter','handle') }}"
                        required=""
                        data-bv-notempty-message="Please enter your twitter handle" 
                        >
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-label-group">
                        <label>Number of followers</label>
                        <input type="number" min="0" name="account[twitter][followers]" class="form-control" autofocus="" value="{{ getUserSocial($editdata->id,'twitter','followers') }}"
                        required=""
                        data-bv-notempty-message="Please enter your number of followers in twitter"
                        >
                    </div>
                </div>
                <div class="col-md-8 col-lg-4 influencerField form-group">
                    <div class="form-label-group">
                        <label>Price per post</label>
                        <div class="form-label-group d-flex align-items-center">
                            <div class="m-0 d-flex align-items-center">
                                <label>from</label>
                                <input type="number" min="0" name="account[twitter][post][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'twitter','post','from') }}"
                                required=""
                                data-bv-notempty-message="Please enter price per post"
                                >
                            </div>
                            <div class="mb-0 ml-3 d-flex align-items-center">
                                <label>to</label>
                                <input type="number" min="account[twitter][post][from]" name="account[twitter][post][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'twitter','post','to') }}"
                                required=""
                                data-bv-notempty-message="Please enter price per post"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TikTok --}}
        <div class="mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="checkbox">
                        <input type="checkbox" name="account_type[]" value="tiktok" id="tiktok" @if(getUserSocial($editdata->id,'tiktok')) checked="" @endif>
                        <label>TikTok</label>
                    </div>
                </div>
            </div>

            <div class="row tiktokRow" @if(!getUserSocial($editdata->id,'tiktok')) style="display: none;" @endif >
                <div class="col-md-6 col-lg-4">
                    <div class="form-label-group">
                        <label>Handle</label>
                        <input type="text" name="account[tiktok][handle]" class="form-control" autofocus="" value="{{ getUserSocial($editdata->id,'tiktok','handle') }}"
                        required=""
                        data-bv-notempty-message="Please enter your tiktok handle"
                        >
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-label-group">
                        <label>Number of followers</label>
                        <input type="number" min="0" name="account[tiktok][followers]" class="form-control" autofocus="" value="{{ getUserSocial($editdata->id,'tiktok','followers') }}"
                        required=""
                        data-bv-notempty-message="Please enter your number of followers in tiktok"
                        >
                    </div>
                </div>
                <div class="col-md-8 col-lg-4 influencerField form-group">
                    <div class="form-label-group">
                        <label>Price per Video</label>
                        <div class="form-label-group d-flex align-items-center">
                            <div class="m-0 d-flex align-items-center">
                                <label>from</label>
                                <input type="number" min="0" name="account[tiktok][video][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'tiktok','video','from') }}"
                                required=""
                                data-bv-notempty-message="Please enter price per video"
                                >
                            </div>
                            <div class="mb-0 ml-3 d-flex align-items-center">
                                <label>to</label>
                                <input type="number" min="account[tiktok][video][from]" name="account[tiktok][video][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'tiktok','video','to') }}"
                                required=""
                                data-bv-notempty-message="Please enter price per video"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        {{-- Website --}}
        <div class="mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="checkbox">
                        <input type="checkbox" name="account_type[]" value="website" id="website" @if(getUserSocial($editdata->id,'website')) checked="" @endif >
                        <label>Website</label>
                    </div>
                </div>
            </div>

            <div class="row websiteRow" @if(!getUserSocial($editdata->id,'website')) style="display: none;" @endif >
                <div class="col-md-6 col-lg-4">
                    <div class="form-label-group">
                        <label>Site name</label>
                        <input type="text" name="account[website][username]" class="form-control" autofocus="" value="{{ getUserSocial($editdata->id,'website','username') }}"
                        required=""
                        data-bv-notempty-message="Please enter your site name"
                        pattern = "[a-z0-9._%+-]+[a-z0-9.-]+\.[a-z]+$"
                        data-bv-regexp-message = "Please enter valid site name"

                        data-bv-remote = "true"
                        data-bv-remote-message= "Opps ! this site name already used by someone."
                        data-bv-remote-url = '{{ route('admin.socials.check.username',['type'=>'website','id'=>$editdata->id]) }}'
                        >
                    </div>
                </div>
                <div class="col-md-8 col-lg-4 influencerField"></div>
                <div class="col-md-8 col-lg-4 form-group influencerField">
                    <div class="form-label-group">
                        <label>Price per blog post</label>
                        <div class="form-label-group d-flex align-items-center">
                            <div class="m-0 d-flex align-items-center">
                                <label>from</label>
                                <input type="number" min="0" name="account[website][blog][from]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'website','blog','from') }}"
                                required=""
                                data-bv-notempty-message="Please enter price per blog"
                                >
                            </div>
                            <div class="mb-0 ml-3 d-flex align-items-center">
                                <label>to</label>
                                <input type="number" min="account[website][blog][from]" name="account[website][blog][to]" class="form-control" autofocus="" value="{{ getUserSocialPrice($editdata->id,'website','blog','to') }}"
                                required=""
                                data-bv-notempty-message="Please enter price per blog"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary reset">Reset</button>
                </div>
            </div>
        </div>

    </form>
</div>