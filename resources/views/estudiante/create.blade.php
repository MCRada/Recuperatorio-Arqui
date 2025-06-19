@extends('adminlte::page')

@section('content')

<div class="container">

    <form action="{{url('/estudiante')}}" method="post" encrype="multipart/form-data">
        @csrf
        @include('estudiante.form', ['modo'=>'Crear'])
    </form>

</div>
@endsection