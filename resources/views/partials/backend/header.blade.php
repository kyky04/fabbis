<div class="ui fixed blue inverted menu">
    <a href="{{ url('/') }}" class="header item">
        {{-- <img class="logo" src="{{ asset('img/logo-sd.png')}}" style="width:2.2em">&nbsp;&nbsp; --}}
        {{ config('app.shortname') }}
    </a>
    <div class="menu">
        <a href="#" class="toggler item" onclick="toggleSidebar()">
            <i class="sidebar icon"></i>
        </a>
    </div>
    {{-- <div class="ui stackable dark blue inverted domain menu">
      @include('partials.backend.menu', ['items' => $mainMenu->roots()])
    </div> --}}
    
    <div class="right domain menu">
        @if(auth()->guest())
            @if(!Request::is('auth/login'))
                <a class="item" href="{{ url('/auth/login') }}">Login</a>
            @endif
            @if(!Request::is('auth/register'))
                <a class="item" href="{{ url('/auth/register') }}">Register</a>
            @endif
        @else
            <div class="ui pointing dropdown toggler item" tabindex="0">
                <div class="floating ui red small label">22</div>
                <i class="ui bell icon" style="margin-right: 0"></i>
                <div class="menu transition hidden" tabindex="-1">
                    <a class="item" href="#">Item Notif 1</a>
                    <a class="item" href="#">Item Notif 2</a>
                    <a class="item" href="#">Item Notif 3</a>
                </div>
            </div>
            <div class="ui pointing dropdown item" tabindex="0">
                <img class="ui avatar image" src="{{ asset('img/avatar04.png') }}"> <span>{{ auth()->user()->name }}</span> <i class="dropdown icon"></i>
                <div class="menu transition hidden" tabindex="-1">
                    <a class="item" href="#"><i class="user icon"></i> Profil</a>
                    <a class="item" href="{{ url('/logout') }}"><i class="sign out icon"></i> Logout</a>
                </div>
            </div>
        @endif
        {{-- <div class="ui pointing dropdown item" tabindex="0">
            <img src="{{ isset(auth()->user()->fotos->first()->path)?url(auth()->user()->fotos->first()->path):url('img/profile.png') }}" id="home-photo" style="border-radius: 50%; margin-right: 6px"> 
            {{ auth()->user()->name }} <i class="dropdown icon"></i>
            <div class="menu transition hidden" tabindex="-1">
            	<a href="{{ url('settings/profile') }}" class="item"><i class="user icon"></i> Profil</a>
                <a href="javascript: void(0)" onclick="event.preventDefault(); $('#logout-form').submit();" class="item"><i class="sign out icon"></i>Sign Out</a>
            </div>
        </div> --}}
    </div>
</div>

<form id="logout-form" action="{{ url('/logout') }}" method="POST">
    {{ csrf_field() }}
</form>