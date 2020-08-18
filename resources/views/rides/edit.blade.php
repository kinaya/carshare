@extends('layouts.app')

@section('content')
  <h1>Create Ride</h1>
  {!! Form::open(['action' => ['RidesController@update', $ride->id], 'method' => 'POST']) !!}
  <div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', $ride->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
  </div>
  <div class="form-group">
    {{Form::label('date', 'Date')}}
    {{Form::date('date', $ride->date, ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    {{Form::label('distance', 'Distance (km)')}}
    {{form::number('distance', $ride->distance, ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    {{Form::label('tax', 'Tax')}}
    {{form::number('tax', $ride->tax, ['class' => 'form-control'])}}
  </div>
  <div class="form-group">
    {{Form::label('amount', 'Amount')}}
    {{form::number('amount', $ride->amount, ['class' => 'form-control'])}}
  </div>
  {{Form::hidden('_method', 'PUT')}}
  {{Form::submit('Submit', ['class' => 'btn btn-primary'] )}}
  {!! Form::close() !!}
@endsection
