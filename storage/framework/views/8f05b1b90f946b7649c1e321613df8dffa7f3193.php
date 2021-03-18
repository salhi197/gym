



<?php $__env->startSection('content'); ?>

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Nouveau Produit  </h3></div>
                                    <div class="card-body">
                                        <form role="form" action="<?php echo e(route('produit.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Famille Produits</label>
                                                        <select class="form-control" name="categorie">
                                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->label); ?></option>						 
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Désignation Produit</label>
                                                        <input type="text" name="designation" required="" class="form-control">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Durée de validité</label>
                                                        <input type="number" name="duree" value="0" required="" class="form-control">
                                                    </div>
                                                </div> -->
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button type="submit" id="valider" class="btn btn-info btn-block">Valider</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    









<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>