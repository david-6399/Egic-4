<div class="modal fade show" id="switchToCreate" tabindex="-1" role="dialog" 
        style="padding-right: 21px; " wire:ignore.selfe>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Large Modal</h4>
                    <button type="button" class="close" wire:click='closeModal()'>
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                     <div class="row">
                        <div class="col-md-6">

                            <div class="card card-none">
                                {{-- <div class="card-header">
                                    <h3 class="card-title">Profile D'utilisateur</h3>
                                </div> --}}
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="nome">Nome d'utilisateur</label>
                                        <input type="text" class="form-control" id="nome" placeholder="Name .."
                                            wire:model='newUser.name'>
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Age d'utilisateur</label>
                                        <input type="number" class="form-control" id="age" placeholder="Age .."
                                            wire:model='newUser.age'>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Email@ .." wire:model='newUser.email' >
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneNumber">Numero de téléphone</label>
                                        <input type="number" class="form-control" id="phoneNumber"
                                            placeholder="phone number" wire:model='newUser.number'>
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneNumber">Numero de téléphone</label>
                                        <input type="number" class="form-control" id="phoneNumber"
                                            placeholder="phone number">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="card card-none">
                                {{-- <div class="card-header">
                                    <h3 class="card-title">Profile D'utilisateur</h3>
                                </div> --}}
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="formation">Formation a choissir</label>
                                        <input type="text" class="form-control" id="formation"
                                            placeholder="formation .." wire:model='newUser.formation_subs_id'>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_start">Formation Commencer</label>
                                        <input type="date" class="form-control" id="date_start"
                                            placeholder="Formation Commencer .."
                                            wire:model='newUser.formation_start'>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_fin">Formation Fin</label>
                                        <input type="date" class="form-control" id="date_fin"
                                            placeholder="Formation Fin .." wire:model='newUser.formation_end'>
                                    </div>
                                    {{-- {{now() - $newUser['formation_end']}} --}}
                                    <div class="form-group">
                                        <label for="created_by">Utilisateur created by</label>
                                        <input type="text" class="form-control" id="created_by" 
                                            wire:model='newUser.created_by' disabled >
                                    </div>

                                    <div class="dropdown-divider"></div>

                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitchFromCreate1"
                                                wire:model='newUser.admin' >
                                            <label class="custom-control-label" for="customSwitchFromCreate1">Admin</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitchFromCreate2"
                                                wire:model='newUser.user'>
                                            <label class="custom-control-label" for="customSwitchFromCreate2">User</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitchFromCreate3"
                                                wire:model='newUser.student'>
                                            <label class="custom-control-label" for="customSwitchFromCreate3">Etudiant</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitchFromCreate4"
                                                wire:model='newUser.wtbs'>
                                            <label class="custom-control-label" for="customSwitchFromCreate4">Veut etre
                                                etudiant</label>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default"  wire:click='closeModal()'>Close</button>
                    <button type="button" class="btn btn-primary" wire:click='createUser()'>Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>