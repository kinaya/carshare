@extends('layouts.app')

@section('content')
  <h1>About</h1>
  <div class="card mb-3">
      <div class="card-header">{{ __('Faktauppgifter') }}</div>

      <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
          <ul>
            <li>Skatt: 5400kr</li>
            <li>Försäkring: 3040kr</li>
            <li>Assistsansförsäkring: 500kr</li>
            <li>Milavgift: 27kr</li>
          </ul>
      </div>
  </div>

  <div class="card mb-3">
      <div class="card-header">{{ __('Om något händer') }}</div>

      <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
          <p>Info kommer här...</p>
      </div>
  </div>

@endsection
