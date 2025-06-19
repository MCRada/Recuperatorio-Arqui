@extends('adminlte::page')

@section('content')

<div class="container">

    <form action="{{ url('/adquirircurso/'.$adquirircurso->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}    
        @include('adquirircurso.formedit',['modo'=>'Editar'])
    </form>

</div>
@endsection