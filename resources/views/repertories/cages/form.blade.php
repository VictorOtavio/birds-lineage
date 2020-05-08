@extends('layout')

@section('content')
<nav class="breadcrumb has-margin-top-24">
  <ul>
    <li>
      <a href="{{ route('repertories:cages.index') }}">{{ __('Repertories') }}</a>
    </li>
    <li>
      <a href="{{ route('repertories:cages.index') }}">{{ __('Cages') }}</a>
    </li>
    <li class="is-active">
      @if (isset($cage))
        <a href="{{ route('repertories:cages.edit', $cage->id) }}">{{ __('Update cage') }}</a>
      @else
        <a href="{{ route('repertories:cages.create') }}">{{ __('Add new cage') }}</a>
      @endif
    </li>
  </ul>
</nav>

<div class="card">
  <div class="card-header has-background-primary">
    <div class="card-header-title has-text-white">
      @if (isset($cage))
        {{ __('Update cage') }}
      @else
        {{ __('Add new cage') }}
      @endif
    </div>
  </div>

  <div class="card-content">
    <form action="{{ route('repertories:cages.store') }}" method="post">
      @csrf

      <div class="field">
        <label for="cage_number" class="label">
          {{ __('Number') }}
        </label>
        <div class="control">
          <input
            id="cage_number"
            type="text"
            name="number"
            value="{{ isset($cage) ? $cage['number'] : old('number') }}"
            class="input @error('number') is-danger @enderror"
            placeholder="{{ __('Cage number') }}"
            required
          >
        </div>
        @error('number')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="field is-grouped">
        <div class="control">
          <x-save-button />
        </div>
        <div class="control">
          <x-back-to-index-button url="{{ route('repertories:cages.index') }}" />
        </div>
      </div>

    </form>
  </div>
</div>
@endsection
