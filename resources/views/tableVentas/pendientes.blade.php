@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Notas de envio pendientes de pago</h3>
            <br>
        </div>
    </div>
</div>

{!! Form::open(['route'=>['tableVentas.pendientes'], 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="col-lg-12 margin-tb">
           <div class="row">
    <div>
      {!! form::label('Fecha ') !!}
    </div>
     <div>
      <i>{{ Form::date('fechab',NULL, ['class'=>'form-control','id'=>'fechab']) }} </i> 
      <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
  </div>
      </div>
            
        </div>
         
        {!! Form::close()!!}


    <div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > En blanco</h3>
            <br>
        </div>
    </div>
</div>
  <table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Nombre cliente</th>
      <th style="text-align:center">Numero de nota</th>
      <th style="text-align:center">Fecha</th>
      <th style="text-align:center">Estado</th>
      <th style="text-align:center">Accion</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($tableFacturas as $key => $value)
    @if($value->estado == 'Pendiente')
    <tr>
        <td>{{$no++}}</td>
        <td>
            @foreach ($tableCliente as $key => $value2)
            @if($value2->id == $value->cliente)
            {{ $value2->Nombre_Cliente }}
             @endif
    @endforeach
        </td>
        <td>{{ $value->notaEnvio }}</td>
        <td><?php
                $date = date_create($value->fecha);
                echo date_format($date, 'd-m-Y');
            ?></td>
        <td>{{ $value->estado }}</td>
        <td><a class="btn btn-info btn-lg" data-toggle="tooltip" data-placement="top" title="Cancelar" href="{{route('tableVentas.cancelar', [$value->id])}}">
              <i class="glyphicon glyphicon-usd"></i></a></td>
      </tr>
      @endif
    @endforeach
  </table>

 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

@endsection
