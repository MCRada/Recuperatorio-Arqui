<br>
<h1>{{$modo}} Evento</h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">

    <div class="col-lg-6">
        <div class="form-group">
            <label class="fw-bold" for="Nombre">Nombre</label>
            <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre Evento" value="{{isset($curso->Nombre)?$curso->Nombre:old('Nombre')}}">
        </div>

        <div class="form-group">
            <label class="fw-bold" for="Duracion">Fecha</label>
            <input type="text" class="form-control" name="Duracion" id="Duracion" placeholder="Fecha Evento" value="{{isset($curso->Duracion)?$curso->Duracion:old('Duracion')}}">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label class="fw-bold" for="Cantidad">Cantidad de Boletos</label>
            <input type="text" class="form-control" name="Cantidad" id="Cantidad" placeholder="Cantidad de Boletos" value="{{isset($curso->Cantidad)?$curso->Cantidad:old('Cantidad')}}">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label class="fw-bold" for="Costo">Costo boleto</label>
            <input type="number" class="form-control" name="Costo" id="Costo" placeholder="Costo" value="{{isset($curso->Costo)?$curso->Costo:old('Costo')}}">
        </div>

        <div class="form-group">
            <label class="fw-bold" for="Categoria">Categoria</label>
            <select class="form-control" name="id_categoria" id="id_categoria">
                @foreach($tipocategoria as $ser)
                    <option value="{{ $ser->id }}" 
                        {{ (isset($curso->id_categoria) && $curso->id_categoria == $ser->id) ? 'selected' : '' }}>
                        {{ $ser->Nombre }}
                    </option>
                @endforeach
            </select> 
        </div>
    </div>

</div>

<br>

<!-- Botón fijo -->
<input class="btn btn-success" type="submit" value="{{$modo}} datos">
<a href="{{url('curso')}}" class="btn btn-success">Regresar</a>
