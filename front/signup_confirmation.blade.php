<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;" />
        <title>Confirmation | like.minded</title>
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
                            <h1>Thank You!</h1>
                        </div>
                        <div class="middle">
                            <div class="botoom_tag">
                                <p>{{$msg}}</p>
                                <p>Click here to login.  <a title="Sign up here" href="{{route('login')}}">Login</a></p>
                            </div>
                        </div>
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


