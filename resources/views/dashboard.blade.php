@extends('layouts.app')

@section('content')
<section class="section">
  <div class="card">
    <div class="card-header has-background-primary">
      <div class="card-header-title has-text-white">
        {{ __('Dashboard') }}
      </div>
    </div>

    <div class="card-content">
      <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>{{ __('Band') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Father') }}</th>
            <th>{{ __('Mother') }}</th>
            <th>{{ __('Birth') }}</th>
            <th>{{ __('End') }}</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($birds as $bird)
            <tr>
              <th>{{ $bird['band'] }}</th>
              <td>
                <i class="fas fa-{{ $bird['gender_icon'] }} @if ($bird['gender_icon'] === 'mars') has-text-link @else has-text-danger @endif" title="{{ $bird['gender'] }}"></i>
                {{ $bird['name'] }}
              </td>
              <td>{{ $bird['father'] }}</td>
              <td>{{ $bird['mother'] }}</td>
              <td>{{ $bird['birth'] }}</td>
              <td>
                @if ($bird['end'] !== null)
                  <span data-tooltip="{{ $bird['end_desc'] }}">{{ $bird['end'] }}</span>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
