@extends('front.layouts.default')

@section('title', 'Account')

@section('meta_keyword', 'Account')

@section('meta_description', 'Account')

@section('content')

<style>



form .error {

color: red!important;

}

</style>

<section class="fill_out">

<div class="container">

    <form method="POST" id="account_form" action="{{ route('account.update')}}">

        @csrf

        <div class="fill_data">

            <div class="row">



                <div class="col-12">

                    @include('front.includes.message')

                    <h2><span>Account</span></h2>

                </div>

            </div>

            <div class="accout_middle">

                <div class="row">

                    <div class="col-lg-6">

                        <label>First Name</label>

                        <input type="text" class="form-control" placeholder="First Name" value="{{Auth::user()->first_name}}" name="first_name" required="" autofocus="">

                        @if ($errors->has('first_name'))

                        <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('first_name') }}</div>

                        @endif

                    </div>

                    <div class="col-lg-6">

                        <label>Last Name</label>

                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{Auth::user()->last_name}}" required="" autofocus="">

                        @if ($errors->has('last_name'))

                        <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('last_name') }}</div>

                        @endif

                    </div>

                    <div class="col-lg-6">

                        <label>Email</label>

                        <input type="email" @if(!blank(Auth::user()->UserEmail)) disabled="" @endif class="form-control" placeholder="Email" required="" name="email" value="{{Auth::user()->email}}" autofocus="">

                        @if ($errors->has('email'))

                        <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</div>

                        @endif

                        @if(!blank(Auth::user()->UserEmail))



                        <div class="dlt_account"><b>Verification Pending :</b> {{Auth::user()->UserEmail->email}}<br /><a class="sendagainemail" href="javascript:">Send Again</a>&nbsp;&nbsp;&nbsp;<a class="removeemailrequest" href="javascript:">Remove</a></div>

                        @endif

                    </div>

                    <div class="col-lg-6">

                        <label>Phone Number</label>

                        <input type="text" class="form-control phone_number" placeholder="Phone Number" name="phone_number" value="{{ Auth::user()->phone_number}}" required="" autofocus="">

                        @if ($errors->has('phone_number'))

                        <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('phone_number') }}</div>

                        @endif

                    </div>

                    @foreach(Auth::user()->UserPhone as $key=>$value)

                    <div class="col-lg-6">

                        <label>Phone Number</label>

                        <input type="text" style="width:85%;display: inline-block;margin-right: 10px;" class="form-control phone_number" placeholder="Phone Number" name="phone[{{$value->id}}]" value="{{$value->phone_number}}" required="" autofocus="">

                        <a class="remove_phone" data-id='{{\Crypt::encrypt($value->id)}}' href="javascript:"><img src="{{asset("front/images/minus.png")}}" alt="minus"></a>

                    </div>

                    @endforeach

                    <div class="col-md-12" style="margin-bottom: 10px;">

                        <a class="add_phone" href="javascript:" title="Add Phone Number"><img src="{{asset('front/images/add.png')}}" alt="add"></a>

                    </div>

                    {{-- <div class="col-lg-6 change_password_block password" style="display: none;">

                        <label>Password</label>

                        <input type="password" disabled="" name="password" class="form-control password_show" placeholder="Please enter password" autocomplete="off" value="">

                        <span class="view" onclick="togglePassword('password');"><i class="icon-eye"></i></span>

                        @if ($errors->has('password'))

                        <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('password') }}

                </div>

                @endif

            </div>

            <div class="col-lg-6 change_password_block password" style="display: none;">

                <label>Confirm Password</label>

                <input type="password" disabled="" name="confirm_password" class="form-control password_show" placeholder="Please enter confirm password" autocomplete="off" value="">

                <span class="view" onclick="togglePassword('confirm_password');"><i class="icon-eye"></i></span>

                @if ($errors->has('confirm_password'))

                <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('confirm_password') }}</div>

                @endif

            </div> --}}

            <div class="col-lg-6">

                <div class="dlt_account" style="text-align:left !important"><a href="javascript:" class="font-weight-bold" style="color: black !important;text-decoration: none !important;" data-toggle="modal" data-target="#changePasswordModal">Change Password</a></div>

            </div>

            <div class="col-lg-6">

                <div class="dlt_account" data-toggle="modal" data-target="#deleteModal"><a href="javascript:">Delete Account</a></div>

            </div>

        </div>

</div>

</div>

