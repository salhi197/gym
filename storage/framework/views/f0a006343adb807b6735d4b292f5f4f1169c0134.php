

<?php $__env->startSection('page_wrapper'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Nouveau stock  </h3></div>
                                    <div class="card-body">
                                        <div class="leftSide"><!-- Begin of content -->
                                            <form action="<?php echo e(route('stock.store')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="container-fluid">
                                                    <div class="well sm">
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                <label for="">Produit :</label>
                                                                    <select class="form-control " id="" value="<?php echo e(old('produit')); ?>" name="produit">
                                                                        <option value="">séléctionner produit</option>

                                                                        <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($produit->id); ?>"><?php echo e($produit->designation); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="">Code barre</label>
                                                                    <input type="text" class="form-control" id="code_barre" value="<?php echo e(old('code_barre')); ?>" name="code_barre">
                                                                </div>
                                                            </div>  -->
                                                        </div>
                                                    </div>
                                                    <!-- <div class="well autres hidden">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="">Autres Produits :</label>
                                                                    <input type="text" value="<?php echo e(old('nomproduit')); ?>" name="nomproduit" id="produit" value="" autocomplete="off" placeholder="tapez une famille" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="">fournisseur</label>
                                                                    <input type="text" class="form-control" id="fournisseur" value="<?php echo e(old('fournisseur')); ?>" name="fournisseur">
                                                                </div>
                                                            </div> 
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label for="">Quantité</label>
                                                                    <input type="text" class="form-control" id="quantite" value="<?php echo e(old('quantite')); ?>" name="quantite">
                                                                </div>
                                                            </div> 
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label> prix d'achat</label>
                                                                    <input type="text" value="<?php echo e(old('prix')); ?>" name="prix" id="prix" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Date :</label>
                                                                    <input type="date" value="<?php echo e(old('date_stock')); ?>" name="date_stock" id="date_stock" class="form-control mesdates">
                                                                </div>
                                                            </div>
 
                                                        </div>
                                                    </div>
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <p></p>
                                                                    <button type="submit" id="valider" class="btn btn-info btn-block">Valider</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    









<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function() {
    $('.produits').select2();
    $('.settings').select2();
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>