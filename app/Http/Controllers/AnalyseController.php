<?php

namespace App\Http\Controllers;

use App\Commune;
use App\Wilaya;
use App\Stock;
use App\Categorie;
use Carbon\Carbon;
use App\Produit;
use App\Operateur;
use Dompdf\Dompdf;
use Redirect;
use App\Client;
use App\Template;
use Hash;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\StoreProduit;
use App\Analyse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class AnalyseController extends Controller
{


    public function index()
    {
        $analyses = Analyse::all();
        return view('analyses.index',compact('analyses'));
    }

    public function create()
    {
        $operateurs1 = Operateur::where('type',"1")->get();
        $operateurs2 = Operateur::where('type',"2")->get();
        $produits = Produit::all();
        $clients = Client::all();
        $categories = Categorie::all();

        
        return view('analyses.create',compact('operateurs1','operateurs2','produits','categories','clients'));
    }

    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'type'=>'required',
            'categorie'=>'required',
            'produit'=>'required',
            'marque'=>'required',
            'fabrication'=>'required',
            'peremption'=>'required',
            'prelevement'=>'required',
            'reception'=>'required',
            'analyse'=>'required',
            'client'=>'required',
            'lot'=>'required',
            'valeur'=>'required',
            'contenance'=>'required'
        ]);    
        $analyse = new Analyse();   
        $analyse->type = $request['type'];
        $analyse->categorie = $request['categorie'];
        $analyse->produit = $request['produit'];
        $analyse->marque = $request['marque'];
        $analyse->fabrication = $request['fabrication'];
        $analyse->peremption = $request['peremption'];
        $analyse->prelevement = $request['prelevement'];
        $analyse->reception = $request['reception'];
        $analyse->analyse = $request['analyse'];
        $analyse->operateur1 = $request['operateur1'];
        $analyse->operateur2 = $request['operateur2'];
        $analyse->client = $request['client'];
        $analyse->lot = $request['lot'];
        $analyse->valeur = $request['valeur'];
        $analyse->contenance = $request['contenance'];
        try {
            $analyse->save();
        } catch (\Throwable $th) {
            return Redirect::back()->withInput()->with('error', $th->getMessage());        
        }
        return redirect()->route('analyse.index')->with('success', ' insertion efféctué ');        
    }

    public function print($id_analyse)
    {
        $analyse = Analyse::find($id_analyse);
        $dompdf = new Dompdf();
        $html = Template::Bulletin($analyse);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4');
        $dompdf->render();
        
        $dompdf->stream("bulletin.pdf", array("Attachment" => false));
        return view('analyses.view',compact('produit'));
    }

    public function edit($id_analyse)
    {

        $operateurs1 = Operateur::where('type',"1")->get();
        $operateurs2 = Operateur::where('type',"2")->get();
        $produits = Produit::all();
        $clients = Client::all();
        $categories = Categorie::all();
        $analyse = Analyse::find($id_analyse);
    
        return view('analyses.edit',compact('analyse','operateurs1','operateurs2','produits','categories','clients'));
    }

    public function update(Request $request,$analyse_id)
    {
        $analyse = Analyse::find($analyse_id);  
        $analyse->type = $request['type'];
        $analyse->categorie = $request['categorie'];
        $analyse->produit = $request['produit'];
        $analyse->marque = $request['marque'];
        $analyse->fabrication = $request['fabrication'];
        $analyse->peremption = $request['peremption'];
        $analyse->prelevement = $request['prelevement'];
        $analyse->reception = $request['reception'];
        $analyse->analyse = $request['analyse'];
        $analyse->operateur1 = $request['operateur1'];
        $analyse->operateur2 = $request['operateur2'];
        $analyse->client = $request['client'];
        $analyse->lot = $request['lot'];
        $analyse->valeur = $request['valeur'];
        $analyse->contenance = $request['contenance'];
        try {
            $analyse->save();
        } catch (\Throwable $th) {
            return Redirect::back()->withInput()->with('error', $th->getMessage());        
        }
        return redirect()->route('analyse.index')->with('success', ' insertion efféctué ');        
 
    }

    public function destroy($id_analyse)
    {
        $analyse = Analyse::find($id_analyse);
        $analyse->delete();
        return redirect()->route('analyse.index')->with('success', 'supprission terminé');        
    }




}
