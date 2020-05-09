@extends('layout')

@section('content')
<nav class="breadcrumb has-margin-top-24">
  <ul>
    <li>
      <a href="{{ route('breeding:pairs.index') }}">{{ __('Breeding') }}</a>
    </li>
    <li class="is-active">
      <a href="{{ route('breeding:pairs.index') }}">{{ __('Pairs') }}</a>
    </li>
  </ul>
</nav>

<div class="card">
  <div class="card-header has-background-primary">
    <div class="card-header-title has-text-white">
      {{ __('Pairs list') }}
    </div>
  </div>

  <div class="card-content">
    <div class="buttons has-addons is-right">
      <a class="button is-link is-small" href="{{ route('breeding:pairs.create') }}">
        <span class="icon"><i class="fas fa-plus"></i></span>
        <span>{{ __('Add New') }}</span>
      </a>
    </div>

    @if (!$pairs->isEmpty())
      <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>{{ __('Male pair') }}</th>
            <th>{{ __('Female pair') }}</th>
            <th>{{ __('Cage number') }}</th>
            <th class="has-text-right">{{ __('Actions') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pairs as $pair)
            <tr>
              <td>{{ $pair['male'] }}</td>
              <td>{{ $pair['female'] }}</td>
              <td>{{ $pair['cage'] }}</td>
              <td class="has-text-right">
                <a
                  title="{{ __('Edit') }}"
                  class="button is-link is-small"
                  href="{{ route('breeding:pairs.edit', $pair['id']) }}"
                >
                  <span class="icon"><i class="fas fa-edit"></i></span>
                </a>
                <button
                  title="{{ __('Remove') }}"
                  class="button is-danger is-small"
                  data-delete="{{ route('breeding:pairs.destroy', $pair['id']) }}"
                >
                  <span class="icon"><i class="fas fa-times"></i></span>
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
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
@endsection

@section('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function() {
    $("[data-delete]").on('click', function(event) {
      event.preventDefault();

      var btn = event.currentTarget

      Bulma.create("alert", {
        type: "danger",
        title: "{{ __('Are you sure?') }}",
        body: `Are you sure you want to remove this pair?
          <br>
          This action cannot be undone.`,
        cancel: "{{ __('Cancel') }}",
        confirm: {
          label: "{{ __('OK') }}",
          classes: ["has-focus"],
          onClick: function() {
            axios.delete($(btn).data('delete'))
              .then(function (response) {
                var row = $(btn).closest(".pair-item").first();
                row.style.background = "#ff0";
                fadeOut(row, 630, function() {
                  row.remove();
                })
              })
              .catch(function (error) {
                Bulma.create("alert", {
                  type: "danger",
                  title: "{{ __('Alert') }}",
                  body: "{{ __('An error has occurred!') }}",
                  confirm: "{{ __('Close') }}"
                });
              });
          }
        }
      });
    });
  });
</script>
@endsection
