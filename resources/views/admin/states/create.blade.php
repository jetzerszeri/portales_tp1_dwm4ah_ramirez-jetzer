@php
    $state = $state ?? [];
@endphp

@extends('adminlayout')
@section('subcontent')

<form action="{{ request()->is('admin/states/*/edit') ? '/admin/states/' . optional($state)->id : '/admin/states' }}" method="post">
    @csrf
    @if(request()->is('admin/states/*/edit'))
        @method('PATCH')
    @endif
    <div>
        <label for="name">Nombre del estado</label>
        <input type="text" placeholder="Ingresa el nombre" name="name" value="{{ old('name', optional($state)->name) }}" id="name">
        <p>{{ $errors->first('name') }}</p>
    </div>
    <div>
        <label for="abbreviation">Abreviación</label>
        <input type="text" placeholder="Ingresa la abreviación" name="abbreviation" value="{{ old('abbreviation', optional($state)->abbreviation) }}" id="abbreviation">
        <p>{{ $errors->first('abbreviation') }}</p>
    </div>

    <div>
        <button type="submit" class="btn primary-green">{{$h2}}</button>
    </div>
</form>

@endsection