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
use DateTime;

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
        $membre->email = $request['email'];
        $membre->sang = $request['sang'];
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
        $membre=DB::select(" select * from membres where id='$id_membre' ")[0];

        $inscription=DB::select(" select * from inscriptions 
            where membre='$id_membre'
            order by id desc limit 1 ")[0];

        $idabonnement=$inscription->abonnement;

        $abonnement=DB::select(" select * from abonnements where id='$idabonnement' ")[0];

        $now = Carbon::now()->format('d-m-Y');

         $dompdf = new Dompdf();

        $html = '<!doctype html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <title>Bon : '.$now.' </title>
        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
            }
            tfoot tr td{
                font-weight: bold;
            }
            .gray {
                background-color: lightgray;
            }
            tbody {
                width: 100%;
            }
        </style>
        </head>
        <body>
          <table width="100%">
            <tr>
                <td valign="top"></td>
                <td align="left">

                    <h1 style="text-align: center;"><B> Salle de Sport Sifou</B></h1>
                      <h2 style="text-align: center;">Bon_Inscription: '.$now.'</h2>
                      <h4 style="text-align: center;">Client: '.$membre->nom.' '.$membre->prenom.'</h4>
                      <h4 style="text-align: center;">Téléphone: '.$membre->telephone.' </h4>

                     

                </td>
                <td align="right">
                    <img src=""  />
                </td>
            </tr>
          </table>
          
          <br/>
          <table width="100%">
            <thead style="background-color: lightgray;">
              <tr>
                <th>Abonnement</th>
                <th>Tarif</th>
                <th>Date début</th>
                <th>Date Fin</th>
                <th>Versement</th>
         
                
              </tr>
            </thead>
            <tbody>';
           
      
                    

                        
                    $html.='<tr class="item">
                    
                    <td>
                        '.$abonnement->label.'
                    </td>
                    <td>

                        '.$abonnement->tarif.'
                    </td>
                   
                     <td>

                        '.$inscription->debut.'
                    </td>
                     <td>

                        '.$inscription->fin.'
                    </td>
                     <td>

                        '.$inscription->versement.'
                    </td>
                    
                   
                </tr>';

   
            

           

        $html.='
            </tbody>
            <tfoot>';
           
            
            $html.='</tfoot>
          </table>
          

        </body>
        </html>';

        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream("BonClient", array('Attachment'=>1));
        


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
