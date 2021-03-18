<?php $__env->startSection('content'); ?>


<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo e(route('inscription.create')); ?>" class="btn btn-info"><i class="fafa-plus"></i> Ajouter</a>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>debut</th>
                                                <th>fin</th>
                                                <th>reste</th>
                                                <th>nbsseance</th>
                                                <th>abonnement</th>
                                                <th>etat</th>
                                                <th>total</th>
                                                <th>remise</th>
                                                <th>nbrmois</th>
                                                <th>versement</th>
                                                <th>versement</th>
                                                
                                                <th>actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $inscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($inscription->id); ?></td>
                                                <td><?php echo e($inscription->debut ?? ''); ?></td>
                                                <td><?php echo e($inscription->fin ?? ''); ?></td>
                                                <td><?php echo e($inscription->reste ?? ''); ?></td>
                                                <td><?php echo e($inscription->nbrseance ?? ''); ?></td>
                                                <td><?php echo e($inscription->getAbonnement()['label'] ?? ''); ?></td>
                                                <td><?php echo e($inscription->etat ?? ''); ?></td>
                                                <td><?php echo e($inscription->total ?? ''); ?></td>
                                                <td><?php echo e($inscription->remise ?? ''); ?></td>
                                                <td><?php echo e($inscription->nbrmois ?? ''); ?></td>
                                                <td><?php echo e($inscription->versement ?? ''); ?></td>

                                                <td>
                                                    <?php if($inscription->etat == 0): ?>
                                                    <span class="badge badge-danger">Inactive</span>
                                                    <?php else: ?>
                                                    <span class="badge badge-info">Inactive</span>                                                    
                                                    <?php endif; ?>
                                                <?php echo e($inscription->status ?? ''); ?></td>                                            
                                                <td>
                                                <a class="btn btn-info text-white" href="<?php echo e(route('inscription.edit',['inscription'=>$inscription->id])); ?>"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-info text-white" href="<?php echo e(route('inscription.presence',['inscription'=>$inscription->id])); ?>"><i class="fa fa-list"></i></a>


                                                </td>
                                            </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

$(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('.state').on('change',function(e){
            var id = this.id
            console.log(id)

            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/inscription/state/'+id,
                dataType: 'JSON',
                success: function (data) {
                    console.log(data)
                    toastr.success('état changé');
                },
                error: function(err) { 
                    console.log(err)
                    toastr.error(err)
                }
            });
        })
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>