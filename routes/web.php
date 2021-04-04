<?php

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Route::get('/code', function(){
    dd(Hash::make('labo'));
});

Route::get('/callendar/{stade}', function($stade){
    $reservations =Reservation::where('stade',$stade)->get();
    switch ($stade) {
        case '1':
            $color = 'bg-info';
            break;
        case '2':
            $color = 'bg-success';
            break;    
        case '3':
            $color = 'bg-primary';
            break;    
    }
    return view('callendar',compact('reservations','stade','color'));
})->name('callendar');


Route::group(['prefix' => 'produit', 'as' => 'produit'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'ProduitController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'ProduitController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'ProduitController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'ProduitController@destroy']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'ProduitController@edit']);
    Route::post('/update/{produit}', ['as' => '.update', 'uses' => 'ProduitController@update']);    
});

Route::group(['prefix' => 'setting', 'as' => 'setting'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'SettingController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'SettingController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'SettingController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'SettingController@destroy']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'SettingController@edit']);
    Route::post('/update/{setting}', ['as' => '.update', 'uses' => 'SettingController@update']);    
});


Route::group(['prefix' => 'facture', 'as' => 'facture'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'FactureController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'FactureController@create']);
    Route::get('/print/{facture}',['as'=>'.print', 'uses' => 'FactureController@print']);
    Route::post('/create', ['as' => '.store', 'uses' => 'FactureController@store']);
    Route::post('/calculer', ['as' => '.calculer', 'uses' => 'FactureController@calculer']);
    
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'FactureController@destroy']); 
    Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'FactureController@stock']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'FactureController@edit']);
    Route::get('/show/{id_facture}', ['as' => '.show', 'uses' => 'FactureController@show']);
    Route::post('/update/{facture}', ['as' => '.update', 'uses' => 'FactureController@update']);    

});


Route::group(['prefix' => 'crenau', 'as' => 'crenau'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'CrenauController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'CrenauController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'CrenauController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'CrenauController@destroy']); 
    Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'CrenauController@stock']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'CrenauController@edit']);
    Route::get('/print/{cd_Crenau}', ['as' => '.print', 'uses' => 'CrenauController@print']);
    Route::post('/update/{crenau}', ['as' => '.update', 'uses' => 'CrenauController@update']);    
});


// Route::group(['prefix' => 'rapport', 'as' => 'rapport'], function () {
//     Route::get('/', ['as' => '.index', 'uses' => 'RapportController@index']);
//     Route::get('/create',['as'=>'.create', 'uses' => 'RapportController@create']);
//     Route::post('/create', ['as' => '.store', 'uses' => 'RapportController@store']);
//     Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'RapportController@destroy']); 
//     Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'RapportController@stock']); 
//     Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'RapportController@edit']);
//     Route::get('/print/{cd_rapport}', ['as' => '.print', 'uses' => 'RapportController@print']);
//     Route::post('/update/{rapport}', ['as' => '.update', 'uses' => 'RapportController@update']);    
// });

Route::group(['prefix' => 'stock', 'as' => 'stock'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'StockController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'StockController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'StockController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'StockController@destroy']); 
    Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'StockController@stock']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'StockController@edit']);
    Route::get('/print/{id_analyse}', ['as' => '.print', 'uses' => 'StockController@print']);
    Route::post('/update/{stock}', ['as' => '.update', 'uses' => 'StockController@update']);    
});


Route::group(['prefix' => 'operateur', 'as' => 'operateur'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'OperateurController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'OperateurController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'OperateurController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'OperateurController@destroy']); 
    Route::get('/stock/{id_demande}', ['as' => '.stock', 'uses' => 'OperateurController@stock']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'OperateurController@edit']);
    Route::get('/show/{id_operateur}', ['as' => '.show', 'uses' => 'OperateurController@show']);
    Route::post('/update/{operateur}', ['as' => '.update', 'uses' => 'OperateurController@update']);    
});

Route::group(['prefix' => 'setting', 'as' => 'setting'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'SettingController@index']);
    Route::get('/create',['as'=>'.create', 'uses' => 'SettingController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'SettingController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'SettingController@destroy']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'SettingController@edit']);
    Route::get('/show/{id_setting}', ['as' => '.show', 'uses' => 'SettingController@show']);
    Route::post('/update/{setting}', ['as' => '.update', 'uses' => 'SettingController@update']);    
});

