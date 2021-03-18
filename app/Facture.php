<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
        'client',
        'date',
        'numero',
        'numerobc',
        'convention',
        'type',//tva wla timbre
        'ttc',
        'total',
        'etat'
    ];
    public function getClient()
    {
        return Client::where('id',$this->client)->first();
    }

    public function getItems()
    {
        Item::where('facture',$this->id)->get();
    }
}
