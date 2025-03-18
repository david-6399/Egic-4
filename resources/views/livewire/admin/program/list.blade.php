<div class="row m-1  my-3" wire:click='switchToCreate()'>
    <h1>Afficher Les Programs Par Formation</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Table Des Formation</h3>
                <div class="card-tools d-flex">
                    <div class="input-group input-group-sm mx-3" style="width: 150px;">
                        <select class="custom-select" >
                            {{-- <option>-----</option>                                     --}}
                            <option value="">Not Working yet</option>

                            <option value=""> </option>

                        </select>
                    </div>
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right"
                            placeholder="Not Working Yet" wire:model.live="search">

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
                            <th>Formation Name</th>
                            <th>Programs</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formations as $formation)
                            <tr>
                                <td>{{ $formation->id }}</td>
                                <td>{{ $formation->nome }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#modal_programAndModule"
                                        wire:click='modal_programAndModule({{ $formation->id }})'>
                                        Programs
                                    </button>
                                </td>
                                <td>
                                    {{-- <a href="#" class="btn btn-warning">Programs</a> --}}
                                    <a href="#" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>


<div class="modal fade show" id="modal_programAndModule" style="display: none;" aria-modal="true" role="dialog"
    wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- {{dump($programs)}} --}}

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Program</th>
                                    <th>Module</th>
                                    <th style="width: 40px">Label</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($showInput === true)
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nome De Program ..." wire:model='programName'>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-success" wire:click='addNewProgram()'>Valider</button>
                                        <button class="btn btn-danger" wire:click='addProgramAnnuler()'>Annuler</button>
                                    </td>
                                </tr>
                                @endif
                                @foreach ($programs as $program)
                                    <tr>
                                        <td>{{ $program->id }}.</td>
                                        <td>{{ $program->titre }}</td>
                                        @if (isset($program->module->name))
                                            <td>{{ $program->module->name }}</td>
                                            <td><span class="badge bg-success">DONE</span></td>
                                        @else
                                            <td>No Module Yet</td>
                                            <td><button class="btn btn-none m-0 p-0"
                                                    wire:click='addNewModule({{ $program->id }})' data-toggle="modal"
                                                    data-target="#modal_addNewModule">
                                                    <span class="badge bg-warning">SET</span></button></td>
                                        @endif
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary" wire:click='showInputForAdd()'>Ajputer une
                    program</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade show" id="modal_addNewModule" style="display: none;" aria-modal="true" role="dialog"
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

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form wire:submit='submitNewModule'>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="moduleTitle">Module Title</label>
                                <input type="text" class="form-control" id="moduleTitle" placeholder="Title"
                                    wire:model='module.name'>
                            </div>
                            <div class="form-group">
                                <label for="coefficient">Coefficient</label>
                                <input type="number" class="form-control" id="coefficient"
                                    placeholder="coefficient" wire:model='module.coefficient'>
                            </div>
                            <div class="form-group">
                                <label for="moduleImage">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="moduleImage"
                                            wire:model='moduleImage'>
                                        <label class="custom-file-label" for="moduleImage">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
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



<script>
    // window.addEventListener("openModal", event => {
    //     $("#modal_programAndModule").modal({
    //         "show": true,
    //         "backdrop": "static"
    //     })
    // })

    // window.addEventListener("openModal", event => {
    //     $("#modal_addNewModule").modal({
    //         "show": true,
    //         "backdrop": "static"
    //     })
    // })
</script>
