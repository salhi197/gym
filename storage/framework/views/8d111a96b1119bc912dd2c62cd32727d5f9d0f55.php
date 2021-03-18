<?php $__env->startSection('page_wrapper'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Modifier Facture  </h3></div>
                                    <div class="card-body">
                                        <div class="leftSide"><!-- Begin of content -->
                                            <form action="<?php echo e(route('facture.update',['facture'=>$facture->id])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="">client :</label>
                                                            <select class="form-control " id="" value="<?php echo e(old('client')); ?>" value="<?php echo e($facture->client); ?>" name="client">
                                                                    <option value="">séléctionner client</option>
                                                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if($client->id == $facture->client): ?> selected <?php endif; ?> value="<?php echo e($client->id); ?>"><?php echo e($client->nom); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="">Date Facture</label>
                                                        <input type="date" id="date" value="<?php echo e(date('Y-m-d')); ?>" class="form-control" value="<?php echo e($facture->date); ?>" name="date">   
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label for="">N° Facture</label>
                                                        <input type="text" id="numf" value="<?php echo e($facture->numero); ?>" name="numero" class="form-control numf">   
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="">N° BC</label>
                                                        <input type="text" id="numbc"  class="form-control" value="<?php echo e($facture->numerobc); ?>" name="numerobc">   
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="">N° Convention</label>
                                                        <input type="text" id="numbc"  class="form-control" value="<?php echo e($facture->convention); ?>" name="convention">   
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="<?php echo e($facture->type); ?>" name="type" id="tva" value="tva" <?php if($facture->type == "tva"): ?> checked <?php endif; ?>> Tva
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="<?php echo e($facture->type); ?>" name="type" id="timbre" value="timbre" <?php if($facture->type == "timbre"): ?> checked <?php endif; ?>> Timbre
                                                            </label>
                                                        </div>   
                                                    </div>
                                                </div>

                                                <div class="form-group" id="dynamic_form">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <input type="text" value="<?php echo e($facture->designation); ?>" name="designation" id="p_name" placeholder="désignation" class="form-control">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" class="form-control" value="<?php echo e($facture->quantite); ?>" name="quantite" id="quantite" placeholder="Quantité" >
                                                        </div>

                                                        <div class="col-md-2">
                                                            <input type="number" class="form-control" value="<?php echo e($facture->prix); ?>" name="prix" id="prix" placeholder="Prix" >
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" class="form-control" value="<?php echo e($facture->montant); ?>" name="montant" id="montant" placeholder="montant" >
                                                        </div>
                                                        <div class="button-group">
                                                            <a href="javascript:void(0)" class="btn btn-primary" id="plus5"><i class="fa fa-plus"></i></a>
                                                            <a href="javascript:void(0)" class="btn btn-danger" id="minus5"><i class="fa fa-minus"></i></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <button class="btn btn-info" id="calculer">Calculer Total</button>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <ul class="list-group">
                                                        <li class="list-group-item">TOTAL HT :<span id="total_ht"></span> </li>
                                                        <li class="list-group-item">TVA : <span id="tva"></span> </li>
                                                        <li class="list-group-item">Timbre : <span id="timbre"></span> </li>
                                                        <li class="list-group-item">Total TTC : <span id="total_ttc"></span> </li>
                                                    </ul>
                                                </div>
                                                <br>

                                                        <button class="btn btn-info" type="submit">valider</button>



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

        $('#calculer').on('click',function(e){
            e.preventDefault()
            var values = {};
            $.each($('#Commandeform').serializeArray(), function(i, field) {
                values[field.name] = field.value;
            });
            console.log(values)
            $.ajax({
                type: 'POST', //THIS NEEDS TO BE GET
                url: '/facture/calculer',
                data: {_token: CSRF_TOKEN, data:values},
                dataType: 'JSON',
                success: function (data) {
                    console.log(data)


                    var remise = $('#remise').val()
                    $('#total').val(data-remise)
                    
                    $('#fixedTotal').val(data)
                },
                error: function(err) { 
                    console.log(err);
                }
            });
        })
    var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus5", "#minus5", {
        limit:30,
        formPrefix : "dynamic_form",
        normalizeFullForm : false
    });

//    dynamic_form.inject([{p_name: 'Hemant',quantity: '123',remarks: 'testing remark'},{p_name: 'Harshal',quantity: '123',remarks: 'testing remark'}]);

    $("#dynamic_form #minus5").on('click', function(){
        var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
        if (initDynamicId === 2) {
            $(this).closest('#dynamic_form').next().find('#minus5').hide();
        }
        $(this).closest('#dynamic_form').remove();
    });

    $('form').on('submit', function(event){
        var values = {};
        $.each($('form').serializeArray(), function(i, field) {
            values[field.name] = field.value;
        });
        // console.log(values)
        // event.preventDefault();
    })


});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>