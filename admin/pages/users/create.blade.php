@extends('admin.layouts.default')
@section('title', 'User Add')
@section('content')

<link href="{{ asset('/theme/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Add New User</h3>
        </div>
        <div class="kt-subheader__toolbar">
            <a href="{{route('admin.users.index')}}" class="btn btn-default btn-bold"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body">
            <form method="POST" enctype="multipart/form-data" action="{{route('admin.users.store')}}" class="kt-form kt-form--label-right" _lpchecked="1">
                @csrf
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>First Name:</label>
                            <input type="text" class="form-control" placeholder="Enter first name" name="first_name" value="{{ old('first_name') }}"
                                   onkeypress="return lettersOnly(event)">
                            <span class="form-text text-muted">Please enter user first name</span>
                            @if ($errors->has('first_name'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('first_name') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label>Last Name:</label>
                            <input type="text" class="form-control" placeholder="Enter last name" name="last_name" value="{{ old('last_name') }}"
                                   onkeypress="return lettersOnly(event)">
                            <span class="form-text text-muted">Please enter user last name</span>
                            @if ($errors->has('last_name'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('last_name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ old('email') }}" autocomplete="off">
                            <span class="form-text text-muted">Please enter user email.</span>
                            @if ($errors->has('email'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label>Phone Number:</label>
                            <input type="text" class="form-control" placeholder="Enter phone number" name="phone_number" value="{{ old('phone_number') }}" 
                                   onkeypress="return isNumberKey(event)">
                            <span class="form-text text-muted">Please enter user phone number</span>
                            @if ($errors->has('phone_number'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('phone_number') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Password:</label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password" value="" autocomplete="off">
                            <span class="form-text text-muted">Please enter user password.</span>
                            @if ($errors->has('password'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label>Confirm Password:</label>
                            <input type="password" class="form-control" placeholder="Enter confirm password" name="confirm_password" value="" autocomplete="off">
                            <span class="form-text text-muted">Please enter user confirm password.</span>
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
                            <input type="file" class="form-control dropify" name="image" value="" autocomplete="off">
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
                                    <input type="radio" name="status" checked="" value="1"> Active
                                    <span></span>
                                </label>
                                <label class="kt-radio kt-radio--solid">
                                    <input type="radio" name="status" value="0"> InActive
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
                                    <input type="radio" name="type" checked="" value="influencer"> Influencer
                                    <span></span>
                                </label>
                                <label class="kt-radio kt-radio--solid">
                                    <input type="radio" name="type" value="business"> Business
                                    <span></span>
                                </label>
                            </div>
                            <span class="form-text text-muted">Please select Type</span>
                            @if ($errors->has('type'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('type') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-3">
                            <label class="">Gender :</label>
                            <select class="form-control role_change" name="gender">
                                <option @if(old('gender')=='Male') selected @endif value="Male">Male</option>
                                <option @if(old('gender')=='Female') selected @endif value="Female">Female</option>
                                <option @if(old('gender')=='Other') selected @endif value="Other">Other</option>
                            </select>
                            @if ($errors->has('gender'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('gender') }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row demographicDiv">
                    <div class="col-lg-12">
                        <label>Demographic</label>
                    </div>
                    <div class="col-lg-3">
                        <input type="number" class="form-control" name="demographic_from">
                        @if ($errors->has('demographic_from'))
                        <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('demographic_from') }}</div>
                        @endif
                    </div>
                    <div class="col-lg-1 text-center">to</div>
                    <div class="col-lg-3">
                        <input type="number" class="form-control" name="demographic_to">
                        @if ($errors->has('demographic_to'))
                        <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('demographic_to') }}</div>
                        @endif
                    </div>
                </div>
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
    </div>

    <div class="modal fade" id="contactus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ajax_content"></div>
        </div>
    </div>
</div>
<!-- end:: Content -->
@stop

@section('pagescript')
<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('/theme/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<!--end::Page Vendors -->

<script>
   $(".reset").click(function () {
       $('.kt-form').find("input[type=text], textarea").val("");
   });

    $('input[name="type"]').click(function(event) {
        if( $(this).val() == "influencer"){
            $('.demographicDiv').show();
        }else{
            $('.demographicDiv').hide();
        }
    });
</script>
@endsection