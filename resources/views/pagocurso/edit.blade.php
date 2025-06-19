@extends('adminlte::page')

@section('content')

<div class="container">

    <form action="{{ url('/pagocurso/'.$pagocurso->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}    
        @include('pagocurso.form',['modo'=>'Pago'])
    </form>

</div>
@endsection