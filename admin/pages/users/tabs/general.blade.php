<div class="tab-pane active" id="general" role="tabpanel">
    <form method="POST" enctype="multipart/form-data" action="{{route('admin.users.store')}}" class="kt-form kt-form--label-right" _lpchecked="1">
        @csrf
        <input type="hidden" name="user_id" value="{{$editdata->id}}"/>
        <input type="hidden" name="role" value="{{$editdata->role}}"/>
        {{-- <div class="kt-portlet__body"> --}}
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>First Name:</label>
                    <input type="text" class="form-control" placeholder="Enter first name" name="first_name" value="{{ isset($editdata) ? $editdata->first_name : old('first_name') }}"
                           onkeypress="return lettersOnly(event)">
                    <span class="form-text text-muted">Please enter your first name</span>
                    @if ($errors->has('first_name'))
                    <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('first_name') }}</div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <label>Last Name:</label>
                    <input type="text" class="form-control" placeholder="Enter last name" name="last_name" value="{{ isset($editdata) ? $editdata->last_name : old('last_name') }}"
                           onkeypress="return lettersOnly(event)">
                    <span class="form-text text-muted">Please enter your last name</span>
                    @if ($errors->has('last_name'))
                    <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('last_name') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Email:</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ isset($editdata) ? $editdata->email : old('email') }}">
                    <span class="form-text text-muted">Please enter your email.</span>
                    @if ($errors->has('email'))
                    <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <label>Phone Number:</label>
                    <input type="text" class="form-control" placeholder="Enter phone number" name="phone_number" value="{{ isset($editdata) ? $editdata->phone_number : old('phone_number') }}"
                           onkeypress="return isNumberKey(event)">
                    <span class="form-text text-muted">Please enter your phone number</span>
                    @if ($errors->has('phone_number'))
                    <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('phone_number') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Password:</label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="password" autocomplete="new-password">
                    <span class="form-text text-muted">Please enter your password.</span>
                    @if ($errors->has('password'))
                    <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <label>Confirm Password:</label>
                    <input type="password" class="form-control" placeholder="Enter confirm password" name="confirm_password" value="" autocomplete="off">
                    <span class="form-text text-muted">Please enter your confirm password.</span>
                    @if ($errors->has('confirm_password'))
                    <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('confirm_password') }}</div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <label>About User:</label>
                    <textarea class="form-control" placeholder="Enter about user" name="about_me" autocomplete="off">{{ isset($editdata) ? $editdata->about_me : old('about_me') }}</textarea>
                    <span class="form-text text-muted">Please enter about user.</span>
                </div>
                <div class="col-lg-6">
                    <label>Image:</label>
                    <input type="file" class="form-control dropify" name="image" value="" autocomplete="off"
                    @if(isset($editdata) && !empty($editdata->image)) data-default-file="{{ url('sitebucket/users')."/".$editdata->image }}" @endif
                    >
                    <span class="form-text text-muted">Please upload user image.</span>
                    @if ($errors->has('image'))
                    <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('image') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-3">
                    <label class="">Status:</label>
                    <div class="kt-radio-inline">
                        <label class="kt-radio kt-radio--solid">
                            <input type="radio" name="status" @if(isset($editdata) && $editdata->status==1) checked="" @endif value="1"> Active
                                   <span></span>
                        </label>
                        <label class="kt-radio kt-radio--solid">
                            <input type="radio" name="status" @if(isset($editdata) && $editdata->status==0) checked="" @endif value="0"> InActive
                                   <span></span>
                        </label>
                    </div>
                    <span class="form-text text-muted">Please select status</span>
                    @if ($errors->has('status'))
                    <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('status') }}</div>
                    @endif
                </div>
                <div class="col-lg-3">
                    <label class="">Type:</label>
                    <div class="kt-radio-inline">
                        <label class="kt-radio kt-radio--solid">
                            <input type="radio" name="type" @if(isset($editdata) && $editdata->type=="influencer") checked="" @endif value="influencer"> Influencer
                                   <span></span>
                        </label>
                        <label class="kt-radio kt-radio--solid">
                            <input type="radio" name="type" @if(isset($editdata) && $editdata->type=="business") checked="" @endif value="business"> Business
                                   <span></span>
                        </label>
                    </div>
                    <span class="form-text text-muted">Please select type</span>
                    @if ($errors->has('type'))
                    <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('type') }}</div>
                    @endif
                </div>
                <div class="col-lg-3">
                    <label class="">Gender :</label>
                    <select class="form-control role_change" name="gender">
                        <option @if($editdata->gender=='Male') selected @endif value="Male">Male</option>
                        <option @if($editdata->gender=='Female') selected @endif value="Female">Female</option>
                        <option @if($editdata->gender=='Other') selected @endif value="Other">Other</option>
                    </select>
                    @if ($errors->has('gender'))
                    <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('gender') }}</div>
                    @endif
                </div>
                
            </div> 

            
            <div class="form-group row demographicDiv" @if(isset($editdata) && $editdata->type!="influencer") style="display: none;" @endif>
                <div class="col-lg-12">
                    <label>Demographic</label>
                </div>
                <div class="col-lg-3">
                    <input type="number" class="form-control" value="{{ $editdata->demographic_from }}" name="demographic_from">
                    @if ($errors->has('demographic_from'))
                    <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('demographic_from') }}</div>
                    @endif
                </div>
                <div class="col-lg-1 text-center">to</div>
                <div class="col-lg-3">
                    <input type="number" class="form-control" value="{{ $editdata->demographic_to }}" name="demographic_to">
                    @if ($errors->has('demographic_to'))
                    <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('demographic_to') }}</div>
                    @endif
                </div>
            </div>

        {{-- </div> --}}
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-secondary reset">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>