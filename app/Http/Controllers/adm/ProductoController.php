<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Producto;
use App\Productosimg;
use App\Familia;
use App\Proyecto;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Productos";
        $familias = Familia::whereNull("padre_id")->orderBy('orden')->get();
        
        $productos = DB::select(
            DB::raw('SELECT p.*, f.titulo AS familia, ff.titulo AS pFamilia, (SELECT i.img FROM productosimg AS i WHERE i.producto_id = p.id LIMIT 1) AS img FROM productos AS p
                INNER JOIN familias AS f ON (f.id = p.familia_id)
                LEFT JOIN familias AS ff ON (ff.id = f.padre_id)
                    ORDER BY f.orden asc, p.orden asc'));
        
        return view('adm.familia.producto',compact('title','productos','familias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $data = null)
    {
        $datosRequest = $request->all();
        //dd($data);
        $model = new Producto();
        $ARR_data = [];
        foreach($model->getFillable() AS $f) {
            if($f == "data") {
                $ARR_data[$f] = [];
                $ARR_data[$f]["descripcion"] = "";
                $ARR_data[$f]["detalle"] = "";
                $ARR_data[$f]["video"] = null;
                $ARR_data[$f]["caracteristicas"] = [];
                continue;
            }
            if($f == "destacado") {
                $ARR_data[$f] = !empty($datosRequest[$f]) ? 1 : 0;
                continue;
            }

            if(isset($datosRequest[$f]))
                $ARR_data[$f] = $datosRequest[$f];
        }
        $ARR_data["data"]["archivos"] = null;
        if(isset($datosRequest["video"]))
            $ARR_data["data"]["video"] = $datosRequest["video"];
        if(isset($datosRequest["descripcion"]))
            $ARR_data["data"]["descripcion"] = $datosRequest["descripcion"];
        if(isset($datosRequest["detalle"]))
            $ARR_data["data"]["detalle"] = $datosRequest["detalle"];
        // data: {descripcion: “”, detalle: “”, caracteristicas: [], video: “”}
        /**
         * 
         */
        $files = $request->file('archivo');
        //if(!is_null($files)) {
        $path = public_path('documents/');
        $ARR_data["data"]["archivos"] = [];
        if (!file_exists($path))
            mkdir($path, 0777, true);
            //dd($datosRequest);
        if(isset($datosRequest["archivoNombre"])) {
            for($i = 0 ; $i < count($datosRequest["archivoNombre"]) ; $i ++) {
                $file = $files[$i];
                $nombre = $datosRequest["archivoNombre"][$i];
                if(empty($file)) {
                    if(!empty($datosRequest["archivoViejo"][$i]) && $nombre == "--") {
                        $filename = public_path() . "/" . $datosRequest["archivoViejo"][$i];
                        if (file_exists($filename))
                            unlink($filename);
                    } else
                        $ARR_data["data"]["archivos"][] = ["archivo" => $datosRequest["archivoViejo"][$i],"nombre" => $nombre];
                } else {
                    $imageName = time() . "-" . ( $i + 1 ) .'_documents.'.$file->getClientOriginalExtension();
                    $file->move($path, $imageName);
                    $ARR_data["data"]["archivos"][] = ["archivo" => "documents/{$imageName}","nombre" => $nombre];
                }
            }
        } else if(!is_null($data)) {
            foreach($data["data"]["archivos"] AS $a) {
                if(!empty($a["archivo"])) {
                    $filename = public_path() . "/" . $a["archivo"];
                    if (file_exists($filename))
                        unlink($filename);
                }
            }
        }
        
        if(is_null($data)) {
            
            if(isset($datosRequest["nombre"])) {
                $files = $request->file('img_opcion');
                for($i = 0; $i < count($datosRequest["nombre"]); $i++) {
                    $img = null;
                    
                    if(!is_null($files[$i])) {
                        $path = public_path('images/familias/productos/');
                        if (!file_exists($path))
                            mkdir($path, 0777, true);
                        
                        $imageName = time().'_caracteristicas_' . ($i + 1) . '.'.$files[$i]->getClientOriginalExtension();
                        $files[$i]->move($path, $imageName);
                        $img = "images/familias/productos/{$imageName}";
                    }
                    $ARR_data["data"]["caracteristicas"][] = ["img" => $img,"nombre" => $datosRequest["nombre"][$i]];
                }
            }

            $ARR_data["data"] = json_encode($ARR_data["data"]);
            $producto = Producto::create($ARR_data);
            $producto->productos()->sync($request->get('productos'));

            $Arr = [];
            $files = $request->file('img');
            if(!is_null($files)) {
                $path = public_path('images/familias/productos/');
                if (!file_exists($path))
                    mkdir($path, 0777, true);
                for($i = 0; $i < count($files); $i++) {
                    $imageName = time().'_producto_' . ($i + 1) . '.'.$files[$i]->getClientOriginalExtension();
                    $files[$i]->move($path, $imageName);
                    $img = "images/familias/productos/{$imageName}";
                    Productosimg::create([
                        "producto_id" => $producto["id"],
                        "img" => $img,
                        "orden" => $i + 1
                    ]);
                }
            }
            
        } else {
            /* -------------------------------------------------
                CARACTERÍSTICAS DE PRODUCTO
            -------------------------------------------------- */
            if(isset($datosRequest["nombreCar"])) {
                
                $files = $request->file('img_opcion');
                $A_caracteristicas = [];
                for($i = 0; $i < count($datosRequest["nombreCar"]); $i++) {
                    $img = null;
                    $caracteristica = null;
                    /**
                     * TRUE: img nueva
                     */
                    if(is_numeric($datosRequest["nombreCar"][$i])) {
                        $filesAux = $files[$i];
                        
                        $path = public_path('images/familias/productos/');
                        if (!file_exists($path))
                            mkdir($path, 0777, true);
                        
                        $imageName = time().'_caracteristicas_' . ($i + 1) . '.'.$filesAux->getClientOriginalExtension();
                        
                        $filesAux->move($path, $imageName);
                        $img = "images/familias/productos/{$imageName}";
                    } else {
                        for($j = 0; $j < count($data["data"]["caracteristicas"]); $j++) {
                            if(strcasecmp($data["data"]["caracteristicas"][$j]["img"], $datosRequest["nombreCar"][$i]) == 0) {
                                
                                $A_caracteristicas[] = $data["data"]["caracteristicas"][$j]["img"];
                                $img = $data["data"]["caracteristicas"][$j]["img"];
                                break;
                            }
                        }
                    }
                    $ARR_data["data"]["caracteristicas"][] = ["img" => $img,"nombre" => $datosRequest["nombre"][$i]];
                }
                
                for($j = 0; $j < count($data["data"]["caracteristicas"]); $j++) {
                    if(!in_array($data["data"]["caracteristicas"][$j]["img"],$A_caracteristicas))  {
                        $filename = public_path() . "/" . $data["data"]["caracteristicas"][$j]["img"];
                        if (file_exists($filename))
                            unlink($filename);
                    }
                }
            } else {
                for($j = 0; $j < count($data["data"]["caracteristicas"]); $j++) {
                    $filename = public_path() . "/" . $data["data"]["caracteristicas"][$j]["img"];
                    if (file_exists($filename))
                        unlink($filename);
                }
            }
            $file = $request->file('especificaciones');
            if(!is_null($file)) {
                $filename = public_path() . "/" . $data["data"]["especificaciones"];
                if(!empty($data["data"]["especificaciones"])) {
                    if (file_exists($filename))
                        unlink($filename);
                }
                $path = public_path('documents/');
                if (!file_exists($path))
                    mkdir($path, 0777, true);
                $imageName = time().'_documents.'.$file->getClientOriginalExtension();
                $file->move($path, $imageName);
                $ARR_data["data"]["especificaciones"] = "documents/{$imageName}";
            }
            $ARR_data["data"] = json_encode($ARR_data["data"]);
            $imagenesAux = [];
            $imagenes = $data["imagenes"];
            unset($data["imagenes"]);
            unset($data["productos"]);
            
            $data->fill($ARR_data);
            $data->save();
            $data->productos()->sync($request->get('productos'));
            /* -------------------------------------------------
                IMAGENES DE PRODUCTO
            -------------------------------------------------- */
            $files = $request->file('img');
            
            if(isset($datosRequest["nombreImg"])) {
                for($i = 0; $i < count($datosRequest["nombreImg"]); $i++) {
                    $image = null;
                    $img = null;
                    if(is_numeric($datosRequest["nombreImg"][$i])) {
                        if(!is_null($files)) {
                            $filesAux = $files[$i];
                            $path = public_path('images/familias/productos/');
                            if (!file_exists($path))
                                mkdir($path, 0777, true);
                            $imageName = time().'_producto_' . ($i + 1) . '.'.$filesAux->getClientOriginalExtension();
                            $filesAux->move($path, $imageName);
                            $img = "images/familias/productos/{$imageName}";
                        }
                        Productosimg::create([
                            "producto_id" => $data["id"],
                            "img" => $img,
                            "orden" => $i + 1
                        ]);
                    } else {
                        for($j = 0; $j < count($imagenes); $j++) {
                            if(strcasecmp($imagenes[$j]["img"], $datosRequest["nombreImg"][$i]) == 0) {
                                
                                $imagenes[$j]->fill(["orden" => $i + 1]);
                                $imagenes[$j]->save();
                                $imagenes[$j]["sigue"] = 1;
                            }
                        }
                        
                    }
                    
                }
                for($j = 0; $j < count($imagenes); $j++) {
                    if(!isset($imagenes[$j]["sigue"])) {
                        $filename = public_path() . "/" . $imagenes[$j]["img"];
                        if (file_exists($filename))
                            unlink($filename);
                        Productosimg::destroy($imagenes[$j]["id"]);
                    }
                }
            }
        }
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Producto::find($id);
        $data["imagenes"] = $data->imagenes;
        $data["productos"] = $data->productos;
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = self::edit($id);
        $data["data"] = json_decode($data["data"],true);
        // dd($request->all());
        
        return self::store($request,$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = self::edit($id);
        $data["data"] = json_decode($data["data"],true);
        /** ELIMINO características */
        for($i = 0; $i < count($data["data"]["caracteristicas"]); $i ++) {
            if(empty($data["data"]["caracteristicas"][$i]["img"])) continue;
            $filename = public_path() . "/" . $data["data"]["caracteristicas"][$i]["img"];
            if (file_exists($filename))
                unlink($filename);
        }
        for($i = 0; $i < count($data["data"]["archivos"]); $i ++) {
            if(empty($data["data"]["archivos"][$i]["archivo"])) continue;
            $filename = public_path() . "/" . $data["data"]["archivos"][$i]["archivo"];
            if (file_exists($filename))
                unlink($filename);
        }
        /** ELIMINO imagenes */
        foreach($data["imagenes"] AS $img) {
            if(!empty($img["img"])) {
                $filename = public_path() . "/" . $img["img"];
                if (file_exists($filename))
                    unlink($filename);
            }
        }
        Producto::destroy($id);
        return  0;
    }
}
