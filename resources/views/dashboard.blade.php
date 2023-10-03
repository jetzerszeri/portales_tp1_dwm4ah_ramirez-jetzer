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
    <p>Bienvenido, Jake!</p>

    <ul class="admindoptions">
        <li>
            <a href="/admin/users"><i class="fa-solid fa-users"></i><span>Usuarios</span></a>
        </li>
        <li>
            <a href="/admin/services"><i class="fa-solid fa-hand-sparkles"></i><span>Servicios</span></a>
        </li>
        <li>
            <a href="/admin/categories"><i class="fa-solid fa-table-list"></i><span>Categorías</span></a>
        </li>
        <li>
            <a href="/admin/requests"><i class="fa-solid fa-list-check"></i><span>Solicitudes</span></a>
        </li>
    </ul>

    



</main>
@endsection