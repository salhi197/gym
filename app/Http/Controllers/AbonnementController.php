<?php

namespace App\Http\Controllers;

use App\Commune;
use App\Wilaya;
use App\Stock;
use App\Categorie;
use Carbon\Carbon;
use App\Produit;
use App\Fournisseur;
use Hash;
use Response;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\StoreProduit;
use App\Membre;
use App\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class AbonnementController extends Controller
{
    public function index()
    {
        $abonnements = Abonnement::all();
        return view('abonnements.index',compact('abonnements'));
    }

    public function create()
    {
        $abonnements = Abonnement::all();
        return view('abonnements.create',compact('abonnements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label'=>'required',
            'tarif'=>'required',
            'nbrsemaine'=>'required'
        ]);
        $abonnement = new Abonnement();
        $abonnement->label= $request['label'];
        $abonnement->type= $request['type'];
        $abonnement->tarif= $request['tarif'];
        $abonnement->duree= $request['duree'];
        $abonnement->nbrsemaine= $request['nbrsemaine'];
        $abonnement->save();
        return redirect()->route('abonnement.index')->with('success', ' inséré avec succés ');        
    }

    public function show($id_abonnement)
    {
        $abonnement = Abonnement::find($id_abonnement);
        return view('abonnements.view',compact('produit'));
    }

    public function edit($id_abonnement)
    {
        return view('abonnements.edit',compact('categories','communes','wilayas','membre'));
    }

    public function update(Request $request,$abonnement_id)
    {
        $abonnement = Abonnement::find($abonnement_id);  
        $abonnement->nom= $request['nom'];
        $abonnement->prenom= $request['prenom'];
        $abonnement->telephone= $request['telephone'];
        $abonnement->adresse= $request['adresse'];
        $abonnement->sexe= $request['sexe'];
        $abonnement->naissance= $request['naissance'];
        $abonnement->photo= $request['photo'];
        $abonnement->matricule= $request['matricule'];
        $abonnement->etat= $request['etat'];
        $abonnement->save();
        return redirect()->route('abonnement.index')->with('success', 'modifié avec succés ');  
    }

    public function destroy($id_abonnement)
    {
        $abonnement = Abonnement::find($id_abonnement);
        $abonnement->delete();
        return redirect()->route('abonnement.index')->with('success', 'le Produit a été supprimé ');        
    }

}
