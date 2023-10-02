@extends('layout')
@section('content')

<main class="logingmain">
    <nav class="breadcrumb">
        <ol>
            <li><a href="/">Home</a></li>
            <li aria-current="page">Panel de administrador</li>
        </ol>
    </nav>

    <h1>Iniciar sesión</h1>

    <form action="">
        <div>
            <label for="username">Username</label>
            <input type="text" placeholder="Ingresa el username" name="username">
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input type="password" placeholder="Ingresa la contraseña" name="password">
        </div>

        <div>
            <button type="submit" class="btn primary-green">Iniciar sesión</button>
        </div>
    </form>


</main>
@endsection
