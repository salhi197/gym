<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    protected $fillable = [
        'label',
        'tarif',
        'duree',
        'type',
        'nbrsemaine',
    ];
}
