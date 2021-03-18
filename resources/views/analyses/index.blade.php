@extends('layouts.master')

@section('page_wrapper')
@endsection

@section('content')


<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{route('analyse.create')}}"><i class="fa fa-plus"></i> Ajouter analyse</a>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>                                                
                                                <th>Date</th>
                                                <th>N lot</th>
                                                <th>Client</th>
                                                <th>Categorie</th>
                                                <th>Produit</th>
                                                <th>Type</th>                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($analyses as $analyse)
                                            <tr>
                                                <td>{{$analyse->id }}</td>
                                                <td>{{$analyse->reception}}</td>
                                                <td>{{$analyse->lot}}</td>
                                                <td>{{$analyse->getClient()['nom'] ?? ''}}</td>
                                                <td>{{$analyse->categorie ?? ''}}</td>
                                                <td>{{$analyse->getProduit()['designation'] ?? ''}}</td>
                                                <td>{{$analyse->analyse}}</td>

                                                <td>
                                                    <a class="btn btn-info text-white" href="{{route('analyse.edit',['analyse'=>$analyse->id])}}"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('analyse.destroy',['analyse'=>$analyse->id])}}" onclick="return confirm('Etes vous sure ?')"  class="btn btn-danger text-white"><i class="fa fa-window-close"></i></a>
                                                    <a href="{{route('analyse.print',['analyse'=>$analyse->id])}}"  class="btn btn-danger text-white"><i class="fa fa-print"></i></a>
                                                </td>
                                            </tr>

                                            @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


@endsection