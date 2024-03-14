@extends('includes.body')

@extends('includes.menu')

@section('content')
<div class="calendar shadow-sm">
    <div class="window-title-bar calendar-title-bar">
        <x-feathericon-calendar class="window-title-icon"/>
    </div>

	<div class="calendar-title pb-0">
		@foreach ($daysOfWeek as $dayName)
		<div class="day title">
			{{ $dayName }}	
		</div>
		@endforeach
	</div>
	<div class="calendar-body">
        @for ($i = 0; $i < $weekStartsIn; $i++)
            <div class="day date empty">
                <div style="display: grid;">
                    <span class="day-label" style="visibility: hidden">0</span>
                </div>
            </div>
        @endfor

		@foreach ($events as $key => $event)
			<div class="day date {{ ($key + 1 == $currentDate) ? 'active' : '' }}">
				<div style="display: grid;">
					<span class="day-label">{{ $key + 1 }}</span>
					@if (isset($event->event))
						<a href="#" id="{{ $event->id }}" class='event' data-bs-toggle="modal" data-bs-target="#eventDetails">{{ $event->event }}</a>	
					@endif
				</div>
			</div>
		@endforeach
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
    const id = this.id;

    $.ajax({
        url: '{{ route('loadEvent') }}',
        method: 'POST',
        data: {id},
        success: function(response){
            const object = JSON.parse(response);
            $("#event").val(object.event);
            $("#description").val(object.description);
            $("#client").val(object.name);
            $("#phone").val(object.phone);
        }
    });
})
</script>
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