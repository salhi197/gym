<?php $__env->startSection('page_wrapper'); ?>
    <?php echo $__env->make('includes.categories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo e(route('produit.create')); ?>"><i class="fa fa-plus"></i> Ajouter produit</a>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Produit</th>
                                                <th>Famille</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($produit->id); ?></td>
                                                <td><?php echo e($produit->designation); ?></td>
                                                <td><?php echo e($produit->getCategorie()['label'] ?? ''); ?></td>
                                                <td>
                                                <a class="btn btn-info text-white" href="<?php echo e(route('produit.edit',['produit'=>$produit->id])); ?>"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo e(route('produit.destroy',['produit'=>$produit->id])); ?>" onclick="return confirm('Etes vous sure ?')"  class="btn btn-danger text-white"><i class="fa fa-window-close"></i></a>
                                                </td>
                                            </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>