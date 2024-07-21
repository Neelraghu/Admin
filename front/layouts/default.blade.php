<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;" />
        <title>@if( View::hasSection('title')) @yield('title') | @endif {{ setting('site-name') }}</title>
        <meta name="keywords" content="@if( View::hasSection('meta_keyword')) @yield('meta_keyword') @endif">
        <meta name="description" content="@if( View::hasSection('meta_description')) @yield('meta_description') @endif">
        @include('front.includes.head')
    </head>
    <body>
        <div id="loader" class="loading-div">
        </div>

        <div class="main">
            <!-- header Start -->
            @if(Auth::user())
            @include('front.includes.header_login')
            @else
            @include('front.includes.header')
            @endif

            @yield('content')

            <!-- Footer -->
            @include('front.includes.footer')
        </div>
        <!-- script -->
        @include('front.includes.footer_links')
        <script>
            toastr.options = {
                "positionClass": "toast-bottom-right",
                "progressBar": true,
                "closeButton": true,
            };
        </script>
        @yield('pagescript')
    </body>
</html>
