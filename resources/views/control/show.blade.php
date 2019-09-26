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
</div>

<table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Numero de factura</th>
      <th style="text-align:center">Fecha</th>
      <th style="text-align:center">Monto factura</th>
      <th style="text-align:center">Factura pagada</th>
      <th style="text-align:center">Monto de abono</th>
      <th style="text-align:center">Realizar abono</th>
    </tr>
    <?php $no=1; 
    $subtotal=0; 
    $total=0;
    $subtotala=0; 
    $totala=0;
    $final=0;
    $sum=0;
    $sumt=0;
    ?>
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
        <td><?php
                $date = date_create($value->fecha);
                echo date_format($date, 'd-m-Y');
            ?></td>
        <td>{{ $value->pago }}</td>
        <td>{{ $value->pertenece }}</td>
        <td>{{ $value->abono }}</td>
        <td>
            @if($value->factura != NULL)

            @foreach ($registros as $key => $value2)
            @if($value2->pertenece == $value->factura)

            <?php

        $sum=($value2->abono);
        $sumt=$sumt+$sum;
   
            ?>
        @endif
    @endforeach

            @if($value->pago == $sumt)

            Cancelada
        @else


          <a class="btn btn-info btn-lg" data-toggle="tooltip" data-placement="top" title="Abono" href="{{route('control.abono', [$tableFacturasc->id, "idf" => $value->id])}}">
              <i class="glyphicon glyphicon-usd"></i></a>
        @endif

        @endif
        </td>
      </tr>
    @endforeach
  </table>

    <?php

        $final=$total-$totala;

    ?>

    Cantidad total a pagar {{$final}}

 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

@endsection
