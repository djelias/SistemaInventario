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

    <div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Ventas totales</h3>
            <br>
        </div>
    </div>
</div> 
    <?php
    $subtotal=0; 
    $total=0;
    $subtotal1=0; 
    $total1=0; 
    $subtotal2=0; 
    $total2=0; 
    ?>
    @foreach ($tableVentas as $key => $value)
    <?php
       
        $subtotal=($value->TableProductos->preciocompraProductos*$value->cantidad);
        $total=$total+$subtotal;
        $subtotal1=($value->TableProductos->preciosProductos*$value->cantidad);
        $total1=$total1+$subtotal1;
        $subtotal2=($value->TableProductos->Difererencia*$value->cantidad);
        $total2=$total2+$subtotal2;

    ?>
    @endforeach
    Ventas Totales: ${{$total}}<br>
    Ventas Totales: ${{$total1}}<br>
    Ventas Ganancias: ${{$total2}}<br>

<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de los productos</h3>
            <br>
        </div>
    </div>
</div>

<?php
    $subtotalp=0; 
    $totalp=0;
    $subtotalp1=0; 
    $totalp1=0;
    $subtotalp2=0; 
    $totalp2=0; 
    ?>
@foreach ($tableProductos as $key => $value)
    <?php
    if ($value->cantidadProductos>0) {
       
        $subtotalp=($value->preciocompraProductos*$value->cantidadProductos);
        $totalp=$totalp+$subtotalp;
        $subtotalp1=($value->preciosProductos*$value->cantidadProductos);
        $totalp1=$totalp1+$subtotalp1;
        $subtotalp2=($value->Difererencia*$value->cantidadProductos);
        $totalp2=$totalp2+$subtotalp2;
    }
    ?>
    @endforeach
    Dinero invertido: ${{$totalp}}<br>
    Dinero a ingresar: ${{$totalp1}}<br>
    Ganancias totales: ${{$totalp2}}<br>



 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

@endsection
