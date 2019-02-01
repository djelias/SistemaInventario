@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/gestion') }}">MENU</a>
  </div>
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Base de datos<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('tableCliente.index') }}">Clientes </a></li>
          <li><a href="{{ route('tableProductos.index') }}">Productos </a></li>
          <li><a href="">Usuarios </a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Ventas<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('tableVentas.index') }}">Venta </a></li>
        </ul>
      </li>
    </ul>
     <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Compras<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('tableCompras.index') }}">Compra </a></li>
        </ul>
      </li>
    </ul>
 </nav>

 
         <br>
            <div class="content">
                    <h3>La ferre</h3>
                </div>
                <div class="text-center">
                    <br>
                    <br>
                    <img src="{{URL::asset('/img/logo.jpg')}}" alt="profile Pic" height="100" width="100">
                </div>
            </div>

@endsection

