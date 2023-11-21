@extends('adminlayout')
@section('subcontent')
<div class="tablecontainer">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Abreviación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($states as $state)
                <tr>
                    <td>{{ $state->name}}</td>
                    <td>{{ $state->abbreviation}}</td>
                    <td>
                        <a href="/admin/states/{{ $state->id}}/edit" class="btn secundary-green"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button class="btn secundary-green delete-user-btn"  data-id="{{ $state->id }}" data-name="{{ $state->name }}" data-type="estado"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include('partials.confirmationmodal')
    
@endsection