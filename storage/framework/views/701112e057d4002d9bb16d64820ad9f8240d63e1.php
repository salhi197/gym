



<?php $__env->startSection('content'); ?>

<div class="container-fluid">

                        <h1 class="mt-4"> abonnements</h1>

                            <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus"></i> Ajouter abonnement
                                </button>
                            </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class=" text-primary">
                                                <tr>
                                                    <th>ID abonnement</th>
                                                    <th>label</th>
                                                    <th>Tarif</th>
                                                    <th>actions</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $abonnements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abonnement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($abonnement->id ?? ''); ?></td>
                                            <td><?php echo e($abonnement->label ?? ''); ?></td>
                                            <td><?php echo e($abonnement->tarif ?? ''); ?> DA</td>
                                            <td >
                                                <div class="table-action">  
                                                    <a  href="<?php echo e(route('abonnement.destroy',['abonnement'=>$abonnement->id])); ?>"
                                                    onclick="return confirm('etes vous sure  ?')"
                                                    class="btn btn-danger text-white"><i class="fa fa-trash"></i> &nbsp; </a>

                                                    <a  href="<?php echo e(route('abonnement.edit',['abonnement'=>$abonnement->id])); ?>"
                                                    class="btn btn-info text-white"><i class="fa fa-edit"></i> &nbsp; </a>

                                                </div>
                                            </td>
                                        </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>



                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter abonnement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="abonnementFform" action="<?php echo e(route('abonnement.create')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Titre Abonnement: </label>
                    <input type="text" name="label"  class="form-control"/>
                </div>  
                <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Nombre de fois par semaine: </label>
                    <input type="number" name="nbrsemaine"  class="form-control"/>
                </div>  
                
                <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Tarif: </label>
                    <input type="number" name="tarif"  class="form-control"/>
                </div>  
                <button class="btn btn-primary btn-block" type="submit" id="ajax_abonnement">ajouter l'abonnement</button>
            </form>
      </div>
    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>