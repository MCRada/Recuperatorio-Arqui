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
    <h2>CATEGORIA</h2>
    <br>

        <a href="{{url('categoria/create')}}" class="btn btn-success">Registrar Nuevo Categoria</a>
    <br>
    <br>


<table class="table table-light">
        <thead>
            <tr>
                <td>#</td>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categoria as $ma)
            <tr>
                <td>{{$ma->id}}</td>
                <td>{{$ma->Nombre}}</td>
     
                <td> 
                    <a href="{{url('/categoria/'.$ma->id.'/edit')}}" class="btn btn-warning">
                        Editar 
                    </a> 
                    <!-- |
                    <form action="{{url('/categoria/'.$ma->id)}}" method="post" class="d-inline">
                        @csrf
                        {{method_field('DELETE')}}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('Quieres borrar')" value="Borrar">
                    </form> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categoria->links(); }}

</div>

@endsection
