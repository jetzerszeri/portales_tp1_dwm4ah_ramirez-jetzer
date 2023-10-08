@extends('adminlayout')
@section('subcontent')
    <div class="tablecontainer">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->lastname}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->role}}</td>
                    <td>
                        <a href="/admin/users/{{ $user->id}}/edit" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="/admin/users/{{ $user->id }}" method="POST" class="deleteformbtn">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn secundary-green" onclick="return confirm('¿Estás seguro de querer eliminar el usuario {{ $user->email}}?');"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection