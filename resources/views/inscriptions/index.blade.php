@extends('layouts.master')
@section('header')
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Liste de Inscriptions </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
                    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-plus"></i> Ajouter Inscription
                                    </button>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>debut</th>
                                                <th>fin</th>
                                                <th>Nombre seance reste</th>
                                                <th>nbr seances</th>
                                                <th>abonnement</th>
                                                <th>etat</th>
                                                <th>total</th>
                                                <th>remise</th>
                                                <th>nbrmois</th>
                                                <th>versement</th>
                                                
                                                <th>actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($inscriptions as $inscription)
                                            <tr>
                                                <td>{{$inscription->debut ?? ''}}</td>
                                                <td>{{$inscription->fin ?? ''}}</td>
                                                <td>{{$inscription->reste ?? ''}}</td>
                                                <td style="text-align:center;">{{$inscription->nbsseance ?? ''}}</td>
                                                <td>{{$inscription->getAbonnement()['label'] ?? ''}}</td>
                                                <td>
                                                    <span class="badge badge-info">
                                                    {{$inscription->etat ?? ''}}
                                                    </span>
                                                </td>
                                                <td>{{$inscription->total ?? ''}}DA</td>
                                                <td>{{$inscription->remise ?? ''}}</td>

                                                <td style="text-align:center;">
                                                    {{$inscription->nbrmois ?? ''}}
                                                </td>                                            
                                                <td>{{$inscription->versement ?? ''}} DA</td>

                                                <td>
                                                <a class="btn btn-info text-white" href="{{route('inscription.presence',['inscription'=>$inscription->id])}}"><i class="fa fa-list"></i></a>
                                                <a class="btn btn-danger text-white"  onclick="return confirm('Are you sure?')"  href="{{route('inscription.destroy',['inscription'=>$inscription->id])}}">Supprimer</a>
                                                </td>
                                            </tr>
                                            @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter Inscription</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="{{route('inscription.store')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="hidden" value="{{$membre->id ?? ''}}" name="membre" />
                                                <div class="form-group">
                                                    <label>Abonnement</label>
                                                    <select class="form-control" id="abonnement" name="abonnement">
                                                        <option value="">s??l??ctionner un abonnement</option>
                                                        @foreach($abonnements as $abonnement)
                                                        <option value="{{$abonnement}}">{{$abonnement->label}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Date d??but</label>
                                                    <input type="date" id="debut"  value="{{Date('Y-m-d')}}" name="debut" class="form-control">
                                                </div>

                                            </div>

                                            <div class ="col-sm-4">
                                                <div class="form-group">
                                                    <label>Tarification:</label>
                                                    <input type="number"  name="tarif" value="0" id="tarif" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>date fin</label>
                                                    <input id="fin" type="date" value="{{old('fin')}}" name="fin" class="form-control">
                                                </div>
                                            </div>

                                            <div class ="col-sm-4">
                                                <div class="form-group">
                                                    <label>Nombre de mois</label>
                                                    <input type="number"  value="{{old('nbrmois') ?? 1}}" min="1" id="nbrmois" name="nbrmois" class="form-control">
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
                                                    <label>T.T.C : </label>
                                                    <input type="number" value="{{old('ttc') ?? 0}}" id="ttc" name="ttc" class="form-control">
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