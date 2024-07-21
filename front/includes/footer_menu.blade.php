<div class="footer_menu">
    <div class="container">
        <ul>                     
            <li ><a class="{{ ((Route::currentRouteName() == 'about') ? 'active' : '') }}" title="About" href="{{route('about')}}">About</a></li>

            <li><a title="Terms & Conditions" class="{{ ((isset(Route::current()->parameters()['pageslug']) && Route::current()->parameters()['pageslug'] == 'terms-conditions') ? 'active' : '') }}" href="{{route('pages','terms-conditions')}}">Terms & Conditions</a></li>

            <li><a title="Privacy Policy" class="{{ ((isset(Route::current()->parameters()['pageslug']) && Route::current()->parameters()['pageslug'] == 'privacy-policy') ? 'active' : '') }}" href="{{route('pages','privacy-policy')}}">Privacy Policy</a></li>
            @if(!Auth::user())
            <li><a class="{{ ((Route::currentRouteName() == 'signup') ? 'active' : '') }}" title="Sign Up" href="{{route('signup')}}">Sign Up</a></li>
            @endif
        </ul>
    </div>
</div>