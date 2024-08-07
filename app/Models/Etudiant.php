<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etudiant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'telephone',
        'date_de_naissance',
        'matricule',
        'email',
        'mot_de_passe',
        'photo'
    ];

    public function evaluations() {
        return $this->hasMany(Evaluation::class);
    }
}
