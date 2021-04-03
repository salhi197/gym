<?php $__env->startSection('content'); ?>
        <div class="container-fluid">

        <?php if(Auth::guard('admin')->user()['is_super'] == 1): ?>

            <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body text-center">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium text-center" id="time-part"></h2><br>
                                    </div>                                    
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                <h2 class="text-dark mb-1 font-weight-medium text-center" id="date-part"></h2>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body" >
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <canvas id="myChart" width="600" height="250"></canvas>                                
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                                </div>
                            </div>
                        </div> 
                    </div>
            </div> 
            <?php endif; ?>
               <div class="card mb-4">
                <br>
                    <!--     <h1 style="text-align: center; color: black; " ><B>Tableau de bord</B></h1>
                        <div class="card-body">
                            <div class="table-responsive">

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    </table>
            

          




                              </div>
                         </div> -->

                            <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><B><?php echo e($nbmembres); ?> Adhérents</B></h2> 
                                        
                                        <h2 class="text-dark mb-1 font-weight-medium"><B><?php echo e($nbmembres); ?> Adhérents</B></h2>
                                        
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
                                            class="set-doller">DA</sup>Recette d'aujourd'hui</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total d'aujourd'hui
                                    </h6>
                                    
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">DA</sup>versementjournee</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Versement d'aujourd'hui
                                    </h6>

                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">DA</sup>restejournee</h2>
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
                                        <h2 style="text-align: center;  " class="text-dark mb-1 font-weight-medium">recettemois DA</h2>
                                    </div>
                                    <h6 style="text-align: center;  " class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total du mois</h6>

                                    <div class="d-inline-flex align-items-center">
                                        <h2 style="text-align: center;  " class="text-dark mb-1 font-weight-medium">versementmois DA</h2>
                                    </div>
                                    <h6 style="text-align: center;  " class="text-muted font-weight-normal mb-0 w-100 text-truncate">Versement du mois</h6>
                                </div>

                                

                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                 </div> 
        </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
$(document).ready(function() {
    var interval = setInterval(function() {
        var momentNow = moment();
        $('#date-part').html(momentNow.format('YYYY MMMM DD') + ' '
                            + momentNow.format('dddd')
                             .substring(0,3).toUpperCase());
        $('#time-part').html(momentNow.format('A hh:mm:ss'));
    }, 100);
aDatasets1 = [65,59,80,81,56,55,40,47];  
aDatasets2 = [20,30,40,50,60,20,25,47];
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Samedi", "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi","vendredi"],
        
        datasets: [ {
              label: 'Homme',
              fill:false,
            data: aDatasets1,
            backgroundColor: '#E91E63',
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
            ],
            borderWidth: 1
        },
        
        {
            label: 'Femme',
              fill:false,
            data: aDatasets2,
            backgroundColor: 
                '#3F51B5'
            ,
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
            ],
            borderWidth: 1
        }
        
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        title: {
            display: true,
            text: 'Nishi IT Institute'
        },
        responsive: true,
        
       tooltips: {
            callbacks: {
                labelColor: function(tooltipItem, chart) {
                    return {
                        borderColor: 'rgb(255, 0, 20)',
                        backgroundColor: 'rgb(255,20, 0)'
                    }
                }
            }
        },
        legend: {
            labels: {
                // This more specific font property overrides the global property
                fontColor: 'red',
               
            }
        }
    }
});

});



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>