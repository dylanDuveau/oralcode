<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boites extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'quantite',
        'produits_id',
        'batiments_id',
        'cheminQrcode',
    ];
}
