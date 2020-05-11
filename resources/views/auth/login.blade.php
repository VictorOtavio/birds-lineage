@extends('layout')

@section('content')
<div class="columns is-centered">
  <div class="column is-4">
    <section class="section">
      <div class="card">
        <div class="card-header has-background-primary">
          <div class="card-header-title has-text-white">
            {{ __('Login') }}
          </div>
        </div>

        <div class="card-content">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
              <label class="label">{{ __('E-Mail Address') }}</label>
              <div class="control">
                <input type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              </div>
              @error('email')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>

            <div class="field">
              <label class="label">{{ __('Password') }}</label>
              <div class="control">
                <input type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">
              </div>
              @error('password')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>

            <div class="field">
              <div class="control">
                <label class="checkbox">
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                  {{ __('Remember Me') }}
                </label>
              </div>
            </div>

            <div class="field is-grouped">
              <div class="control">
                <button type="submit" class="button is-primary">
                  {{ __('Login') }}
                </button>
              </div>
              @if (Route::has('password.request'))
                <div class="control">
                  <a href="{{ route('password.request') }}" class="button is-link is-light">
                    {{ __('Forgot Your Password?') }}
                  </a>
                </div>
              @endif
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection
