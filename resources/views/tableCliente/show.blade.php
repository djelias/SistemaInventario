@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos del cliente</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre : </strong>
            {{ $tableClient->Nombre_Cliente}} {{ $tableClient->Apellido_Cliente}}
        </div>
    </div>
  
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Razon social: </strong>
            {{ $tableClient->razon_s_Cliente}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Direccion: </strong>
            {{ $tableClient->direccion_Cliente}}
        </div>
    </div>

<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Telefono: </strong>
            {{ $tableClient->telefono_Cliente}}
        </div>
    </div>

<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Correo: </strong>
            {{ $tableClient->correo_Cliente}}
        </div>
    </div>

    </div>
            <br/>
            <a class="btn btn-primary" href="{{ route('tableCliente.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    </div>

@endsection
