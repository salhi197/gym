@extends('layouts.master')



@section('content')

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Nouveau Produit  </h3></div>
                                    <div class="card-body">
                                        <form role="form" action="{{route('produit.store')}}" method="post">
                                        @csrf
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Famille Produits</label>
                                                        <select class="form-control" name="categorie">
                                                            @foreach($categories as $categorie)
                                                            <option value="{{$categorie->id}}">{{$categorie->label}}</option>						 
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Désignation Produit</label>
                                                        <input type="text" name="designation" required="" class="form-control">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Durée de validité</label>
                                                        <input type="number" name="duree" value="0" required="" class="form-control">
                                                    </div>
                                                </div> -->
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button type="submit" id="valider" class="btn btn-info btn-block">Valider</button>
                                                </div>
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



