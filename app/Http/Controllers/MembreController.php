<?php

namespace App\Http\Controllers;

use App\Inscription;
use Hash;
use Carbon\Carbon;
use App\Http\Requests\StoreProduit;
use App\Membre;
use App\Template;

use Dompdf\Dompdf;

use App\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class MembreController extends Controller
{
    public function index()
    {
        $membres = Membre::orderBy('id', 'DESC')->get();
        return view('membres.index',compact('membres'));
    }

    public function inscriptions($membre_id)
    {
        $membre = Membre::find($membre_id);
        $inscriptions = $membre->getInscriptions();
        $abonnements = Abonnement::all();        
        return view('inscriptions.index',compact('membre','inscriptions','abonnements'));
    }

    public function create()
    {
        $abonnements = Abonnement::all();
        return view('membres.create',compact('abonnements'));
    }

    public function store(Request $request)
    {        
        $membre = new Membre();
        $membre->nom = $request['nom'];
        $membre->prenom = $request['prenom'];
        $membre->telephone = $request['telephone'];
        $membre->adresse = $request['adresse'];
        $membre->sexe = $request['sexe'];
        $membre->naissance = $request['naissance'];
        $membre->photo = $request['photo'];
        // $membre->matricule = $request['matricule'];
        // $membre->etat = $request['etat'];                
        if($request->file('image')){
            $file = $request->file('image');
            $image = $file->store(
                'categories/images',
                'public'
            );
            $membre->image = $image;     
        }
        try {
            $membre->save();
        } catch (\Throwable $th) {
            return Redirect::back()->withInput()->with('error', $th->getMessage());
        }
        /**
         * ajouter inscrtion 
         */
        $inscription = new Inscription();
        $inscription->debut=$request['debut'];
        $fin =  Carbon::parse($request['debut'])->addMonth($request['nbrmois'])->format('Y-m-d');
        $inscription->fin=$fin;
        $inscription->reste=$request['reste'];
        $inscription->nbsseance=$request['nbrmois']*4*json_decode($request['abonnement'])->nbrsemaine;
        $inscription->membre=$membre->id;
        $inscription->abonnement=json_decode($request['abonnement'])->id;
        $inscription->etat=1;//$request['etat'];
        $inscription->total=$request['total'];
        $inscription->remise=$request['remise'];
        $inscription->nbrmois=$request['nbrmois'];
        $inscription->versement=$request['versement'];
        
        $inscription->save();
        
        return redirect()->route('membre.index')->with('success', ' inséré avec succés ');        
    }

    public function show($id_membre)
    {
        $membre = Membre::find($id_membre);
        return view('membres.view',compact('produit'));
    }

    public function edit($id_membre)
    {
        $abonnements = Abonnement::all();
        $membre= Membre::find($id_membre);
        return view('membres.edit',compact('abonnements','membre'));
    }


    public function facture($id_membre)
    {
        $membre= Membre::find($id_membre);
        $dompdf = new Dompdf();
        $html = Template::Facture($membre);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4');
        $dompdf->render();
        
        $dompdf->stream("bulletin.pdf", array("Attachment" => false));


        return view('membres.edit',compact('abonnements','membre'));
    }


    public function update(Request $request,$membre_id)
    {
        $membre = Membre::find($membre_id);  
        $membre->nom = $request['nom'];
        $membre->prenom = $request['prenom'];
        $membre->telephone = $request['telephone'];
        $membre->adresse = $request['adresse'];
        $membre->sexe = $request['sexe'];
        $membre->naissance = $request['naissance'];
        $membre->photo = $request['photo'];
        // $membre->matricule = $request['matricule'];
        // $membre->etat = $request['etat'];                
        if($request->file('image')){
            $file = $request->file('image');
            $image = $file->store(
                'categories/images',
                'public'
            );
            $membre->image = $image;     
        }
        try {
            $membre->save();
        } catch (\Throwable $th) {
            return Redirect::back()->withInput()->with('error', $th->getMessage());
        }
        return redirect()->route('membre.index')->with('success', ' inséré avec succés ');        

    }

    public function destroy($id_membre)
    {
        $membre = Membre::find($id_membre);
        $membre->delete();
        return redirect()->route('membre.index')->with('success', 'le Produit a été supprimé ');        
    }

}
