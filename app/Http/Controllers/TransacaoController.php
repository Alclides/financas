<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use App\Models\Categoria;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todas as transações, incluindo a categoria, para a view index
        $transacoes = Transacao::with('categoria')->get();
        return view('transacoes.index', compact('transacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna o formulário para criar uma nova transação
        $categorias = Categoria::all();
        return view('transacoes.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'valor' => 'required|numeric',
            'tipo' => 'required|in:receita,despesa',
            'categoria_id' => 'required|exists:categorias,id',
            'data' => 'required|date',
        ]);

        // Ajusta o valor conforme o tipo (despesa negativa, receita positiva)
        $valor = $request->tipo === 'despesa' ? -abs($request->valor) : abs($request->valor);

        Transacao::create([
            'valor' => $valor,
            'tipo' => $request->tipo,
            'categoria_id' => $request->categoria_id,
            'data' => $request->data,
        ]);

        return redirect()->route('transacoes.index')->with('success', 'Transação criada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Encontra a transação e redireciona para o formulário de edição
        $transacao = Transacao::findOrFail($id);
        $categorias = Categoria::all();

        return view('transacoes.edit', compact('transacao', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transacao = Transacao::findOrFail($id);

        // Validação dos dados
        $request->validate([
            'valor' => 'required|numeric',
            'tipo' => 'required|in:receita,despesa',
            'categoria_id' => 'required|exists:categorias,id',
            'data' => 'required|date',
        ]);

        // Ajusta o valor conforme o tipo (despesa negativa, receita positiva)
        $valor = $request->tipo === 'despesa' ? -abs($request->valor) : abs($request->valor);

        $transacao->update([
            'valor' => $valor,
            'tipo' => $request->tipo,
            'categoria_id' => $request->categoria_id,
            'data' => $request->data,
        ]);

        return redirect()->route('transacoes.index')->with('success', 'Transação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transacao = Transacao::findOrFail($id);
        $transacao->delete();

        return redirect()->route('transacoes.index')->with('success', 'Transação excluída com sucesso!');
    }
}
