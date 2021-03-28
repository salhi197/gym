<?php



namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Response;

class HomeController extends Controller
{

    /**

     * Create a new controller instance.

     *

     * @return void

     */


    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()
    {
        $nbmembres=count(DB::select("select * from membres"));
        return view('home',compact('nbmembres'));
     
    }

    public function search(Request $request)
    {

        $wheres = "";
        $index = 0;
        $type = "";
        $debut_entre = "";
        $fin_entre ="";
        if($request['table']){
            $table = $request['table'];
            $categorie = $request['categorie'];
            
            if ($table == 'fournisseurs') {
                $sql ="select * from $table where id in (select fournisseur from categoriquements where categorie='$categorie')";
                $fournisseurs = DB::select(DB::raw($sql));        
                return view('providers',compact('fournisseurs'));                    
            }else{
                $sql ="select * from $table where categorie='$categorie'";
                $produits = DB::select(DB::raw($sql));        
                return view('providers',compact('produits'));    
            }
        }



    }



}

