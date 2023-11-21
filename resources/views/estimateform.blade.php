@php
    $solicitud = $solicitud ?? [];
@endphp
<form action="/requests" class="estimateform" method="post">
@csrf
    @if(request()->is('admin/requests/*/edit'))
        @method('PATCH')
    @endif

    @if(!request()->is('admin/requests/*'))    
        <h2>{{$h2}}</h2>
    @endif

    @include('partials.estimateformcontent')
</form>