<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $fillable = [
        'titulo',
        'img',
        'orden',
        'padre_id'
    ];
    public function productos()
    {
        return $this->hasMany('App\Producto')->orderBy('orden');
    }
    
    public function hijos()
    {
        return $this->hasMany('App\Familia','padre_id','id')->orderBy('orden');
    }
    public function padre()
    {
        return $this->belongsTo('App\Familia');
    }
}
