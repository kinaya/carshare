@extends('layouts.app')

@section('content')
  <h1>Rides</h1>
  <div class="card">
      <div class="card-header">{{ __('All rides') }}</div>

      <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif

          @if(count($rides))
            <table class="table table-stiped">
              <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Distance</th>
                <th>Tax</th>
                <th>Amount</th>
                <th>Who</th>
              </tr>
              @foreach($rides as $ride)
                <tr>
                  <th><a href="/klumpen/public/rides/{{$ride->id}}">{{$ride->title}}</a></th>
                  <th>{{$ride->date}}</th>
                  <th>{{$ride->distance}} km</th>
                  <th>{{$ride->tax}} kr</th>
                  <th>{{$ride->amount}} kr</th>
                  <th>{{$ride->user->name}}</th>
                </tr>
              @endforeach
                <tr>
                  <th></th>
                  <th></th>
                  <th>{{$total_distance}} km</th>
                  <th>{{$total_tax}} kr</th>
                  <th>{{$total_amount}} kr</th>
                  <th></th>
                </tr>
            </table>
          @else
            <p>There are not rides</p>
          @endif
      </div>
  </div>

@endsection
