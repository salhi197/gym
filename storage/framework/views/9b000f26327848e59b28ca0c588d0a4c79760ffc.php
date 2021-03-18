



<?php $__env->startSection('content'); ?>

<div class="container-fluid">

                        <h1 class="mt-4"> categories</h1>

                            <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus"></i> Add categorie
                                </button>
                            </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class=" text-primary">
                                                <tr>
                                                    <th>ID categorie</th>
                                                    <th>label</th>
                                                    <th>actions</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($categorie->id ?? ''); ?></td>
                                            <td><?php echo e($categorie->label ?? ''); ?></td>
                                            <td >
                                                <div class="table-action">  
                                                    <a  href="<?php echo e(route('categorie.destroy',['categorie'=>$categorie->id])); ?>"
                                                    onclick="return confirm('etes vous sure  ?')"
                                                    class="btn btn-danger text-white"><i class="fa fa-trash"></i> &nbsp; </a>

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
        <h5 class="modal-title" id="exampleModalLabel">Add Categorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
            <form id="categorieFform" action="<?php echo e(route('categorie.create')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Categorie: </label>
                    <input type="text" name="categorie"  class="form-control"/>
                </div>    
                  



                
                <button class="btn btn-primary btn-block" type="submit" id="ajax_categorie">ajouter categorie</button>
            </form>
      </div>
    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>
        $(document).ready(function() {
        	var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus5", "#minus5", {
		        limit:10,
		        formPrefix : "dynamic_form",
		        normalizeFullForm : false
		    });

		    $("#dynamic_form #minus5").on('click', function(){
		    	var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
		    	if (initDynamicId === 2) {
		    		$(this).closest('#dynamic_form').next().find('#minus5').hide();
		    	}
		    	$(this).closest('#dynamic_form').remove();
		    });

		    $('#categorieFform').on('submit', function(event){
	        	var values = {};
				$.each($('#categorieFform').serializeArray(), function(i, field) {
				    values[field.name] = field.value;
				});
				console.log(values)
        	})
        });



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>