@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">INGRESO</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->usuario=='Administrador')
                    Ingreso Correctamente como usuario Administrador!
                    @else
                    Ingreso Correctamente como usuario Docente!
                    @endif
                </div>
                <div class="text-center">
                        <a class="btn btn-primary" href="{{ url('/gestion') }}">Pagina Principal</a>
                </div>
                <br>
            </div>
        </div>
    </div>
   
@endsection
