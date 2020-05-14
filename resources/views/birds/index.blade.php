@extends('layout')

@section('content')
<nav class="breadcrumb has-margin-top-24">
  <ul>
    <li class="is-active">
      <a href="{{ route('birds:index') }}">{{ __('Birds') }}</a>
    </li>
  </ul>
</nav>

<div class="card">
  <div class="card-header has-background-primary">
    <div class="card-header-title has-text-white">
      {{ __('Birds') }}
    </div>
  </div>

  <div class="card-content">
    @if (Session::has('success'))
      <div class="notification is-success">
        {{ Session::get('success') }}
      </div>
    @endif

    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
      <thead>
        <tr>
          <th>{{ __('Identifier') }}</th>
          <th class="has-text-centered">
            <abbr title="{{ __('Sex') }}">{{ __('Sex')[0] }}</abbr>
          </th>
          <th>{{ __('Hatch Date') }}</th>
          <th>{{ __('Age') }}</th>
          <th>{{ __('Status') }}</th>
          <th>{{ __('Species') }}</th>
          <th>{{ __('Cage') }}</th>
          <th>{{ __('Father') }}</th>
          <th>{{ __('Mother') }}</th>
          <th class="has-text-right">{{ __('Actions') }}</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($birds as $bird)
          <tr>
            <td>{{ $bird['identifier'] }}</td>
            <td class="has-text-centered has-text-{{ $bird['sex_color'] }}">
              <i class="fas fa-{{ $bird['sex_icon'] }}" title="{{ $bird['sex'] }}"></i>
            </td>
            <td>{{ $bird['hatch'] }}</td>
            <td>{{ $bird['age'] }}</td>
            <td>{{ $bird['status'] }}</td>
            <td>{{ $bird['species'] }}</td>
            <td>{{ $bird['cage'] }}</td>
            <td>{{ $bird['father'] }}</td>
            <td>{{ $bird['mother'] }}</td>
            <td class="has-text-right">
              <a
                title="{{ __('Edit') }}"
                class="button is-link is-small"
                href="{{ route('birds:edit', $bird['id']) }}"
              >
                <span class="icon"><i class="fas fa-edit"></i></span>
              </a>
              <button
                title="{{ __('Remove') }}"
                class="button is-danger is-small"
                data-delete="{{ route('birds:destroy', $bird['id']) }}"
              >
                <span class="icon"><i class="fas fa-times"></i></span>
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="buttons has-addons">
      <a class="button is-link" href="{{ route('birds:create') }}">
        <span class="icon"><i class="fas fa-plus"></i></span>
        <span>{{ __('Add New') }}</span>
      </a>
    </div>
  </div>
</div>
@endsection
