@extends('adminlte::page')

@section('content')

<div class="container">

    <form action="{{ url('/ppagocurso/'.$pagocurso->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}    
        @include('ppagocurso.form',['modo'=>'Pago'])
    </form>

</div>
@endsection