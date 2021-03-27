                        <div class="modal fade" id="editInscription<?php echo e($inscription->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier Inscription</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="<?php echo e(route('inscription.update',['inscription'=>$inscription->id])); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="hidden" value="<?php echo e($membre->id ?? ''); ?>" name="membre" />
                                                <div class="form-group">
                                                    <label>Abonnement</label>
                                                    <select class="form-control" id="abonnement<?php echo e($inscription->id); ?>" name="abonnement">
                                                        <option value="">séléctionner un abonnement</option>
                                                        <?php $__currentLoopData = $abonnements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abonnement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($abonnement); ?>"><?php echo e($abonnement->label); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Date début</label>
                                                    <input type="date" id="debut<?php echo e($inscription->id); ?>"  value="<?php echo e(Date('Y-m-d')); ?>" name="debut" class="form-control">
                                                </div>

                                            </div>

                                            <div class ="col-sm-4">
                                                <div class="form-group">
                                                    <label>Tarification:</label>
                                                    <input type="number"  name="tarif" value="0" id="tarif<?php echo e($inscription->id); ?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>date fin</label>
                                                    <input id="fin<?php echo e($inscription->id); ?>" type="date" value="<?php echo e(old('fin')); ?>" name="fin" class="form-control">
                                                </div>
                                            </div>

                                            <div class ="col-sm-4">
                                                <div class="form-group">
                                                    <label>Nombre de mois</label>
                                                    <input type="number"  value="<?php echo e(old('nbrmois') ?? 1); ?>" min="1" id="nbrmois<?php echo e($inscription->id); ?>" name="nbrmois" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <input type="number" id="total<?php echo e($inscription->id); ?>" value="<?php echo e(old('total')); ?>" name="total" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Remise</label>
                                                    <input type="number" value="<?php echo e(old('remise') ?? 0); ?>" id="remise<?php echo e($inscription->id); ?>" name="remise" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Versement</label>
                                                    <input type="number" value="<?php echo e(old('versement') ?? 0); ?>" id="versement<?php echo e($inscription->id); ?>" name="versement" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>T.T.C : </label>
                                                    <input type="number" value="<?php echo e(old('ttc') ?? 0); ?>" id="ttc<?php echo e($inscription->id); ?>" name="ttc" class="form-control">
                                                </div>
                                                

                                            </div>

                                        </div>


                                    <div class="col-sm-12">
                                        <button type="submit" id="valider<?php echo e($inscription->id); ?>"  class="btn btn-info btn-block">Valider</button>
                                    </div>


                                    </form>
                                </div>
                            </div>