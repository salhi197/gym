@extends('layouts.master')

@section('page_wrapper')
@endsection

@section('content')


<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{route('facture.create')}}"><i class="fa fa-plus"></i> Ajouter facture</a>
                                </h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" id="DataTable" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>numéro</th>
                                                <th>client</th>
                                                <th>Total TTC</th>
                                                <th>etat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($factures as $facture)
                                            <tr>
                                                <td>{{$facture->numero }}</td>
                                                <td>{{$facture->getClient()['nom']}}</td>
                                                <td>{{$facture->ttc ?? ''}}</td>
                                                <td>
                                                    @if($facture->etat == 0)
                                                    <span class="badge badge-danger">non réglé</span>
                                                    @else
                                                    <span class="badge badge-success"> réglé</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-info text-white" href="{{route('facture.edit',['facture'=>$facture->id])}}"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('facture.destroy',['facture'=>$facture->id])}}" onclick="return confirm('Etes vous sure ?')"  class="btn btn-danger text-white"><i class="fa fa-window-close"></i></a>
                                                    <a href="{{route('facture.print',['facture'=>$facture->id])}}"  class="btn btn-danger text-white"><i class="fa fa-print"></i></a>
                                                </td>
                                            </tr>

                                            @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


@endsection