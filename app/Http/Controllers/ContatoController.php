<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoRequest;
use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        //var_dump($_POST);
        //dd($request->all());

        //1ª MÉTODO
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');

        // $contato->save();

        //2º MÉTODO
        //$contato = new SiteContato();
        //$contato->create($request->all());

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(ContatoRequest $request){

        //realizar a validação dos dados do formulário recebidos no request
        //LOCAL VALIDATE
        // $request->validate([
        //     'nome' => 'required|min:3|max:40',
        //     'telefone' => 'required',
        //     'email' => 'required',
        //     'motivo_contato' => 'required',
        //     'mensagem' => 'required|max:2000'
        // ]);
        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
