@extends('layout')

@section('content')
<div class="columns is-centered">
  <div class="column is-4">
    <div class="card">
      <div class="card-header has-background-primary">
        <div class="card-header-title has-text-white">
          {{ __('Confirm Password') }}
        </div>
      </div>

      <div class="card-content">
        {{ __('Please confirm your password before continuing.') }}

        <form method="POST" action="{{ route('password.confirm') }}">
          @csrf

          <div class="field">
            <label for="password" class="label">{{ __('Password') }}</label>
            <div class="control">
              <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">
              @error('password')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button type="submit" class="button is-primary">
                {{ __('Confirm Password') }}
              </button>

              @if (Route::has('password.request'))
                <a class="button is-link is-light" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
              @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
