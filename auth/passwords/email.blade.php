<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;" />
        <title>Forgot Password | like.minded</title>
        @include('front.includes.head')

    </head>
    <body>
        <div class="main">
            <!-- header Start -->
            @include('front.includes.header')

            <section class="login_sign">
                <div class="container">

                    <div class="logi_box">
<!--                        <span class="logi_about"><a href="#">About</a></span>-->
                        <div class="title">
                            <h1>Forgot Password</h1>
                        </div>
                        <div class="middle">
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}.
                            </div>
                            @endif
                            <form class="kt-form" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                @if ($errors->has('email'))
                                <div style="display: block; text-align: center;" id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                                <div class="form-label-group email">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required="" autofocus="">
                                </div>


                                <button class="btn_sub" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="botoom_tag">
                        <p><a title="Login here" href="{{url('login')}}">Login</a></p>
                    </div>
                </div>
            </section>
            <section class="businesses_connect">
                <div class="container">
                    <h2>like.minded is a platform for like minded influencers and businesses
                        to connect, collaborate and create content.</h2>
                    <div><i class="icon icon-floral-design"></i></div>
                </div>
            </section>

            <!-- Footer -->
            <footer>
                @include('front.includes.footer_menu')
                <div class="copyright">
                    <div class="container">
                        <p>© {{\Carbon\Carbon::now()->format('Y')}} like.minded</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- script -->
        @include('front.includes.footer_links')
    </body>
</html>

