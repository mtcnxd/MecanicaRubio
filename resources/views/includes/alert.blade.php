@if ( session('success') )
    <div class="alert alert-warning alert-dismissible fade show shadow">
        <x-feathericon-check-circle class="window-title-icon" style="margin: -3px 10px 0px;"/>
        <strong>Mensaje: </strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif