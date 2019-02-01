   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Nombre') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('Nombre_Cliente') ? 'has-error' : "" }}">
       <i>{{ Form::text('Nombre_Cliente',NULL, ['class'=>'form-control','id'=>'Nombre_Cliente','placeholder'=>'nombre']) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('Nombre_Cliente', 'Ingrese nombre correctamente') }}</strong>
      </div>
    </div>
  </div>
      </div>
   
      <div class="row">
    <div class="col-sm-3">
      {!! form::label('Apellido') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('Apellido_Cliente') ? 'has-error' : "" }}">
       <i>{{ Form::text('Apellido_Cliente',NULL, ['class'=>'form-control','id'=>'Apellido_Cliente','placeholder'=>'apellido']) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('Apellido_Cliente', 'Ingrese apellido correctamente') }}</strong>
      </div>
    </div>
  </div>
      </div>

  <div class="row">
    <div class="col-sm-3">
      {!! form::label('razon_s_Cliente','Razon social') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('razon_s_Cliente') ? 'has-error' : "" }}">
       <i>{{ Form::text('razon_s_Cliente',NULL, ['class'=>'form-control', 'id'=>'razon_s_Cliente', 'placeholder'=>'xxxxxxx']) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('razon_s_Cliente', 'Ingrese Escalafón correctamente') }}</strong>
      </div>
    </div>
    </div>
   </div>

    <div class="row">
    <div class="col-sm-3">
      {!! form::label('direccion_Cliente','Direccion del cliente') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('direccion_Cliente') ? 'has-error' : "" }}">
       <i>{{ Form::text('direccion_Cliente',NULL, ['class'=>'form-control', 'id'=>'direccion_Cliente', 'placeholder'=>'direccion']) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('direccion_Cliente', 'Ingrese Escalafón correctamente') }}</strong>
      </div>
    </div>
    </div>
   </div>   

   <div class="row">
    <div class="col-sm-3">
      {!! form::label('telefono_Cliente','Teléfono') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('telefono_Cliente') ? 'has-error' : "" }}">
       <i>{{ Form::text('telefono_Cliente',NULL, ['class'=>'form-control', 'id'=>'telefono_Cliente', 'placeholder'=>'xxxxxxxx','maxlength' => 8]) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('telefono_Cliente', 'Ingrese Teléfono correctamente') }}</strong>
      </div>
    </div>
  </div>
      </div>

   <div class="row">
    <div class="col-sm-3">
      {!! form::label('email','Correo') !!}
    </div>
    <div class="col-sm-8">
    <div class="form-group {{ $errors->has('email') ? 'has-error' : "" }}">
      <i>{{Form :: text ('email', NULL, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'Correo'])}}</i>
        <div class="help-block"> 
          <strong>{{ $errors->first('email', 'Ingrese correo correctamente') }}</strong>
    </div>
    </div>
    </div>
 
    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('tableCliente.index') }}">Cancelar</a>
    </div>

    <!--Script para Colocar guion automatico en numero de DUI-->
