@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <h1>{{$user->name}}</h1>
          <p>Here will be info about your account and the possibility to update it.</p>
        </div>
    </div>
</div>
@endsection
