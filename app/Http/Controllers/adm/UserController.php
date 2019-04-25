<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        unset($datosRequest["_token"]);
        if(isset($datosRequest["yo"]))
            unset($datosRequest["yo"]);
        if(is_null($data)) {
            if(!isset($datosRequest["password"]))
                return back()->withErrors(["mssg"=>"Contraseña necesaria"]);
            $datosRequest["password"] = Hash::make($datosRequest["password"]);
            User::create($datosRequest);
        } else {
            $ARR = [];
            if(isset($datosRequest["username"])) {//solo cambio user
                if(!isset($datosRequest["password"]))
                    return back()->withErrors(["mssg"=>"Contraseña necesaria"]);
                if(!Hash::check($datosRequest["password"], $data["password"]))
                    return back()->withErrors(["mssg" => "Contraseña incorrecta"]);
                $ARR["username"] = $datosRequest["username"];
                
            }
            if(isset($datosRequest["password_old"])) {//solo cambio pass
                if(!isset($datosRequest["password_new"]))
                    return back()->withErrors(["mssg"=>"Contraseña necesaria"]);
                if(!Hash::check($datosRequest["password_old"], $data["password"]))
                    return back()->withErrors(["mssg" => "Contraseña incorrecta"]);
                $ARR["password"] = Hash::make($datosRequest["password_new"]);
            } else if(isset($datosRequest["password_new"])) {
                
                if(strcmp($datosRequest["password_new"] , $datosRequest["password_new2"]) != 0)
                    return back()->withErrors(["mssg" => "Las contraseñas no coinciden"]);
                $ARR["password"] = Hash::make($datosRequest["password_new"]);
            }
            if(empty($ARR))
                return back()->widthErrors(["mssg" => "Faltan datos"]);
            $data->fill($ARR);
            $data->save();
            return back()->withSuccess(['mssg' => "Cambios realizados"]);
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
        return User::find($id);
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
        $data = User::find($id);
        return self::store($request, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return 0;
    }
}
