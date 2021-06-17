<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uzklausos extends Model
{
    use HasFactory;
    public $fillable = [
        'puslapis',
        'vardas',
        'tel',
        'el_pastas',
        'uzklausa',


    ];
}
