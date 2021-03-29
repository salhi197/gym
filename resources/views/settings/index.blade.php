@extends('layouts.master')



@section('content')

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Paramètre de l'application  </h3></div>
                                    <div class="card-body">
                                        <form role="form" action="{{route('setting.store')}}" method="post">
                                        @csrf

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Titre Général :</label>
                                                        <input type="text" required value="{{old('titre')}}" name="titre" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" value="{{old('adresse')}}" name="adresse" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Téléphone</label>
                                                        <input type="text" value="{{old('telephone')}}" name="telephone" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username:</label>
                                                        <input type="text" value="{{old('username')}}" name="username" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>mot de passe</label>
                                                        <input type="text" value="{{old('password')}}" name="password" class="form-control">
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


