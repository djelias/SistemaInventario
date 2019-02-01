@extends('layouts.app2')

@section('content')


			
      {{ Form::open(['route'=>'tableCompras.store', 'method'=>'POST']) }}
				<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
				
				<h3>Nueva compra
				</h3>

				<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="id_proveedor">Proveedor</label>
						<i><datalist name="id_proveedor" id="id_proveedor">
							@foreach($personas as $per)
							<option value="{{ $per->id }}">
								{{ $per->Nombre_Cliente }}
							</option>
							@endforeach
						</datalist></i> 
						<i>{{ Form::text('id_proveedor',NULL, ['class'=>'form-control', 'id'=>'id_proveedor', 'list'=>'id_proveedor', 'placeholder'=>'Nombre del proveedor...']) }}</i> 
					</div>
				</div><!-- fin col-md-3 -->
				<div class="col-md-3">
					<div class="form-group">
						<label for="estado">Estado</label>
						<select name="estado" class="form-control">
							<option value="Cancelado">Cancelado</option>
							<option value="Pendiente">Pendiente</option>
						</select> 
					</div>
				</div><!-- fin col-md-3 -->
				<div class="col-md-3">
					<div class="form-group">
						<label for="fecha">Fecha</label>
						<input type="date" name="fecha" class="form-control" placeholder="Fecha" value="{{ old('fecha') }}">
					</div>
				</div><!-- fin col-md-3 -->
				<div class="col-md-3">
					<div class="form-group">
						<label for="notaEnvio">Nota de envio</label>
						<input type="text" name="notaEnvio" class="form-control" placeholder="Numero de nota" value="{{ old('notaEnvio') }}">
					</div>
				</div><!-- fin col-md-3 -->
				</div><!-- fin row cabecera -->

				<div class="row">
					<div class="panel panel-body panel-primary">
						<div class="col-md-4">
							<div class="form-group">
								<label for="producto">Producto</label>
							<select name="Productos" id="Productos" class="form-control selectpicker" data-live-search="true">
									@foreach($productos as $art)
									<option value="{{ $art->id }}">
										{{ $art->nombreProductos }}
										<?php 
										$prec = $art->preciosProductos;
										 ?>
									</option>
									@endforeach
							</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="pcantidad">Cantidad</label>
								<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="pprecio_venta">Precio venta</label>
								<input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="{{$prec}}" step="0.01" value="$prec">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<button type="button" id="bt_add" class="btn btn-primary">
									Agregar
								</button>
							</div>
						</div>
						
						<div class="col-md-12">
							<table id="detalles" class="table table-striped table-bordered table-hover table-condensed" style="margin-top: 10px">
								<thead style="background-color: #A9D0F5">
									<th>Opciones</th>
									<th>Artículo</th>
									<th>Cantidad</th>
									<th>Precio Venta</th>
									<th>Subtotal</th>
								</thead>
								<tfoot>
									<th>Total</th>
									<th></th>
									<th></th>
									<th></th>
									<th><h4 id="totals">0.00</h4></th>
								</tfoot>
								<tbody>
									
								</tbody>
							</table>
						</div>

					</div><!-- panel-body -->
				</div><!-- fin row detalle -->
				
				<div class="row">
				<div class="col-md-12" id="guardar">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">
							Guardar
						</button>
					</div>
				</div>
				</div><!-- fin row buttons -->
      {{ form::close() }}

@push('scripts')
<script>
	
	$(document).ready(function(){
		$("#bt_add").click(function(){
			agregar();
		});
	});

	var cont = 0;
	var totals = 0;
	var subtotal = [];

	//Cuando cargue el documento
	//Ocultar el botón Guardar
	$("#guardar").hide();

	function agregar(){
		//Obtener los valores de los inputs
		Productos = $("#Productos").val();
		producto = $("#Productos option:selected").text();
		cantidad = $("#pcantidad").val();
		precio_venta = $("#pprecio_venta").val();

		//Validar los campos
		if(Productos != "" && cantidad > 0 && precio_venta != ""){

			//subtotal array inicie en el indice cero
			subtotal[cont] = (cantidad * precio_venta);
			totals = totals + subtotal[cont];

			var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="Productos[]" value="'+Productos+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';

			cont++;
			limpiar();
			$("#totals").html("$" + totals);
			evaluar();
			$("#detalles").append(fila);
		}else{
			alert("Error al ingresar el detalle del ingreso, revise los datos del artículo");
		}
	}

	function limpiar(){
		$("#pcantidad").val("");
		$("#pprecio_venta").val("");
	}

	//Muestra botón guardar
	function evaluar(){
		if(totals > 0){
			$("#guardar").show();
		}else{
			$("#guardar").hide();
		}
	}

	function eliminar(index){
		totals = totals-subtotal[index];
		$("#totals").html("$" + totals);
		$("#fila" + index).remove();
		evaluar();
	}

	$(document).ready(function() {

var data = {}; 
$("#cliente option").each(function(i,el) {  
   data[$(el).data("value")] = $(el).val();
});
// `data` : object of `data-value` : `value`
console.log(data, $("#cliente option").val());


    $('#submit').click(function()
    {
        var value = $('#selected').val();
        alert($('#cliente [value="' + value + '"]').data('value'));
    });
});
</script>
@endpush
@endsection