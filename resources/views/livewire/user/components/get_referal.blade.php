<div>
    <div wire:click='generateReferalCode()'>
        <li><i class="bx bx-chevron-right"></i> Get Referal Code</li>
    </div>

    <div class="modal fade" id="referalModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Small Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-groupe">
                    <h6 >Copy this and share it with your friends</h6>
                    <input type="text" class="form-control" readonly wire:model='referalCode'>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-none" wire:click='saveReferalCode( )'>Save</button>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    window.addEventListener("hello", event => {
        $("#referalModal").modal("show")
    })
</script>
