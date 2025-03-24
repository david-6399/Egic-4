<div>
    @can('user')        
        <a href="#" class="dropdown-item" wire:click='becomeStudent({{auth()->user()->id}})'>Devenir étudiant</a>
    @endcan
</div>
