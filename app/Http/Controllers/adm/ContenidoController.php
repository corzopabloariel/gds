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
        } else
            $contenido["data"] = json_decode($contenido["data"], true);

        $title = "Contenido: " . strtoupper($seccion);
        return view('adm.contenido.edit',compact('title','seccion','contenido'));
    }
    public function update(Request $request, $seccion) {
        $datosRequest = $request->all();
        $contenido = Contenido::where('seccion',$seccion)->first();
        $contenido["data"] = json_decode($contenido["data"], true);
        
        switch($seccion) {
            case "home":
                $file = $request->file("img");
                if(!is_null($file)) {
                    $path = public_path('images/producto/')."{$seccion}";
                    if (!file_exists($path))
                        mkdir($path, 0777, true);
                    
                    $imageName = time().'.'.$file->getClientOriginalExtension();
                    $file->move($path, $imageName);
                    $img = "images/producto/{$seccion}/{$imageName}";
                } else
                    $img = $contenido["data"]["img"];
                // 
                $data = [
                    "titulo" => $datosRequest["titulo"],
                    "texto" => $datosRequest["texto"],
                    "img" => $img,
                    "opciones" => []
                ];
                if(isset($datosRequest["nombre"])) {
                    for($i = 0; $i < count($datosRequest["nombre"]); $i++) {
                        $files = $request->file('img_opcion');
                        $opcion = null;
        
                        for($j = 0; $j < count($contenido["data"]["opciones"]); $j++) {
                            if(strcasecmp($contenido["data"]["opciones"][$j]["titulo"], $datosRequest["nombre"][$i]) == 0) {
                                $opcion = $contenido["data"]["opciones"][$j];
                                break;
                            }
                        }
                        $img = null;
                        if(!is_null($opcion))
                            $img = $opcion["img"];
                        if(!is_null($files[$i])) {
                            $path = public_path('images/general/')."{$seccion}";
                            if (!file_exists($path))
                                mkdir($path, 0777, true);
                            
                            $imageName = time().'_opciones_' . ($i + 1) . '.'.$files[$i]->getClientOriginalExtension();
                            $files[$i]->move($path, $imageName);
                            $img = "images/general/{$seccion}/{$imageName}";
                        }
                        $data["opciones"][] = ["img" => $img,"titulo" => $datosRequest["nombre"][$i]];
                    }
                } else
                    $data = $contenido["data"];
                break;
            case "empresa":
                $data = [
                    "acerca" => [
                        "titulo" => $datosRequest["acercaTitulo"],
                        "texto" => $datosRequest["acerca"],
                        "opciones" => []
                    ],
                    "mision" => [
                        "titulo" => $datosRequest["misionTitulo"],
                        "texto" => $datosRequest["mision"],
                    ],
                    "valor" => [
                        "titulo" => $datosRequest["valorTitulo"],
                        "texto" => $datosRequest["valor"],
                    ]
                ];
                for($i = 0; $i < count($datosRequest["numero"]); $i++)
                    $data["acerca"]["opciones"][] = [
                        "numero" => $datosRequest["numero"][$i],
                        "nombre" => $datosRequest["nombre"][$i]
                    ];
                break;
            case "ecobruma":
                $data = [
                    "texto" => $datosRequest["ecobruma"],
                    "video" => $datosRequest["video"],
                    "dinamica" => [
                        "titulo" => $datosRequest["dinamicaTitulo"],
                        "texto" => $datosRequest["dinamica"],
                    ],
                    "aplicaciones" => [
                        "titulo" => $datosRequest["aplicacionesTitulo"],
                        "texto" => $datosRequest["aplicaciones"],
                    ],
                    "caracteristicas" => []
                ];
                if(isset($datosRequest["nombre"])) {
                    for($i = 0; $i < count($datosRequest["nombre"]); $i++) {
                        $files = $request->file('img_opcion');
                        $opcion = null;
        
                        for($j = 0; $j < count($contenido["data"]["caracteristicas"]); $j++) {
                            if(strcasecmp($contenido["data"]["caracteristicas"][$j]["titulo"], $datosRequest["nombre"][$i]) == 0) {
                                $opcion = $contenido["data"]["caracteristicas"][$j];
                                break;
                            }
                        }
                        $img = null;
                        if(!is_null($opcion))
                            $img = $opcion["img"];
                        if(!is_null($files[$i])) {
                            $path = public_path('images/general/')."{$seccion}";
                            if (!file_exists($path))
                                mkdir($path, 0777, true);
                            
                            $imageName = time().'_caracteristicas_' . ($i + 1) . '.'.$files[$i]->getClientOriginalExtension();
                            $files[$i]->move($path, $imageName);
                            $img = "images/general/{$seccion}/{$imageName}";
                        }
                        $data["caracteristicas"][] = ["img" => $img,"titulo" => $datosRequest["nombre"][$i]];
                    }
                } else
                    $data = $contenido["data"];
                break;
            case "videos":
                $data = [];
                for($i = 0; $i < count($datosRequest["titulo"]); $i++) {
                    if(empty($datosRequest["video"][$i])) continue;
                    $data[] = ["titulo" => $datosRequest["titulo"][$i],"video" => $datosRequest["video"][$i]];
                }
                break;
            case "clientes":
                $data = [
                    "texto" => $datosRequest["texto"],
                    "listado" => []
                ];
                if(isset($datosRequest["nombre"])) {
                    for($i = 0; $i < count($datosRequest["nombre"]); $i++) {
                        $files = $request->file('img_opcion');
                        $opcion = null;
        
                        for($j = 0; $j < count($contenido["data"]["listado"]); $j++) {
                            if(strcasecmp($contenido["data"]["listado"][$j]["nombre"], $datosRequest["nombre"][$i]) == 0) {
                                $opcion = $contenido["data"]["listado"][$j];
                                break;
                            }
                        }
                        $img = null;
                        if(!is_null($opcion))
                            $img = $opcion["img"];
                        if(!is_null($files[$i])) {
                            $path = public_path('images/general/')."{$seccion}";
                            if (!file_exists($path))
                                mkdir($path, 0777, true);
                            
                            $imageName = time().'_clientes_' . ($i + 1) . '.'.$files[$i]->getClientOriginalExtension();
                            $files[$i]->move($path, $imageName);
                            $img = "images/general/{$seccion}/{$imageName}";
                        }
                        $data["listado"][] = ["img" => $img,"nombre" => $datosRequest["nombre"][$i]];
                    }
                } else
                    $data = $contenido["data"];
                break;
        }
        
        $contenido->fill(["data" => json_encode($data)]);
        $contenido->save();

        return back();
    }
}
