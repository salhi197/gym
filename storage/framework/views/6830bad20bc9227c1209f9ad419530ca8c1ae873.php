<?php $__env->startSection('content'); ?>


<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo e(route('membre.create')); ?>" class="btn btn-info"><i class="fafa-plus"></i> Ajouter</a>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>nom</th>
                                                <th>Prénom</th>
                                                <th>telephone</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $membres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($membre->id); ?></td>
                                                <td><?php echo e($membre->nom ?? ''); ?></td>
                                                <td><?php echo e($membre->prenom ?? ''); ?></td>
                                                <td><?php echo e($membre->telephone ?? ''); ?></td>                                            
                                                <td>
                                                    <?php if($membre->etat == 0): ?>
                                                    <span class="badge badge-danger">Inactive</span>
                                                    <?php else: ?>
                                                    <span class="badge badge-info">Inactive</span>                                                    
                                                    <?php endif; ?>
                                                <?php echo e($membre->status ?? ''); ?></td>                                            
                                                <td>
                                                <a class="btn btn-info text-white" href="<?php echo e(route('membre.edit',['membre'=>$membre->id])); ?>"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo e(route('membre.destroy',['membre'=>$membre->id])); ?>" onclick="return confirm('Etes vous sure ?')"  class="btn btn-danger text-white"><i class="fa fa-window-close"></i></a>
                                                <a class="btn btn-info text-white" href="<?php echo e(route('membre.inscriptions',['membre'=>$membre->id])); ?>">Inscriptions</a>
                                                
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
                url: '/membre/state/'+id,
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