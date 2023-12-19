@extends('layout')
@section('content')
<main class="adminmain">
    <nav class="breadcrumb">
            <ol>
                <li><a href="/">Home</a></li>
                <li aria-current="page">Dashboard</li>
            </ol>
    </nav>


    <h1>Panel de administrador</h1>
    <p>Bienvenido, {{$username}}</p>

    <ul class="admindoptions">
        @if(Auth::user()->role->name === 'admin')
        <li>
            <a href="/admin/users"><i class="fa-solid fa-users"></i><span>Usuarios</span></a>
        </li>
        @endif
        <li>
            <a href="/admin/services"><i class="fa-solid fa-hand-sparkles"></i><span>Servicios</span></a>
        </li>
        <li>
            <a href="/admin/categories"><i class="fa-solid fa-table-list"></i><span>Categorías</span></a>
        </li>
        <li>
            <a href="/admin/requests"><i class="fa-solid fa-list-check"></i><span>Solicitudes</span></a>
        </li>
        <li>
            <a href="/admin/states"><i class="fa-solid fa-map-location-dot"></i><span>Estados</span></a>
        </li>
        <li>
            <a href="/admin/statistics"><i class="fa-solid fa-chart-pie"></i><span>Estadísticas</span></a>
        </li>
    </ul>

    



</main>
@endsection