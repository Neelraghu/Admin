@extends('admin.layouts.default')
@section('title', 'Profile')
@section('content')
<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
            <h3 class="kt-subheader__title">Profile</h3>
        </div>
    </div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
        <button class="kt-app__aside-close" id="kt_user_profile_aside_close"><i class="la la-close"></i></button>
        @include('admin.pages.profile.sidebar')
        <!--Begin:: App Content-->
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Personal Information <small>update your personal informaiton</small></h3>
                            </div>
                        </div>
                        {{ Form::model(Auth::user(), [
                        'route' => ['admin.profile.update'], 
                        'method' => 'POST', 
                        'files' => true,
                        'class' => 'kt-form kt-form--label-right'
                        ]) }}
                        <div class="kt-portlet__body">
                            @include('admin.theme.includes.message')
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control" type="text" id="first_name" name="first_name" value="{{isset(Auth::user()->first_name) ? Auth::user()->first_name : ''}}">
                                            @if ($errors->has('first_name'))
                                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('first_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control" type="text" id="first_name" name="last_name" value="{{isset(Auth::user()->last_name) ? Auth::user()->last_name : ''}}">
                                            @if ($errors->has('last_name'))
                                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('last_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                <input type="email" class="form-control" id="email" name="email" value="{{isset(Auth::user()->email) ? Auth::user()->email : ''}}" placeholder="Email" aria-describedby="basic-addon1">
                                                @if ($errors->has('email'))
                                                <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                            <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-3 col-xl-3">
                                    </div>
                                    <div class="col-lg-9 col-xl-9">
                                        <button type="submit" class="btn btn-success">Submit</button>&nbsp;
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!--End:: App Content-->
    </div>

    <!--End::App-->
</div>
<!-- end:: Content -->
@stop
@section('pagescript')
<!--<script src="{{ asset('/theme/js/demo1/pages/dashboard.js') }}" type="text/javascript"></script>-->
<script src="{{ asset('/theme/js/demo1/pages/custom/user/profile.js') }}" type="text/javascript"></script>

<script>
    $(".imageInputUrl").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                console.log(e.target.result);
                $('.imagePreviewLoadUrl').css('background-image', "url(" + e.target.result + ")");
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection