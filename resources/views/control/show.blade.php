@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Detalle del proveedor {{$tableFacturasc->Nombre_Cliente}}</h3>
        </div>
    </div>
</div>

<div>
        <a href="{{route('control.factura',$tableFacturasc->id)}}" class="btn btn-success btn-lg">
            <i class="glyphicon glyphicon-plus">Agregar factura</i>
        </a>
        <a href="{{route('control.abono',$tableFacturasc->id)}}" class="btn btn-success btn-lg">
            <i class="glyphicon glyphicon-plus">Agregar pago</i>
        </a>
</div>

<table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Numero de factura</th>
      <th style="text-align:center">Fecha</th>
      <th style="text-align:center">Monto factura</th>
      <th style="text-align:center">Monto de abono</th>
    </tr>
    <?php $no=1; 
    $subtotal=0; 
    $total=0;
    $subtotala=0; 
    $totala=0;
    $final=0;?>
@foreach ($registros as $key => $value)
<?php

        $subtotal=($value->pago);
        $total=$total+$subtotal;

        $subtotala=($value->abono);
        $totala=$totala+$subtotala;
    
    ?>
<tr>
    <td>{{$no++}}</td>
        <td>{{ $value->factura }}</td>
        <td>{{ $value->fecha }}</td>
        <td>{{ $value->pago }}</td>
        <td>{{ $value->abono }}</td>
      </tr>
    @endforeach
  </table>

    <?php

        $final=$total-$totala;

    ?>

    Cantidad a pagar {{$final}}

 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

@endsection
