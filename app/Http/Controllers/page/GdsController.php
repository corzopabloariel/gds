<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contacto;
use App\Mail\Presupuesto;
use App\Mail\Ecobruma;

use App\Dato;
use App\Contenido;
use App\Producto;
use App\Familia;
use App\Slider;
use App\Proyecto;
class GdsController extends Controller
{
    public function index() {
        $title = "home";
        $seccion = strtoupper($title);
        $empresa = self::datosEmpresa();
        $slider = Slider::where('seccion',$title)->orderBy('orden')->get();
        $productos = Producto::where('destacado',1)->limit(3)->get();
        $ecobruma = Slider::where('seccion','ecobruma')->first()["img"];
        $contenido = self::contenido($title);
        return view('welcome',compact('seccion','title','empresa','contenido','productos','ecobruma','slider'));
    }
    public function empresa() {
        $title = "empresa";
        $seccion = strtoupper($title);
        $empresa = self::datosEmpresa();
        $slider = Slider::where('seccion',$title)->orderBy('orden')->get();
        $contenido = self::contenido($title);
        return view('welcome',compact('seccion','title','empresa','contenido','slider'));
    }

    public function ecobruma() {
        $title = "ecobruma";
        $seccion = strtoupper($title);
        $empresa = self::datosEmpresa();
        $slider = Slider::where('seccion',$title)->orderBy('orden')->get();
        $contenido = self::contenido($title);
        return view('welcome',compact('seccion','title','empresa','contenido','slider'));
    }

    public function videos() {
        $title = "videos";
        $seccion = strtoupper($title);
        $empresa = self::datosEmpresa();
        $contenido = self::contenido($title);
        return view('welcome',compact('seccion','title','empresa','contenido'));
    }

    public function clientes() {
        $title = "clientes";
        $seccion = strtoupper($title);
        $empresa = self::datosEmpresa();
        $contenido = self::contenido($title);
        return view('welcome',compact('seccion','title','empresa','contenido'));
    }

    public function productos() {
        $seccion = strtoupper("productos");
        $title = "productos";
        $empresa = self::datosEmpresa();
        $familias = Familia::orderBy("orden")->get();
        return view('welcome',compact('seccion','title','empresa','familias'));
    }
    /**
     * @param $id - familias.id
     */
    public function producto($id) {
        $seccion = strtoupper("producto");
        $title = "producto";
        $empresa = self::datosEmpresa();
        $menu = self::menu();
        $familia = Familia::find($id);
        $productos = Producto::where('familia_id',$id)->orderBy('orden')->get();
        return view('welcome',compact('seccion','title','empresa','menu','productos','familia'));
    }
    /**
     * @param $name - Para este caso, la variable no sirve para nada
     * @param $id - productos.id
     */
    public function productoEspecifico($name, $id) {
        $seccion = strtoupper("producto");
        $title = "productoEspecifico";
        $empresa = self::datosEmpresa();
        $menu = self::menu();
        $producto = Producto::find($id);
        $producto["data"] = json_decode($producto["data"], true);
        $producto["imagenes"] = $producto->imagenes;
        $producto["productos"] = $producto->productos;
        return view('welcome',compact('seccion','title','empresa','menu','producto'));
    }

    public function proyectos() {
        $seccion = strtoupper("proyectos");
        $title = "proyectos";
        $empresa = self::datosEmpresa();
        $proyectos = Proyecto::orderBy("orden")->get();
        return view('welcome',compact('seccion','title','empresa','proyectos'));
    }

    public function proyecto($id) {
        $seccion = strtoupper("proyecto");
        $title = "proyecto";
        
        $empresa = self::datosEmpresa();
        $proyecto = Proyecto::find($id);
        $proyecto["img"] = json_decode($proyecto["img"], true);
        return view('welcome',compact('seccion','title','empresa','proyecto'));
    }

    public function contacto() {
        $seccion = strtoupper("contacto");
        $title = "contacto";
        $empresa = self::datosEmpresa();
        return view('welcome',compact('seccion','title','empresa'));
    }
    
    public function presupuesto() {
        $seccion = strtoupper("presupuesto");
        $title = "presupuesto";
        $empresa = self::datosEmpresa();
        return view('welcome',compact('seccion','title','empresa'));
    }