<div class="bottom_btn">

    <button class="btn_sub" name="submit" type="submit">Save</button>

    <a href="{{ url()->previous() }}" class="btn_sub btn_boder">Cancel</a>

</div>

</form>

</div>

</section>

<div class="modal fade align-middle" id="deleteModal">

<div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

        <div class="modal-header">

            <h3 class="modal-title text-center">Delete Account</h3>

            <button class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body text-center">

            <p><b>Are you sure you want to delete your account ?</b></p>

        </div>

        <div class="modal-footer justify-content-center">

            <div class="bottom_btn">

                <a href="javascript:" class="btn_sub sm_bt deleteaccount">Delete</a>

                <button class="btn_sub sm_bt btn_boder" type="submit" data-dismiss="modal">Cancel</button>

            </div>

        </div>

    </div>

</div>

</div>



<!-- Portfolio Modal -->

<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog" role="document">

    <div class="modal-content">

        <div class="modal-header">

            <h5 class="modal-title text-center" id="exampleModalLabel">Change password</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>

        <form id="changePasswordForm">

            <div class="modal-body change_password_block">

                <div class="row">

                    <div class="col-md-11">

                        <label>Current Password</label>

                        <input type="password" class="form-control password_show" name="current_password" placeholder="Enter current password" min="6">

                    </div>

                    <div class="col-md-1">

                        <span class="view" style="line-height: 7" onclick="togglePassword('current_password');"><i class="icon-eye"></i></span>

                    </div>

                    <div style="display: none; text-align: center;" id="current_password-error" class="error invalid-feedback"></div>

                </div>

                <div class="row">

                    <div class="col-md-11">

                        <label>New Password</label>

                        <input type="password" class="form-control password_show" name="new_password" placeholder="Enter new password" min="6">

                    </div>

                    <div class="col-md-1">

                        <span class="view" style="line-height: 7" onclick="togglePassword('new_password');"><i class="icon-eye"></i></span>

                    </div>

                    <div style="display: none; text-align: center;" id="new_password-error" class="error invalid-feedback"></div>

                </div>

                <div class="row">

                    <div class="col-md-11">

                        <label>Confirm Password</label>

                        <input type="password" class="form-control password_show" name="confirm_password" placeholder="Enter confirm password" min="6">



                    </div>

                    <div class="col-md-1">

                        <span class="view" style="line-height: 7" onclick="togglePassword('confirm_password');"><i class="icon-eye"></i></span>

                    </div>

                    <div style="display: none; text-align: center;" id="confirm_password-error" class="error invalid-feedback"></div>

                </div>

            </div>

            <div class="modal-footer justify-content-center">

                <div class="bottom_btn">

                    <button type="button" class="btn_sub btn_boder" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn_sub change_password_btn">Save changes</button>

                </div>

            </div>

        </form>

    </div>

</div>

</div>

@stop

@section('pagescript')

<script>

$(document).on('click', '.removeemailrequest', function() {

    loaderShow();

    var url = '{{ route("account.email.verification.remove") }}';

    window.location.replace(url);

});

$(document).on('click', '.sendagainemail', function() {

    loaderShow();

    var url = '{{ route("account.email.verification.send") }}';

    window.location.replace(url);

});

var counter = 1;

$(document).on('click', '.add_phone', function() {

    if (counter != 5) {
        $value = $("input[name='new_phone_number[]']").eq(-1).val();
        $phone = $("input[name='phone_number']").eq(0).val();
        if($value == "" || $phone == ""){
            toastr.error("please fill out previous phone number !");
            return false;
        }
        $(this).parent().before('<div class="col-lg-6"><label>Phone Number </label><input style="width:90%;display: inline-block;margin-right: 10px;" type="text" class="form-control phone_number" placeholder="Phone Number" name="new_phone_number[]" required="" autofocus=""><a class="remove_phone" href="javascript:"><img src="{{asset("front/images/minus.png")}}" alt="add"></a></div>');

        $('input[name="new_phone_number[]"]').each(function() {



            /*$(this).rules("add", {

                required: true,
                minlength :13,
                maxlength : 13,

                messages: {

                    required: "Please provide a phone number",

                    minlength: "Your phone number must be at least 10 characters long",

                    maxlength : "Your phone number must be at least 10 characters long",

                }

            });*/

        });

    } else {

        alert('Max limit reached. please delete/update existing number first.');

    }

});

