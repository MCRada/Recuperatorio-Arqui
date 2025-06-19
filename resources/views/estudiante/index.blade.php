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
    <h2>CLIENTE</h2>
    <br>

        <a href="{{url('estudiante/create')}}" class="btn btn-success">Registrar Nuevo Cliente</a>
    <br>
    <br>


<table class="table table-light">
        <thead>
            <tr>
                <td>#</td>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Cedula Identidad</th>
                <th>Direccion</th> 
                <th># Celular</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiante as $ma)
            <tr>
                <td>{{$ma->id}}</td>
                <td>{{$ma->Nombre}}</td>
                <td>{{$ma->ApellidoPaterno}}</td>
                <td>{{$ma->ApellidoMaterno}}</td>
                <td>{{$ma->CedulaIdentidad}}</td>
                <td>{{$ma->Direccion}}</td>
                <td>{{$ma->TelefonoCel}}</td>
                <td>{{$ma->Email}}</td>
     
                <td> 
                    <a href="{{url('/estudiante/'.$ma->id.'/edit')}}" class="btn btn-warning">
                        Editar 
                    </a> 
                    |
                    <form action="{{url('/estudiante/'.$ma->id)}}" method="post" class="d-inline">
                        @csrf
                        {{method_field('DELETE')}}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('Quieres borrar')" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $estudiante->links(); }}

</div>

@endsection
