



<?php $__env->startSection('content'); ?>

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Nouveau Client  </h3></div>
                                    <div class="card-body">
                                        <form role="form" action="<?php echo e(route('client.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                            <div class ="row">
                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Catégorie</label>
                                                        <select class="form-control" name="categorie">
                                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->label); ?></option>						 
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label>Raison sociale</label>
                                                        <input type="text" required value="<?php echo e(old('raison_sociale')); ?>" name="raison_sociale" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" required value="<?php echo e(old('nom')); ?>" name="nom" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" value="<?php echo e(old('adresse')); ?>" name="adresse" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Wilaya</label>
                                                        <select class="form-control" value="<?php echo e(old('wilaya')); ?>" name="wilaya">
                                                        <?php $__currentLoopData = $wilayas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilaya): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($wilaya->code); ?>"><?php echo e($wilaya->name ?? ''); ?></option>	
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Tél</label>
                                                        <input type="text" value="<?php echo e(old('telephone')); ?>" name="telephone" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Fax</label>
                                                        <input type="text" value="<?php echo e(old('fax')); ?>" name="fax" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>N° Registre</label>
                                                        <input type="text" value="<?php echo e(old('n_registre')); ?>" name="n_registre" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>N° Nif</label>
                                                        <input type="text" value="<?php echo e(old('nif')); ?>" name="nif" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>N° Nis</label>
                                                        <input type="text" value="<?php echo e(old('nis')); ?>" name="nis" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>N° Article</label>
                                                        <input type="text" value="<?php echo e(old('n_article')); ?>" name="n_article" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>e-mail</label>
                                                    <input type="text" value="<?php echo e(old('email')); ?>" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Mot de passe</label>
                                                    <input type="password"  name="password" class="form-control">
                                                </div>
                                            </div>
                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Type</label>
                                                        <select class="form-control" name="type">
                                                            <option value="bis">bis</option>						 
                                                            <option value="standard">standard</option>						                                                             
                                                        </select>
                                                    </div>
                                                </div>

                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button type="submit" id="valider"  class="btn btn-info btn-block">Valider</button>
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