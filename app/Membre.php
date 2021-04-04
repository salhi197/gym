<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;
class Membre extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'adresse',
        'sexe',
        'naissance',
        'photo',
        'email',
        'matricule',
        'etat'
    ];
    public function getInscriptions()
    {
        $inscriptions = Inscription::where('membre',$this->id)->get();
        return $inscriptions;
    }

    public function hasInscription()
    {
        $inscription = Inscription::orderBy('id', 'DESC')->limit(1);
//        $inscription = Inscription::where(['membre'=>$this->id,'etat'=>1])->first();
        if ($inscription){
            return true;
        }
        return false;
    }

    public function getActiveInscription()
    {
        $inscription  = Inscription::where('membre',$this->id)->first();
        return $inscription;
    }

    public function isAuthorised()
    {
        $inscription  = Inscription::where(['membre'=>$this->id,'etat'=>1])->first();
        // $inscription = Inscription::orderBy('id', 'DESC')->where('membre',$this->id)->limit(1);
        if ($inscription) {
            $fin = $inscription->fin;
            $reste = $inscription->reste;
            $current = date('Y-m-d');
            if($current>$fin or $reste==0){
                return 0;
            }else{
                // $lastpresence = DB::table('presences')->order_by('id', 'desc')->first();
                $lastpresence = DB::table('presences')
                ->where('matricule',$this->matricule)
                ->orderBy('id', 'desc')
                ->get();
                $lastpresence = $lastpresence[0];
                $aftersixhour= date("Y-m-d H:i:s", strtotime($lastpresence->created_at));
                $hour=date('Y-m-d H:i:s');                
                return 1;
                /**
                 * check if last presnce is more then 6 hours
                 */
                if ($hour>$aftersixhour) {
                    return 1;
                }else{
                    return 0;
                }
            }
        }else{
            return 0;
        }
    }
    
}
