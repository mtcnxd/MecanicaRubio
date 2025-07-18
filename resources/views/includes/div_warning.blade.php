@if ( session('success') )
<div class="alert alert-success alert-dismissible fade show m-4">
    <x-feathericon-check-circle class="window-title-icon" style="margin: -3px 10px 0px;"/>
    <strong>Mensaje: </strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ( session('warning') )
<div class="alert alert-warning alert-dismissible fade show m-4">
    <x-feathericon-alert-octagon class="window-title-icon" style="margin: -3px 10px 0px;"/>
    <strong>Mensaje: </strong> {{ session('warning') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif