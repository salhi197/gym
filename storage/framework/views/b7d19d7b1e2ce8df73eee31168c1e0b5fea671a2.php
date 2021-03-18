



<?php $__env->startSection('content'); ?>

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Nouveau Client  </h3></div>
                                    <div class="card-body">
                                        <form role="form" action="<?php echo e(route('operateur.update',['operateur'=>$operateur->id])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" value="<?php echo e($operateur->nom); ?>" name="nom" class="form-control" required="true">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Login (email)</label>
                                                        <input type="text" value="<?php echo e($operateur->email); ?>" name="email" class="form-control" autocomplete="off">
                                                    </div> 
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Mot de passe</label>
                                                        <input type="text" value="<?php echo e($operateur->password_text); ?>" name="password" class="form-control">
                                                    </div> 
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Rôle</label>
                                                        <select class="form-control" value="<?php echo e($operateur->role); ?>" name="role">
                                                            <option value="Administrateur" <?php if($operateur->role == "Administrateur"): ?> selected <?php endif; ?>>Administrateur</option>
                                                            <option value="Utilisateur" <?php if($operateur->role == "Utilisateur"): ?> selected <?php endif; ?>>Utilisateur</option>
                                                            <option value="ChargeSortie" <?php if($operateur->role == "ChargeSortie"): ?> selected <?php endif; ?>>Chargé de Sortie</option>
                                                        </select>
                                                    </div> 
                                                </div>


                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Type</label>
                                                        <select class="form-control" name="type">
                                                            <option value="1" <?php if($operateur->type ==1): ?> selected <?php endif; ?>>micro biologie</option>
                                                            <option value="2" <?php if($operateur->type ==2): ?> selected <?php endif; ?>>physico chimique</option>
                                                        </select>
                                                    </div> 
                                                </div>


                                                <div class="col-sm-2">
                                                    <label>&nbsp;</label>
                                                    <button type="submit" id="valider" class="btn btn-info btn-block">Ok</button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    









<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>