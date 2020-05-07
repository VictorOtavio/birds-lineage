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
        <span class="icon">
          <i class="fas fa-angle-double-right"></i>
        </span>
        {{ __('Add new cage') }}
      </div>
    </div>

    <div class="card-content">
      <form action="{{ route('repertories:cages.store') }}" method="post">@csrf
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
</section>
@endsection