Route::group(['prefix' => 'inscription', 'as' => 'inscription'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'inscriptionController@index']);
    Route::get('/presence/{inscription}', ['as' => '.presence', 'uses' => 'inscriptionController@presence']);
    
    Route::get('/create',['as'=>'.create', 'uses' => 'inscriptionController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'inscriptionController@store']);
    Route::get('/destroy/{id_demande}', ['as' => '.destroy', 'uses' => 'inscriptionController@destroy']); 
    Route::get('/edit/{id_demande}', ['as' => '.edit', 'uses' => 'inscriptionController@edit']);
    Route::post('/update/{inscription}', ['as' => '.update', 'uses' => 'inscriptionController@update']);    
});

Route::group(['prefix' => 'membre', 'as' => 'membre'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'MembreController@index']);
    Route::get('/inscriptions/{membre}', ['as' => '.inscriptions', 'uses' => 'MembreController@inscriptions']);
    Route::get('/create',['as'=>'.create', 'uses' => 'MembreController@create']);
    Route::post('/create', ['as' => '.store', 'uses' => 'MembreController@store']);
    Route::get('/destroy/{id_membre}', ['as' => '.destroy', 'uses' => 'MembreController@destroy']); 
    Route::get('/state/{id_membre}', ['as' => '.state', 'uses' => 'MembreController@state']); 
    Route::get('/facture/{id_membre}', ['as' => '.facture', 'uses' => 'MembreController@facture']); 
    Route::get('/edit/{id_membre}', ['as' => '.edit', 'uses' => 'MembreController@edit']);
    Route::post('/update/{membre}', ['as' => '.update', 'uses' => 'MembreController@update']);    
    
});

Route::group(['prefix' => 'abonnement', 'as' => 'abonnement'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'AbonnementController@index']);
    Route::get('/show/create',['as'=>'.show.create', 'uses' => 'AbonnementController@create']);
    Route::post('/create', ['as' => '.create', 'uses' => 'AbonnementController@store']);
    Route::post('/update', ['as' => '.update', 'uses' => 'AbonnementController@update']);
    Route::get('/destroy/{id_abonnement}', ['as' => '.destroy', 'uses' => 'AbonnementController@destroy']);    
    Route::get('/edit/{id_abonnement}', ['as' => '.edit', 'uses' => 'AbonnementController@edit']);
});

Route::get('/', function(){
    return redirect()->route('login.admin');
});

Auth::routes();











Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/livreur', 'Auth\LoginController@showLivreurLoginForm')->name('login.Livreur');
Route::get('/login/fournisseur', 'Auth\LoginController@showFournisseurLoginForm')->name('login.Fournisseur');
Route::get('/login/freelancer', 'Auth\LoginController@showFreelancerLoginForm')->name('login.Freelancer');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/livreur', 'Auth\RegisterController@showLivreurRegisterForm')->name('register.Livreur');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/livreur', 'Auth\LoginController@livreurLogin');
Route::post('/login/fournisseur', 'Auth\LoginController@fournisseurLogin');
Route::post('/login/freelancer', 'Auth\LoginController@freelancerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/livreur', 'Auth\RegisterController@createLivreur')->name('register.Livreur');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@index')->name('home');


Route::view('/rapport', 'rapport');

Route::group(['prefix' => 'categorie', 'as' => 'categorie'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'CategorieController@index']);
    Route::get('/show/create',['as'=>'.show.create', 'uses' => 'CategorieController@create']);
    Route::post('/create', ['as' => '.create', 'uses' => 'CategorieController@store']);
    Route::post('/update/{id_categorie}', ['as' => '.update', 'uses' => 'CategorieController@update']);
    Route::get('/destroy/{id_categorie}', ['as' => '.destroy', 'uses' => 'CategorieController@destroy']);    
    Route::get('/edit/{id_categorie}', ['as' => '.edit', 'uses' => 'CategorieController@edit']);
});

