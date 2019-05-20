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
        
        foreach($productos AS $p)
            $p["tituloLimpio"] = self::limpiar($p["titulo"]);
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
        $nav = '<a href="{{ route("productos") }}">Productos</a>';
        if(!is_null($familia["padre_id"])) {
            $padre = $familia->padre;
            $nav .= ' | <a href="{{ route("productos") }}">' . $padre["titulo"] . '</a>';
        }
        $nav .= " | {$familia['titulo']}";
        $empresa = self::datosEmpresa();
        $familias = Familia::whereNull("padre_id")->whereNotNull("img")->orderBy("orden")->get();
        return view('welcome',compact('seccion','title','empresa','familias','nav'));
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
        $nav = '<a href="{{ route("productos") }}">Productos</a>';
        if(!is_null($familia["padre_id"])) {
            $padre = $familia->padre;
            $nav .= ' | <a href="{{ route("productos") }}">' . $padre["titulo"] . '</a>';
        }
        $nav .= " | {$familia['titulo']}";
        $productos = Producto::where('familia_id',$id)->orderBy('orden')->get();
        return view('welcome',compact('seccion','title','empresa','menu','productos','familia','id','nav'));
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
        if(count($producto["imagenes"]) > 1)
            unset($producto["imagenes"][0]);
        $nav = '<a href="{{ route("productos") }}">Productos</a>';
        if(!is_null($producto->familia["padre_id"])) {
            $padre = $producto->familia->padre;
            $nav .= ' | <a href="{{ route("productos") }}">' . $padre["titulo"] . '</a>';
        }
        $nav .= " | {$producto->familia['titulo']}";
        //dd($producto["imagenes"]);
        $producto["productos"] = $producto->productos;
        return view('welcome',compact('seccion','title','empresa','menu','producto','nav'));
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
        $familias = Familia::whereNull("padre_id")->orderBy('orden')->get();
        foreach($familias AS $f) {
            $hijos = $f->hijos;
            $productos = Producto::where('familia_id',$f["id"])->orderBy('orden')->pluck('titulo', 'id');
            $menu[$f["id"]] = [];
            $menu[$f["id"]]["titulo"] = $f["titulo"];
            $menu[$f["id"]]["subcategorias"] = [];
            foreach($hijos AS $h) {
                $menu[$f["id"]]["subcategorias"][$h["id"]] = [];
                $menu[$f["id"]]["subcategorias"][$h["id"]]["titulo"] = $h["titulo"];
                $menu[$f["id"]]["subcategorias"][$h["id"]]["img"] = $h["img"];
                $productos = Producto::where('familia_id',$h["id"])->orderBy('orden')->pluck('titulo', 'id');
                foreach($productos AS $kk => $vv) {
                    $menu[$f["id"]]["subcategorias"][$h["id"]]["hijos"][$kk] = [];
                    $menu[$f["id"]]["subcategorias"][$h["id"]]["hijos"][$kk]["titulo"] = $vv;
                    $menu[$f["id"]]["subcategorias"][$h["id"]]["hijos"][$kk]["tituloLimpio"] = self::limpiar($vv);
                }
            }
            $menu[$f["id"]]["hijos"] = [];
            foreach($productos AS $kk => $vv) {
                $menu[$f["id"]]["hijos"][$kk] = [];
                $menu[$f["id"]]["hijos"][$kk]["titulo"] = $vv;
                $menu[$f["id"]]["hijos"][$kk]["tituloLimpio"] = self::limpiar($vv);
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
                return back()->withSuccess(['mssg' => "Formulario enviado correctamente"]);
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
                return back()->withSuccess(['mssg' => "Presupuesto enviado correctamente"]);
        }
        
    }
}
//6LfyY50UAAAAAJGHw1v6ixJgvBbUOasaTT6Wz-od
//6LfyY50UAAAAALNyCZnnP3Rt_pTi69EgSABJ0ehz