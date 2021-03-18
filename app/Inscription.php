<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'debut',
        'fin',
        'reste',
        'nbrseance',
        'membre',
        'abonnement',
        'etat',
        'total',
        'remise',
        'nbrmois',
        'versement'
    ];
    public function getAbonnement()
    {
        return Abonnement::find($this->abonnement);
    }
}
