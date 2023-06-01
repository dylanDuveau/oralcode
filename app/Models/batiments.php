<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batiments extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'cheminImage',
        'cheminDetail',
        'coordPoint',
        'offset',
    ];
}
