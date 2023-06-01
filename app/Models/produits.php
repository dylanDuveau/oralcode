<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produits extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'quantite',
        'ref',
        'description',
        'categorie_id',
    ];
    public function categories(){
        //return $this->hasOne('categorie_id');
        return $this->belongsTo(categorie::class);
    }

    public function souscategorie() {
        return $this->belongsTo(Categorie::class, 'souscategorie_id');
    }

}
