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
        <div class="input-group col-12">
            <div class="col-sm-3">
            {!! Form::date('fechainicial', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}</div>
            
        </div>
         <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
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

    
    @endforeach
    
    Ventas realizadas: ${{$tot}}<br>
    Ganancias del dia: ${{$gant}}<br>

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

<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de las Compras</h3>
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
    <?php

        $subtotalc=($value->preciocompraProductos*$value->cantidad);
        $totalc=$totalc+$subtotalc;
        $subtotalc1=($value->preciosProductos*$value->cantidad);
        $totalc1=$totalc1+$subtotalc1;
        $subtotalc2=($value->Difererencia*$value->cantidad);
        $totalc2=$totalc2+$subtotalc2;
    
    ?>
    @endforeach
    Compras realizadas: ${{$totalc}}<br>
    Ventas esperadas: ${{$totalc1}}<br>
    Ganancia al vender: ${{$totalc2}}<br>

 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

@endsection
