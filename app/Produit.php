<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        "categorie",
        "designation",
    ];
    public function getCategorie()
    {
        return Categorie::where('id',$this->categorie)->first();
    }
}
