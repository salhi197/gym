<?php $__env->startSection('content'); ?>

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Nouveau Membre  </h3></div>
                                    <div class="card-body">
                                        <form role="form" action="<?php echo e(route('membre.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" required value="<?php echo e(old('nom')); ?>" name="nom" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Prénom</label>
                                                        <input type="text" required value="<?php echo e(old('prenom')); ?>" name="prenom" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" value="<?php echo e(old('adresse')); ?>" name="adresse" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Téléphone</label>
                                                        <input type="text" value="<?php echo e(old('telephone')); ?>" name="telephone" class="form-control">
                                                    </div>
                                                </div>

                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Genre</label>
                                                        <select class="form-control" name="sexe">
                                                            <option value="homme">Homme</option>						 
                                                            <option value="femme">Femme</option>						                                                             
                                                        </select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label>Fax</label>
                                                        <input type="text" value="<?php echo e(old('fax')); ?>" name="fax" class="form-control">
                                                    </div> -->
                                                </div>


                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Photo</label>
                                                        <input type="file" value="<?php echo e(old('photo')); ?>" name="photo" 
                                                        class="form-control">
                                                    </div>
                                                </div>


                                            </div>
                                    </div>
                                </div>



                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Type d'abonnement  </h3></div>
                                    <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Abonnement</label>
                                                        <select class="form-control" id="abonnement" name="abonnement">
                                                            <option value="">séléctionner un abonnement</option>
                                                            <?php $__currentLoopData = $abonnements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abonnement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($abonnement); ?>"><?php echo e($abonnement->label); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date début</label>
                                                        <input type="date" id="debut"  value="<?php echo e(Date('Y-m-d')); ?>" name="debut" class="form-control">
                                                    </div>

                                                </div>

                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Tarification:</label>
                                                        <input type="number"  name="tarif" value="0" id="tarif" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>date fin</label>
                                                        <input id="fin" type="date" value="<?php echo e(old('fin')); ?>" name="fin" class="form-control">
                                                    </div>
                                                </div>

                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Nombre de mois</label>
                                                        <input type="number"  value="<?php echo e(old('nbrmois') ?? 1); ?>" min="1" id="nbrmois" name="nbrmois" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Total</label>
                                                        <input type="number" id="total" value="<?php echo e(old('remise')); ?>" name="remise" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Remise</label>
                                                        <input type="number" value="<?php echo e(old('remise') ?? 0); ?>" name="remise" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Versement</label>
                                                        <input type="number" value="<?php echo e(old('versement') ?? 0); ?>" id="versement" name="versement" class="form-control">
                                                    </div>
                                                    

                                                </div>

                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" id="valider"  class="btn btn-info btn-block">Valider</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>



                            </div>

                        </div>

                    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function() {
    $('#abonnement').on('change',function(event){
        var value = JSON.parse(this.value);
        $('#tarif').val(value.tarif)

    })
    $('#nbrmois').on('change',function(event){
        var value = this.value;
        var debut = new Date($('#debut').val());
        var fin  = debut.setMonth(debut.getMonth()+value); 
        $('#total').val(value*$('#tarif').val())
        $('#versement').val(value*$('#tarif').val())
        $('#fin').val(fin)
    })

});

</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>