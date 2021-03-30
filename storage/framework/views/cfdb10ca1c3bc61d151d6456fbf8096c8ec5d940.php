<div class="modal fade" id="exampleModal<?php echo e($abonnement->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier abonnement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="abonnementFform" action="<?php echo e(route('abonnement.update',['abonnement'=>$abonnement->id])); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Type: </label>
                    <div class="form-check">
                        <input class="form-check-input" value="homme" type="radio" <?php if($abonnement->type=="homme"): ?> checked <?php endif; ?> name="type" id="type1">
                        <label class="form-check-label" for="type1">
                            Homme
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="femme" type="radio" <?php if($abonnement->type=="femme"): ?> checked <?php endif; ?> name="type" id="type2" checked>
                        <label class="form-check-label" for="type2">
                            Femme
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="mixte" type="radio" <?php if($abonnement->type=="mixte"): ?> checked <?php endif; ?> name="type" id="type2" checked>
                        <label class="form-check-label" for="type2">
                            Mixte (Homme & Femme)
                        </label>
                    </div>
                </div>


                <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Titre Abonnement: </label>
                    <input type="text" value="<?php echo e($abonnement->label); ?>" name="label"  class="form-control"/>
                </div>  
                <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Nombre de fois par semaine: </label>
                    <input type="number" value="<?php echo e($abonnement->nbrsemaine); ?>" name="nbrsemaine"  class="form-control"/>
                </div>  
                
                <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Tarif: </label>
                    <input type="number" value="<?php echo e($abonnement->tarif); ?>" name="tarif"  class="form-control"/>
                </div>  
                <button class="btn btn-primary btn-block" type="submit" id="ajax_abonnement">ajouter l'abonnement</button>
            </form>
      </div>
    </div>
  </div>
</div>
