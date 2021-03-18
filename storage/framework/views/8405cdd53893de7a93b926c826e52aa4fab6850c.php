

<?php $__env->startSection('page_wrapper'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                <a href="<?php echo e(route('stock.create')); ?>"><i class="fa fa-plus"></i> Ajouter produit</a>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>                                                
                                                <th>produit</th>
                                                <th>fournisseur</th>
                                                <th>prix achat</th>
                                                <th>quantité</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($stock->id ?? ''); ?></td>                                                
                                                <td><?php echo e($stock->getProduit()['designation'] ?? ''); ?></td>
                                                <td><?php echo e($stock->fournisseur ?? ''); ?></td>
                                                <td><?php echo e($stock->prix ?? ''); ?></td>
                                                <td><?php echo e($stock->quantite ?? ''); ?></td>
                                                <td><span class="badge badge-success">entré</span</td>
                                                <td>
                                                    <a class="btn btn-info text-white" href="<?php echo e(route('stock.edit',['stock'=>$stock->id])); ?>"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo e(route('stock.destroy',['stock'=>$stock->id])); ?>" onclick="return confirm('Etes vous sure ?')"  class="btn btn-danger text-white"><i class="fa fa-window-close"></i></a>
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