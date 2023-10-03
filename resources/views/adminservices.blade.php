@extends('layout')
@section('content')
<main class="adminmain">
    <nav class="breadcrumb">
            <ol>
                <li><a href="/admin">Dashboard</a></li>
                <li aria-current="page">Servicios</li>
            </ol>
    </nav>

    <h1>Panel de administrador</h1>
    <h2>Servicios</h2>

    <ul class="usersOptions">
        <li><a href="" class="btn">Todos los servicios</a></li>
        <li><a href="" class="btn">Agregar un servicio</a></li>
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

    {{ $errors->first('name') }}
    {{ $errors->first('category') }}
    {{ $errors->first('description') }}
    {{ $errors->first('img') }}

    <form action="" method="post">
        @csrf
        <div>
            <label for="name">Nombre del servicio</label>
            <input type="text" placeholder="Ingresa el nombre del servicio" name="name" value="{{ old('name')}}">
            <p>{{ $errors->first('name') }}</p>
        </div>
        <div>
            <label for="category">Categoría</label>
            <select name="category">
                <option value="1" @selected(old("category") == 1)>Remodelacion</option>
                <option value="2" @selected(old("category") == 2)>Move in/Move out</option>
                <option value="3" @selected(old("category") == 3)>Real State</option>
            </select>
            {{ $errors->first('category') }}
        </div>
        <div>
            <label for="description">Descripción</label>
            <textarea name="description" cols="30" rows="10">{{ old('description')}}</textarea>
            <p>{{ $errors->first('description') }}</p>
        </div>

        <div>
            <label for="img">Imagen</label>
            <input type="text" placeholder="Ingresa el url de la imagen" name="img" value="{{ old('img')}}">
            <p>{{ $errors->first('img') }}</p>
        </div>

        <div>
            <button type="submit" class="btn primary-green">Agregar usuario</button>
        </div>
    </form>
</main>
@endsection