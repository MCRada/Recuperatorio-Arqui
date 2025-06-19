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
    <h2>EVENTO</h2>
    <br>

<a href="{{url('curso/create')}}" class="btn btn-success">Registrar Nuevo Evento</a>
    <br>
    <br>


<table class="table table-light">
        <thead>
            <tr>
                <td>#</td>
                <!-- <td>Foto</td> -->
                <td>Codigo</td>
                <th>Nombre Evento</th>
                <th>Fecha</th>
                <th>Costo boleto</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($curso as $ma)
            <tr>
                <td>{{$ma->id}}</td>
                <!-- <td><img class ="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$ma->Foto }}" width="100" alt=""> </td> -->
                <td>{{$ma->Cod_curso}}</td>
                <td>{{$ma->Nombre}}</td>
                <td>{{$ma->Duracion}}</td>
                <td>{{$ma->Costo}}</td>
                <td>{{$ma->id_categoria}}</td>
     
                <td> 
                    <a href="{{url('/curso/'.$ma->id.'/edit')}}" class="btn btn-warning">
                        Editar 
                    </a> 
                    |
                    <form action="{{url('/curso/'.$ma->id)}}" method="post" class="d-inline">
                        @csrf
                        {{method_field('DELETE')}}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('Quieres borrar')" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $curso->links(); }}

</div>

@endsection
