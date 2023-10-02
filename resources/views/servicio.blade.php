@extends('layout')
@section('content')

<main class="mainofservice">

<nav class="breadcrumb">
    <ol>
        <li><a href="services.html">Servicios</a></li>
        <li aria-current="page">Limpieza post remodelación</li>
    </ol>
</nav>

<section class="servicesection">
    <div>
        <h1>Limpieza post remodelación /Construcción</h1>
        <img src="img/servicio1.webp" alt="escalera y herramientas de pintura en una habitación en construcción">
        <a href="services.html" class="btn primary-green"><</a>
    </div>

    <div>
        <div>

            <h2>Descripción</h2>
            <p>Nuestros servicios profesionales de limpieza posteriores a la renovación o construcción de una casa ofrecen una limpieza completa, detallada y meticulosa de su espacio nuevo o renovado. Este servicio incluye eliminar el polvo, la suciedad y los arañazos de todas las superficies, Aspirar y desempolvar madera, zócalos, puertas, accesorios y electrodomésticos y eliminación de pegatinas y etiquetas de cualquier instalación, entre otros.</p>

            <h2>Precios</h2>
            <p>Cada limpieza es única y tiene un precio basado en los pies cuadrados de la propiedad y el tipo de limpieza que se necesite. Ofrecemos presupuestos/estimados personalizados gratuitos para cada proyecto antes de empezar. Esto garantiza que nuestros clientes nunca se sorprendan por los costos y que todas sus necesidades sean abordadas. Solicita tu estimado gratis!</p>
        </div>

        @include('estimateform')

    </div>
</section>
</main>


@endsection