$(document).on('click', '.remove_phone', function() {

    var Id = $(this).data('id');

    var e = $(this);

    counter = counter - 1;

    if (Id) {

        var url = '{{ route("account.phone.delete") }}';

        loaderShow();

        $.ajax({

            url: url,

            'type': 'POST',

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}'

            },

            data: {

                id: Id

            },

            success: function(result) {

                if (result.status == true) {

                    loaderHide();

                    toastr.error(result.Message);

                    e.parent().remove();

                } else {

                    loaderHide();

                    toastr.error(result.Message);

                }

            }

        });

    } else {

        $(this).parent().remove();

    }

});

$(document).on('click', '.deleteaccount', function() {

    var url = '{{ route("account.delete") }}';

    loaderShow();

    $.ajax({

        url: url,

        'type': 'GET',

        success: function(result) {

            if (result.status == true) {

                loaderHide();

                location.reload();

            } else {

                loaderHide();

                toastr.error(result.Message);

            }

        }

    });



});

$(document).on('click', '.change_password_click', function() {

    $(this).hide();

    $(document).find('.change_password_block').show();

    $(document).find('.password_show').prop('disabled', false);

});



function togglePassword($this) {

    //var x = $('.view').closest('.change_password_block').find('.password_show');

    var x = $('input[name="' + $this + '"]');

    if (x.attr('type') == "password") {

        x.attr('type', "text");

    } else {

        x.attr('type', "password");

    }

}



$('#changePasswordForm').submit(function(e) {

    e.preventDefault();

    var formData = new FormData(this);

    var url = "{{ route('account.changepassword') }}";

    loaderShow();

    $.ajax({

        url: url,

        type: 'POST',

        data: formData,

        cache: false,

        contentType: false,

        processData: false,

        headers: {

            'X-CSRF-TOKEN': '{{ csrf_token() }}'

        },

        success: function(result) {

            console.log(result);

            if (result.status == false) {

                $('#changePasswordForm').find('.error').html("");

                if (result.data.current_password) {

                    $("#current_password-error").html(result.data.current_password[0]);

                    $("#current_password-error").show();

                }

                if (result.data.new_password) {

                    $("#new_password-error").html(result.data.new_password[0]);

                    $("#new_password-error").show();

                }

                if (result.data.confirm_password) {

                    $("#confirm_password-error").html(result.data.confirm_password[0]);

                    $("#confirm_password-error").show();

                }

                if (result.data.length == 1) {

                    $("#current_password-error").html(result.data[0]);

                    $("#current_password-error").show();

                }

                loaderHide();

            } else {

                loaderHide();

                toastr.success('Password Change Successfully !');

                $('#changePasswordModal').modal('hide');

                $('#changePasswordForm').find('input').val("");

                $('#changePasswordForm').find('.error').html("");

                load_portfolio();

            }

        }

    });

});

$("#account_form").validate({

    rules: {

        firstname: "required",

        lastname: "required",

        email: {

            required: true,

            email: true

        },

        phone_number: {

            required: true,

            minlength: 13,

            maxlength: 13,

        },
    },

    // Specify validation error messages

    messages: {

        firstname: "Please enter your firstname",

        lastname: "Please enter your lastname",

        phone_number: {

            required: "Please provide a phone number",

            minlength: "Your phone number must be at least 10 characters long",

            maxlength : "Your phone number must be at least 10 characters long",

        },

        email: "Please enter a valid email address"

    },

    // Make sure the form is submitted to the destination defined

    // in the "action" attribute of the form when valid

    submitHandler: function(form) {

        form.submit();

    }

});

$(document).ready(function() {
    $('.phone_number').trigger('keyup');
});

$(document).on('change keyup', '.phone_number', function(event) {
    event.preventDefault();

    $value = changeNumberFormat($(this).val());
    $(this).val($value);
});

function changeNumberFormat(x){

    //$value = x;
    $value  = x.replace(/[^0-9\s]/gi, '');
    if($value.length > 10){
        x = $value.substr(0,9);
    }
    if($value.length > 3 && $value.length < 6){
        x = "("+$value.substr(0,3)+")"+$value.substr(3,3);
    }
    if($value.length > 5){
        x = "";
        x = "("+$value.substr(0,3)+")"+$value.substr(3,3)+"-"+$value.substr(6,4);
    }
    console.log(x);
    return x;
    /*parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");*/
}
</script>

@endsection