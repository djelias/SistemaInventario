@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de la deuda</h3>
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
            <h3 > Deuda total </h3>
            <br>
        </div>
    </div>
</div>

<?php
    $subtotalc=0; 
    $totalc=0;
    
    $subtotalc2=0; 
    $totalc2=0; 
    ?>
@foreach ($tableFacturasc as $key => $value)
@if($value->estado =="Pendiente")
    <?php

        $subtotalc=($value->totals);
        $totalc=$totalc+$subtotalc;
    
    ?>
    @endif
    @endforeach
    Total a pagar: ${{$totalc}}<br>
   <br>
 <table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Nombre proveedor</th>
      <th style="text-align:center">Estado</th>
      <th style="text-align:center">Numero de factura</th>
      <th style="text-align:center">Fecha</th>
      <th style="text-align:center">Valor Factura</th>
      <th style="text-align:center">Total Proveedor</th>
      <th style="text-align:center">Accion</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($tableFacturasc as $key => $value)
    @if($value->estado =="Pendiente")
    <?php

    $subtotalc1=0; 
    $totalc1=0;
    
    ?>
    @foreach ($tableFacturasc as $key => $valor)
    @if($valor->estado =="Pendiente")
    @if($value->id_proveedor == $valor->id_proveedor)
    <?php

        $subtotalc1=($valor->totals);
        $totalc1=$totalc1+$subtotalc1;
    
    ?>
    @endif
    @endif
    @endforeach
    <tr>
    <td>{{$no++}}</td>
        <td>{{ $value->TableCliente->Nombre_Cliente }} {{ $value->TableCliente->Apellido_Cliente }}</td>
        <td>{{ $value->estado }}</td>
        <td>{{ $value->notaEnvio }}</td>
        <td>{{ $value->fecha }}</td>
        <td>{{ $value->totals }}</td>
        <td>{{ $totalc1 }}</td>
        <td>
            {!! Form::open(['method' => 'DELETE','route' => ['tableCompras.destroy', $value->id],'style'=>'display:inline']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Pagado" style="display: inline;" class="btn btn-primary btn-lg" onclick="return confirm('¿Seleccione Aceptar si la factura ha sido cancelada?')"><i class="glyphicon glyphicon-pencil" ></i></button>
            {!! Form::close() !!}
        </td>
      </tr>
    
    @endif
    @endforeach
  </table>

 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

@endsection
