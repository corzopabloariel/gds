<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContenidoController extends Controller
{
    public function index($seccion) {}
    public function edit($seccion) {
        $title = "Contenido: " . strtoupper($seccion);
        return view('adm.contenido.edit',compact('title'));
    }
    public function update($seccion) {}
}
