@extends('layout')
@section('content')

<main class="contactmain">

<nav class="breadcrumb">
    <ol>
        <li><a href="/">Incio</a></li>
        <li aria-current="page">Contacto</li>
    </ol>
</nav>

<section>
    <div>
        <h1>Contáctanos</h1>
        <p>¿Tienes alguna pregunta? ¿Quieres saber más sobre nuestros servicios? ¿Quieres un estimado gratis? ¡Contáctanos! Estamos aquí para ayudarte.</p>
    </div>

        @include('estimateform')

</section>
</main>


@endsection