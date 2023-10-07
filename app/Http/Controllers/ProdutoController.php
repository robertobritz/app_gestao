<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Fornecedor;
use App\Models\Item;
use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Item::with('itemDetalhe','fornecedor')->paginate(10);

        //dd($produtos);
        // MÉTODO MANUAL PARA ENCONTRAR OS REGISTROS
        // foreach($produtos as $key => $produto){

        //     $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

        //     if(isset($produtoDetalhe)){
        //         $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
        //         $produtos[$key]['largura'] = $produtoDetalhe->largura;
        //         $produtos[$key]['altura'] = $produtoDetalhe->altura;
        //     }
        // }

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', compact('produto'));
        //return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.edit', compact('produto','unidades','fornecedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, Item $produto)
    {
        //$request->all(); // Todas as informações recebidas pelo formulário
        //$produto ; // é a intância do produto antes de realizar o update
        $produto->update($request->all());

        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index');
    }
}
