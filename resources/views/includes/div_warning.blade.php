@if ( session('message') )
<div class="alert alert-warning alert-dismissible fade show">
    <strong>Mensaje: </strong> {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif