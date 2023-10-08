@extends('layout')

@section('content')


<main class="servicescontainer">
    <header class="servicesheader">
        <div>
            <h1>Servicios profesionales de limpieza</h1>
            <p>Elevando el estandar de limpieza con soluciones personalizadas.</p>
        </div>

        <div>
            <ul>
                <li><a href="/services?cat=1" class="btn secundary-green">Remodelación</a></li>
                <li><a href="/services?cat=2" class="btn secundary-green">Mudanza</a></li>
                <li><a href="/services?cat=3" class="btn secundary-green">Real State</a></li>
            </ul>
        </div>
    </header>

    <section>
        <ul>
        @foreach ($services as $service)
            <li> 
                <div>
                    <div>
                        <img src="{{ asset($service->img) }}" alt="{{ $service->name}}">
                    </div>
                    <div>
                        <div>
                            <h2>{{ $service->name}}</h2>
                            <p>{{ $service->categoryRelation->name }}</p>
                        </div>
                        
                        <a href="/services/{{ $service->id}}" class="btn secundary-green">Ver detalles</a>

                    </div>
                </div>
            </li>
        @endforeach
        </ul>
    </section>
</main>
@endsection