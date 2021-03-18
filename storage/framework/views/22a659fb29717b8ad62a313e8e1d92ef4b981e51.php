

<?php $__env->startSection('content'); ?>


<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo e(route('client.create')); ?>"><i class="fa fa-plus"></i> Ajouter</a>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Code</th>
                                                <th>Raison Sociale</th>
                                                <th>Catégorie</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($client->id); ?></td>
                                                <td><?php echo e($client->code); ?></td>
                                                
                                                <td><?php echo e($client->raison_sociale); ?></td>
                                                <td><?php echo e($client->getCategorie()['label'] ?? ''); ?></td>
                                                <td>
                                                <a class="btn btn-info text-white" href="<?php echo e(route('client.edit',['client'=>$client->id])); ?>"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo e(route('client.destroy',['client'=>$client->id])); ?>" onclick="return confirm('Etes vous sure ?')"  class="btn btn-danger text-white"><i class="fa fa-window-close"></i></a>
                                                <a class="btn btn-danger text-white"><i class="fa fa-print"></i></a>
                                                <input type="checkbox" class="state" id="<?php echo e($client->id); ?>" <?php if($client->etat == 1): ?> checked <?php endif; ?> 
                                                data-toggle="toggle" data-size="mini">

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
                url: '/client/state/'+id,
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