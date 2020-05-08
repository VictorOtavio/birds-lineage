<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }}</title>
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @yield('styles')
</head>

<body>
  <nav class="navbar is-primary">
    <div class="navbar-brand">
      <a class="navbar-item" href="{{ url('/') }}">
        <img src="{{ asset('img/logo-small.png') }}" alt="" style="margin-right: .5rem">
        <strong>{{ config('app.name') }}</strong>
      </a>

      <a class="navbar-burger burger" data-target="navbar">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </div>

    <div id="navbar" class="navbar-menu">
      @auth
        <div class="navbar-start">
          <a class="navbar-item" href="{{ route('dashboard') }}">
            {{ __('Birds') }}
          </a>
          <a class="navbar-item" href="{{ route('breeding') }}">
            {{ __('Breeding') }}
          </a>
          <a class="navbar-item" href="{{ route('genealogy') }}">
            {{ __('Genealogy') }}
          </a>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="#">
              {{ __('Repertories') }}
            </a>
            <div class="navbar-dropdown is-boxed">
              <a class="navbar-item" href="{{ route('repertories:cages.index') }}">
                {{ __('Cages') }}
              </a>
            </div>
          </div>
          <a class="navbar-item" href="{{ route('follow-up') }}">
            {{ __('Follow-up') }}
          </a>
          <a class="navbar-item" href="{{ route('funds') }}">
            {{ __('Funds') }}
          </a>
          <a class="navbar-item" href="{{ route('miscellaneous') }}">
            {{ __('Miscellaneous') }}
          </a>
          <a class="navbar-item" href="{{ route('sources') }}">
            {{ __('Sources') }}
          </a>
          <a class="navbar-item" href="{{ route('hand-feeding') }}">
            {{ __('Hand-feeding') }}
          </a>
        </div>
      @endauth

      <div class="navbar-end">
        <!-- Authentication Links -->
        @guest
          <div class="navbar-item">
            <a class="button is-primary" href="{{ route('login') }}">
              {{ __('Login') }}
            </a>
            @if (Route::has('register'))
              <a class="button is-primary is-light" href="{{ route('register') }}">
                <strong>{{ __('Register') }}</strong>
              </a>
            @endif
          </div>
        @else
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="#">
              {{ Auth::user()->name }}
            </a>
            <div class="navbar-dropdown is-boxed">
              <a class="navbar-item" href="#">
                {{ __('Profile') }}
              </a>
              <hr class="navbar-divider">
              <a
                href="#"
                class="dropdown-item"
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              >
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </div>
        @endguest
      </div>
    </div>
  </nav>

  <main class="container">
    @yield('content')
  </main>

  <script src="{{ asset('js/app.js') }}" defer></script>
  @yield('scripts')
</body>
</html>
