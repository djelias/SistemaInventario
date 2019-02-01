@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de productos</h3>
    	<br>
      {{ Form::model($tableProducto,['route'=>['tableProductos.update',$tableProducto->id],'method'=>'PATCH']) }}
      @include('tableProductos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection