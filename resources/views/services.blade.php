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
                @if ($selectedCategory)
                    <li><a href="/services" class="btn secundary-green">Mostrar todos</a></li>
                @endif
                <li><a href="/services?cat=1" class="btn secundary-green {{ $selectedCategory == 1 ? 'active' : '' }}">Remodelación</a></li>
                <li><a href="/services?cat=2" class="btn secundary-green {{ $selectedCategory == 2 ? 'active' : '' }}">Mudanza</a></li>
                <li><a href="/services?cat=3" class="btn secundary-green {{ $selectedCategory == 3 ? 'active' : '' }}">Real State</a></li>
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
                            @if ($service->category)
                            <p>{{ $service->category->name }}</p>
                            @endif
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