<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Dato;
use App\Contenido;
use App\Producto;
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
        dd($id);
    }
}
