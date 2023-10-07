@extends('layout')
@section('content')
<main class="adminmain">

    @php
        $entity = request()->segment(2);
        $entitiesMap = [
            'services' => 'Servicios',
            'users' => 'Usuarios',
            'categories' => 'Categorías',
            'requests' => 'Solicitudes',
        ];
        $currentEntityName = $entitiesMap[$entity] ?? 'Dashboard';
    @endphp

    <nav class="breadcrumb">
        <ol>
            <li><a href="/admin">Dashboard</a></li>
            @if($currentEntityName !== $h2)
                <li><a href="/admin/{{$entity}}">{{$currentEntityName}}</a></li>
            @endif
            <li aria-current="page">{{$h2}}</li>
        </ol>
    </nav>

    <h1>Panel de administrador</h1>
    <h2>{{$h2}}</h2>

    <ul class="usersOptions">
        <li><a href="/admin/{{$entity}}" class="btn">Mostrar todos</a></li>
        <li><a href="/admin/{{$entity}}/add" class="btn">Agregar uno</a></li>
    </ul>

    @yield('subcontent')

</main>
@endsection