<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contenido;
class ContenidoController extends Controller
{
    public function index($seccion) {}

    public function edit($seccion) {
        $contenido = Contenido::where("seccion",$seccion)->first();
        if(is_null($contenido)) {
            $data = [];
            switch($seccion) {
                case "home":
                    $data = ["titulo" => "","texto" => "", "img" => "", "opciones" => []];
                    break;
                case "empresa":
                    $data = ["acerca" => ["titulo" => "", "texto" => "", "opciones" => []], "mision" => ["texto" => "", "titulo" => ""], "valor" => ["texto" => "", "titulo" => ""]];
                    break;
                case "ecobruma":
                    $data = ["texto" => "", "caracteristicas" => [], "img" => "", "dinamica" => "", "aplicaciones" => ""];
                    break;
                case "videos":
                    $data = [];
                    break;
                case "clientes":
                    $data = ["texto" => "", "listado" => []];
                    break;
            }
            Contenido::create(["seccion" => $seccion,"data" => json_encode($data)]);
        }

        $title = "Contenido: " . strtoupper($seccion);
        return view('adm.contenido.edit',compact('title','seccion','contenido'));
    }
    public function update($seccion) {

    }
}
