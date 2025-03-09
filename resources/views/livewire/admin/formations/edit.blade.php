<div class="row m-1 btn btn-danger my-3" wire:click='switchToList()'>
    Back To product List
    <i class="nav-icon fas fa-user-alt ml-2"></i>
</div>



<div class="row">

    <div class="col-lg-12 ">
        <form enctype="multipart/form-data">
            <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title">Nouvelle Formation</h3>
                </div>
                <div class="row">

                    <div class="col-lg-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Formation Name :</label>
                                <input type="text"
                                    class="form-control border-primary @error('') is-invalid @enderror"
                                    placeholder="Proudct Name..." wire:model='editFormation.nome'>
                            </div>
                            <div class="form-group">
                                <label>La Durée de la formation</label>
                                <input type="number" class="form-control @error('') is-invalid @enderror"
                                    placeholder="Unit Price..." wire:model='editFormation.duree'>
                            </div>
                            <div class="form-group">
                                <label for="productQuantity">Tarif De la formation</label>
                                <input type="number" class="form-control @error('') is-invalid @enderror"
                                    id="productQuantity" placeholder="Quantity..." wire:model='editFormation.tarif'>
                            </div>

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input form-control @error('editImage') is-invalid @enderror" id="productImage" wire:model='editImage'>
                                    @error('editImage')
                                        <div class="text-danger ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label class="custom-file-label" for="productImage">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card-body">
                            <div class="border" style="height: 300px; width:300px; border-radius:20px">
                                @if(isset($editImage))
                                    <img src="{{ $editImage->temporaryUrl() }}" class="p-3" style="height: 300px; width:300px ; border-radius : 20px ; border : solid 1px #007BFF">
                                @else
                                    <div>
                                        <img src="{{asset($editFormation['image_path'])}}" class="p-3" style="height: 300px; width:300px ; border-radius : 20px ; border : solid 1px #007BFF">
                                    </div>
                                
                                @endif
                            </div>
                            <div wire:loading wire:target="">Uploading...</div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-12 ">
        <div class="row">

            {{-- Start Program section --}}
            <div class="col-lg-6">
                <form>
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter le program</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Add Title ..."
                                    wire:model.lazy='program.titre' wire:keydown.enter.prevent='addProgramToList()'>
                            </div>
                            @foreach ($listOfPrograms as $key => $index)
                                <div class="callout callout-warning d-flex justify-content-between">
                                    <h5>{{ $index }}</h5>
                                    <div wire:click='deleteProgram({{ $key }})'>
                                        <img src="{{ asset('adminImages/delete.png') }}" alt="Delete"
                                            style=" width:25px;">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
            {{-- End Program section --}}


            {{-- Start type formation --}}
            <div class="col-lg-6">
                <form>
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter le type de formation</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Les type</label>
                                <input type="text" class="form-control" placeholder="Ajouter un nouveau type"
                                    wire:model='newTypeFormation' wire:keydown.enter.prevent='addTypeFormation()'>

                                <input type="text" class="form-control" placeholder="Category Name ..." hidden>
                                <select
                                    class="custom-select form-control-border border-width-2 @error('formation.typeFormation') is-invalid @enderror"
                                    wire:model='editFormation.typeFormation_id'>
                                    <option>--------------------------</option>
                                    @foreach ($typeFormations as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                    <option value="1">type 1</option>
                                </select>
                                @error('formation.typeFormation')
                                    <div class="text-danger ">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- End type formation --}}

            

        </div>

    </div>
    <div class="col-lg-6">
        <form>
            <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title">Ajputer les débouchés</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Add Title ..."
                            wire:model='debouche.titre' wire:keydown.enter.prevent='addDeboucheToList()'>
                    </div>
                    @foreach ($listOfDebouches as $key => $index)
                        <div class="callout callout-warning d-flex justify-content-between">
                            <h5>{{ $index }}</h5>
                            <div wire:click='deleteDebouche({{ $key }})'>
                                <img src="{{ asset('adminImages/delete.png') }}" alt="Delete" style=" width:25px;">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>

</div>
<div class="row m-2">
    <button type="submit" class="btn btn-primary" wire:click='updateFormation()'>Update Product</button>
</div>
