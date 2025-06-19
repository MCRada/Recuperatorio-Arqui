
    <br>
    <h1>{{$modo}} Curso Adquiriro</h1>

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
    <div class="app-curso row">

        <div class="col-lg-6 col-md-6">
            <h4>Seleccionar Eventos</h4>
            <input type="hidden" class="form-control" id="id_adquirircurso" name="id_adquirircurso" autocomplete="off" value="{{isset($adquirircurso->id)?$adquirircurso->id:old('id')}}">

            <div class="form-group">
                <label for="ApellidoM">Cod Curso</label>
                <input type="text" placeholder="########" class="form-control" id="codcurso" autocomplete="off" onkeyup="busca_codigoc()">
            </div>
            <section class="section" >
            <div id="codigocurso" style="padding: 0 10px 30px 10px;display: flex;flex-wrap: nowrap;overflow-x: auto;">
                    @foreach($curso as $ma)
                    <div class="frb frb-danger col-lg-6 col-md-6 col-sm-12 col-xs-12" style="display: flex;flex: 0 0 auto;margin-right: 10px;">
                        <input type="radio" id="radio-button-{{$ma->id}}" name="radio_button" value="{{$ma->id}}" required onchange="plan_producto({{$ma->id}})">
                            <label for="radio-button-{{$ma->id}}">
                                <h2>{{$ma->Nombre}}</h2>
                                <figure class="m-imagen">
                                    <img class="m-previsualizarimagen" id="txtnombrecandidato" src="" alt="">
                                </figure>
                                <p>{{$ma->Cod_curso}}</p>
                                <p><b>Duracion:</b> {{$ma->Duracion}}</p>
                                <p><b>Costo:</b> {{$ma->Costo}}</p>
                        </label>
                    </div>
                    @endforeach
                </div>
            </section>

            <div id="app-idcurso"></div>
        </div>

        <br>
        <div class="col-lg-6 col-md-6">

            <h4>Buscar Estudiante</h4>

            <div class="form-group">
                <label for="ApellidoM">Cedula Identidad</label>
                <input type="text" placeholder="########" class="form-control" id="codigo" autocomplete="off" required onkeyup="busca_codigo()">
            </div>


            <table class="table table-bordered" id="app-table-grupocarrera" style="width:100%; display: flow; overflow-x: auto;">
                <thead>  
                    <tr style=" background:#e74c3c;color:#fff;">
                        <td width="5%">#</td>
                        <td width="40%">Nombre Completo</td>
                        <td width="30%">Cedula Identidad</td>
                        <td width="15%">Tel/Cel</td>
                        <td width="10%">Accion</td>
                    </tr>
                </thead>  
                <tbody id="app-proceso">

                </tbody>
            </table>
        </div>

    </div>

    <hr>
    <hr>

    <h4>Agregados</h4>

    <table class="table table-bordered" id="app-table-grupocarrera" style="width:100%">
        <thead>  
            <tr style=" background:#e74c3c;color:#fff;">
                <td width="10%">#</td>
                <td width="25%">Codigo Evento</td>
                <td width="10%">Cod Estudiante</td>
                <td width="20%">Nombre Comprador</td>
                <td width="35%">Cedula Identidad</td>
                <td width="10%">Accion</td>
            </tr>
        </thead>  
        <tbody id="app-proceso2">
            <tr id='row{{$adquirircurso->id}}'>
                <td contenteditable="false" class="item_numeral">{{$adquirircurso->id}}</td>
                <td contenteditable="false"  class="item_peso">{{$adquirircurso->Cod_curso}}</td>   
                <td contenteditable="false" class="item_idmateria">{{$adquirircurso->id_estudiante}}
                </td>
                <td contenteditable="false" class="item_idmateria">
                    {{$adquirircurso->nombreestudiante}} {{$adquirircurso->ApellidoPaterno}} {{$adquirircurso->ApellidoMaterno}}
                </td>
                <td contenteditable="false" class="item_idmateria">{{$adquirircurso->CedulaIdentidad}}
                <td>
                    <div align="right">
                        <button type='button' name='remove' data-row="row{{$adquirircurso->id}}" class='btn btn-danger btn-ms remove-add-nuevamateria'><span class='fa fa-times'></span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <br>
    <hr>    
    <input class="btn btn-success" type="submit" value="{{$modo}} datos">
    <a href="{{url('adquirircurso')}}" class="btn btn-success">Regresar</a>


<br>
<br>


