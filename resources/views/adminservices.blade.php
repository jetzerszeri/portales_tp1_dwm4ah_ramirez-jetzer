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
        <li><a href="" class="btn active">Todos los servicios</a></li>
        <li><a href="/admin/services/add" class="btn">Agregar un servicio</a></li>
    </ul>

    <div class="tablecontainer">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->name}}</td>
                    <td>{{ $service->category}}</td>
                    <td>{{ $service->description}}</td>
                    <td>{{ $service->img}}</td>
                    <td>
                        <a href="/admin/services/{{ $service->id}}/edit" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
                <!-- <tr>
                    <td>Juan Lopez</td>
                    <td>Remodelación</td>
                    <td>Esta es la descripcion de ejemlo, Esta es la descripcion de ejemlo Esta es la descripcion de ejemlo</td>
                    <td>servicio1.jpg</td>
                    <td>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Karla Gomez</td>
                    <td>Remodelación</td>
                    <td>Esta es la descripcion de ejemlo, Esta es la descripcion de ejemlo Esta es la descripcion de ejemlo</td>
                    <td>servicio1.jpg</td>
                    <td>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Kev Johnson</td>
                    <td>Remodelación</td>
                    <td>Esta es la descripcion de ejemlo, Esta es la descripcion de ejemlo Esta es la descripcion de ejemlo</td>
                    <td>servicio1.jpg</td>
                    <td>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Carlos Perez</td>
                    <td>Remodelación</td>
                    <td>Esta es la descripcion de ejemlo, Esta es la descripcion de ejemlo Esta es la descripcion de ejemlo</td>
                    <td>servicio1.jpg</td>
                    <td>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>

    @foreach ($services as $service)
        <p>Id del servicio: {{ $service->id}}</p>
    @endforeach

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