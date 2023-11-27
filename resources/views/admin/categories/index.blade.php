@extends('adminlayout')
@section('subcontent')
<div class="tablecontainer">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Id</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name}}</td>
                    <td>{{ $category->id}}</td>
                    <td>
                        <a href="/admin/categories/{{ $category->id}}/edit" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>

                        <form action="/admin/categories/{{ $category->id}}" method="POST" class="deleteformbtn">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn secundary-green"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection