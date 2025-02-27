<div >
    <div class="course-info d-flex justify-content-between align-items-center">
        <h5>Ajouter Aux Favoris</h5>
        
            <button type="submit" class="btn" wire:click='addToFavoris()'>
                 <i class="{{ $isFavorited ? 'bx bxs-heart text-danger' : 'bx bx-heart' }}"></i>
            </button>
        
    </div>
</div>
