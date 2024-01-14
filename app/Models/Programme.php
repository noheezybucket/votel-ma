<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'contenu', 'document', 'candidat_id'];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }
}
