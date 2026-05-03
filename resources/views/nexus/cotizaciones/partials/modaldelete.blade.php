<div class="modal fade" id="confirmActionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header" id="modalHeaderColor">
                <h5 class="modal-title text-white" id="actionTitle">Confirmar Acción</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
                <i id="actionIcon" class="fas fa-exclamation-triangle fa-3x mb-3"></i>
                <p class="fs-5" id="actionMessage"></p>
                <p class="text-muted small" id="actionWarning"></p>
            </div>
            <div class="modal-footer justify-content-center border-0 pb-4">
                <form id="actionForm" method="post" action="">
                    @csrf
                    <div id="methodPlaceholder"></div>

                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Regresar</button>
                    <button type="submit" id="confirmActionBtn" class="btn px-4 text-white">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
