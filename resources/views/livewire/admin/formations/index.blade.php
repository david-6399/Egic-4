<div>
    @if($pageStatus == 'list')
        @include('livewire.admin.formations.list')

    @elseif($pageStatus == 'create')
        @include('livewire.admin.formations.create')
    @elseif ($pageStatus == 'edit')
        @include('livewire.admin.formations.edit')
    @endif
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
    
    window.addEventListener('formationUpdated', event =>{
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500
        });

    })
</script>