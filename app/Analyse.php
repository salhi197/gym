<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    protected $fillable = [
        'type',
        'categorie',
        'produit',
        'marque',
        'fabrication',
        'peremption',
        'prelevement',
        'reception',
        'analyse',
        'operateur1',
        'operateur2',
        'client',
        'lot',
        'valeur',
        'contenance'        
    ];
    public function getClient()
    {
        return Client::where('id',$this->client)->first();
    }

    public function getProduit()
    {
        return Produit::where('id',$this->produit)->first();
    }

    public function getOperateur()
    {
        return Operateur::where('id',$this->operateur)->first();
    }

}
