@extends('layout')

@section('content')
<div class="columns is-centered">
  <div class="column is-4">
    <div class="card">
      <div class="card-header has-background-primary">
        <div class="card-header-title has-text-white">
          {{ __('Verify Your Email Address') }}
        </div>
      </div>

      <div class="card-content">
        @if (session('resent'))
          <div class="notification is-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
          </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form method="POST" action="{{ route('verification.resend') }}">
          @csrf
          <button type="submit" class="button is-link is-light">{{ __('click here to request another') }}</button>.
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
