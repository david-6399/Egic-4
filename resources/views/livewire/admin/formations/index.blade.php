<div>
    @include('livewire.admin.formations.create')
</div>

<script>
    window.addEventListener('formationCreated', event =>{
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500
        });

    })
</script>