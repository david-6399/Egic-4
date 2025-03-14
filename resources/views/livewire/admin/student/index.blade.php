<div>

        @include('livewire.admin.student.list')
        @include('livewire.admin.student.create')
</div>


    <script>
        window.addEventListener("switchToCreate", event=>{
            $("#switchToCreate").modal({
                "show": true,
                "backdrop": "static"
            })
        })

        window.addEventListener("closeModal", event=>{
            $("#switchToCreate").modal("hide")
        })
    </script>