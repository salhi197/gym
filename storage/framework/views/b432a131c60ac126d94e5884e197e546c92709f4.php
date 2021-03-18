
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('mart/assets/images/favicon.png')); ?>">
    <title>Gestion Salle de sport</title>
    <!-- Custom CSS -->
    
    <link href="<?php echo e(asset('mart/assets/libs/fullcalendar/dist/fullcalendar.min.css')); ?>" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('mart/dist/css/style.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap-toggle.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/dataTables.bootstrap4.css')); ?>" rel="stylesheet" />
    


    <style>
        .fc-agendaWeek-view tr {
            height:80px;
        }

        .fc-agendaDay-view tr {
            height: 60px;
        }
        b{
            display: hidden;
        }
    </style>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <div class="navbar-brand" style="background:#154762;color:white">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <span class="logo-text">
                            </span>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>

            </nav>
        </header>




        <aside class="left-sidebar" data-sidebarbg="skin6" style="background:#154762;color:white">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item text-white"> <a class="sidebar-link sidebar-link" href="<?php echo e(route('home')); ?>"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu text-white">Tableau de bord</span></a></li>
                        <li class="list-divider"></li>

                        <li class="sidebar-item"> 
                            <a class="sidebar-link text-white" href="<?php echo e(route('membre.index')); ?>" aria-expanded="false">
                            <i class="fas fa-users"></i>
                                <span class="hide-menu">Membres</span>
                            </a>
                        </li>

                        <li class="sidebar-item"> 
                            <a class="sidebar-link text-white" href="<?php echo e(route('operateur.index')); ?>" aria-expanded="false">
                            <i class="fas fa-user-plus"></i>
                                <span class="hide-menu">Abonnement</span>
                            </a>
                        </li>




                        <li class="sidebar-item"> 
                            <a class="sidebar-link text-white" href="<?php echo e(route('setting.index')); ?>" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                                <span class="hide-menu">Paramètres</span>
                            </a>
                        </li>





                        <li class="sidebar-item"> <a 
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                            class="sidebar-link text-white" href="<?php echo e(route('logout')); ?>"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Déconnexion
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                                </span></a>
                        </li>


                       

                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <?php echo $__env->yieldContent('page_wrapper'); ?>
            <div class="container-fluid">
                <div class="row"> 
                    <div class="col-md-12">
                    <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
            <?php echo $__env->yieldContent('modals'); ?>
    
        </div>
    </div>
    <script src="<?php echo e(asset('mart/assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('mart/assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js')); ?>"></script>    
    <script src="<?php echo e(asset('mart/assets/extra-libs/taskboard/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('mart/assets/libs/popper.js/dist/umd/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('mart/assets/libs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('mart/dist/js/app-style-switcher.js')); ?>"></script>    
    <script src="<?php echo e(asset('mart/dist/js/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('mart/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('mart/dist/js/sidebarmenu.js')); ?>"></script>
    <script src="<?php echo e(asset('mart/dist/js/custom.min.js')); ?>"></script>    
    <script src="<?php echo e(asset('mart/assets/libs/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('mart/assets/libs/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>" crossorigin="anonymous" ></script>
    <script src="<?php echo e(asset('js/datatables-demo.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-toggle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatable-basic.init.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dynamic-form.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>

    <script>
        <?php if(session('success')): ?>
            $(function(){
                toastr.success('<?php echo e(Session::get("success")); ?>')
            })
        <?php endif; ?>
        <?php if($errors->any()): ?>
            $(function(){
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        toastr.error('<?php echo e($error); ?>')
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            })
        <?php endif; ?>
        <?php if(session('error')): ?>
            $(function(){
                toastr.error('<?php echo e(Session::get("error")); ?>')
            })
        <?php endif; ?>
</script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>