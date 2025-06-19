    <br>
    <h1>{{$modo}} Categoria</h1>

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
                <input type="text" class="form-control" name ="Nombre" id ="Nombre_categoria" placeholder="Nombre Categoria" value="{{isset($categoria->Nombre)?$categoria->Nombre:old('Nombre')}}">
            </div>
        </div>
    </div>
    <br>

    <input class="btn btn-success" type="submit" value="{{$modo}} datos">


<a href="{{url('categoria')}}" class="btn btn-success">Regresar</a>


<br>
<br>