<div class="row m-1 btn btn-primary my-3" wire:click='switchToCreate()'>
    Créer une nouvelle formation
    <i class="nav-icon fas fa-user-alt ml-2"></i>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>
                <div class="card-tools d-flex" >
                    <div class="input-group input-group-sm mx-3" style="width: 150px;">
                        <select class="custom-select" wire:model.live="perPage">
                            {{-- <option>-----</option>                                     --}}
                            <option value="">Chose Per type</option>                                    
                            
                                <option value=""> </option>                                    
                            
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
                            <th>Formation Name</th>
                            <th>La durée</th>
                            <th>Le Tarif</th>
                            <th>Type de formation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <span class="badge bg-primary">
                                        
                                    </span>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
