<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'designation',
        'quantite',
        'prix',
        'facture',
        'montant'
    ];

    public function getFacture()
    {
        return Facture::where('id',$this->facture)->first();
    }
}
