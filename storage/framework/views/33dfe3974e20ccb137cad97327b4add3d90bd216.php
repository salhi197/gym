<?php $__env->startSection('content'); ?>
        <div class="container-fluid">

        <?php if(Auth::guard('admin')->user()['is_super'] == 1): ?>

            <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"></h2>
                                        
                                    </div>
                                    
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body" >
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                
                                <div>
                                <h2 style="text-align: center;  "  ><B>Recette d'aujourd'hui</B></h2>
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">DA</sup></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total d'aujourd'hui
                                    </h6>
                                    
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">DA</sup>h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Versement d'aujourd'hui
                                    </h6>

                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">DA</sup>h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Reste d'aujourd'hui
                                    </h6>
                                    
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                     <h2 style="text-align: center;"  ><B>Recette du Mois</B></h2>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 style="text-align: center;  " class="text-dark mb-1 font-weight-medium"> DA</h2>
                                    </div>
                                    <h6 style="text-align: center;  " class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total du mois</h6>

                                    <div class="d-inline-flex align-items-center">
                                        <h2 style="text-align: center;  " class="text-dark mb-1 font-weight-medium"> DA</h2>
                                    </div>
                                    <h6 style="text-align: center;  " class="text-muted font-weight-normal mb-0 w-100 text-truncate">Versement du mois</h6>
                                </div>

                                

                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 style="text-align: center;"  ><B>Recette de l'année</B></h2>
                                    <h2 class="text-dark mb-1 font-weight-medium"></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total des traductions</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>

                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium"> DA</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Caisse</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
<?php endif; ?>
                <div class="card mb-4">
                <br>
            <h1 style="text-align: center; color: black; " ><B>Tableau de bord</B></h1>
                <div class="card-body">
                    <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    

  




            </div>
        </div>
    </div>
        </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>