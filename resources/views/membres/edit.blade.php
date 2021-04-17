@extends('layouts.master')



@section('content')

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card mt-2">
                                    <div class="card-header">
                                        <h3 class="font-weight-light my-4"> Nouveau Membre  </h3>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="preview text-center">
                                                    <img class="preview-img" src="{{asset('img/account.png')}}" alt="Preview Image" width="200" height="200" for="UploadedFile"/>
                                                    <div class="browse-button">
                                                        <i class="fa fa-pencil-alt"></i>
                                                        <input  type="file" name="UploadedFile" id="UploadedFile"/>
                                                    </div>
                                                    <span class="Error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-2" >
                                                <button style="padding:30px;" type="reset" class="btn btn-primary btn-block">Renouvler</button>
                                            </div>                                
                                            <div class="col-md-2" >
                                                <button style="padding:30px;" type="reset" class="btn btn-primary btn-block">Renouvler</button>
                                            </div>                                
                                            <div class="col-md-2" >
                                                <button style="padding:30px;" type="reset" class="btn btn-primary btn-block">Renouvler</button>
                                            </div>                                
                                            <div class="col-md-2" >
                                                <button style="padding:30px;" type="reset" class="btn btn-primary btn-block">Renouvler</button>
                                            </div>                                


                                        </div>


                                    </div>
                                    <div class="card-body">
                                        <form role="form" action="{{route('membre.store')}}" method="post">
                                        @csrf

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" required value="{{old('nom')}}" name="nom" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Prénom</label>
                                                        <input type="text" required value="{{old('prenom')}}" name="prenom" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" value="{{old('adresse')}}" name="adresse" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Téléphone</label>
                                                        <input type="text" value="{{old('telephone')}}" name="telephone" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Code de Matricule</label>
                                                        <input type="text" value="{{old('matricule')}}" name="matricule" class="form-control">

                                                    </div>


                                                    <div class="form-group">
                                                        <label>Genre</label>
                                                        <select class="form-control" name="sexe">
                                                            <option value="homme">Homme</option>						 
                                                            <option value="femme">Femme</option>						                                                             
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" value="{{old('email')}}" name="email" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Group Sanguin</label>
                                                        <select class="form-control" name="sanguin">
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>

                                                        </select>

                                                    </div>


                                                </div>

                                                <div class ="col-sm-2">
                                                    <div class="form-group">
                                                        <i class="fa fa-minus" style="background-color: red;padding:30px;color:white;"></i>

                                                    </div>
                                                </div>
                                                <div class ="col-sm-2">
                                                    <div class="form-group">
                                                        <i class="fa fa-plus" style="background-color: green;padding:30px;color:white;"></i>

                                                    </div>
                                                </div>

                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Type :</label>
                                                        <select class="form-control" name="sexe">
                                                            <option value="homme">Homme</option>						 
                                                            <option value="femme">Femme</option>	
                                                            <option value="mixte">mixte</option>						                                                             
                                                        </select>
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label>Nombre de mois</label>
                                                        <input type="number"  value="{{old('nbrmois') ?? 1}}" min="1" id="nbrmois" name="nbrmois" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Abonnement</label>
                                                        <select class="form-control" id="abonnement" name="abonnement">
                                                            <option value="">séléctionner un abonnement</option>
                                                            @foreach($abonnements as $abonnement)
                                                            <option value="{{$abonnement}}">{{$abonnement->label}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date début</label>
                                                        <input type="date" id="debut"  value="{{Date('Y-m-d')}}" name="debut" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="button" id="today"  class="btn btn-info btn-block">Aujourd'hui</button>
                                                    </div>

                                                    <!-- <div class="form-group">
                                                        <label>date fin</label>
                                                        <input id="fin" type="date" value="{{old('fin')}}" name="fin" class="form-control">
                                                    </div> -->



                                                    <div class="form-group">
                                                        <label>Tarification:</label>
                                                        <input type="number"  name="tarif" value="0" id="tarif" class="form-control">
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label>Total</label>
                                                        <input type="number" id="total" value="{{old('total')}}" name="total" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Remise</label>
                                                        <input type="number" value="{{old('remise') ?? 0}}" id="remise" name="remise" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Versement</label>
                                                        <input type="number" value="{{old('versement') ?? 0}}" id="versement" name="versement" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Total Final : </label>
                                                        <input type="number" value="{{old('ttc') ?? 0}}" id="ttc" name="ttc" class="form-control">
                                                    </div>


                                                </div>


                                                <div class ="col-sm-4">

                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-2" style="padding:30px;">
                                                    <button style="padding:30px;" type="submit" id="valider"  class="btn btn-info btn-block">Valider</button>
                                                </div>
                                                <div class="col-md-2" style="padding:30px;">
                                                    <button style="padding:30px;" type="reset" class="btn btn-danger btn-block">Annuler</button>
                                                </div>
                                                <div class="col-md-2" style="padding:30px;">
                                                    <button style="padding:30px;" type="reset" class="btn btn-primary btn-block">Renouvler</button>
                                                </div>
                                            </div>


                                    </div>
                                </div>



                                <!-- <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Type d'abonnement  </h3></div>
                                    <div class="card-body">
                                            <div class="row">

                                            </div>

                                        </form>
                                    </div>
                                </div> -->



                            </div>

                        </div>

                    </div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#today').on('click',function(){
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;
        var today = year+ "-" +month+ "-" +day;//+"-"+// + "-" +  +"T00:00";       
        $("#debut").attr("value", today);

    })
    $('#abonnement').on('change',function(event){
        var value = JSON.parse(this.value);
        var remise = $('#remise').val();
        console.log(ttc)

        $('#tarif').val(value.tarif)
        $('#total').val($('#nbrmois').val()*$('#tarif').val())
        $('#versement').val($('#nbrmois').val()*$('#tarif').val())
        var total =  $('#total').val()
        console.log(ttc)
        var ttc = total - remise 
        $('#ttc').val(ttc)

    })
    $('#remise').on('change',function(){
        var remise = this.value;
        var total =  $('#total').val()
        var ttc = total - remise 
        $('#ttc').val(ttc)

    })
    $('#nbrmois').on('change',function(event){
        var value = this.value;
        var debut = new Date($('#debut').val());
        var fin  = debut.setMonth(debut.getMonth()+value); 
        var remise = $('#remise').val();
        $('#total').val(value*$('#tarif').val())
        $('#versement').val(value*$('#tarif').val())
        $('#fin').val(fin)
        var total =  $('#total').val()
        console.log(ttc)
        var ttc = total - remise 
        $('#ttc').val(ttc)

    })

});

</script>
@endsection


