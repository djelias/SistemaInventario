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

{!! Form::open(['route'=>['tableVentas.detalle'], 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="col-lg-12 margin-tb">
           <div class="row">
    <div>
      {!! form::label('Fecha inicial') !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      {!! form::label('Fecha final') !!}
    </div>
     <div>
      <i>{{ Form::date('fechainicial',NULL, ['class'=>'form-control','id'=>'fechainicial']) }} </i> 
      <i>{{ Form::date('fechafinal',NULL, ['class'=>'form-control','id'=>'fechafinal']) }} </i> 
      <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
  </div>
      </div>
            
        </div>
         
        {!! Form::close()!!}


    <div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de la ventas por fecha</h3>
            <br>
        </div>
    </div>
</div>

<?php
    $subtot=0; 
    $tot=0;
    $gan=0;
    $gant=0;
    $prom=0;
    $prom1=0;
    ?>
@foreach ($tableFacturas as $key => $value)
    <?php

        $subtot=($value->totals);
        $tot=$tot+$subtot;
    ?>
        @foreach ($tableVentas as $key => $val)
            @if ($val->id_facturas == $value->id) 
                <?php
                $gan=($val->TableProductos->Difererencia*$val->cantidad);
                $gant=$gant+$gan;
    ?>
            
        @endif

        @endforeach

    <?php

        $prom=($gant*100)/$tot;
        $prom1=round($prom*100)/100;
    ?>

    
    @endforeach
    
    Ventas realizadas: ${{$tot}}<br>
    Ganancias del periodo: ${{$gant}}<br><br>
    Porcentaje de ganancia: {{$prom1}} %<br>





 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

@endsection
