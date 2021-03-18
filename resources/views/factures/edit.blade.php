@extends('layouts.master')

@section('page_wrapper')
@endsection

@section('content')

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Modifier Facture  </h3></div>
                                    <div class="card-body">
                                        <div class="leftSide"><!-- Begin of content -->
                                            <form  id="Factureform" action="{{route('facture.update',['facture'=>$facture->id])}}" method="post">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="">client :</label>
                                                            <select class="form-control " id="" value="{{old('client')}}" value="{{$facture->client}}" name="client">
                                                                    <option value="">séléctionner client</option>
                                                                    @foreach($clients as $client)
                                                            <option @if($client->id == $facture->client) selected @endif value="{{$client->id}}">{{$client->nom}}</option>
                                                                    @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="">Date Facture</label>
                                                        <input type="date" id="date" value="{{date('Y-m-d')}}" class="form-control" value="{{$facture->date}}" name="date">   
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label for="">N° Facture</label>
                                                        <input type="text" id="numf" value="{{$facture->numero}}" name="numero" class="form-control numf">   
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="">N° BC</label>
                                                        <input type="text" id="numbc"  class="form-control" value="{{$facture->numerobc}}" name="numerobc">   
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="">N° Convention</label>
                                                        <input type="text" id="numbc"  class="form-control" value="{{$facture->convention}}" name="convention">   
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="{{$facture->type}}" name="type" id="tva" value="tva" @if($facture->type == "tva") checked @endif> Tva
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="{{$facture->type}}" name="type" id="timbre" value="timbre" @if($facture->type == "timbre") checked @endif> Timbre
                                                            </label>
                                                        </div>   
                                                    </div>
                                                </div>

                                                @foreach($items as $key=>$item)
                                                    <div class="form-group" id="dynamic_form{{$key}}">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <input type="text" value="{{$item->designation}}" name="dynamic_form[dynamic_form][{{$key}}][designation]"  id="p_name" placeholder="désignation" class="form-control">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" class="form-control" value="{{$item->quantite}}" name="dynamic_form[dynamic_form][{{$key}}][quantite]"  id="quantite" placeholder="Quantité" >
                                                            </div>

                                                            <div class="col-md-2">
                                                                <input type="number" class="form-control" value="{{$item->prix}}" name="dynamic_form[dynamic_form][{{$key}}][prix]"  id="prix" placeholder="Prix" >
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" class="form-control" value="{{$item->prix*$item->quantite}}" readonly name="dynamic_form[dynamic_form][{{$key}}][montant]"  id="montant" placeholder="montant" >
                                                            </div>
                                                            <div class="button-group">
                                                                <a href="javascript:void(0)" class="btn btn-primary" id="plus5"><i class="fa fa-plus"></i></a>
                                                                <a href="javascript:void(0)" class="btn btn-danger" id="minus5"><i class="fa fa-minus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <button class="btn btn-info" id="calculer">Calculer Total</button>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <ul class="list-group">
                                                        <li class="list-group-item">TOTAL HT :<span id="total">{{$facture->total}}</span> </li>
                                                        <li class="list-group-item">TVA : <span id="tva">{{$facture->total*0.19}}</span> </li>
                                                        <li class="list-group-item">Timbre : <span id="timbre">10</span> </li>
                                                        <li class="list-group-item">Total TTC : <span id="ttc">{{$facture->total+($facture->total*0.19)}}</span> </li>
                                                    </ul>
                                                </div>
                                                <br>
                                                <button class="btn btn-info" type="submit">valider</button>



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
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $('#calculer').on('click',function(e){
            e.preventDefault()
            var values = {};
            $.each($('#Factureform').serializeArray(), function(i, field) {
                values[field.name] = field.value;
            });
            console.log(values)
            $.ajax({
                type: 'POST', //THIS NEEDS TO BE GET
                url: '/facture/calculer',
                data: {_token: CSRF_TOKEN, data:values},
                dataType: 'JSON',
                success: function (data) {
                    console.log(data)
                    $('#tva').html(data.tva)
                    $('#ttc').html(data.ttc)
                    $('#total').html(data.total)
                },
                error: function(err) { 
                    console.log(err);
                }
            });
        })

    var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus5", "#minus5", {
        limit:30,
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


});

</script>
@endsection