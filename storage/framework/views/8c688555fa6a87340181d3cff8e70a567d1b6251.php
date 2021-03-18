

<?php $__env->startSection('page_wrapper'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo e(route('analyse.create')); ?>"><i class="fa fa-plus"></i> Ajouter analyse</a>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Type</th>
                                                <th>Reception</th>
                                                <th>Client</th>
                                                <th>Produit</th>
                                                <th>Operateur</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $analyses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $analyse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($analyse->id); ?></td>
                                                <td><?php echo e($analyse->reception); ?></td>
                                                <td><?php echo e($analyse->getClient()['nom'] ?? ''); ?></td>
                                                <td><?php echo e($analyse->getProduit()['designation'] ?? ''); ?></td>
                                                <td><?php echo e($analyse->getOperateur()['nom'] ?? ''); ?></td>
                                                <td><?php echo e($analyse->norme_mm); ?></td>

                                                <td>
                                                    <a class="btn btn-info text-white" href="<?php echo e(route('analyse.edit',['analyse'=>$analyse->id])); ?>"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo e(route('analyse.destroy',['analyse'=>$analyse->id])); ?>" onclick="return confirm('Etes vous sure ?')"  class="btn btn-danger text-white"><i class="fa fa-window-close"></i></a>
                                                    <a href="<?php echo e(route('analyse.print',['analyse'=>$analyse->id])); ?>"  class="btn btn-danger text-white"><i class="fa fa-print"></i></a>
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