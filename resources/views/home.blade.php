@extends('layouts.app')

@section('content')

  <div class="card mb-3">
      <div class="card-header">Rides in {{$currentMonth}}</div>

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
                  <th><a href="/rides/{{$ride->id}}">{{$ride->title}}</a></th>
                  <th>{{$ride->date}}</th>
                  <th>{{$ride->distance}} km</th>
                  <th>{{$ride->tax}} kr</th>
                  <th>{{$ride->amount}} kr</th>
                  <th>{{$ride->user_id}} {{$ride->user->name}}</th>
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
            <p>There are not tides this month</p>
          @endif
        <a href="/rides" class="btn btn-primary float-right">See all rides</a>
      </div>
  </div>

  <div class="card mb-3">
      <div class="card-header">{{ __('Calendar') }}</div>
      <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
        <p>This is where the calendar will be.</p>
        <a href="/calendar" class="btn btn-primary float-right">See calendar</a>
      </div>
  </div>


  @if(count($users))
    <div class="row">
      @foreach($users as $user)
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">{{$user['name']}}</div>
          <div class="card-body">
            <ul>
              <li>Rides: {{$user['rides']}}</li>
              <li>Distance: {{$user['distance']}} km</li>
              <li>Tax: {{$user['tax']}} kr</li>
              <li>Amount: {{$user['amount']}} kr</li>
              <li>Amount due: <span class="text-danger">XX kr</span></li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
      </div>
  @endif

@endsection
