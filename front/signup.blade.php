<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;" />

    <title>Sign up | {{ setting('site-name') }}</title>

    @include('front.includes.head')

    <style>

        form .error {

            color: red !important;

        }

    </style>

</head>



<body>

    <div class="main">

        <!-- header Start -->

        @include('front.includes.header')





        <section class="login_sign">

            <div class="container">

                <div class="logi_box">

                    @include('front.includes.message')

                    <div class="title">

                        <h1>Create Account</h1>

                    </div>

                    <div class="middle">

                    <form class="kt-form" id="myForm" method="POST" action="{{ route('signup.store') }}">

                    @csrf

                    @if ($errors->has('first_name'))

                    <div style="display: block; text-align: center;" id="email-error" class="error invalid-feedback">{{ $errors->first('first_name') }}</div>

                    @endif

                    <div class="form-label-group">

                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required="" value="{{ old('first_name') }}" autofocus="">

                    </div>

                    @if ($errors->has('last_name'))

                        <div style="display: block; text-align: center;" id="email-error" class="error invalid-feedback">{{ $errors->first('last_name') }}

                        </div>

                    @endif

                    <div class="form-label-group">

                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required="" value="{{ old('last_name') }}" autofocus="">

                    </div>

                    @if ($errors->has('email'))

                    <div style="display: block; text-align: center;" id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</div>

                    @endif

                    <div class="form-label-group">

                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required="" autofocus="">

                    </div>

                    @if ($errors->has('password'))

                    <div style="display: block; text-align: center;" id="email-error" class="error invalid-feedback">{{ $errors->first('password') }}</div>

                    @endif

                    <div class="form-label-group">

                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    </div>

                    @if ($errors->has('confirm_password'))

                    <div style="display: block; text-align: center;" id="email-error" class="error invalid-feedback">{{ $errors->first('confirm_password') }}</div>

                    @endif

                    <div class="form-label-group">

                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="confirm_password" required autocomplete="new-password">

                    </div>

                    <div class="form-label-group check_sign">

                        <label>I am</label>

                        <div class="checkbox">

                            <input value="influencer" type="radio" name="type" @if(!empty(old('type')) && old('type')=='influencer' ) checked @else @endif>

                            <label>an Influencer</label>

                        </div>

                        <div class="checkbox">

                            <input value="business" type="radio" name="type" @if(old('type')=='business' ) checked @endif>

                            <label>a Brand/Business </label>

                        </div>

                    </div>

                    <button class="btn_sub" type="submit" id="submit">Sign Up</button>

                    </form>

                </div>

            </div>

            <div class="botoom_tag">

                <small>By clicking Sign Up, you agree to our <a title="Terms & Conditions" href="{{route('pages','terms-conditions')}}">Terms & Conditions</a> and our <a title="Terms & Conditions" href="{{route('pages','privacy-policy')}}">Privacy Policy</a>.</small>

                <p>Already have an account? <a class="font-weight-bold" title="Sign up here" href="{{route('login')}}">Login here</a></p>

            </div>

    </div>

    </section>



    <!-- Footer -->

    <footer>

        @include('front.includes.footer_menu')

        <div class="copyright">

            <div class="container">

                <p>© {{\Carbon\Carbon::now()->format('Y')}} {{ setting('site-name') }}</p>

            </div>

        </div>

    </footer>

    </div>

    <!-- script -->

    @include('front.includes.footer_links')



</body>



</html>

<script>

    $(document).ready(function() {

        $("#myForm").validate({

            rules: {

                first_name: {

                    required: true,

                    maxlength: 20

                },

                last_name: {

                    required: true,

                    maxlength: 20

                },

                // type: "required",

                email: {

                    required: true,

                    email: true,

                    maxlength: 40

                },

                password: {

                    minlength: 6

                },

                confirm_password: {

                    minlength: 6,

                    equalTo: "#password"

                }

            },

            // Specify validation error messages

            messages: {

                first_name:{

                    required:"Please enter your firstname",

                    maxlength:"Can't enter more then 20 character."

                },

                last_name:{

                    required:"Please enter your lastname",

                    maxlength:"Can't enter more then 20 character."

                },

                email: "Please enter a valid email address",

                type: "Please select a Brand/Business or an Influencer",

            },

            submitHandler: function(form) {

                $type = $('input[name="type"]:checked').val();



                if ($type) {

                    if ($type == "business") {

                        $type = "a Brand/Business";

                    } else {

                        $type = "an Influencer";

                    }

                    if (!confirm('You have selected to be ' + $type + ', this option can’t be changed. Are you sure?')) {

                        event.preventDefault();

                    }

                    form.submit();

                } else {

                    alert("Please select a Brand/Business or an Influencer");

                    event.preventDefault();

                }

            }

        });

    });

</script>