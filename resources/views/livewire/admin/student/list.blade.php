    <div class="row m-1 btn btn-primary my-3" wire:click='switchToCreatePage()'>
        Créer un nouveau etudiant
        <i class="nav-icon fas fa-user-alt ml-2"></i>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Fixed Header Table</h3>
            <div class="card-tools d-flex">
                <div class="input-group input-group-sm mx-3" style="width: 150px;">
                    <select class="custom-select" wire:model.live="perUserStatus">
                        <option value= "" >Chose Per type</option>
                        <option value="1"> Etudiant</option>
                        <option value="0">Pas Un Etudiant</option>
                    </select>
                </div>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search"
                            wire:model.live='search'>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>Etat de l'utilisateur</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>+2135555555</td>
                            @if ($user->admin)
                                <td>Admin</td>
                            @elseif($user->student)
                                <td>Etudiant</td>
                            @elseif($user->user)
                                <td>User</td>
                            @elseif($user->wtbs)
                                <td>Veut etre etudiant</td>
                            @endif
                            <td>
                                @if ($user->formation_subs_id)
                                    <span class="badge badge-success">Etudiant</span>
                                @else
                                    <span class="badge badge-danger">Pas Un Etudiant</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-info">Edit</button>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modal-lg" wire:click='userProfile({{ $user->id }})'>
                                    Modal
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    {{ $users->links() }}


    <style>
        .countdown-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .countdown-item {
            display: inline-block;
            margin: 0 10px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .countdown-label {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="countdown-container">
                    <h3 class="mb-4">Countdown to Event</h3>
                    <div id="countdown">
                        <div class="countdown-item">
                            <span id="days">00</span>
                            <div class="countdown-label">Days</div>
                        </div>
                        <div class="countdown-item">
                            <span id="hours">00</span>
                            <div class="countdown-label">Hours</div>
                        </div>
                        <div class="countdown-item">
                            <span id="minutes">00</span>
                            <div class="countdown-label">Minutes</div>
                        </div>
                        <div class="countdown-item">
                            <span id="seconds">00</span>
                            <div class="countdown-label">Seconds</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade show" id="modal-lg" aria-modal="true" role="dialog"
        style="padding-right: 21px; display: none;" wire:ignore.selfe>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                            wire:model='userInfo.name'>
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Age d'utilisateur</label>
                                        <input type="number" class="form-control" id="age" placeholder="Age .."
                                            wire:model='userInfo.age'>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Email@ .." wire:model='userInfo.email' disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneNumber">Numero de téléphone</label>
                                        <input type="number" class="form-control" id="phoneNumber"
                                            placeholder="phone number" wire:model='userInfo.number'>
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

                                    {{-- <div class="form-group">
                                        <label for="formation">Formation a choissir</label>
                                        <input type="text" class="form-control" id="formation"
                                            placeholder="formation .." wire:model='userInfo.formation_sub.nome'>
                                    </div> --}}

                                    <div class="form-group">
                                        <label>Selectioner une formation</label>
                                        <select class="form-control" wire:model='userInfo.formation_subs_id'>
                                            <option value="">-- Select --</option>
                                            @foreach ($formations as $formation)
                                                <option value="{{ $formation->id }}">{{ $formation->nome }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="date_start">Formation Commencer</label>
                                        <input type="date" class="form-control" id="date_start"
                                            placeholder="Formation Commencer .."
                                            wire:model='userInfo.formation_start'>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_fin">Formation Fin</label>
                                        <input type="date" class="form-control" id="date_fin"
                                            placeholder="Formation Fin .." wire:model='userInfo.formation_end'>
                                    </div>
                                    {{-- {{now() - $userInfo['formation_end']}} --}}
                                    <div class="form-group">
                                        <label for="created_by">Utilisateur created by</label>
                                        <input type="text" class="form-control" id="created_by"
                                            placeholder="Created by" wire:model='userInfo.created_by' disabled>
                                    </div>

                                    <div class="dropdown-divider"></div>

                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1"
                                                wire:model='userInfo.admin'>
                                            <label class="custom-control-label" for="customSwitch1">Admin</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch2"
                                                wire:model='userInfo.user'>
                                            <label class="custom-control-label" for="customSwitch2">User</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                                wire:model='userInfo.student'>
                                            <label class="custom-control-label" for="customSwitch3">Etudiant</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch4"
                                                wire:model='userInfo.wtbs'>
                                            <label class="custom-control-label" for="customSwitch4">Veut etre
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click='saveUserInfo()'>Save
                        changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
