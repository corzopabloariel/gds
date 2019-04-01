<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmController extends Controller
{
    public function index() {
        $title = "";
        return view('adm.index.index',compact('title'));
    }
}
