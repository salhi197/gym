<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membre;

class ApiController extends Controller
{
    public function verifier(Request $request)
    {
        $matricule= $request->matricule;
        $membre=Membre::where('matricule',$matricule)->first();
        if($membre){
            $reponse = $membre->isAuthorised();
            return response()->json(['reponse' => $reponse]);
        }else{
            return response()->json(['reponse' => -1]);
        }

    }
}
