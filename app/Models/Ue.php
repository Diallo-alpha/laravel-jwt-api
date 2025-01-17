<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ue extends Model
{
    use HasFactory;

    protected $fillable = ['date_debut', 'date_fin', 'coef', 'libelle'];

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }
}
