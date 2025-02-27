<div>
    <section id="contact" class="contact">
        <div class="container" >
            <div class="row mt-5">

                <form class="php-email-formm" wire:submit='addComment()'>
                    <label for="">
                        <h3>Ajouter Votre Commentaire ICI :</h3>
                    </label>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="comment" rows="5" placeholder="Commentaire" wire:model='contenu'></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Chargement</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Votre message a été envoyé. Merci!</div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
