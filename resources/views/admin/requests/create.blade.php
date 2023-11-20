@php
    $solicitud = $solicitud ?? [];
@endphp

@extends('adminlayout')
@section('subcontent')

<form action="{{ request()->is('admin/requests/*/edit') ? '/admin/requests/' . optional($solicitud)->id : '/admin/requests' }}" class="estimateform" method="post">
@csrf
    @if(request()->is('admin/requests/*/edit'))
        @method('PATCH')
    @endif

    @if(!request()->is('admin/requests/*'))    
        <h2>{{$h2}}</h2>
    @endif


    @include('partials.estimateformcontent')
</form>

@endsection