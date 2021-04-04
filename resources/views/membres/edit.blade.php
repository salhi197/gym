@extends('layouts.master')



@section('content')

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                            <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Nouveau Membre  </h3></div>
                                    <div class="card-body">
                                        <form role="form" action="{{route('membre.store')}}" method="post">
                                        @csrf

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" required value="{{$membre->nom ?? ''}}" name="nom" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Prénom</label>
                                                        <input type="text" required value="{{$membre->prenom ?? ''}}" name="prenom" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" value="{{$membre->adresse ?? ''}}" name="adresse" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Téléphone</label>
                                                        <input type="text" value="{{$membre->telephone ?? ''}}" name="telephone" class="form-control">
                                                    </div>
                                                </div>

                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Code de Matricule</label>
                                                        <input type="text" value="{{$membre->matricule ?? ''}}" name="matricule" class="form-control">

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
                                                        <input type="text" value="{{$membre->email ?? ''}}" name="email" class="form-control">
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


                                                <div class ="col-sm-4">
                                                    <div class="preview text-center">
                                                        <img class="preview-img" src="{{asset('img/account.png')}}" alt="Preview Image" width="200" height="200" for="UploadedFile"/>
                                                        <div class="browse-button">
                                                            <i class="fa fa-pencil-alt"></i>
                                                            <input style="" type="file" name="UploadedFile" id="UploadedFile"/>
                                                        </div>
                                                        <span class="Error"></span>
                                                    </div>

                                                </div>


                                            </div>
                                    </div>
                                </div>






                            </div>

                        </div>

                    </div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#abonnement').on('change',function(event){
        var value = JSON.parse(this.value);
        $('#tarif').val(value.tarif)
        $('#total').val($('#nbrmois').val()*$('#tarif').val())
        $('#versement').val($('#nbrmois').val()*$('#tarif').val())

    })
    $('#nbrmois').on('change',function(event){
        var value = this.value;
        var debut = new Date($('#debut').val());
        var fin  = debut.setMonth(debut.getMonth()+value); 
        $('#total').val(value*$('#tarif').val())
        $('#versement').val(value*$('#tarif').val())
        $('#fin').val(fin)
    })

});

</script>
@endsection


