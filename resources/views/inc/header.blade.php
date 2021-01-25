<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <p class="h5 my-0 me-md-auto fw-normal">My site</p>
  <nav class="my-5 my-md-0 me-md-5 my-nav">
    <a class="p-2 text-dark" href="{{ route('Welcome') }}">Welcome</a>
    <a class="p-2 text-dark" href="{{ route('NewsCat') }}">NewsCat</a>
    <a class="p-2 text-dark" href="{{ route('Login') }}">Login</a>
    <a class="p-2 text-dark" href="{{ route('AddNews') }}">AddNews</a>
    <a class="p-2 text-dark" href="{{ route('admin::news::index') }}">Admin</a>
    @guest
    @if (Route::has('login'))

    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

    @endif

    @if (Route::has('register'))

    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

    @endif
    @else

    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      {{ Auth::user()->name }}
    </a>


    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
    </a>



    @endguest


  </nav>
</header>