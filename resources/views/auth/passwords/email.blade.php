@extends('layout')

@section('content')
<div class="columns is-centered">
  <div class="column is-4">
    <div class="card">
      <div class="card-header has-background-primary">
        <div class="card-header-title has-text-white">
          {{ __('Reset Password') }}
        </div>
      </div>

      <div class="card-content">
        @if (session('status'))
          <div class="notification is-success">
            {{ session('status') }}
          </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
          @csrf

          <div class="field">
            <label for="email" class="label">{{ __('E-Mail Address') }}</label>
            <div class="control">
              <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button type="submit" class="button is-primary">
                {{ __('Send Password Reset Link') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
