<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todas as categorias para a view de listagem
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Exibe o formulário para criar uma nova categoria
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome',
        ]);

        // Cria a categoria
        Categoria::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Encontra a categoria e redireciona para o formulário de edição
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome,' . $id,
        ]);

        // Atualiza a categoria com o novo nome
        $categoria->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        // Verifica se existem transações associadas a esta categoria
        if ($categoria->transacoes()->exists()) {
            return redirect()->route('categorias.index')->with('error', 'Não é possível excluir, existem transações associadas a esta categoria.');
        }

        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
