@extends('layouts.app')

@section('content')
<nav class="breadcrumb has-margin-top-24">
  <ul>
    <li>
      <a href="{{ route('repertories:cages.index') }}">{{ __('Repertories') }}</a>
    </li>
    <li class="is-active">
      <a href="{{ route('repertories:cages.index') }}">{{ __('Cages') }}</a>
    </li>
  </ul>
</nav>

<div class="card">
  <div class="card-header has-background-primary">
    <div class="card-header-title has-text-white">
      {{ __('Cages list') }}
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
      <ul class="cage-list block-list">
        @foreach ($cages as $cage)
          <li class="cage-item is-clearfix">
            {{ __('Cage number') }}: <strong>{{ $cage['number'] }}</strong>
            <div class="is-pulled-right">
              <a
                title="{{ __('Edit') }}"
                class="button is-link is-small"
                href="{{ route('repertories:cages.edit', $cage['id']) }}"
              >
                <span class="icon"><i class="fas fa-edit"></i></span>
              </a>
              <button
                title="{{ __('Remove') }}"
                class="button is-danger is-small"
                data-delete="{{ route('repertories:cages.destroy', $cage['id']) }}"
              >
                <span class="icon"><i class="fas fa-times"></i></span>
              </button>
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
        body: `Are you sure you want to remove this cage?
          <br>
          This action cannot be undone.`,
        cancel: "{{ __('Cancel') }}",
        confirm: {
          label: "{{ __('OK') }}",
          classes: ["has-focus"],
          onClick: function() {
            axios.delete($(btn).data('delete'))
              .then(function (response) {
                var row = $(btn).closest(".cage-item").first();
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
