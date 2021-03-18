<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public function isAuthorised()
    {
        /***
         * get inscritpions
         */
        $inscription = $this->hasInscription();
        if($hasInscription){
            $fin = $inscription->fin;
            $reste =$inscription->reste;
            $current = date('Y-m-d');
            if($current>$fin or $reste==0){
                return 0;
            }
            return 1;
        }
        return 0;
    }
    
}
