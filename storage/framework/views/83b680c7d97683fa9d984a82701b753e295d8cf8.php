<?php $__env->startSection('content'); ?>
<?php 
use App\Setting;
?>
<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Paramètre de l'application  </h3></div>
                                    <div class="card-body">
                                        <form role="form" action="<?php echo e(route('setting.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Titre Général :</label>
                                                        <input type="text" required value="<?php echo e(Setting::getSetting('titre')); ?>" name="titre" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" value="<?php echo e(Setting::getSetting('addresse')); ?>" name="addresse" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Téléphone</label>
                                                        <input type="text" value="<?php echo e(Setting::getSetting('telephone')); ?>" name="telephone" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username:</label>
                                                        <input type="text" value="<?php echo e(Setting::getSetting('username')); ?>" name="username" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>mot de passe</label>
                                                        <input type="text" value="" name="password" class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                            <div clas="row">
                                                <div class ="col-sm-4">
                                                    <button type="submit" class="btn btn-info">
                                                        Valider
                                                    </button>
                                                </div>
                                            </div>
                                    </div>
                                </div>






                            </div>

                        </div>

                    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>