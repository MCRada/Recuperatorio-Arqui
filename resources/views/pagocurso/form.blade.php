
    <br>
    <h1>{{$modo}} Boletos A Adquirir Para Evento</h1>

    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <br>
    <div class="row">    
        <input type="hidden" class="form-control" id="id_adquirircurso" name="id_adquirircurso" autocomplete="off" value="{{isset($pagocurso->id)?$pagocurso->id:old('id')}}">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ApellidoM">Monto</label>
                <input type="number" class="form-control" id="monto" name="monto" autocomplete="off" value="{{isset($pagocurso->monto)?$pagocurso->monto:old('monto')}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="fw-bold" for="Nombre">Estado Pago</label>
                <select  elect class="form-control" name="estado_pagocurso" id="estado_pagocurso" class="custom-select selector">
                        <option value="cancelado" selected>Cancelado</option>
                        <option value="pendiente" selected>Pendiente</option>
                </select> 
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ApellidoM">Fecha Pago</label>
                <input type="date" class="form-control" name="fecha" id="fecha" autocomplete="off">
            </div>
        </div>
    </div>


    <br>
    <hr>    
    <input class="btn btn-success" type="submit" value="{{$modo}} datos">
    <a href="{{url('adquirircurso')}}" class="btn btn-success">Regresar</a>


<br>
<br>
