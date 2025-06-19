@extends('adminlte::page')

@section('content')

<div class="container">

    <form action="{{ url('/curso/'.$curso->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}    
        @include('cursos.form',['modo'=>'Editar'])

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>

</div>
@endsection
