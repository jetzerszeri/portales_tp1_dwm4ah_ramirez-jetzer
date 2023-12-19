@extends('adminlayout')
@section('subcontent')

<h3>Servicio más solicitado</h3>
<div class="statisticsContainer">
    <div>
        <h4>Última semana</h4>
        <p><i class="fa-solid fa-calendar-days"></i> {{ $mostRequestedServiceLastWeek['date_range'] }}</p>

        @if($mostRequestedServiceLastWeek['service']->requests_count > 0)
        <p>{{ $mostRequestedServiceLastWeek['service']->name }}</p>
        <p>{{ $mostRequestedServiceLastWeek['service']->requests_count }} @choice('Solicitud|Solicitudes', $mostRequestedServiceLastWeek['service']->requests_count)</p>
        @else
        <p>No hay solicitudes recientes</p>
        @endif


    </div>

    <div>
        <h4>Último mes</h4>
        <p> <i class="fa-solid fa-calendar-days"></i> {{ $mostRequestedServiceLastMonth['date_range'] }}</p>

        @if($mostRequestedServiceLastMonth['service']->requests_count > 0)
        <p>{{ $mostRequestedServiceLastMonth['service']->name}}</p>
        <p>{{ $mostRequestedServiceLastMonth['service']->requests_count}} @choice('Solicitud|Solicitudes', $mostRequestedServiceLastMonth['service']->requests_count)</p>
        @else
        <p>No hay solicitudes registradas en el último mes</p>
        @endif
    </div>

    <div>
        <h4>Desde siempre</h4>
        <p><i class="fa-solid fa-calendar-days"></i> {{ $mostRequestedServiceAllTime['date_range'] }}</p>

        @if($mostRequestedServiceAllTime['service']->requests_count > 0)
        <p>{{ $mostRequestedServiceAllTime['service']->name}}</p>
        <p>{{ $mostRequestedServiceAllTime['service']->requests_count}} @choice('Solicitud|Solicitudes', $mostRequestedServiceAllTime['service']->requests_count)</p>
        @else
        <p>No hay solicitudes registradas</p>
        @endif
    </div>
</div>



@endsection