    public function contenido($seccion) {
        $contenido = Contenido::where('seccion',$seccion)->first()["data"];
        $contenido = json_decode($contenido, true);
        return $contenido;
    }

    public function limpiar($string) {
        $string = htmlentities($string);
        $string = str_replace(" ","_",$string);
        $string = strtolower($string);
        $string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
        return $string;
    }

    public function menu() {
        $menu = [];
        $familias = Familia::orderBy('orden')->pluck('titulo', 'id');
        foreach($familias AS $k => $v) {
            $productos = Producto::where('familia_id',$k)->orderBy('orden')->pluck('titulo', 'id');
            $menu[$k] = [];
            $menu[$k]["titulo"] = $v;
            $menu[$k]["hijos"] = [];
            foreach($productos AS $kk => $vv) {
                $menu[$k]["hijos"][$kk] = [];
                $menu[$k]["hijos"][$kk]["titulo"] = $vv;
                $menu[$k]["hijos"][$kk]["tituloLimpio"] = self::limpiar($vv);
            }
        }
        return $menu;
    }

    public function datosEmpresa() {
        $empresa = Dato::first();
        $empresa["img"] = json_decode($empresa["img"], true);
        $empresa["domicilio"] = json_decode($empresa["domicilio"], true);
        $empresa["tel"] = json_decode($empresa["tel"], true);
        $empresa["email"] = json_decode($empresa["email"], true);
        $empresa["redes"] = json_decode($empresa["redes"], true);
        return $empresa;
    }

    public function form(Request $request, $seccion) {
        $datosRequest = $request->all();
        
        if($seccion == "ecobruma") {
            $nombre = $request->input('nombre');
            $apellido = $request->input('apellido');
            $telefono = $request->input('telefono');
            $email = $request->input('email');
            $mensaje = $request->input('mensaje');
            Mail::to('corzo.pabloariel@gmail.com')->send(new Presupuesto($nombre, $telefono, $apellido, $email, $mensaje));
            //Mail::to('info@gsdtecnologia.com.ar')->send(new Presupuesto($nombre, $telefono, $apellido, $email, $mensaje));
            
            if (count(Mail::failures()) > 0)
                return back()->widthErrors(['mssg' => "Ha ocurrido un error al enviar el correo"]);
            else
                return back()->withSuccess(['mssg' => "Correo enviado correctamente"]);
        } if($seccion == "contacto") {
            $nombre = $request->input('nombre');
            $apellido = $request->input('apellido');
            $telefono = $request->input('telefono');
            $email = $request->input('email');
            $mensaje = $request->input('mensaje');
            Mail::to('corzo.pabloariel@gmail.com')->send(new Contacto($nombre, $telefono, $apellido, $email, $mensaje));
            Mail::to('info@gsdtecnologia.com.ar')->send(new Contacto($nombre, $telefono, $apellido, $email, $mensaje));
            
            if (count(Mail::failures()) > 0)
                return back()->widthErrors(['mssg' => "Ha ocurrido un error al enviar el correo"]);
            else
                return back()->withSuccess(['mssg' => "Correo enviado correctamente"]);
        } else {//presupuesto

            $nombre = $request->input('nombre');
            $telefono = $request->input('telefono');
            $localidad = $request->input('localidad');
            $email = $request->input('email');
            $mensaje = $request->input('mensaje');
            $archivo = $request->file('archivo');
            Mail::to('corzo.pabloariel@gmail.com')->send(new Presupuesto($nombre, $telefono, $localidad, $email, $mensaje, $archivo));
            Mail::to('info@gsdtecnologia.com.ar')->send(new Presupuesto($nombre, $telefono, $localidad, $email, $mensaje, $archivo));
            
            if (count(Mail::failures()) > 0)
                return back()->widthErrors(['mssg' => "Ha ocurrido un error al enviar el correo"]);
            else
                return back()->withSuccess(['mssg' => "Correo enviado correctamente"]);
        }
        
    }
}
//6LfyY50UAAAAAJGHw1v6ixJgvBbUOasaTT6Wz-od
//6LfyY50UAAAAALNyCZnnP3Rt_pTi69EgSABJ0ehz