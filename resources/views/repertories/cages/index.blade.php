@extends('layouts.app')

@section('content')
<section class="section">
  <div class="card">
    <div class="card-header has-background-primary">
      <div class="card-header-title has-text-white">
        {{ __('Repertories') }}
        <span class="icon">
          <i class="fas fa-angle-double-right"></i>
        </span>
        {{ __('Cages') }}
      </div>
    </div>

    <div class="card-content">
      <div class="buttons has-addons is-right">
        <a class="button is-link is-small" href="{{ route('repertories:cages.create') }}">
          <span class="icon"><i class="fas fa-plus"></i></span>
          <span>{{ __('Add New') }}</span>
        </a>
      </div>

      @if (!$cages->isEmpty())
        <ul class="block-list">
          @foreach ($cages as $cage)
            <li class="is-clearfix">
              {{ __('Cage number') }}: <strong>{{ $cage['number'] }}</strong>
              <div class="is-pulled-right">
                <a
                  href="{{ route('repertories:cages.edit', $cage['id']) }}"
                  class="button is-link is-small"
                  title="{{ __('Edit') }}"
                >
                  <span class="icon">
                    <i class="fas fa-edit"></i>
                  </span>
                </a>
                <a
                  href="{{ route('repertories:cages.destroy', $cage['id']) }}"
                  class="button is-danger is-small"
                  title="{{ __('Remove') }}"
                >
                  <span class="icon">
                    <i class="fas fa-times"></i>
                  </span>
                </a>
              </div>
            </li>
          @endforeach
        </ul>
      @else
      <p class="has-text-centered">
        <span class="icon has-text-warning">
          <i class="fas fa-exclamation-triangle"></i>
        </span>
        <span class="has-text-grey-light">
          {{ __('Nothing found') }}
        </span>
      </p>
      @endif
    </div>
  </div>
</section>
@endsection