@section('css')
    @parent
    <style>

    .app-curso {
        padding: 15px!important;
        border: 1px solid #666!important;
        border-radius: 5px!important;
    }

    .frb-group {
        margin: 15px 0!important;
    }

    /* .frb ~ .frb {
        margin-top: 15px;
    } */

    .frb input[type="radio"]:empty,
    .frb input[type="checkbox"]:empty {
        display: none!important;
    }

    figure.m-imagen img{
        /* border-radius: 62%; */
        /* border: 2px dashed black; */
        border: 2px solid white!important;
        height: 100%!important;
        width: 120px!important;
        margin: 0 auto!important;
    }

    .frb input[type="radio"] ~ label:before,
    .frb input[type="checkbox"] ~ label:before {
        /* font-family: FontAwesome!important; */
        /* content: '\f096'!important; */
        position: initial!important;
        top: 50%!important;
        margin-top: 2em!important;
        left: 50%!important;
        font-size: 3em!important;
    }

    .frb input[type="radio"]:checked ~ label:before,
    .frb input[type="checkbox"]:checked ~ label:before {
        /* content: '\f046'!important; */
    }

    .frb input[type="radio"] ~ label,
    .frb input[type="checkbox"] ~ label {
        position: relative!important;
        cursor: pointer!important;
        width: 100%!important;
        border: 1px solid #e74c3c!important;
        border-radius: 5px!important;
        background-color: #f2f2f2!important;
        text-align:center!important;
        transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
        padding: 40px 20px;
    }

    .frb input[type="radio"] ~ label:focus,
    .frb input[type="radio"] ~ label:hover,
    .frb input[type="checkbox"] ~ label:focus,
    .frb input[type="checkbox"] ~ label:hover {
        box-shadow: 0px 0px 1px #e74c3c!important;
        background-color: #fff!important;


    }

    .frb input[type="radio"]:checked ~ label,
    .frb input[type="checkbox"]:checked ~ label {
        color: #fafafa!important;
    }

    .frb input[type="radio"]:checked ~ label,
    .frb input[type="checkbox"]:checked ~ label {
        background-color: #f2f2f2!important;
    }

    .frb.frb-default input[type="radio"]:checked ~ label,
    .frb.frb-default input[type="checkbox"]:checked ~ label {
        color: #333!important;
    }

    .frb.frb-primary input[type="radio"]:checked ~ label,
    .frb.frb-primary input[type="checkbox"]:checked ~ label {
        background-color: #337ab7!important;
    }

    .frb.frb-success input[type="radio"]:checked ~ label,
    .frb.frb-success input[type="checkbox"]:checked ~ label {
        background-color: #5cb85c!important;
    }

    .frb.frb-info input[type="radio"]:checked ~ label,
    .frb.frb-info input[type="checkbox"]:checked ~ label {
        background-color: #5bc0de!important;
    }

    .frb.frb-warning input[type="radio"]:checked ~ label,
    .frb.frb-warning input[type="checkbox"]:checked ~ label {
        background-color: #f0ad4e!important;
    }

    .frb.frb-danger input[type="radio"]:checked ~ label,
    .frb.frb-danger input[type="checkbox"]:checked ~ label {
        background-color: #e74c3c!important;
        
    }

    .frb input[type="radio"]:empty ~ label span,
    .frb input[type="checkbox"]:empty ~ label span {
        display: inline-block!important;
    }

    .frb input[type="radio"]:empty ~ label span.frb-title,
    .frb input[type="checkbox"]:empty ~ label span.frb-title {
        font-size: 16px!important;
        font-weight: 700!important;
        margin: 0 auto!important;
        width:100%!important;
        margin-top:10px!important;
    }

    .frb input[type="radio"]:empty ~ label span.frb-description,
    .frb input[type="checkbox"]:empty ~ label span.frb-description {
        font-weight: normal!important;
        font-style: italic!important;
        color: #999!important;
        margin: 0 auto!important;
        margin: 10px 0!important;
    }

    .frb input[type="radio"]:empty:checked ~ label span.frb-description,
    .frb input[type="checkbox"]:empty:checked ~ label span.frb-description {
        color: #fafafa!important;
    }

    .frb.frb-default input[type="radio"]:empty:checked ~ label span.frb-description,
    .frb.frb-default input[type="checkbox"]:empty:checked ~ label span.frb-description {
        color: #999!important;
    }
    </style>

@endsection



@section('js')

