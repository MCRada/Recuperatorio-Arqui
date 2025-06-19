@component('mail::message')
# Reporte de Pago

Detalles del pago:

@foreach ($pagocurso as $pago)
- **ID:** {{ $pago->id }}
- **Fecha:** {{ $pago->fecha }}
- **Monto:** {{ $pago->monto }}
@endforeach

**Total Monto:** {{ $totalMonto }}

Gracias,<br>
{{ config('app.name') }}
@endcomponent
