@extends('layouts.master')

@section('page_wrapper')
@endsection

@section('content')


                    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{route('stock.create')}}"><i class="fa fa-plus"></i> Ajouter produit</a>
                                </h4>
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>                                                
                                                <th>produit</th>
                                                <th>fournisseur</th>
                                                <th>prix achat</th>
                                                <th>quantité</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($stocks as $stock)
                                            <tr>
                                                <td>{{$stock->id ?? ''}}</td>                                                
                                                <td>{{$stock->getProduit()['designation'] ?? ''}}</td>
                                                <td>{{$stock->fournisseur ?? ''}}</td>
                                                <td>{{$stock->prix ?? ''}}</td>
                                                <td>{{$stock->quantite ?? ''}}</td>
                                                <td><span class="badge badge-success">entré</span</td>
                                                <td>
                                                    <a class="btn btn-info text-white" href="{{route('stock.edit',['stock'=>$stock->id])}}"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('stock.destroy',['stock'=>$stock->id])}}" onclick="return confirm('Etes vous sure ?')"  class="btn btn-danger text-white"><i class="fa fa-window-close"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


@endsection