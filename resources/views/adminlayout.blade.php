@extends('layout')
@section('content')
<main class="adminmain">
    <nav class="breadcrumb">
            <ol>
                <li><a href="/admin">Dashboard</a></li>
                <li><a href="/admin/services">Servicios</a></li>
                <li aria-current="page">{{$h2}}</li>
            </ol>
    </nav>

    <h1>Panel de administrador</h1>
    <h2>{{$h2}}</h2>

    <ul class="usersOptions">
        <li><a href="/admin/services" class="btn">Todos los servicios</a></li>
        <li><a href="/admin/services/add" class="btn">Agregar un servicio</a></li>
    </ul>

    @yield('subcontent')

</main>
@endsection