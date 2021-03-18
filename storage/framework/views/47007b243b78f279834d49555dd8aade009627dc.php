

<?php $__env->startSection('page_wrapper'); ?>
<?php echo $__env->make('includes.settings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Nouveau Paramètres  </h3></div>
                                    <div class="card-body">
                                        <div class="leftSide"><!-- Begin of content -->
                                            <form method="post" action="<?php echo e(route('reference.store')); ?>">
                                                <?php echo csrf_field(); ?>


                                            <div class="panel panel-default validation">
                                                
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Type analyse</label>
                                                        <select class="form-control " id="type" value="<?php echo e(old('type')); ?>" name="type">
                                                            <option value="Micro-biologique">Micro-biologique</option>
                                                            <option value="Organo-liptique">Organo-liptique</option>
                                                            <option value="Physico-chimique">Physico-chimique</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Produit</label>
                                                        <select class="form-control produits"  value="<?php echo e(old('produit')); ?>" name="produit">
                                                            <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($produit->id); ?>"><?php echo e($produit->designation); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Paramètre</label>
                                                        <select class="form-control settings" id="type" value="<?php echo e(old('setting')); ?>" name="setting">
                                                        <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($setting->id); ?>"><?php echo e($setting->determination); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>
                                            
                                        
                                            <div class="well">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Methode</label>
                                                            <input type="text" id="methode" value="<?php echo e(old('methode')); ?>" name="methode" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Norme m</label>
                                                            <input type="text" id="pm" value="<?php echo e(old('norme_m')); ?>" name="norme_m" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Norme M</label>
                                                            <input type="text" id="gm" value="<?php echo e(old('norme_mm')); ?>" name="norme_mm" class="form-control">
                                                        </div>
                                                    </div>	
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p></p>
                                                    <button type="submit" id="valider" class="btn btn-info btn-block">Valider</button>
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