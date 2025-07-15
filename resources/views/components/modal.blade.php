@props([
    'size' => 'modal-xl',
    'acceptButton' => 'addItemInvoice'
])

<div class="modal fade {{ $size }}" id="createItem" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Agregar elemento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="{{ $acceptButton }}">Agregar</button>
            </div>
        </div>
    </div>
</div>  