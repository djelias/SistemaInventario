@extends ('layouts.app')
@section('content')
  <div class="row">
    <div class ="col-sm-12">
      <div class="full.right">
      <h2>GESTION DE USUARIOS</h2>
      <br>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif
  <div>
    <a href="{{ url('/register') }}" class="btn btn-success btn-lg">
            <i class="glyphicon glyphicon-plus"> NUEVO</i>
        </a>
        <br>
  </div>
  <br>
   <table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px" style="text-align: center">No</th>
      <th  style="text-align: center">Nombre</th>
      <th  style="text-align: center">Tipo de Usuario</th>
      <th  style="text-align: center">Email</th>
      <th  style="text-align: center">Acción</th>
      </tr>
    <?php $no=1; ?>
    @foreach ($users as $key => $value)
    <tr>
        <td>{{$no++}}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->usuario }}</td>
        <td>{{ $value->email }}</td>
        <td>
          <a class="btn btn-info btn-lg" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('usuarios.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt"></i></a>
          <a class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('usuarios.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil"></i></a>
            {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $value->id],'style'=>'display:inline']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-lg" onclick="return confirm('¿Esta seguro de eliminar este Registro?')"><i class="glyphicon glyphicon-trash" ></i></button>
            {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
  {!!$users->render()!!}
  <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>
   
@endsection

