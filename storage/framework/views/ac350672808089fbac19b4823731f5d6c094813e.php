<?php $__env->startSection('content'); ?>

                <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Nouveau Crénaux : </h3></div>
                                    <div class="card-body">
                                        <form role="form" action="<?php echo e(route('crenau.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Type: </label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="homme" type="radio" name="type" id="type1">
                                                            <label class="form-check-label" for="type1">
                                                                Homme
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="femme" type="radio" name="type" id="type2" checked>
                                                            <label class="form-check-label" for="type2">
                                                                Femme
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="mixte" type="radio" name="type" id="type2" checked>
                                                            <label class="form-check-label" for="type2">
                                                                Mixte (Homme & Femme)
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>
                                                            Jour : 
                                                        </label>
                                                        <select class="form-control" name="jour">
                                                            <option value="">Séléctionner un Jour</option>						 
                                                            <option value="samedi">Samedi</option>						 
                                                            <option value="dimanche">dimanche</option>						                                                             
                                                            <option value="lundi">lundi</option>						                                                             
                                                            <option value="mardi">mardi</option>						                                                             
                                                            <option value="mercredi">mercredi</option>						                                                             
                                                            <option value="jeudi">jeudi</option>						                                                             
                                                            <option value="vendredi">vendredi</option>						                                                             
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>



                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="font-weight-light my-4"> 
                                            Plage Horraire  
                                        </h3>
                                    </div>
                                        <div class="card-body">
                                                <div class="form-group" id="dynamic_form">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="time" name="debut" id="debut" placeholder="Heure Début" class="form-control debuts">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="time" class="form-control fins" name="fin" id="fin" placeholder="Heure Fin" >
                                                        </div>

                                                        <div class="button-group">
                                                            <a href="javascript:void(0)" class="btn btn-primary" id="plus5"><i class="fa fa-plus"></i></a>
                                                            <a href="javascript:void(0)" class="btn btn-danger" id="minus5"><i class="fa fa-minus"></i></a>
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

                    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/dynamic-form.js')); ?>"></script>

<script>
$(document).ready(function() {
    var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus5", "#minus5", {
        limit:10,
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
})


</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>