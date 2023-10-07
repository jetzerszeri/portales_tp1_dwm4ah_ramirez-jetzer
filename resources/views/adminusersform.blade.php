@php
    $service = $service ?? [];
@endphp

@extends('adminlayout')
@section('subcontent')

<form action="" method="post">
    @csrf
    @if(request()->is('admin/users/*/edit'))
        @method('PATCH')
    @endif
    <div>
        <label for="name">Nombre</label>
        <input type="text" placeholder="ej. Fernando" name="name" value="{{ old('name', optional($service)->name) }}">
        <p>{{ $errors->first('name') }}</p>
    </div>
    <div>
        <label for="lastname">Apellido</label>
        <input type="text" placeholder="ej. Alvarenga" name="lastname" value="{{ old('lastname', optional($service)->lastname) }}">
        <p>{{ $errors->first('lastname') }}</p>
    </div>
    <div>
        <label for="email">Correo Electrónico</label>
        <input type="email" placeholder="ejemplo@ejemplo.com" name="email" value="{{ old('email', optional($service)->email) }}">
        <p>{{ $errors->first('email') }}</p>
    </div>
    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" value="{{ old('password', optional($service)->password) }}">
        <p>{{ $errors->first('password') }}</p>
    </div>


    <div>
        <button type="submit" class="btn primary-green">{{$h2}}</button>
    </div>
</form>

@endsection