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
                        <button class="btn secundary-green delete-user-btn"  data-id="{{ $service->id }}" data-name="{{ $service->name }}" data-type="servicio"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include('partials.confirmationmodal')

@endsection