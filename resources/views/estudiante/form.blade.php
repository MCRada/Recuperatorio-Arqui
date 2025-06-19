    <br>
    <h1>{{$modo}} Cliente</h1>

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

        <div class="col-lg-12">
            <div class="form-group">
                <label class="fw-bold" for="Nombre">Nombre</label>
                <input type="text" class="form-control" name ="Nombre" id ="Nombre" placeholder="Nombre Cliente" value="{{isset($estudiante->Nombre)?$estudiante->Nombre:old('Nombre')}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="fw-bold" for="ApellidoP">Apellido Paterno</label>
                <input type="text" class="form-control" name ="ApellidoPaterno" id ="ApellidoPaterno" placeholder="Apellido Paterno" value="{{isset($estudiante->ApellidoPaterno)?$estudiante->ApellidoPaterno:old('ApellidoPaterno')}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="fw-bold" for="ApellidoM">Apellido Materno</label>
                <input type="text" class="form-control" name ="ApellidoMaterno" id ="ApellidoMaterno" placeholder="Apellido Materno" value="{{isset($estudiante->ApellidoMaterno)?$estudiante->ApellidoMaterno:old('ApellidoMaterno')}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="fw-bold" for="Cedula">Cedula de Identidad</label>
                <input type="number" class="form-control" name ="CedulaIdentidad" id ="CedulaIdentidad" placeholder="########" value="{{isset($estudiante->CedulaIdentidad)?$estudiante->CedulaIdentidad:old('CedulaIdentidad')}}">
            </div>
        </div>
        <div class="col-lg-6">      
            <div class="form-group">
                <label class="fw-bold" for="Telefono">Telefono/Celular</label>
                <input type="number" class="form-control" name ="TelefonoCel" id ="TelefonoCel" placeholder="########" value="{{isset($estudiante->TelefonoCel)?$estudiante->TelefonoCel:old('TelefonoCel')}}">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label class="fw-bold" for="Direccion">Dirección</label>
                <textarea class="form-control" name="Direccion" id="Direccion" cols="10" rows="5" placeholder="Direccion">{{isset($estudiante->Direccion)?$estudiante->Direccion:old('Direccion')}}</textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label class="fw-bold" for="Email">Email</label>
                <input type="text" class="form-control" name ="Email" id ="Email" placeholder="Correo Electronico" value="{{isset($estudiante->Email)?$estudiante->Email:old('Email')}}">
            </div>
        </div>
    </div>
    <br>

    <input class="btn btn-success" type="submit" value="{{$modo}} datos">


<a href="{{url('estudiante')}}" class="btn btn-success">Regresar</a>


<br>
<br>