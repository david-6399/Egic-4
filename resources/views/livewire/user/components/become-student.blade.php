<div>
    @can('user')        
        <a href="#" class="dropdown-item" wire:click='becomeStudent({{auth()->user()->id}})'>Devenir étudiant</a>
    @endcan
</div>

<script>
        window.addEventListener('verifyEmail', event => {

            Swal.fire({
                title: "Verifiez votre address email",
                showCancelButton: true,
                confirmButtonText: "Save",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    @this.goToVerifyEmail();
                }
            });
        });
    
</script>