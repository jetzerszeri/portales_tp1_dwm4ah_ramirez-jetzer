@php
    $user = $user ?? [];
@endphp

@extends('adminlayout')
@section('subcontent')

<form action="{{ request()->is('admin/users/*/edit') ? '/admin/users/' . optional($user)->id : '/admin/users' }}" method="post">
    @csrf
    @if(request()->is('admin/users/*/edit'))
        @method('PATCH')
    @endif
    <div>
        <label for="name">Nombre</label>
        <input type="text" placeholder="ej. Fernando" name="name" value="{{ old('name', optional($user)->name) }}" id="name">
        <p>{{ $errors->first('name') }}</p>
    </div>
    <div>
        <label for="lastname">Apellido</label>
        <input type="text" placeholder="ej. Alvarenga" name="lastname" value="{{ old('lastname', optional($user)->lastname) }}" id="lastname">
        <p>{{ $errors->first('lastname') }}</p>
    </div>

    <div>
        <label for="role_id">Rol</label>
        <select name="role_id" id="role_id">
            @foreach($roleList as $role)
                <option value="{{ $role->id }}" {{ old('role', optional($user)->role) == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>
        {{ $errors->first('role_id') }}
    </div>

    <div>
        <label for="email">Correo Electrónico</label>
        <input type="email" placeholder="ejemplo@ejemplo.com" name="email" value="{{ old('email', optional($user)->email) }}" id="email">
        <p>{{ $errors->first('email') }}</p>
    </div>
    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" value="{{ old('password') }}" id="password">
        <p>{{ $errors->first('password') }}</p>
    </div>


    <div>
        <button type="submit" class="btn primary-green">{{$h2}}</button>
    </div>
</form>

@endsection