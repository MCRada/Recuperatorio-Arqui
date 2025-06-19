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
    <h2>PAGO DE BOLETOS</h2>
    <div class="float-right">
        <a href="{{ route('reporte.pdf') }}" class="btn btn-success">Generar pdf</a>
    </div>
    <br>
    <br>


<table class="table table-light">
        <thead>
            <tr>
                <td>#</td>
                <th>Nombre Evento</th>
                <th>Fecha Pago</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pagocurso as $ma)
            <tr>
                <td>{{$ma->id}}</td>
                <td>{{$ma->nombrecurso}}</td>
                <td>{{$ma->fecha}}</td>
                <td>{{$ma->monto}}</td>
                <td>{{$ma->estado_pagocurso}}</td>
                <td> 
                    <a href="{{url('/ppagocurso/'.$ma->id.'/edit')}}" class="btn btn-warning">
                        Editar 
                    </a> 
                    |
                    <a href="{{url('/reporte/'.$ma->id.'/edit')}}" class="btn btn-success">
                        PDF 
                    </a>
                    |
                    <a href="{{url('/reporte/'.$ma->id.'/enviarReporte')}}" class="btn btn-success">
                        Email
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pagocurso->links(); }}

</div>

@endsection
