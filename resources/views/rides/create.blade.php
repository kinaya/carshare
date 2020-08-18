@extends('layouts.app')

@section('content')
  <h1>Create Ride</h1>
  {!! Form::open(['action' => 'RidesController@store', 'method' => 'POST']) !!}
  <div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
  </div>
  <div class="form-group">
    {{Form::label('date', 'Date')}}
    {{Form::date('date', now(), ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    {{Form::label('distance', 'Distance (km)')}}
    {{form::number('distance', '0', ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    {{Form::label('tax', 'Tax')}}
    {{form::number('tax', '0', ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    {{Form::label('amount', 'Amount')}}
    {{form::number('amount', '0', ['class' => 'form-control'])}}
  </div>
  {{Form::submit('Submit', ['class' => 'btn btn-primary'] )}}
  {!! Form::close() !!}
@endsection
