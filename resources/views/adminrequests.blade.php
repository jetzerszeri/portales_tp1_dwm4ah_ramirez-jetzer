@extends('adminlayout')
@section('subcontent')
    <div class="tablecontainer">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                    <th>Código Postal</th>
                    <th>Tipo de Servicio</th>
                    <th>Fecha del servicio</th>
                    <th>Notas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->name}}</td>
                    <td>{{ $request->lastname}}</td>
                    <td>{{ $request->email}}</td>
                    <td>{{ $request->address}}</td>
                    <td>{{ $request->city}}</td>
                    <td>{{ $request->state->abbreviation}}</td>
                    <td>{{ $request->zip_code}}</td>
                    <td>{{ $request->service->name}}</td>
                    <td>{{ $request->service_date}}</td>
                    <td>{{ $request->notes}}</td>
                    <td>
                        <a href="/admin/requests/{{ $request->id}}/edit" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        
                        <form action="/admin/requests/{{ $request->id }}" method="POST" class="deleteformbtn">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn secundary-green" onclick="return confirm('¿Estás seguro de querer eliminar esta solicitud?');"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection