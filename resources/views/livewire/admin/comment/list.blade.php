<div class="row m-1 btn btn-primary my-3" wire:click='switchToCreate()'>
    Créer une nouvelle formation
    <i class="nav-icon fas fa-user-alt ml-2"></i>
</div>
{{-- <h1>{{dump($debouches)}}</h1> --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>
                <div class="card-tools d-flex">
                    <div class="input-group input-group-sm mx-3" style="width: 150px;">
                        <select class="custom-select" wire:model.live="perStatus" >
                            {{-- <option>-----</option>                                     --}}
                            <option value="">-----------------</option>
                           
                                <option value="approved" class="text-bold">Approved</option>
                                <option value="notApproved" class="text-bold">Not Approved</option>
                            
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
                            <th>Contenu</th>
                            <th>Statu</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                            <tr >
                                <td>{{$comment->id}}-</td>
                                <td class="text-truncate" style="max-width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{$comment->contenu}}</td>
                                <td>
                                    @if($comment->status == 'approved')
                                        <span class="badge bg-success">
                                            {{$comment->status}}
                                        </span>
                                    @elseif($comment->status == 'notApproved')
                                        <span class="badge bg-warning">
                                            {{$comment->status}}
                                        </span>

                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-info" wire:click='switchToApprove({{$comment->id}})'>
                                        <img src="{{asset('adminImages/delete.png')}}" style="height: 20px; width:20px" alt=""> Approve</button>
                                    <button class="btn btn-info" wire:click='switchToNotApprove({{$comment->id}})'>
                                        <img src="{{asset('adminImages/delete.png')}}" style="height: 20px; width:20px" alt=""> Disapprove</button>
                                </td>
                            </tr>
                        @endforeach
                        

                    </tbody>
                </table>
                <div class="mx-3 pt-3 border-top">
                    
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
