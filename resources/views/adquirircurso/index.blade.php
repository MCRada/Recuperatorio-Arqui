@extends('adminlte::page')

@section('content')
<div class="container">


@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('mensaje')}}
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <br>
    <h2>ADQUIRIR BOLETOS</h2>
    <br>

<a href="{{url('adquirircurso/create')}}" class="btn btn-success">Registrar</a>
    <br>
    <br>


<table class="table table-light">
        <thead>
            <tr>
                <td>#</td>
                <th>Cod Curso</th>
                <th>Nombre Curso</th>
                <th>Nombre Estudiante</th>
                <th>Cedula Identidad</th>
                <th>Fecha</th>
                <th>Estado Adquirido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adquirircurso as $ma)
            <tr>
                <td>{{$ma->id}}</td>
                <td>{{$ma->Cod_curso}}</td>
                <td>{{$ma->nombrecurso}}</td>
                <td>{{$ma->nombreestudiante}} {{$ma->ApellidoPaterno}} {{$ma->ApellidoMaterno}}</td>
                <td>{{$ma->CedulaIdentidad}}</td>
                <td>{{$ma->fecha}}</td>
                <td>{{$ma->estado_adquirircurso}}</td>
     
                <td> 
                    <a href="{{url('/adquirircurso/'.$ma->id.'/edit')}}" class="btn btn-warning">
                        Editar 
                    </a> 
                    <a href="{{url('/pagocurso/'.$ma->id.'/edit')}}" class="btn btn-success">
                        Pago 
                    </a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $adquirircurso->links(); }}

</div>

@endsection