<script type="text/javascript">

    let arr = new Array();

    function busca_codigoc(){
        var codigo = $('#codcurso').val();
        
        var route= "{{route('curso.buscaCodigo')}}";

		$.ajax({
			url: route,           
			headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
			type: 'POST',            
			data: {"codigoc": codigo},
			success: function(data){
				console.log(data);
				if (data!='FALSE') {
					console.log('encontro');
                    var html_code='';
                        html_code +="<div class='frb frb-danger col-lg-6 col-md-6 col-sm-12 col-xs-12' style='display: flex;flex: 0 0 auto;margin-right: 10px;'>"+
                                        "<input type='radio' id='radio-button-"+data.id+"' name='radio_button' value='"+data.id+"' required onchange='plan_producto("+data.id+")'>"+
                                            "<label for='radio-button-"+data.id+"'>"+
                                                "<h2>"+data.Nombre+"</h2>"+
                                                "<figure class='m-imagen'>"+
                                                    "<img class='m-previsualizarimagen' id='txtnombrecandidato' src='' alt=''>"+
                                                "</figure>"+
                                                "<p>"+data.Cod_curso+"</p>"+
                                                "<p><b>Duracion:</b> "+data.Duracion+"</p>"+
                                                "<p><b>Costo:</b> "+data.Costo+"</p>"+
                                        "</label>"+
                                    "</div>";
                    $('#codigocurso').html(html_code);

				}else{
					console.log('nada');
				}				
			},
			error: function(data){
				console.log(data);
			}
		})
	}

    function busca_codigo(){
        var codigo = $('#codigo').val();
        
        var route= "{{route('estudiante.buscaEstudiante')}}";

		$.ajax({
			url: route,           
			headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
			type: 'POST',            
			data: {"codigoc": codigo},
			success: function(data){
				console.log(data);
				if (data!='FALSE') {
					console.log('encontro');
                    var html_code='';
                    html_code +="<tr id='row"+data.CedulaIdentidad+"'>";
                        html_code +="<td contenteditable='false'>"+data.id+"</td>";
                        html_code +="<td contenteditable='false'>"+data.Nombre+' '+data.ApellidoPaterno+' '+data.ApellidoMaterno+"</td>";
                        html_code +="<td contenteditable='false'>"+data.CedulaIdentidad+"</td>";
                        html_code +="<td contenteditable='false'>"+data.TelefonoCel+"</td>";
                        html_code +="<td><button type='button' name='remove' data-row='row"+data.id+"' class='btn btn-success btn-ms app-agregar'><span class='fa fa-check'></span></td>";
                        html_code +="</tr>";
                    $('#app-proceso').html(html_code);

				}else{
					console.log('nada');
				}				
			},
			error: function(data){
				console.log(data);
			}
		})
	}
    
    var count_1 = 0;

    
    function plan_producto(idcurso){

        var html_code='';

        html_code ="<input class='form-control' id='idcurso' value='"+idcurso+"' type='hidden'>";

        $('#app-idcurso').html(html_code);

        console.log(idcurso);
    }

$(document).on('click','.app-agregar',function(){

    count_1=count_1 + 1;

    var codigo = $('#codigo').val();
    var idcurso = $('#idcurso').val();
    var id_adquirircurso = $('#id_adquirircurso').val();


    var route= "{{route('estudiante.buscaEstudiante')}}";
    $.ajax({
        url: route,           
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        type: 'POST',            
        data: {"codigoc": codigo},
        success: function(data){
            console.log(data);
            if (data!='FALSE') {
                console.log('encontro');
                var html_code='';
                html_code +="<tr id='row"+count_1+"'>";
                    html_code +="<td contenteditable='false'>"+
                        "<input readonly class='form-control' placeholder='#' value ='"+id_adquirircurso+"' type='text' name='listacurso[]' id='id_nombrearea_plan"+id_adquirircurso+"'>"+
                        "</td>";
                        html_code +="<td contenteditable='false'>"+
                        "<input readonly class='form-control' type='text' value ='"+idcurso+"' id='listamateria"+count_1+"' name='listamateria[]'></td>";
                        html_code +="<td contenteditable='false'>"+
                            "<input readonly class='form-control' type='text' value ='"+data.id+"' id='id_nombrearea_plan"+count_1+"' name='id_nombrearea_plan[]'></td>";
                    html_code +="<td contenteditable='false'>"+data.Nombre+' '+data.ApellidoPaterno+' '+data.ApellidoMaterno+"</td>";
                    html_code +="<td contenteditable='false'>"+data.CedulaIdentidad+"</td>";
                    html_code +="<td><button type='button' name='remove' data-row='row"+count_1+"' class='btn btn-danger btn-ms remove-add-nuevamateria'><span class='fa fa-times'></span></td>";
                    html_code +="</tr>";
                $('#app-proceso2').html(html_code);

                arr = [data.id, idcurso];

            }else{
                console.log('nada');
            }				
        },
        error: function(data){
            console.log(data);
        }
    })
});

$(document).on('click','.remove-add-nuevamateria',function(){
    var delete_row = $(this).data("row");
    $('#'+delete_row).remove(); 
});

    function plan_reporte(idm){
        var delete_row = $(this).data("row");
        $('#'+delete_row).remove(); 
       
        var route= "{{route('adquirircurso.eliminacursoadquirido')}}";
        $.ajax({
            url: route,           
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            type: 'POST',            
            dataType : 'json',
            data: {"id": idm},
            success: function(data){
                console.log(data);
            }
        });
    
    }

</script>

@endsection