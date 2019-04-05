<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'titulo',
        'data',
        'destacado',
        'familia_id',
        'orden'
    ];
}
