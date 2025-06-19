@extends('adminlte::page')

@section('content')

<div class="container">

    <form action="{{url('/adquirircurso')}}" method="post" encrype="multipart/form-data">
        @csrf
        @include('adquirircurso.form', ['modo'=>'Crear'])
    </form>

</div>
@endsection