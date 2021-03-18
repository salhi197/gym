@extends('layouts.master')

@section('content')
<div class="container-fluid">

<div class="card-group">
                </div>
</div>


                       <div class="card mb-4">
<div class="card-group">
                    
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                
                                <div>
                                <h2 style="text-align: center;  "><b>Recette d'aujourd'hui pour stade 1 </b></h2>
                                    
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup class="set-doller">DA</sup>1300</h2>
                                    </h6>
                                    
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg></span>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                <h2 style="text-align: center;  "><b>Recette d'aujourd'hui pour stade 2</b></h2>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 style="text-align: center;  " class="text-dark mb-1 font-weight-medium">7400 DA</h2>
                                    </div>
                                </div>

                                

                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                <h2 style="text-align: center;  "><b>Recette d'aujourd'hui pour stade 3</b></h2>
                                    <h2 class="text-dark mb-1 font-weight-medium">2200 DA</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total des traductions</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                            <div class="card-header">
                                            <form method="post" action="">                                                    
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-2" >
                                                        <label class="control-label">{{ __('Début') }}: </label>
                                                        <input class="form-control" value="{{$date_debut ?? ''}}" name="date_debut" type="date" />
                                                    </div>

                                                    <div class="col-md-2" >
                                                        <label class="control-label">{{ __('Fin') }}: </label>
                                                        <input class="form-control" value="{{$date_fin ?? ''}}" name="date_fin" type="date" />
                                                    </div>


                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Etat') }}: </label>
                                                            <select class=" form-control" name="state">
                                                                <option value="">{{ __('Please choose...') }}</option>
                                                                <option value="1"
                                                                    <?php if($state == 1) echo "selected"; ?>
                                                                >Réglé</option>
                                                                <option value="2"

                                                                    <?php if($state == 0) echo "selected"; ?>

                                                                >non Réglé</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-2" style="padding:35px;">
                                                        <button type="submit" class="row btn btn-primary" >
                                                            Filtrer
                                                        </button>                                                                                                        
                                                    </div>


                                        </form>

                                                </div>
                            </div>

 

                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>fullname</th>
                                                <th>phone</th>
                                                <th>stade</th>
                                                <th>prix</th>
                                                <th>crenau</th>
                                                <th>date</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($reservations as $reservation)                                            
                                            <tr>

                                                <td> {{$reservation->fullname }} </td>
                                                <td> {{$reservation->phone }} </td>
                                                <td> {{$reservation->stade }} </td>
                                                <td> {{$reservation->prix }} </td>
                                                <td> {{$reservation->crenau }} </td>
                                                <td> {{$reservation->date }} </td>
                                                <td >
                                                    <div class="table-action">  

                                                        <div class="dropdown">
                                                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{$reservation->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                          </button>
                                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$reservation->id}}">
                                                            <a href="#"
                                                                class="dropdown-item">
                                                                Delete
                                                            </a>
                                                          </div>
                                                        </div>
                                                    </div>


                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            @endsection
@section('scripts')
<script>
function watchWilayaChanges() {
            $('#wilaya_select').on('change', function (e) {
                e.preventDefault();
                var $communes = $('#commune_select');
                var $communesLoader = $('#commune_select_loading');
                var $iconLoader = $communes.parents('.input-group').find('.loader-spinner');
                var $iconDefault = $communes.parents('.input-group').find('.material-icons');
                $communes.hide().prop('disabled', 'disabled').find('option').not(':first').remove();
                $communesLoader.show();
                $iconDefault.hide();
                $iconLoader.show();
                $.ajax({
                    dataType: "json",
                    method: "GET",
                    url: "/api/static/communes/ " + $(this).val()
                })
                    .done(function (response) {
                        $.each(response, function (key, commune) {
                            $communes.append($('<option>', {value: commune.id}).text(commune.name));
                        });
                        $communes.prop('disabled', '').show();
                        $communesLoader.hide();
                        $iconLoader.hide();
                        $iconDefault.show();
                    });
            });
        }

        $(document).ready(function () {
            watchWilayaChanges();
            $('.regler').on('click', function(event){
                var id = this.id;
                $('#formregler').attr('action','/traduction/regler/'+id)
            })


        });
        
        /**
         * 
         */
</script>

@endsection