@php
    $estimate = $estimate ?? [];
    $request_info = $request_info ?? [];
@endphp

@extends('adminlayout')
@section('subcontent')


<form action="{{ request()->is('admin/estimates/*/edit') ? '/admin/estimates/' . optional($estimate)->id : '/admin/estimates' }}" method="post">

    @csrf
    @if(request()->is('admin/estimates/*/edit'))
        @method('PATCH')
    @endif

    <div class="estimateHeader">
        <h3>{{$request_info->address}}</h3>
        <p>{{$request_info->service->name}}</p>
        <p><span>Cliente:</span> {{$request_info->name .' '. $request_info->lastname}}</p>
        <p><span>Fecha del servicio:</span> {{$request_info->service_date}}</p>
        <p><span>Notas del cliente:</span> {{$request_info->notes}}</p>
    </div>
    <div>
        <label for="price">Precio</label>
        <input type="number" name="price" value="{{ old('price', optional($estimate)->price) }}" id="price">
        <p>{{ $errors->first('price') }}</p>
    </div>

    <div>
        <label for="notes">Comentarios para el cliente</label>
        <textarea name="notes" placeholder="Ingresa las notas para el cliente..." id="notes">{{ old('notes', optional($estimate)->notes) }}</textarea>
        <p>{{ $errors->first('notes') }}</p>
    </div>

    <input type="hidden" name="request_id" value="{{$request_info->id}}">


    <div>
        <button type="submit" class="btn primary-green">Guardar</button>
    </div>
</form>

@endsection