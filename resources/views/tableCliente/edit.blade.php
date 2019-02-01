@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de clientes</h3>
    	<br>
      {{ Form::model($tableClientes,['route'=>['tableCliente.update',$tableClientes->id],'method'=>'PATCH']) }}
      @include('tableCliente.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection