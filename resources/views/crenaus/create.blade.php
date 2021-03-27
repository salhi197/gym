@extends('layouts.master')



@section('content')

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Nouveau Crénaux : </h3></div>
                                    <div class="card-body">
                                        <form role="form" action="{{route('crenau.store')}}" method="post">
                                        @csrf
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Homme
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Femme
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Mixte (Homme & Femme)
                                                            </label>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Genre</label>
                                                        <select class="form-control" name="jour">
                                                            <option value="homme">Samedi</option>						 
                                                            <option value="femme">dimanche</option>						                                                             
                                                            <option value="femme">lundi</option>						                                                             
                                                            <option value="femme">mardi</option>						                                                             
                                                            <option value="femme">mercredi</option>						                                                             
                                                            <option value="femme">jeudi</option>						                                                             
                                                            <option value="femme">vendredi</option>						                                                             
                                                        </select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label>Fax</label>
                                                        <input type="text" value="{{old('fax')}}" name="fax" class="form-control">
                                                    </div> -->
                                                </div>


                                                <div class ="col-sm-4">
                                                </div>


                                            </div>
                                    </div>
                                </div>



                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Type d'abonnement  </h3></div>
                                    <div class="card-body">
                                            <div class="row">
                                                <div class="form-group" id="dynamic_form">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <input type="text" name="designation" id="p_name" placeholder="désignation" class="form-control">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" class="form-control" name="quantite" id="quantite" placeholder="Quantité" >
                                                        </div>

                                                        <div class="col-md-2">
                                                            <input type="number" class="form-control" name="prix" id="prix" placeholder="Prix" >
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" class="form-control" name="montant" id="montant" placeholder="montant" >
                                                        </div>
                                                        <div class="button-group">
                                                            <a href="javascript:void(0)" class="btn btn-primary" id="plus5"><i class="fa fa-plus"></i></a>
                                                            <a href="javascript:void(0)" class="btn btn-danger" id="minus5"><i class="fa fa-minus"></i></a>
                                                        </div>
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
@endsection

@section('scripts')
<script src="{{asset('js/dynamuc-form.js')}}"></script>

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
@endsection



