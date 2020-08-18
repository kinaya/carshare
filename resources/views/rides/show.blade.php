@extends('layouts.app')

@section('content')
  <a href="/klumpen/public/rides">Go back</a>

  <h1>{{$ride->title}}</h1>
  <small>Date: {{$ride->date}}</small>
  <small>Distance: {{$ride->distance}}</small>
  <small>Tax: {{$ride->tax}}</small>

  @if(!Auth::guest())
    @if(Auth::user()->id == $ride->user_id)
      <a href="/klumpen/public/rides/{{$ride->id}}/edit" class="btn btn-default">Edit</a>
      {!!Form::open(['action' => ['RidesController@destroy', $ride->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
      {{Form::hidden('_method', 'DELETE')}}
      {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
      {!!Form::close()!!}
    @endif
  @endif

@endsection
