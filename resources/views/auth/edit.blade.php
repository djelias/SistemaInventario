@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3> ACTUALIZACION DE DATOS DE USUARIO </h3>
    	<br>
      {{ Form::model($users,['route'=>['usuarios.update',$users->id],'method'=>'PATCH']) }}
      @include('auth.register')
      {{ Form::close() }}
    </div>
  </div>
@endsection