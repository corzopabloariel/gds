<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Dato;
use App\Contenido;
use App\Producto;
use App\Familia;
use App\Slider;
use App\Proyecto;
class GdsController extends Controller
{
    public function index() {
        $seccion = strtoupper("home");
        $title = "home";

        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);

        $slider = Slider::where('seccion','home')->orderBy('orden')->get();

        $productos = Producto::where('destacado',1)->limit(3)->get();
        $ecobruma = Slider::where('seccion','ecobruma')->first()["img"];
        
        $contenido = Contenido::where('seccion','home')->first()["data"];
        $contenido = json_decode($contenido, true);
        return view('welcome',compact('seccion','title','empresa','contenido','productos','ecobruma','slider'));
    }
    public function empresa() {
        $seccion = strtoupper("empresa");
        $title = "empresa";
        
        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);

        $slider = Slider::where('seccion','empresa')->orderBy('orden')->get();
        
        $contenido = Contenido::where('seccion','empresa')->first()["data"];
        $contenido = json_decode($contenido, true);
        return view('welcome',compact('seccion','title','empresa','contenido','slider'));
    }

    public function ecobruma() {
        $seccion = strtoupper("ecobruma");
        $title = "ecobruma";
        
        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);

        $slider = Slider::where('seccion','ecobruma')->orderBy('orden')->get();
        
        $contenido = Contenido::where('seccion','ecobruma')->first()["data"];
        $contenido = json_decode($contenido, true);
        
        return view('welcome',compact('seccion','title','empresa','contenido','slider'));
    }

    public function videos() {
        $seccion = strtoupper("videos");
        $title = "videos";
        
        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);

        
        $contenido = Contenido::where('seccion','videos')->first()["data"];
        $contenido = json_decode($contenido, true);
        
        return view('welcome',compact('seccion','title','empresa','contenido'));
    }

    public function clientes() {
        $seccion = strtoupper("clientes");
        $title = "clientes";
        
        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);
        
        $contenido = Contenido::where('seccion','clientes')->first()["data"];
        $contenido = json_decode($contenido, true);
        
        return view('welcome',compact('seccion','title','empresa','contenido'));
    }

    public function productos() {
        $seccion = strtoupper("productos");
        $title = "productos";
        
        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);

        $familias = Familia::orderBy("orden")->get();
        
        return view('welcome',compact('seccion','title','empresa','familias'));
    }
    /**
     * @param $id - familias.id
     */
    public function producto($id) {
        $seccion = strtoupper("producto");
        $title = "producto";
        
        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);

        $menu = [];
        $familias = Familia::orderBy('orden')->pluck('titulo', 'id');
        foreach($familias AS $k => $v) {
            $productos = Producto::where('familia_id',$k)->pluck('titulo', 'id');
            $menu[$k] = [];
            $menu[$k]["titulo"] = $v;
            $menu[$k]["hijos"] = [];
            foreach($productos AS $kk => $vv) {
                $menu[$k]["hijos"][$kk] = [];
                $menu[$k]["hijos"][$kk]["titulo"] = $vv;
            }
        }
        $familia = Familia::find($id);
        $productos = Producto::where('familia_id',$id)->get();
        
        return view('welcome',compact('seccion','title','empresa','menu','productos','familia'));
    }
    /**
     * @param $name - Para este caso, la variable no sirve para nada
     * @param $id - productos.id
     */
    public function productoEspecifico($name, $id) {
        $seccion = strtoupper("producto");
        $title = "productoEspecifico";
        
        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);

        $menu = [];
        $familias = Familia::orderBy('orden')->pluck('titulo', 'id');
        foreach($familias AS $k => $v) {
            $productos = Producto::where('familia_id',$k)->pluck('titulo', 'id');
            $menu[$k] = [];
            $menu[$k]["titulo"] = $v;
            $menu[$k]["hijos"] = [];
            foreach($productos AS $kk => $vv) {
                $menu[$k]["hijos"][$kk] = [];
                $menu[$k]["hijos"][$kk]["titulo"] = $vv;
            }
        }
        $producto = Producto::find($id);
        $producto["data"] = json_decode($producto["data"], true);
        $producto["imagenes"] = $producto->imagenes;
        
        return view('welcome',compact('seccion','title','empresa','menu','producto'));
    }

    public function proyectos() {
        $seccion = strtoupper("proyectos");
        $title = "proyectos";
        
        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);

        $proyectos = Proyecto::orderBy("orden")->get();
        
        return view('welcome',compact('seccion','title','empresa','proyectos'));
    }

    public function proyecto($id) {
        $seccion = strtoupper("proyecto");
        $title = "proyecto";
        
        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);

        $proyecto = Proyecto::find($id);
        $proyecto["img"] = json_decode($proyecto["img"], true);
        
        return view('welcome',compact('seccion','title','empresa','proyecto'));
    }

    public function contacto() {
        $seccion = strtoupper("contacto");
        $title = "contacto";
        
        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);
        
        return view('welcome',compact('seccion','title','empresa'));
    }
    
    public function presupuesto() {
        $seccion = strtoupper("presupuesto");
        $title = "presupuesto";
        
        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);
        
        return view('welcome',compact('seccion','title','empresa'));
    }
}
