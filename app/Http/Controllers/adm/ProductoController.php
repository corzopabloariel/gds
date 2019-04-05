<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Productosimg;
use App\Familia;
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
        $productos = Producto::orderBy('orden')->get();
        $familias = Familia::orderBy('orden')->pluck('titulo', 'id');
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
    public function store(Request $request)
    {
        $datosRequest = $request->all();
        
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
                $ARR_data[$f] = isset($datosRequest[$f]) ? 1 : 0;
                continue;
            }

            if(isset($datosRequest[$f]))
                $ARR_data[$f] = $datosRequest[$f];
            
        }
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
        if(isset($datosRequest["nombre"])) {
            for($i = 0; $i < count($datosRequest["nombre"]); $i++) {
                $files = $request->file('img_opcion');
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
            $ARR_data["data"] = json_encode($ARR_data["data"]);
        }
        $producto = Producto::create($ARR_data);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
