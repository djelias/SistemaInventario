   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Nombre') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('nombreProductos') ? 'has-error' : "" }}">
       <i>{{ Form::text('nombreProductos',NULL, ['class'=>'form-control','id'=>'nombreProductos','placeholder'=>'nombre']) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('nombreProductos', 'Ingrese nombre correctamente') }}</strong>
      </div>
    </div>
  </div>
      </div>
   
      <div class="row">
    <div class="col-sm-3">
      {!! form::label('Precio de compra') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('preciocompraProductos') ? 'has-error' : "" }}">
       <i>{{ Form::text('preciocompraProductos',NULL, ['class'=>'form-control','id'=>'preciocompraProductos','placeholder'=>'xxx.xx', 'onkeyup'=>'cal()']) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('preciocompraProductos', 'Ingrese precio de compra correctamente') }}</strong>
      </div>
    </div>
  </div>
      </div>

  <div class="row">
    <div class="col-sm-3">
      {!! form::label('preciosProductos','Precio de venta') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('preciosProductos') ? 'has-error' : "" }}">
       <i>{{ Form::text('preciosProductos',NULL, ['class'=>'form-control', 'id'=>'preciosProductos', 'placeholder'=>'xxx.xx', 'onkeyup'=>'cal()']) }} </i> 
       

        <div class="help-block"> 
          <strong>{{ $errors->first('preciosProductos', 'Ingrese precio de venta correctamente') }}</strong>
      </div>
    </div>
    </div>
   </div>

    <div class="row">
    <div class="col-sm-3">
      {!! form::label('descripcionProductos','Descripcion del producto') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('descripcionProductos') ? 'has-error' : "" }}">
       <i>{{ Form::text('descripcionProductos',NULL, ['class'=>'form-control', 'id'=>'descripcionProductos', 'placeholder'=>'descripcion']) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('descripcionProductos', 'Ingrese descripcion correctamente') }}</strong>
      </div>
    </div>
    </div>
   </div>   

   <div class="row">
    <div class="col-sm-3">
      {!! form::label('cantidadProductos','Cantidad') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('cantidadProductos') ? 'has-error' : "" }}">
       <i>{{ Form::text('cantidadProductos',NULL, ['class'=>'form-control', 'id'=>'cantidadProductos', 'placeholder'=>'xx','maxlength' => 8]) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('cantidadProductos', 'Ingrese Teléfono correctamente') }}</strong>
      </div>
    </div>
  </div>
      </div>

 
    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('tableProductos.index') }}">Cancelar</a>
    </div>

    <!--Script para Colocar guion automatico en numero de DUI-->
<script type="text/javascript">
  function cal() {
  try {
    var a = document.f.preciosProductos.value,
        b = document.f.preciocompraProductos.value;
    document.f.resta.value = a - b;
  } catch (e) {
  }
}
</script>