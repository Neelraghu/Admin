<header>

    <nav class="navbar">

        <div class="menu-toggle hide-desktop">
          <i class="bx bx-menu"></i>
        </div>

        <div class="navbar-section hide-mobile">
            <div class="navbar-item contacts">

                <a title="Contacts" class="nav-link" href="{{ route('contacts') }}">Contacts</a>

            </div>

            <div class="navbar-item advanced-search">

                <a title="Advanced Search" class="nav-link" href="{{ route('search') }}">Advanced Search</a>

            </div>

        </div>

        <div class="navbar-section">

            <a title="Home" href="{{ url('') }}" class="logo">

                <img src="{{ asset('/front/images/likeminded_logo_new.png') }}" alt="Like Minded logo">

            </a>

        </div>

        <div class="navbar-section hide-mobile">

            <div class="navbar-item search">

                <form method="post" action="" class="search-form">

                    <i class="bx bx-search"></i>

                    <input type="text" placeholder="SEARCH">

                </form>

            </div>

            <div class="navbar-item messages @if (Auth::user()->unread_conversations) unread @endif">

                <a title="Messages" href="{{ route('message') }}">

                    <i class="bx bxs-message-rounded-dots"></i>

                </a>

            </div>

            <div class="navbar-item profile">

                @if (Auth::user())

                <a title="My Profile" href="{{ route('profile.index') }}">

                    @if (!empty(Auth::user()->image))

                    <img class="profile-pic" src="{{ url('sitebucket/users') }}/{{ Auth::user()->image }}" alt="My Profile Picture">

                    @else

                    <img class="profile-pic" src="{{ url('front/images/default.png') }}" alt="My Profile Picture">

                    @endif

                </a>

                @endif

                <div class="account-menu">
                  <a title="Sign Out" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out <i class="bx bx-log-out"></i></a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>

            </div>

        </div>

    </nav>

    <nav class="mobile">

      <div class="navbar-section top">

          <div class="navbar-item search">

              <form method="post" action="" class="search-form">

                  <i class="bx bx-search"></i>

                  <input type="text" placeholder="SEARCH">

              </form>

          </div>

        <div class="navbar-item messages @if (Auth::user()->unread_conversations) unread @endif">

            <a title="Messages" href="{{ route('message') }}">

                <i class="bx bxs-message-rounded-dots"></i>

            </a>

        </div>

        <div class="navbar-item profile">

            @if (Auth::user())

            <a title="My Profile" href="{{ route('profile.index') }}">

                @if (!empty(Auth::user()->image))

                <img class="profile-pic" src="{{ url('sitebucket/users') }}/{{ Auth::user()->image }}" alt="My Profile Picture">

                @else

                <img class="profile-pic" src="{{ url('front/images/default.png') }}" alt="My Profile Picture">

                @endif

            </a>

            @endif

        </div>

      </div>

      <div class="navbar-section bottom">
          <div class="navbar-item contacts">

              <a title="Contacts" class="nav-link" href="{{ route('contacts') }}">Contacts</a>

          </div>

          <div class="navbar-item advanced-search">

              <a title="Advanced Search" class="nav-link" href="{{ route('search') }}">Advanced Search</a>

          </div>

      </div>

    </nav>

    <!--<nav class="navbar navbar-expand-lg navbar-light">

        <div class="header_top">

            <div class="container">

                <a class="navbar-brand" href="{{url('')}}">

                    <img src="{{ asset('/front/images/logo.png') }}" alt="">

                </a>

                {{-- <span class="signout">

                    <a title="Sign Out" href="{{ route('logout') }}" onclick="event.preventDefault();

                            document.getElementById('logout-form').submit();">Sign Out <i class="icon-logout"></i></a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                        @csrf

                    </form>

                </span> --}}



                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon">

                        <span></span>

                        <span></span>

                        <span></span>

                        <span></span>

                    </span>

                </button>

            </div>

        </div>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav">

                <li class="nav-item category-item {{ (( in_array( Route::currentRouteName(), ['profile.index','profile.edit']) ) ? 'active' : '') }}">

                    <a title="Profile" class="nav-link" href="{{route('profile.index')}}"> Profile</a>

                </li>

                <li class="nav-item {{ (( in_array( Route::currentRouteName(), ['message','message.create']) ) ? 'active' : '') }}">

                    <a title="Messages" class="nav-link" href="{{ route('message') }}">Messages <span class="message-count">{{ (( !in_array( Route::currentRouteName(), ['message','message.create']) ) ? "(".getUserUnreadConversationCount(Auth::id()).")" : '') }}</span></a>

                </li>

                <li class="nav-item {{ (( in_array( Route::currentRouteName(), ['contacts','contact.profile']) ) ? 'active' : '') }}">

                    <a title="Contacts" class="nav-link" href="{{route('contacts')}}">Contacts</a>

                </li>

                <li class="nav-item {{ ((Route::currentRouteName() == 'account.index') ? 'active' : '') }}">

                    <a title="Account" class="nav-link" href="{{route('account.index')}}">Account</a>

                </li>

                <li class="nav-item {{ (( in_array( Route::currentRouteName(), ['search.result','search','search.new','search.result.id','search.edit','search.delete.list']) ) ? 'active' : '') }}">

                    <a title="Search" class="nav-link" href="{{ route('search') }}">Search</a>

                </li>

                <li class="nav-item {{ ((Route::currentRouteName() == 'about') ? 'active' : '') }}">

                    <a title="About" class="nav-link" href="{{route('about')}}">About</a>

                </li>

                <li class="nav-item">

                    <a title="Sign Out" class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();

                    document.getElementById('logout-form').submit();">Sign Out {{-- <i class="icon-logout"></i> --}}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                        @csrf

                    </form>


                </li>

            </ul>

        </div>-->

    </nav>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        $('.menu-toggle').on('click', function() {
          $('nav.mobile').toggleClass('menu-open');
        });
      });

    </script>

</header>
