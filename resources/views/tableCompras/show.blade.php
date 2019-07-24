@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de las ventas</h3>
            <br>
        </div>
    </div>
</div>

{!! Form::open(['route'=>['tableCompras.detalle'], 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group col-12">
            <div class="col-sm-3">
            {!! Form::date('fechainicial', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}</div>
            
        </div>
         <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
        {!! Form::close()!!}

<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Deuda </h3>
            <br>
        </div>
    </div>
</div>

<?php
    $subtotalc=0; 
    $totalc=0;
    $subtotalc1=0; 
    $totalc1=0;
    $subtotalc2=0; 
    $totalc2=0; 
    ?>
@foreach ($tableCompras as $key => $value)
@if($value->TableFacturascs->estado=="Pendiente")
    <?php

        $subtotalc=($value->TableFacturascs->totals);
        $totalc=$totalc+$subtotalc;
    
    ?>
    @endif
    @endforeach
    Compras realizadas: ${{$totalc}}<br>

 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

@endsection
