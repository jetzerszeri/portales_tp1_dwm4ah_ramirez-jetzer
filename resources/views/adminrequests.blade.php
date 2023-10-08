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
                    <!-- <th>Acciones</th> -->
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
                    <td>{{ $request->state_id}}</td>
                    <td>{{ $request->zip_code}}</td>
                    <td>{{ $request->service_id}}</td>
                    <td>{{ $request->service_date}}</td>
                    <td>{{ $request->notes}}</td>
                    <!-- <td>
                        <a href="/admin/services/{{ $request->id}}/edit" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="btn secundary-green"><i class="fa-solid fa-trash"></i></a>
                    </td> -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection