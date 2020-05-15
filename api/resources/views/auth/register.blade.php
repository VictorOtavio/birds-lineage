@extends('layout')

@section('content')
<div class="columns is-centered">
  <div class="column is-4">
    <div class="card">
      <div class="card-header has-background-primary">
        <div class="card-header-title has-text-white">
          {{ __('Register') }}
        </div>
      </div>

      <div class="card-content">
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="field">
            <label for="name" class="label">{{ __('Name') }}</label>

            <div class="control">
              <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="field">
            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

            <div class="control">
              <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="field">
            <label for="password" class="label">{{ __('Password') }}</label>

            <div class="control">
              <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="field">
            <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

            <div class="control">
              <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

          <div class="field is-grouped">
            <div class="control">
              <button type="submit" class="button is-primary">
                {{ __('Register') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
