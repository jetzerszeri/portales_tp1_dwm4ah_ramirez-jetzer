@extends('adminlayout')
@section('subcontent')
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
                    <td>{{ $service->categoryRelation->name }}</td>
                    <td>{{ $service->description}}</td>
                    <td>{{ $service->img}}</td>
                    <td>
                        <a href="/admin/services/{{ $service->id}}/edit" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="/admin/services/{{ $service->id }}" method="POST" class="deleteformbtn">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn secundary-green" onclick="return confirm('¿Estás seguro de querer eliminar este servicio?');"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection