@php
    $service = $service ?? [];
@endphp

@extends('adminlayout')
@section('subcontent')

<form action="{{ request()->is('admin/services/*/edit') ? '/admin/services/' . optional($service)->id : '/admin/services' }}" method="post">
    @csrf
    @if(request()->is('admin/services/*/edit'))
        @method('PATCH')
    @endif
    <div>
        <label for="name">Nombre del servicio</label>
        <input type="text" placeholder="Ingresa el nombre del servicio" name="name" value="{{ old('name', optional($service)->name) }}" id="name">
        <p>{{ $errors->first('name') }}</p>
    </div>
    <div>
        <label for="category_id">Categoría</label>
        <select name="category_id" id="category_id">
            @foreach($categoriesList as $category)
                <option value="{{ $category->id }}" {{ old('category_id', optional($service)->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        {{ $errors->first('category_id') }}
    </div>
    <div>
        <label for="description">Descripción</label>
        <textarea name="description" cols="30" rows="10" id="description">{{ old('description', optional($service)->description)}}</textarea>
        <p>{{ $errors->first('description') }}</p>
    </div>

    <div>
        <label for="img">Imagen</label>
        <input type="text" placeholder="Ingresa el url de la imagen" name="img" value="{{ old('img', optional($service)->img)}}" id="img">
        <p>{{ $errors->first('img') }}</p>
    </div>

    <div>
        <button type="submit" class="btn primary-green">{{$h2}}</button>
    </div>
</form>

@endsection