@extends('layouts.app')

@section('content')
  <h1>{{$ride->title}}</h1>
  <p>Date: {{$ride->date}}</p>
  <p>Distance: {{$ride->distance}} km</p>
  <p>Tax: {{$ride->tax}} kr</p>
  <p>Amount: {{$ride->amount}} kr</p>

  @if(!Auth::guest())
    @if(Auth::user()->id == $ride->user_id)
      <a href="/rides/{{$ride->id}}/edit" class="btn btn-primary float-left mr-2">Edit</a>
      {!!Form::open(['action' => ['RidesController@destroy', $ride->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
      {{Form::hidden('_method', 'DELETE')}}
      {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
      {!!Form::close()!!}
    @endif
  @endif

@endsection
