<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'type',
        'produit',
        'fournisseur',
        'prix_achat',
        'quantite',
        'date_stock'
    ];
    public function getProduit()
    {
        return Produit::where('id',$this->produit)->first();
    }


}
