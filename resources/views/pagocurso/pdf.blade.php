<h1>Factura Total</h1>
<div class="container">
    <table cellspacing="0" cellpadding="1" border="1" style="width: 100%" class="table table-bordered table-striped">
        <thead class="thead">
            <tr>
                <th width="5%">#</th>
                <th width="10%">Fecha</th>
                <th width="25%">Nombre </th>
                <th width="30%">Nombre Completo Estudiante</th>
                <th width="30%">Total</th>
            </tr>
        </thead>
        <tbody>

            @foreach($pagocurso as $pro)
                <tr>
                    <td>{{$pro->id}}</td>
                    <td>{{$pro->fecha}}</td>
                    <td>{{$pro->nombrecurso}}</td>
                    <td>{{$pro->nombreestudiante}} {{$pro->ApellidoPaterno}} {{$pro->ApellidoMaterno}}</td>
                    <td>{{$pro->monto}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        <div>
            @isset($totalMonto)
                <h3>Total Monto: {{ number_format($totalMonto, 2) }}</h3>
            @else
                <h3>Total Monto: No disponible</h3>
            @endisset
        </div>
    </div>
</div>
