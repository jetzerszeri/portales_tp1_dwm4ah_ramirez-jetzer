@php
    $solicitud = $solicitud ?? [];
@endphp

@extends('adminlayout')
@section('subcontent')

@include('estimateform')

<form action="" method="post">
    @csrf
    @if(request()->is('admin/categories/*/edit'))
        @method('PATCH')
    @endif
    <div>
        <label for="name">Nombre</label>
        <input type="text" placeholder="Ingresa el nombre" name="name" value="{{ old('name', optional($solicitud)->name) }}">
        <p>{{ $errors->first('name') }}</p>
    </div>

    <div>
        <button type="submit" class="btn primary-green">{{$h2}}</button>
    </div>
</form>

@endsection