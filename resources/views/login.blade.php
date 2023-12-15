@extends('layout')
@section('content')

<main class="loginmain">
    <nav class="breadcrumb">
        <ol>
            <li><a href="/">Home</a></li>
            <li aria-current="page">Panel de administrador</li>
        </ol>
    </nav>

    <h1>Iniciar sesión</h1>

    <form action="" method="post">
        @csrf

        
        <p>{{ $errors->first('loginError') }}</p>

        <div>
            <label for="email">E-mail</label>
            <input type="text" placeholder="ejemplo@ejemplo.com" name="email" id="email">
            <p>{{ $errors->first('email') }}</p>
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input type="password" placeholder="Ingresa la contraseña" name="password" id="password">
            <p>{{ $errors->first('password') }}</p>
        </div>

        <div>
            <button type="submit" class="btn primary-green">Iniciar sesión</button>
        </div>
    </form>


</main>
@endsection
