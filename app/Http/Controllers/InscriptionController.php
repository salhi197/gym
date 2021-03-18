<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presence;
use App\Inscription;

use Carbon\Carbon;

class InscriptionController extends Controller
{
    public function index()
    {
        $inscriptions = Inscription::all();        
        return view('inscriptions.presences',compact('inscriptions'));
    }

    
    public function presence($inscription_id)
    {
        $presences = Presence::where('inscription',$inscription_id)->get();
        return view('inscriptions.presences',compact('presences'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'abonnement'=>'required',
        ]);

        $inscription = new Inscription();
        $inscription->debut=$request['debut'];
        $fin =  Carbon::parse($request['debut'])->addMonth($request['nbrmois'])->format('Y-m-d');
        $inscription->fin=$fin;
        $inscription->reste=$request['reste'];
        $inscription->nbsseance=$request['nbrmois']*4*json_decode($request['abonnement'])->nbrsemaine;
        $inscription->membre=$request->membre;
        $inscription->abonnement=json_decode($request['abonnement'])->id;
        $inscription->etat=1;//$request['etat'];
        $inscription->total=$request['total'];
        $inscription->remise=$request['remise'];
        $inscription->nbrmois=$request['nbrmois'];
        $inscription->versement=$request['versement'];
        $inscription->save();
        
        return redirect()->route('membre.index')->with('success', ' inséré avec succés ');          
    }
}
