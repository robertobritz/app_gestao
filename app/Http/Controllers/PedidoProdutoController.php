<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        $pedido->produtos; // Eager Loader
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required|numeric|min:1',
        ];
        $feedback = [
            'produto_id.exists' => "O prodututo informado não existe",
            'required' => 'O campo :attribute deve possir um valor válido',
            'min' => 'O campo :attribute não pode ser menor que 1'
        ];

        $request->validate($regras,$feedback);

        echo $pedido->id. ' - '.$request->get('produto_id');

        /* Para este método utilizamos a model PEDIDOPRODUTO para que possamos percistir os dados no banco de dados
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->produto_id = $request->get('quantidade');
        $pedidoProduto->save();
        */

        /*
        //$pedido->produtos // Os registros do relacionamento
        //1º método:
        $pedido->produtos()->attach(
            $request->get('produto_id'),
            ['quantidade' => $request->get('quantidade')]
        ); // objeto que mapeia este relacionamento

        */
        //segundo método:
        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')],
            //$request->get('produto_id') => ['quantidade' => $request->get('quantidade')], Podemos adicionar outros campos no lugar de quantidades
            //$request->get('produto_id') => ['quantidade' => $request->get('quantidade')],
        ]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);

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
    public function destroy(Pedido $pedido, Produto $produto)
    {
        //convencional
        /*
        PedidoProduto::where([
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id,
        ])->delete();
        */
        
        $pedido->produtos()->detach($produto->id); // Como está se baseando pelo pedido, já se sabe a ID do Pedido, ai só informamos o id do produto
        //$produto->pedidos()->detach($pedido->id); // Mesma lógica, mas excluíndo via produto

        return redirect()->back();
    }
}
