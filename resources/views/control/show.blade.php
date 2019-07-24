@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Detalle del proveedor {{$tableFacturasc->Nombre_Cliente}}</h3>
            <br>
        </div>
    </div>
</div>

<table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Nombre proveedor</th>
      <th style="text-align:center">Estado</th>
      <th style="text-align:center">Numero de factura</th>
      <th style="text-align:center">Fecha</th>
      <th style="text-align:center">Valor Factura</th>
      <th style="text-align:center">Accion</th>
    </tr>
    <?php $no=1; ?>
@foreach ($tableFac as $key => $value)
@if($value->id_proveedor==$tableFacturasc->id)
    @if($value->estado =="Pendiente")
<tr>
    <td>{{$no++}}</td>
        <td>{{ $value->TableCliente->Nombre_Cliente }} {{ $value->TableCliente->Apellido_Cliente }}</td>
        <td>{{ $value->estado }}</td>
        <td>{{ $value->notaEnvio }}</td>
        <td>{{ $value->fecha }}</td>
        <td>{{ $value->totals }}</td>
        <td>
            {!! Form::open(['method' => 'DELETE','route' => ['control.destroy', $value->id],'style'=>'display:inline']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Pagado" style="display: inline;" class="btn btn-primary btn-lg" onclick="return confirm('¿Seleccione Aceptar si la factura ha sido cancelada?')"><i class="glyphicon glyphicon-pencil" ></i></button>
            {!! Form::close() !!}
        </td>
      </tr>
    
    @endif
    @endif
    @endforeach
  </table>
 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

@endsection
