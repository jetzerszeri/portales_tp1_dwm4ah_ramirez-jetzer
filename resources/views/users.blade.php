@extends('layout')
@section('content')
<main class="adminmain">
    <nav class="breadcrumb">
            <ol>
                <li><a href="/admin">Dashboard</a></li>
                <li aria-current="page">Usuarios</li>
            </ol>
    </nav>

    <h1>Panel de administrador</h1>
    <h2>Usuarios</h2>

    <ul class="usersOptions">
        <li><a href="" class="btn">Todos los usuarios</a></li>
        <li><a href="" class="btn">Agregar un usuario</a></li>
    </ul>

    <!-- <div class="tablecontainer">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juan Lopez</td>
                    <td>ejemplo@ejemplo.com</td>
                    <td>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Karla Gomez</td>
                    <td>ejemplo@ejemplo.com</td>
                    <td>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Kev Johnson</td>
                    <td>ejemplo@ejemplo.com</td>
                    <td>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Carlos Perez</td>
                    <td>ejemplo@ejemplo.com</td>
                    <td>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> -->

    <form action="" method="post">
        @csrf
        <div>
            <label for="username">Email</label>
            <input type="email" placeholder="ejemplo@ejemplo.com" name="username">
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input type="password" placeholder="Ingresa la contraseña" name="password">
        </div>

        <div>
            <button type="submit" class="btn primary-green">Agregar usuario</button>
        </div>
    </form>


</main>
@endsection