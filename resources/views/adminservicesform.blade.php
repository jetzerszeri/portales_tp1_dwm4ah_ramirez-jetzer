@php
    $service = $service ?? [];
@endphp

@extends('adminlayout')
@section('subcontent')

<form action="" method="post">
    @csrf
    @method('PATCH')
    <div>
        <label for="name">Nombre del servicio</label>
        <input type="text" placeholder="Ingresa el nombre del servicio" name="name" value="{{ old('name', optional($service)->name) }}">
        <p>{{ $errors->first('name') }}</p>
    </div>
    <div>
        <label for="category">Categoría</label>
        <select name="category">
            <option value="1" @selected(old("category") == 1)>Remodelacion</option>
            <option value="2" @selected(old("category") == 2)>Move in/Move out</option>
            <option value="3" @selected(old("category") == 3)>Real State</option>
        </select>
        {{ $errors->first('category') }}
    </div>
    <div>
        <label for="description">Descripción</label>
        <textarea name="description" cols="30" rows="10">{{ old('description', optional($service)->description)}}</textarea>
        <p>{{ $errors->first('description') }}</p>
    </div>

    <div>
        <label for="img">Imagen</label>
        <input type="text" placeholder="Ingresa el url de la imagen" name="img" value="{{ old('img', optional($service)->img)}}">
        <p>{{ $errors->first('img') }}</p>
    </div>

    <div>
        <button type="submit" class="btn primary-green">{{$h2}}</button>
    </div>
</form>

@endsection