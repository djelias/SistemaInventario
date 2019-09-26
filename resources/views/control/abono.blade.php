@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 style="text-align:center"> Agregar nuevo abono a {{$cliente->Nombre_Cliente}}, factura N°: {{$factur->factura}}</h3>
    	<h3 style="text-align:center"> Monto: {{$factur->pago}}</h3>
    	<br>
      {{ Form::open(['route'=>'control.store', 'method'=>'POST']) }}

      <input type="hidden" name="id_proveedor" value="{{$cliente->id}}">
      <input type="hidden" name="pertenece" value="{{$factur->factura}}">

    <div class="row">
    <div class="col-sm-3">
      {!! form::label('fecha','Fecha') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('fecha') ? 'has-error' : "" }}">
       <i>{{ Form::date('fecha',NULL, ['class'=>'form-control','id'=>'fecha','placeholder'=>'fecha']) }} </i> 
    </div>
  </div>
      </div>
  
   <div class="row">
    <div class="col-sm-3">
      {!! form::label('abono','Total a pagar') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('abono') ? 'has-error' : "" }}">
       <i>{{ Form::text('abono',NULL, ['class'=>'form-control', 'id'=>'abono', 'placeholder'=>'Abono realizado']) }} </i> 
    </div>
  </div>
      </div>
   
    <div class="row">
    <div class="col-sm-3">
      {!! form::label('estado','Estado') !!}
    </div>
    <div class="col-sm-5">
        <i>{{ Form::select('estado', ['1'=>'Realizado', '0'=>'Pendiente'], null, ['class'=>'form-control']) }}</i>
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
