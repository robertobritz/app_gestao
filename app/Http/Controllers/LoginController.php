<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $erro =  '';
        if($request->get('erro') == 1){
            $erro =  'Usuário e ou senha não existe';
        };
        if($request->get('erro') == 2){
            $erro =  'Necessário realizar login para ter acesso a página';
        };

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        //as mensagens de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório',
        ];

        $request->validate($regras, $feedback);

        //recuperando os parâmetros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar o Model User
        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');

        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }

    public function sair()
    {
        session_destroy();

        return redirect()->route('site.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
