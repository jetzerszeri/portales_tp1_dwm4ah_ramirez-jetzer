@extends('layout')
@section('content')
<main class="adminmain">
    <nav class="breadcrumb">
            <ol>
                <li><a href="/admin">Dashboard</a></li>
                @unless($h2 == 'Servicios')
                    <li><a href="/admin/services">Servicios</a></li>
                @endunless
                <li aria-current="page">{{$h2}}</li>
            </ol>
    </nav>

    <h1>Panel de administrador</h1>
    <h2>{{$h2}}</h2>

    <ul class="usersOptions">
        <li><a href="/admin/services" class="btn">Mostrar todos</a></li>
        <li><a href="/admin/services/add" class="btn">Agregar uno</a></li>
    </ul>

    @yield('subcontent')

</main>
@endsection