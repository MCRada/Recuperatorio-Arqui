@extends('adminlte::page')

@section('content')

<div class="container">

    <form action="{{url('/categoria')}}" method="post" encrype="multipart/form-data">
        @csrf
        @include('categoria.form', ['modo'=>'Crear'])
    </form>

</div>
@endsection