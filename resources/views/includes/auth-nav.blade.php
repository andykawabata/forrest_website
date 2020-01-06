<div>
  

    <div>
        <!-- Left Side Of Navbar -->
        <!-- Right Side Of Navbar -->
        <ul style="padding:4px; list-style:none;">
            <!-- Authentication Links -->
            @guest
                <li class="">
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="">
                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <a class="" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <br>
                <a href="/">View site</a>
                
            @endguest
            
        </ul>
    </div>
</div>