@extends('includes.body')

@section('content')
<div class="calendar">
    @include('includes.alert')
    <div class="calendar-title-bar pt-2">
        <h4 class="text-center">
            <x-feathericon-calendar class="window-title-icon" style="margin-top: -3px;"/>
            {{ $calendar->monthName() }}
        </h4>
    </div>

    <div class="calendar-title pb-0">
        @foreach ($calendar->weekDays() as $name)
        <div class="day title">
            {{ $name }}	
        </div>
        @endforeach
    </div>
    <div class="calendar-body">
        @for ($i = 0; $i < $calendar->startDay(); $i++)
            <div class="day date empty">
                <div style="display: grid;">
                    <span class="day-label" style="visibility: hidden">0</span>
                </div>
            </div>
        @endfor

        @foreach ($calendar->getEvents() as $key => $event)
            <div class="day date {{ ($key + 1 == $calendar->currentDay()) ? 'active' : '' }}">
                <div style="display: grid;">
                    <span class="day-label">{{ $key + 1 }}</span>
                    @if (isset($event))
                        <a href="#" id="{{ $event->id }}" class='event' data-bs-toggle="modal" data-bs-target="#eventDetails">{{ $event->name }}</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="eventDetails" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Detalles</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 pt-2 text-end">
                        Evento
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="event" disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Descripción
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" id="description" disabled></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Cliente
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="client" disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Auto
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="car" disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 pt-2 text-end">
                        Teléfono
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="phone" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('css/calendar.css') }}" rel="stylesheet" />
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(".event").on('click', function(){
    $.ajax({
        url: "{{ route('calendar.getEvent') }}",
        method: 'POST',
        data: { 
            id:this.id
        },
        success: function(response){
            console.log(response);
            
            $("#event").val(response.data.event.event);
            $("#description").val(response.data.event.description);
            $("#client").val(response.data.client.name);
            $("#car").val(response.data.car.brand + ' ' + response.data.car.model);
            $("#phone").val(response.data.client.phone);
        }
    });
})
</script>
@endsection