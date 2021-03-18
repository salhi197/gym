

<?php $__env->startSection('page_wrapper'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo e(route('facture.create')); ?>"><i class="fa fa-plus"></i> Ajouter facture</a>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>numéro</th>
                                                <th>client</th>
                                                <th>montantReception</th>
                                                <th>etat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $factures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($facture->numero); ?></td>
                                                <td><?php echo e($facture->getClient()['nom']); ?></td>
                                                <td><?php echo e($facture->montant ?? ''); ?></td>
                                                <td><?php echo e($facture->etat ?? ''); ?></td>
                                                <td>
                                                    <a class="btn btn-info text-white" href="<?php echo e(route('facture.edit',['facture'=>$facture->id])); ?>"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo e(route('facture.destroy',['facture'=>$facture->id])); ?>" onclick="return confirm('Etes vous sure ?')"  class="btn btn-danger text-white"><i class="fa fa-window-close"></i></a>
                                                    <a href="<?php echo e(route('facture.print',['facture'=>$facture->id])); ?>"  class="btn btn-danger text-white"><i class="fa fa-print"></i></a>
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