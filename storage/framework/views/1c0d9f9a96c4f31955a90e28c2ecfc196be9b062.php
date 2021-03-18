

<?php $__env->startSection('content'); ?>


                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo e(route('operateur.create')); ?>"><i class="fa fa-plus"></i> Ajouter</a>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Nom</th>
                                                <th>lOGIN</th>
                                                <th>password</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $operateurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operateur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($operateur->id); ?></td>
                                                <td><?php echo e($operateur->nom); ?></td>
                                                <td><?php echo e($operateur->email ?? ''); ?></td>
                                                <td><?php echo e($operateur->password_text ?? ''); ?></td>
                                                <td><?php echo e($operateur->role ?? ''); ?></td>

                                                <td>
                                                <a class="btn btn-info text-white" href="<?php echo e(route('operateur.edit',['operateur'=>$operateur->id])); ?>"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo e(route('operateur.destroy',['operateur'=>$operateur->id])); ?>" onclick="return confirm('Etes vous sure ?')"  class="btn btn-danger text-white"><i class="fa fa-window-close"></i></a>

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