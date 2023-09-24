<?php

namespace App\Http\Controllers;

//use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function __construct()
    {
        //$this->middleware(LogAcessoMiddleware::class);
        //depois de criar um apelido na classe Kernel.php
        //$this->middleware('log.acesso');
    }

    public function sobreNos() {
        return view('site.sobre-nos');
    }

}
