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
    public function imagenes()
    {
        return $this->hasMany('App\Productosimg')->orderBy('orden');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'productosrelacion', 'producto', 'producto_relacion');
    }
    
    public function familia()
    {
        return $this->belongsTo('App\Familia')->orderBy('orden');
    }
}
