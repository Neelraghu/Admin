<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;" />
        <title>Login | {{ setting('site-name') }}</title>
        @include('front.includes.head')

    </head>
    <body>
        <div class="main">
            <!-- header Start -->
            @include('front.includes.header')

            <section class="login_sign">
                <div class="container">
                    <div class="logi_box">
                        @include('front.includes.message')
<!--                        <span class="logi_about"><a href="#">About</a></span>-->
                        <div class="title">
                            <h1>Connect. Collab. Create</h1>
                        </div>
                        <div class="middle">
                            <form class="kt-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <input type="hidden" name="timezone" id="timezone">
                                @if ($errors->has('status'))
                                <div style="display: block; text-align: center;" id="email-error" class="error invalid-feedback">{{ $errors->first('status') }}</div>
                                @endif
                                @if ($errors->has('email'))
                                <div style="display: block; text-align: center;" id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                                <div class="form-label-group email">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required="" autofocus="">
                                </div>
                                @if ($errors->has('password'))
                                <div style="display: block; text-align: center;" id="email-error" class="error invalid-feedback">{{ $errors->first('password') }}</div>
                                @endif
                                <div class="form-label-group password">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required="">

                                </div>
                                <div class="form-label-group text-center">
                                    <a title="Forgot password?" class="forgot_password" href="{{ route('password.request') }}">Forgot password?</a>
                                </div>
                                <button class="btn_sub" type="submit">Log in</button>
                            </form>
                        </div>
                    </div>
                    <div class="botoom_tag">
                        <p>Don’t have an account?  <a class="font-weight-bold" title="Sign up here" href="{{route('signup')}}">Sign up here</a></p>
                    </div>
                </div>
            </section>
            <section class="businesses_connect">
                <div class="container">
                    <h2>{{ setting('login-content') }}</h2>
                    <div><i class="icon icon-floral-design"></i></div>
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

        <script src="{{ asset('/front/js/moment.min.js') }}"></script>
        <script src="{{ asset('/front/js/moment-timezone.min.js') }}"></script>
        <script src="{{ asset('/front/js/moment-timezone-with-data.js') }}"></script>

        <script>

            $(document).ready(function() {
                console.log(moment.tz.guess());
                $(document).find('#timezone').val(moment.tz.guess());
            });
        </script>
    </body>
</html>


