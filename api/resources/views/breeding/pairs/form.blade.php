@extends('layout')

@section('content')
<div class="card">
  <div class="card-header has-background-primary">
    <div class="card-header-title has-text-white">
      @if (isset($pair))
        {{ __('Update pair') }}
      @else
        {{ __('Add new pair') }}
      @endif
    </div>
  </div>

  <div class="card-content">
    @if (isset($cage))
      <form action="{{ route('breeding:pairs.update', $pair['id']) }}" method="POST">
      <input type="hidden" name="_method" value="PATCH">
    @else
      <form action="{{ route('breeding:pairs.store') }}" method="POST">
    @endif
      @csrf

      <div class="columns">
        <div class="column">
          <div class="field">
            <label for="pair_male" class="label">
              {{ __('Male') }}
            </label>
            <div class="control">
              <input
                id="pair_male"
                type="text"
                name="male"
                value="{{ isset($pair) ? $pair['male'] : old('male') }}"
                class="input @error('male') is-danger @enderror"
                placeholder="{{ __('Male pair') }}"
                required
              >
            </div>
            @error('male')
              <p class="help is-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="column">
          <div class="field">
            <label for="pair_female" class="label">
              {{ __('Female') }}
            </label>
            <div class="control">
              <input
                id="pair_female"
                type="text"
                name="female"
                value="{{ isset($pair) ? $pair['female'] : old('female') }}"
                class="input @error('female') is-danger @enderror"
                placeholder="{{ __('Female pair') }}"
                required
              >
            </div>
            @error('female')
              <p class="help is-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="column">
          <div class="field">
            <label for="pair_cage" class="label">
              {{ __('Cage') }}
            </label>
            <div class="control">
              <input
                id="pair_cage"
                type="text"
                name="cage"
                value="{{ isset($pair) ? $pair['cage'] : old('cage') }}"
                class="input @error('cage') is-danger @enderror"
                placeholder="{{ __('Cage number') }}"
                required
              >
            </div>
            @error('cage')
              <p class="help is-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      <div class="field is-grouped">
        <div class="control">
          <x-save-button />
        </div>
        <div class="control">
          <x-back-to-index-button url="{{ route('breeding:pairs.index') }}" />
        </div>
      </div>

    </form>
  </div>
</div>
@endsection
