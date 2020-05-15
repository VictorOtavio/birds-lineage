@extends('layout')

@section('content')
<div class="card">
  <div class="card-header has-background-primary">
    <div class="card-header-title has-text-white">
      @if (isset($bird))
        {{ __('Update bird') }}
      @else
        {{ __('Add new bird') }}
      @endif
    </div>
  </div>

  <div class="card-content">
    @if (Session::has('success'))
      <div class="notification is-success">
        {{ Session::get('success') }}
      </div>
    @endif

    @if (isset($bird))
      <form action="{{ route('birds:update', $bird['id']) }}" method="POST">
      <input type="hidden" name="_method" value="PATCH">
    @else
      <form action="{{ route('birds:store') }}" method="POST">
    @endif
      @csrf

      {{-- Species --}}
      <div class="field">
        <label for="bird_species" class="label">
          {{ __('Species') }}
        </label>
        <div class="control">
          <div class="select is-fullwidth @error('species') is-danger @enderror">
            <select
              id="bird_species"
              name="species"
              placeholder="{{ __('Bird species') }}"
            >
              <option value="" selected>{{ __('Unknown') }}</option>
              @foreach ($selects['species'] as $species)
                <option value="{{ $species['id'] }}" {{ old("popular_name", null) == $species['popular_name'] ? 'selected' : '' }}>
                  {{ $species['popular_name'] }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        @error('species')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- Cage --}}
      <div class="field">
        <label for="bird_cage" class="label">
          {{ __('Cage') }}
        </label>
        <div class="control">
          <div class="select is-fullwidth @error('species') is-danger @enderror">
            <select
              id="bird_cage"
              name="cage"
              placeholder="{{ __('Bird cage') }}"
            >
              <option value="">{{ __('Select...') }}</option>
              @foreach ($selects['cages'] as $cage)
                <option value="{{ $cage['id'] }}">{{ $cage['number'] }}</option>
              @endforeach
            </select>
          </div>
        </div>
        @error('cage')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- Band --}}
      <div class="field">
        <label for="bird_band" class="label">
          {{ __('Band') }}
        </label>
        <div class="control">
          <input
            id="bird_band"
            type="text"
            name="band"
            value="{{ isset($bird) ? $bird['band'] : old('band') }}"
            class="input @error('band') is-danger @enderror"
            placeholder="{{ __('Bird band') }}"
          >
        </div>
        @error('band')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- Sex --}}
      <div class="field">
        <label for="bird_sex" class="label">
          {{ __('Sex') }}
        </label>
        <div class="control">
          <div class="select is-fullwidth @error('species') is-danger @enderror">
            <select
              id="bird_sex"
              name="sex"
              placeholder="{{ __('Bird sex') }}"
            >
              <option value="unknown" selected>{{ __('Unknown') }}</option>
              <option value="male">{{ __('Male') }}</option>
              <option value="female">{{ __('Female') }}</option>
            </select>
          </div>
        </div>
        @error('sex')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- Identifier --}}
      <div class="field">
        <label for="bird_identifier" class="label">
          {{ __('Identifier') }}
        </label>
        <div class="control">
          <input
            id="bird_identifier"
            type="text"
            name="identifier"
            value="{{ isset($bird) ? $bird['identifier'] : old('identifier') }}"
            class="input @error('identifier') is-danger @enderror"
            placeholder="{{ __('Bird identifier') }}"
            required
          >
        </div>
        @error('identifier')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- Father --}}
      <div class="field">
        <label for="bird_father" class="label">
          {{ __('Father') }}
        </label>
        <div class="control">
          <div class="select is-fullwidth @error('species') is-danger @enderror">
            <select
              id="bird_father"
              name="father"
              placeholder="{{ __('Bird father') }}"
            >
              <option value="">{{ __('Select...') }}</option>
              @foreach ($selects['male_birds'] as $males)
                <option value="{{ $males['id'] }}">{{ $males['identifier'] }}</option>
              @endforeach
            </select>
          </div>
        </div>
        @error('father')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- Mother --}}
      <div class="field">
        <label for="bird_mother" class="label">
          {{ __('Mother') }}
        </label>
        <div class="control">
          <div class="select is-fullwidth @error('species') is-danger @enderror">
            <select
              id="bird_mother"
              name="mother"
              placeholder="{{ __('Bird mother') }}"
            >
              <option value="">{{ __('Select...') }}</option>
              @foreach ($selects['female_birds'] as $females)
                <option value="{{ $females['id'] }}">{{ $females['identifier'] }}</option>
              @endforeach
            </select>
          </div>
        </div>
        @error('mother')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- Hatch date --}}
      <div class="field">
        <label for="bird_hatch_date" class="label">
          {{ __('Hatch date') }}
        </label>
        <div class="control">
          <input
            id="bird_hatch_date"
            type="date"
            name="hatch_date"
            value="{{ isset($bird) ? $bird['hatch_date'] : old('hatch_date') }}"
            class="input @error('hatch_date') is-danger @enderror"
            placeholder="{{ __('Bird hatch date') }}"
          >
        </div>
        @error('hatch_date')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- End date --}}
      <div class="field">
        <label for="bird_end_date" class="label">
          {{ __('End date') }}
        </label>
        <div class="control">
          <input
            id="bird_end_date"
            type="date"
            name="end_date"
            value="{{ isset($bird) ? $bird['end_date'] : old('end_date') }}"
            class="input @error('end_date') is-danger @enderror"
            placeholder="{{ __('Bird end date') }}"
          >
        </div>
        @error('end_date')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- Status --}}
      <div class="field">
        <label for="bird_status" class="label">
          {{ __('Status') }}
        </label>
        <div class="control">
          <div class="select is-fullwidth @error('status') is-danger @enderror">
            <select
              id="bird_status"
              name="status"
              placeholder="{{ __('Bird status') }}"
            >
              <option value="available" selected>{{ __('Available') }}</option>
              <option value="unavailable">{{ __('Unavailable') }}</option>
              <option value="external">{{ __('External') }}</option>
            </select>
          </div>
        </div>
        @error('status')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- Sub status --}}
      <div class="field">
        <label for="bird_sub_status" class="label">
          {{ __('Sub status') }}
        </label>
        <div class="control">
          <div class="select is-fullwidth @error('status') is-danger @enderror">
            <select
              id="bird_sub_status"
              name="sub_status"
              placeholder="{{ __('Bird sub status') }}"
            >
              <option value="reproduction" selected>{{ __('In reproduction period') }}</option>
              <option value="rest">{{ __('In rest period') }}</option>
              <option value="for_sale">{{ __('For sale') }}</option>
              <option value="sold">{{ __('Sold') }}</option>
              <option value="exhcanged">{{ __('Exchanged') }}</option>
              <option value="lost">{{ __('Lost') }}</option>
              <option value="deceased">{{ __('Deceased') }}</option>
              <option value="donated">{{ __('Donated') }}</option>
              <option value="other">{{ __('Other') }}</option>
            </select>
          </div>
        </div>
        @error('sub_status')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- Origin --}}
      <div class="field">
        <label for="bird_origin" class="label">
          {{ __('Origin') }}
        </label>
        <div class="control">
          <div class="select is-fullwidth @error('status') is-danger @enderror">
            <select
              id="bird_origin"
              name="origin"
              placeholder="{{ __('Bird origin') }}"
            >
              <option value="my_breeding" selected>{{ __('My breeding') }}</option>
              <option value="imported">{{ __('Imported') }}</option>
              <option value="another_breeding">{{ __('From another breeding') }}</option>
              <option value="other">{{ __('Other') }}</option>
            </select>
          </div>
        </div>
        @error('origin')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="field is-grouped">
        <div class="control">
          <x-save-button />
        </div>
        <div class="control">
          <x-back-to-index-button url="{{ route('birds:index') }}" />
        </div>
      </div>

    </form>
  </div>
</div>
@endsection
