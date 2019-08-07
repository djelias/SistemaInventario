@extends ('layouts.app')
@section('content')
  <div class="row">
    <div class ="col-sm-12">
      <div class="full.right">
      <h2>Proveedores</h2>
      <br>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif
   @if ($message = Session::get('danger'))
      <div class="alert alert-danger">
          <p>{{ $message }}</p>
      </div>
  @endif
      <div>
        {!! Form::open(['route'=>'control.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
            {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
        </div>
         <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
        {!! Form::close()!!}
      </div>
      <br>

<?php 
$subtotalp=0;
$totalp=0;
$subtotala=0;
$totala=0;
$final=0; ?>

@foreach($total as $totalt)
<?php

        $subtotalp=$totalt->pago;
        $totalp=$totalp+$subtotalp;

        $subtotala=$totalt->abono;
        $totala=$totala+$subtotala;
    
   $final=$totalp-$totala;

    ?>
          @endforeach

    Total a pagar {{$final}}
  <table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Nombre proveedor</th>
      <th style="text-align:center">Detalle</th>
    </tr>
    <?php $no=1;
    $cli=0;
    ?>
    @foreach($control as $contr)
    <tr>
      <td>{{$no++}}</td>
        <td>
          @foreach ($cliente as $key => $value)
          @if($value->id == $contr->id_proveedor)
          <?php
            $cli=$value->id;
          ?>
          {{ $value->Nombre_Cliente}} {{ $value->Apellido_Cliente}}
          @endif
          @endforeach
        </td>
        
        <td>
          <a class="btn btn-info btn-lg" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('control.show',$cli)}}">
              <i class="glyphicon glyphicon-list-alt"></i></a>
        </td>
      </tr>
    @endforeach
  </table>
 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>
@endsection


  