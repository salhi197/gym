<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operateur extends Model
{
    protected $fillable = [
        "nom",
        "email",
        "password_text",
        "role",
        "type"
    ];
    public function getCategorie()
    {
        return Categorie::where('id',$this->categorie)->first();
    }

}
