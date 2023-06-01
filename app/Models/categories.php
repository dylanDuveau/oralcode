<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'niveau',
        'parent',
    ];

    public function parent (){
        return $this->hasOne(categorie::class);
    }
    public function products(){
        return $this->belongsTo(produit::class);
        //return $this->hasMany('App\Models\produit');
    }
}
