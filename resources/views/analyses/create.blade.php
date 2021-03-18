@extends('layouts.master')

@section('page_wrapper')
@endsection

@section('content')

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Nouveau Analyse  </h3></div>
                                    <div class="card-body">
                                        <div class="leftSide"><!-- Begin of content -->
                                            <form action="{{route('analyse.store')}}" method="post">
                                            @csrf
                                            <div class="container-fluid">
                                                    <div class="well sm">
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                <label for="">client :</label>
                                                                    <select class="form-control " id="" value="{{old('client')}}" name="client">
                                                                        <option value="">séléctionner client</option>

                                                                        @foreach($clients as $client)
                                                                            <option
                                                                            value="{{$client->id}}">{{$client->nom}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="">&nbsp;</label>
                                                                    <select value="{{old('type')}}" name="type" id="faitpar" class="form-control">
                                                                        <option value="1"> fait par les soins du laboratoire </option>
                                                                        <option value="0"> fait par les soins du propriétaire </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="">Code barre</label>
                                                                    <input type="text" class="form-control" id="code_barre" value="{{old('code_barre')}}" name="code_barre">
                                                                </div>
                                                            </div>  -->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <table class="table results"></table>
                                                        </div>
                                                    </div>
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="">Categorie :</label>
                                                                    <select class="form-control " id="" value="{{old('categorie')}}" name="categorie">
                                                                        @foreach($categories as $categorie)
                                                                            <option value="{{$categorie->id}}">{{$categorie->label}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                <label for="">Produits principals :</label>
                                                                    <select class="form-control produits" id="" value="{{old('produit')}}" name="produit">
                                                                        @foreach($produits as $produit)
                                                                            <option value="{{$produit->id}}">{{$produit->designation}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="">Libellé Produit</label>
                                                                    <div>
                                                                        <select class="form-control lib_produit" value="{{old('lib_produit')}}" name="lib_produit">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>  -->
                                                        </div>
                                                    </div>
                                                    <!-- <div class="well autres hidden">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="">Autres Produits :</label>
                                                                    <input type="text" value="{{old('nomproduit')}}" name="nomproduit" id="produit" value="" autocomplete="off" placeholder="tapez une famille" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <table class="table resultsp"></table>
                                                        </div>
                                                    </div>
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label for="">Contenance</label>
                                                                    <select class="form-control" id="contenance" value="{{old('contenance')}}" name="contenance">
                                                                        <option value="Poids">Poids</option>
                                                                        <option value="Volume">Volume</option>
                                                                    </select>
                                                                </div>
                                                            </div> 
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="">Valeur</label>
                                                                    <input type="text" class="form-control" id="valeur" value="{{old('valeur')}}" name="valeur">
                                                                </div>
                                                            </div> 
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label for="">Provenance Produit</label>
                                                                    <input type="text" class="form-control" id="marque" value="{{old('marque')}}" name="marque">
                                                                </div>
                                                            </div> 
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label>N° lot</label>
                                                                    <input type="text" value="{{old('lot')}}" name="lot" id="lot" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Date de fabrication</label>
                                                                    <input type="date" value="{{old('fabrication')}}" name="fabrication" id="fabrication" class="form-control mesdates">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">        
                                                                <div class="form-group ">
                                                                    <label>Date peremption</label>
                                                                    <input type="date" value="{{old('peremption')}}" name="peremption" id="peremption" class="form-control mesdates">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">         
                                                                <div class="form-group">
                                                                    <label>Date de prelevement</label>
                                                                    <input type="date" required="" value="{{old('prelevement')}}" name="prelevement" id="prelevement" class="form-control mesdates">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Date de reception</label>
                                                                    <input type="date" value="{{old('reception')}}" name="reception" id="reception" class="form-control mesdates">
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    <div class="well">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <div class="checkbox">
                                                                        <label>
                                                                        <input type="checkbox" class="cocher" value="micro-biologique" name="analyse" id="micro"> Analyse Micro-biologique
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <select class="form-control" id="op1" value="{{old('operateur1')}}" name="operateur1">
                                                                    @foreach($operateurs1 as $operateur1)
                                                                        <option value="{{$operateur1->id}}">{{$operateur1->nom}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <div class="checkbox">
                                                                        <label>
                                                                        <input type="checkbox" class="cocher" value="physico-chimique" name="analyse" id="physico"> Analyse Physico-chimique
                                                                        </label>
                                                                    </div>
                                                                </div>  
                                                                <select class="form-control" id="op2" value="{{old('operateur2')}}" name="operateur2">
                                                                    @foreach($operateurs2 as $operateur2)
                                                                    <option value="{{$operateur2->id}}">{{$operateur2->nom}}</option>
                                                                    @endforeach
                                                                </select>             
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <p></p>
                                                                    <button type="submit" id="valider" class="btn btn-info btn-block">Valider</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </form>
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
    $('.produits').select2();
    $('.settings').select2();
});

</script>
@endsection