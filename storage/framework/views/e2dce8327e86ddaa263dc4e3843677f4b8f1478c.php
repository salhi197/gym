

<?php $__env->startSection('page_wrapper'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Nouveau Analyse  </h3></div>
                                    <div class="card-body">
                                        <div class="leftSide"><!-- Begin of content -->
                                            <form action="<?php echo e(route('analyse.store')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="container-fluid">
                                                    <div class="well sm">
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                <label for="">client :</label>
                                                                    <select class="form-control " id="" value="<?php echo e(old('client')); ?>" name="client">
                                                                        <option value="">séléctionner client</option>

                                                                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($client->id); ?>"><?php echo e($client->nom); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="">&nbsp;</label>
                                                                    <select value="<?php echo e(old('type')); ?>" name="type" id="faitpar" class="form-control">
                                                                        <option value="1"> fait par les soins du laboratoire </option>
                                                                        <option value="0"> fait par les soins du propriétaire </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="">Code barre</label>
                                                                    <input type="text" class="form-control" id="code_barre" value="<?php echo e(old('code_barre')); ?>" name="code_barre">
                                                                </div>
                                                            </div>  -->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <table class="table results"></table>
                                                        </div>
                                                    </div>
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="">Categorie :</label>
                                                                    <select class="form-control " id="" value="<?php echo e(old('categorie')); ?>" name="categorie">
                                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->label); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                <label for="">Produits principals :</label>
                                                                    <select class="form-control produits" id="" value="<?php echo e(old('produit')); ?>" name="produit">
                                                                        <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($produit->id); ?>"><?php echo e($produit->designation); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="">Libellé Produit</label>
                                                                    <div>
                                                                        <select class="form-control lib_produit" value="<?php echo e(old('lib_produit')); ?>" name="lib_produit">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>  -->
                                                        </div>
                                                    </div>
                                                    <!-- <div class="well autres hidden">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="">Autres Produits :</label>
                                                                    <input type="text" value="<?php echo e(old('nomproduit')); ?>" name="nomproduit" id="produit" value="" autocomplete="off" placeholder="tapez une famille" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <table class="table resultsp"></table>
                                                        </div>
                                                    </div>
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label for="">Contenance</label>
                                                                    <select class="form-control" id="contenance" value="<?php echo e(old('contenance')); ?>" name="contenance">
                                                                        <option value="Poids">Poids</option>
                                                                        <option value="Volume">Volume</option>
                                                                    </select>
                                                                </div>
                                                            </div> 
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="">Valeur</label>
                                                                    <input type="text" class="form-control" id="valeur" value="<?php echo e(old('valeur')); ?>" name="valeur">
                                                                </div>
                                                            </div> 
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label for="">Provenance Produit</label>
                                                                    <input type="text" class="form-control" id="marque" value="<?php echo e(old('marque')); ?>" name="marque">
                                                                </div>
                                                            </div> 
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label>N° lot</label>
                                                                    <input type="text" value="<?php echo e(old('lot')); ?>" name="lot" id="lot" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Date de fabrication</label>
                                                                    <input type="date" value="<?php echo e(old('fabrication')); ?>" name="fabrication" id="fabrication" class="form-control mesdates">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">        
                                                                <div class="form-group ">
                                                                    <label>Date peremption</label>
                                                                    <input type="date" value="<?php echo e(old('peremption')); ?>" name="peremption" id="peremption" class="form-control mesdates">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">         
                                                                <div class="form-group">
                                                                    <label>Date de prelevement</label>
                                                                    <input type="date" required="" value="<?php echo e(old('prelevement')); ?>" name="prelevement" id="prelevement" class="form-control mesdates">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Date de reception</label>
                                                                    <input type="date" value="<?php echo e(old('reception')); ?>" name="reception" id="reception" class="form-control mesdates">
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <div class="checkbox">
                                                                        <label>
                                                                        <input type="checkbox" class="cocher" value="<?php echo e(old('analyse')); ?>" name="analyse" id="micro"> Analyse Micro-biologique
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <select class="form-control" id="op1" value="<?php echo e(old('operateur1')); ?>" name="operateur1">
                                                                    <?php $__currentLoopData = $operateurs1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operateur1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($operateur1->id); ?>"><?php echo e($operateur1->nom); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <div class="checkbox">
                                                                        <label>
                                                                        <input type="checkbox" class="cocher" value="<?php echo e(old('analyse')); ?>" name="analyse" id="physico"> Analyse Physico-chimique
                                                                        </label>
                                                                    </div>
                                                                </div>  
                                                                <select class="form-control" id="op2" value="<?php echo e(old('operateur2')); ?>" name="operateur2">
                                                                    <?php $__currentLoopData = $operateurs2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operateur2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($operateur2->id); ?>"><?php echo e($operateur2->nom); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>             
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <p></p>
                                                                    <button type="submit" id="valider" class="btn btn-info btn-block">Valider</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    









<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function() {
    $('.produits').select2();
    $('.settings').select2();
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>