@php
    $category = $category ?? [];
@endphp

@extends('adminlayout')
@section('subcontent')

<form action="{{ request()->is('admin/categories/*/edit') ? '/admin/categories/' . optional($category)->id : '/admin/categories' }}" method="post">
    @csrf
    @if(request()->is('admin/categories/*/edit'))
        @method('PATCH')
    @endif
    <div>
        <label for="name">Nombre de la categoría</label>
        <input type="text" placeholder="Ingresa el nombre" name="name" value="{{ old('name', optional($category)->name) }}" id="name">
        <p>{{ $errors->first('name') }}</p>
    </div>

    <div>
        <button type="submit" class="btn primary-green">{{$h2}}</button>
    </div>
</form>

@endsection