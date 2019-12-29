@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 style="text-align:center"> Agregar nuevo abono a </h3>
    	<h3 style="text-align:center"> Monto: </h3>
    	<br>
      {{ Form::open(['route'=>['tableFacturas.update',$tableFacturas->id], 'method'=>'PATCH']) }}


    <div class="row">
    <div class="col-sm-3">
      {!! form::label('fechaPago','Fecha de pago') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('fechaPago') ? 'has-error' : "" }}">
       <i>{{ Form::date('fechaPago',NULL, ['class'=>'form-control','id'=>'fechaPago','placeholder'=>'fecha']) }} </i> 
    </div>
  </div>
      </div>
  
   <div class="row">
    <div class="col-sm-3">
      {!! form::label('estado','Estado') !!}
    </div>
    <div class="col-sm-5">
        <i>{{ Form::select('estado', ['Cancelado'=>'Cancelado', 'Pendiente'=>'Pendiente'], null, ['class'=>'form-control']) }}</i>
      </div>
    </div>
 
    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
    </div>


      {{ form::close() }}
    </div>
  </div>
@endsection