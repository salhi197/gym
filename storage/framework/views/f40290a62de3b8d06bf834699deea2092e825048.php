<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">

            <div class="container">
                <div class="row">
                <div class="col-md-12">
                        <div class="invoice-title">
                            <h2></h2><h3 class="pull-right">Voir Produit  <?php echo e($produit->id); ?></h3>
                        </div>
                        <hr>
                       
                        <div class="row">
                            <div class="col-md-4">
                                <address>
                                    <strong>Produit :</strong><br>
                                    <?php echo e($produit->created_at); ?><br><br>
                                </address>
                            </div>

                            <div class="col-md-4">
                                <address>
                                    <strong>Produit :</strong><br>

                                    <?php
                                        $livreur = json_decode($produit->livreur); 
                                    ?>
                                    <?php  if(isset($livreur->name)){echo '<i class="fa fa-user" style="color:yellow;"></i>'.$livreur->name.'<br>';}else{echo '<i class="fa fa-user" style="color:yellow;"></i> ';}?>
                                    <?php  if(isset($livreur->prenom)){echo $livreur->prenom.'<br>';}?>
                                    <?php  if(isset($livreur->telephone)){echo '<i class="fa fa-phone"></i> '.$livreur->telephone.'<br>';}?>
                                    <?php  if(isset($livreur->adress)){echo '<i class="fa fa-map-marker"></i> '.$livreur->adress.'<br>';}?>
                                </address>
                            </div>

                            <div class="col-md-4">
                                <address>
                                    <strong>Fournisseur :</strong>
                                        <?php echo e($produit->nom_client ?? 'non définie'); ?><br>
                                        <?php echo e($produit->telephone ?? 'non définie'); ?><br>
                                        <?php echo e(App\Commande::getWilaya($produit->wilaya) ?? 'non définie'); ?><br>
                                        <?php echo e(App\Commande::getCommune($produit->commune) ?? 'non définie'); ?><br>
                                </address>
                            </div>


                        </div>
                    </div>

                </div>
                
                <div class="row" id="commande">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Bon de réception :</strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <td><strong>element</strong></td>
                                                <td class="text-center"><strong>prix achat</strong></td>
                                                <td class="text-center"><strong>prix vente</strong></td>
                                                <td class="text-center"><strong>Quantité</strong></td>
                                                <td class="text-center"><strong>total</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo e($produit['nom'] ?? 'non définie'); ?>  </td>
                                                <td class="text-center"><?php echo e($produit['prix_vente'] ?? 'non définie'); ?> DA </td>
                                                <td class="text-center"><?php echo e($produit['prix_fournisseur'] ?? 'non définie'); ?> DA </td>
                                                <td class="text-center"><?php echo e($produit['quantite'] ?? 'non définie'); ?> DA </td>
                                                <td class="text-center"><?php echo e($produit['quantite']*$produit['prix_fournisseur'] ?? 'non définie'); ?> DA </td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center"><strong>Total final </strong></td>
                                                <td class="no-line text-right"><?php echo e($produit['quantite']*$produit['prix_fournisseur'] ?? 'non définie'); ?> DA </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-success" id="print">
                                        Imprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        $('#print').on("click", function () {
            console.log('sa')
            $('#commande').printThis({
                base: "https://jasonday.github.io/printThis/"
            });
        });
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>