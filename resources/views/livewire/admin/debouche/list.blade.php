<div class="row m-1 my-3" >
    <h1>Consulter Les Débouchés</h1>
</div>
{{-- <h1>{{dump($debouches)}}</h1> --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>
                <div class="card-tools d-flex">
                    <div class="input-group input-group-sm mx-3" style="width: 150px;">
                        <select class="custom-select" wire:model.live="perFormation" >
                            {{-- <option>-----</option>                                     --}}
                            <option value="">-----------------</option>
                            @foreach($formations as $formation)
                                <option value="{{$formation->id}}" class="text-bold">{{$formation->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search"
                            wire:model.live="search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="max-height: 100vh;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome Débouché</th>
                            <th>Description</th>
                            <th>Formation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($debouches as $debouche)
                            <tr>
                                <td>{{ $debouche->id }}.</td>
                                <td>{{ $debouche->titre }}</td>
                                <td class="text-truncate" style="max-width: 250px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $debouche->description }}</td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $debouche->formation->nome }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-info" wire:click='editDebou({{$debouche->id}})' data-toggle="modal"
                                        data-target="#modal_editDebouche">Edit</button>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="mx-3 pt-3 border-top">
                    {{$debouches->links()}}
                </div>
            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>



<div class="modal fade show" id="modal_editDebouche" style="display: none;" aria-modal="true" role="dialog"
    wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ajouter Module</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-none">
                    <form wire:submit='addDebouche()'>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Debouche Title</label>
                                <input type="text" class="form-control" placeholder="Debouche Title" 
                                    wire:model='edited.titre'>
                            </div>
                            <div class="form-group">
                                <label >Description</label>
                                <input type="text" class="form-control"  placeholder="coefficient"
                                    wire:model='edited.description'>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




{{-- <script>
    window.addEventListener("openModal", event => {
        $("#modal_editDebouche").modal({
            "show": true,
            "backdrop": "static"
        })
    })
</script> --}}
