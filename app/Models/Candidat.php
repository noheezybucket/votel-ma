<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    // à Laravel d'autoriser le remplissage des champs de la bd que l'on souhaite laisser le user remplir

    protected $fillable = ['nom', 'prenom', 'partie', 'biographie', "candidat_id"];

    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }
}
