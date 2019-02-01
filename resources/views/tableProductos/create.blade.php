@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Datos del producto</h3>
    	<br>
      {{ Form::open(['route'=>'tableProductos.store', 'method'=>'POST']) }}
        @include('tableProductos.form_master')
      {{ form::close() }}
    </div>
  </div>
@endsection
