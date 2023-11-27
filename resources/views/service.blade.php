@extends('layout')
@section('content')

<main class="mainofservice">

<nav class="breadcrumb">
    <ol>
        <li><a href="/services">Servicios</a></li>
        <li aria-current="page">{{ $service->name}}</li>
    </ol>
</nav>

<section class="servicesection">
    <div>
        <h1>{{ $service->name}}</h1>
        <img src="{{ asset($service->img) }}" alt="{{ $service->name }}">
        <a href="/services" class="btn primary-green"><</a>
    </div>

    <div>
        <div>

            <h2>Descripción</h2>
            <p>{{ $service->description}}</p>

            <h2>Precios</h2>
            <p>Cada limpieza es única y tiene un precio basado en los pies cuadrados de la propiedad y el tipo de limpieza que se necesite. Ofrecemos presupuestos/estimados personalizados gratuitos para cada proyecto antes de empezar. Esto garantiza que nuestros clientes nunca se sorprendan por los costos y que todas sus necesidades sean abordadas. Solicita tu estimado gratis!</p>
        </div>

        @include('estimateform')

    </div>
</section>
</main>


@endsection