<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'adresse',
        'telephone',
        'email',
        'date_maissance',
        'ville_id'
    ];


    public function siteHasVille()
    {
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }
    
}
