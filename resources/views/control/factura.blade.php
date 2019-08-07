@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Agregar nueva factura a {{$cliente->Nombre_Cliente}}</h3>
    	<br>
      {{ Form::open(['route'=>'control.store', 'method'=>'POST']) }}

      <input type="hidden" name="id_proveedor" value="{{$cliente->id}}">

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
      {!! form::label('factura','No de factura') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('factura') ? 'has-error' : "" }}">
       <i>{{ Form::text('factura',NULL, ['class'=>'form-control', 'id'=>'factura', 'placeholder'=>'Numero de factura','maxlength' => 12]) }} </i>
    </div>
    </div>
   </div>
   <div class="row">
    <div class="col-sm-3">
      {!! form::label('pago','Total a pagar') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('pago') ? 'has-error' : "" }}">
       <i>{{ Form::text('pago',NULL, ['class'=>'form-control', 'id'=>'pago', 'placeholder'=>'Total a pagar']) }} </i> 
    </div>
  </div>
      </div>
   
    <div class="row">
    <div class="col-sm-3">
      {!! form::label('estado','Estado') !!}
    </div>
    <div class="col-sm-5">
        <i>{{ Form::select('estado', ['1'=>'Pendiente', '0'=>'Cancelado'], null, ['class'=>'form-control']) }}</i>
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
