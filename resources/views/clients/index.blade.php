@extends('layouts.master')

@section('content')


<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{route('client.create')}}"><i class="fa fa-plus"></i> Ajouter</a>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Code</th>
                                                <th>Raison Sociale</th>
                                                <th>Catégorie</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($clients as $client)
                                            <tr>
                                                <td>{{$client->id }}</td>
                                                <td>{{$client->code }}</td>
                                                
                                                <td>{{$client->raison_sociale}}</td>
                                                <td>{{$client->getCategorie()['label'] ?? ''}}</td>
                                                <td>
                                                <a class="btn btn-info text-white" href="{{route('client.edit',['client'=>$client->id])}}"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('client.destroy',['client'=>$client->id])}}" onclick="return confirm('Etes vous sure ?')"  class="btn btn-danger text-white"><i class="fa fa-window-close"></i></a>
                                                <a class="btn btn-danger text-white"><i class="fa fa-print"></i></a>
                                                <input type="checkbox" class="state" id="{{$client->id}}" @if($client->etat == 1) checked @endif 
                                                data-toggle="toggle" data-size="mini">

                                                </td>
                                            </tr>

                                            @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


@endsection

@section('scripts')
<script>

$(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('.state').on('change',function(e){
            var id = this.id
            console.log(id)

            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/client/state/'+id,
                dataType: 'JSON',
                success: function (data) {
                    console.log(data)
                    toastr.success('état changé');
                },
                error: function(err) { 
                    console.log(err)
                    toastr.error(err)
                }
            });
        })
});

</script>
@endsection