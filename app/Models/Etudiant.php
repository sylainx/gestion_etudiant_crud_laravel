<?php

namespace App\Models;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
