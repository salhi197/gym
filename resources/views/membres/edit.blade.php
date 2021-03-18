@extends('layouts.master')



@section('content')

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Modifier Membre  </h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('membre.update',['id_membre'=>$membre->id ?? 1])}}">
                                        @csrf

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" required value="{{$membre->nom}}" name="nom" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Prénom</label>
                                                        <input type="text" required value="{{$membre->prenom}}" name="prenom" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" value="{{$membre->adresse}}" name="adresse" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Téléphone</label>
                                                        <input type="text" value="{{$membre->telephone}}" name="telephone" class="form-control">
                                                    </div>
                                                </div>

                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Genre</label>
                                                        <select class="form-control" name="sexe">
                                                            <option value="homme">Homme</option>						 
                                                            <option value="femme">Femme</option>						                                                             
                                                        </select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label>Fax</label>
                                                        <input type="text" value="{{$membre->fax}}" name="fax" class="form-control">
                                                    </div> -->
                                                </div>


                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Photo</label>
                                                        <input type="file" value="{{$membre->photo}}" name="photo" 
                                                        class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
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


