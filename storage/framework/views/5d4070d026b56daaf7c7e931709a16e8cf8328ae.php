<?php $__env->startSection('header'); ?>
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Liste de crenaus </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
                    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a  class="btn btn-primary" href="<?php echo e(route('crenau.create')); ?>">
                                        <i class="fa fa-plus"></i> Ajouter crenau
                                    </a>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Type</th>
                                                <th>Jour</th>
                                                <th>Plage Horraire</th>                                                
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $crenaus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crenau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($crenau->id ?? ''); ?></td>
                                                <td>
                                                    <?php if($crenau->type = "homme"): ?>
                                                        <span class="badge badge-info">
                                                        <?php echo e($crenau->type ?? ''); ?>

                                                        </span>                                                    
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">
                                                        <?php echo e($crenau->type ?? ''); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($crenau->jour ?? ''); ?></td>

                                                <?php 
                                                    $plage = json_decode($crenau->plage);
                                                ?>
                                                <td>
                                                    <?php $__currentLoopData = $plage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($p->debut ?? ''); ?>

                                                            -
                                                        <?php echo e($p->fin ?? ''); ?>                                                         
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td>
                                                <a class="btn btn-danger text-white"  onclick="return confirm('Are you sure?')"  href="<?php echo e(route('crenau.destroy',['crenau'=>$crenau->id])); ?>">Supprimer</a>
                                                <a class="btn btn-info text-white"  href="<?php echo e(route('crenau.edit',['crenau'=>$crenau->id])); ?>">Edit</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter crenau</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="<?php echo e(route('crenau.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="hidden" value="<?php echo e($membre->id ?? ''); ?>" name="membre" />
                                                <div class="form-group">
                                                    <label>Abonnement</label>
                                                    <select class="form-control" id="abonnement" name="abonnement">
                                                        <option value="">séléctionner un abonnement</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Date début</label>
                                                    <input type="date" id="debut"  value="<?php echo e(Date('Y-m-d')); ?>" name="debut" class="form-control">
                                                </div>

                                            </div>

                                            <div class ="col-sm-4">
                                                <div class="form-group">
                                                    <label>Tarification:</label>
                                                    <input type="number"  name="tarif" value="0" id="tarif" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>date fin</label>
                                                    <input id="fin" type="date" value="<?php echo e(old('fin')); ?>" name="fin" class="form-control">
                                                </div>
                                            </div>

                                            <div class ="col-sm-4">
                                                <div class="form-group">
                                                    <label>Nombre de mois</label>
                                                    <input type="number"  value="<?php echo e(old('nbrmois') ?? 1); ?>" min="1" id="nbrmois" name="nbrmois" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <input type="number" id="total" value="<?php echo e(old('total')); ?>" name="total" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Remise</label>
                                                    <input type="number" value="<?php echo e(old('remise') ?? 0); ?>" id="remise" name="remise" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Versement</label>
                                                    <input type="number" value="<?php echo e(old('versement') ?? 0); ?>" id="versement" name="versement" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>T.T.C : </label>
                                                    <input type="number" value="<?php echo e(old('ttc') ?? 0); ?>" id="ttc" name="ttc" class="form-control">
                                                </div>
                                                

                                            </div>

                                        </div>


                                    <div class="col-sm-12">
                                        <button type="submit" id="valider"  class="btn btn-info btn-block">Valider</button>
                                    </div>


                                    </form>
                                </div>
                            </div>
                </div>
                </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

$(document).ready(function() {
    $('#abonnement').on('change',function(event){
        var value = JSON.parse(this.value);
        $('#tarif').val(value.tarif)
        $('#total').val($('#nbrmois').val()*$('#tarif').val())
        $('#versement').val($('#nbrmois').val()*$('#tarif').val())

    })
    $('#nbrmois').on('change',function(event){
        var value = this.value;
        var debut = new Date($('#debut').val());
        var fin  = debut.setMonth(debut.getMonth()+value); 
        $('#total').val(value*$('#tarif').val())
        $('#versement').val(value*$('#tarif').val())
        $('#fin').val(fin)
    })

});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>