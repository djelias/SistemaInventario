@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Agregando factura</h3>
    	<br>

    	{{ Form::model(['route'=>['control.store'],'method'=>'POST']) }}

    	{{$proveedor->Nombre_Cliente}}
<?php $id_proveedor = $proveedor->id;
$estado = 1 ?>
    <div class="row">
    <div class="col-sm-3">
      {!! Form::label('Fecha') !!}
    </div>
     <div class="col-sm-5">
       <i>{{ Form::date('fecha',NULL, ['class'=>'form-control','id'=>'fecha','placeholder'=>'fecha']) }} </i> 
  	</div>
    </div>

    <div class="row">
    <div class="col-sm-3">
      {!! Form::label('Factura') !!}
    </div>
     <div class="col-sm-5">
       <i>{{ Form::text('factura',NULL, ['class'=>'form-control','id'=>'factura','placeholder'=>'Numero de factura']) }} </i> 
  	</div>
    </div>

    <div class="row">
    <div class="col-sm-3">
      {!! Form::label('Cantidad') !!}
    </div>
     <div class="col-sm-5">
       <i>{{ Form::text('pago',NULL, ['class'=>'form-control','id'=>'pago','placeholder'=>'Cantidad del pago']) }} </i> 
  	</div>
    </div>

<a class="btn btn-success btn-lg" href="{{ route('control.edit', $proveedor->id) }}">Guardar</a>
            
      {{ Form::close() }}

    </div>
  </div>
@endsection