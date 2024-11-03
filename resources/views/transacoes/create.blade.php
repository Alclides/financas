@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">
        <i class="fas {{ isset($transacao) ? 'fa-edit' : 'fa-plus-circle' }}"></i> 
        {{ isset($transacao) ? 'Editar' : 'Cadastrar' }} Transação
    </h2>

    <form action="{{ isset($transacao) ? route('transacoes.update', $transacao->id) : route('transacoes.store') }}" 
          method="POST" class="p-5 border rounded shadow bg-white">
        @csrf
        @if(isset($transacao))
            @method('PUT')
        @endif

        <!-- Campo Valor -->
        <div class="form-group mb-4">
            <label for="valor" class="form-label font-weight-bold">Valor (R$)</label>
            <input type="number" class="form-control form-control-lg" id="valor" name="valor" step="0.01" 
                   value="{{ old('valor', $transacao->valor ?? '') }}" required 
                   placeholder="Digite o valor da transação">
        </div>

        <!-- Campo Tipo -->
        <div class="form-group mb-4">
            <label for="tipo" class="form-label font-weight-bold">Tipo</label>
            <select class="form-control form-control-lg" id="tipo" name="tipo" required>
                <option value="" disabled {{ !isset($transacao) ? 'selected' : '' }}>Selecione o tipo</option>
                <option value="receita" {{ old('tipo', $transacao->tipo ?? '') == 'receita' ? 'selected' : '' }}>Receita</option>
                <option value="despesa" {{ old('tipo', $transacao->tipo ?? '') == 'despesa' ? 'selected' : '' }}>Despesa</option>
            </select>
        </div>

        <!-- Campo Categoria -->
        <div class="form-group mb-4">
            <label for="categoria_id" class="form-label font-weight-bold">Categoria</label>
            <select class="form-control form-control-lg" id="categoria_id" name="categoria_id" required>
                <option value="" disabled {{ !isset($transacao) ? 'selected' : '' }}>Selecione uma categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $transacao->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Campo Data -->
        <div class="form-group mb-4">
            <label for="data" class="form-label font-weight-bold">Data</label>
            <input type="date" class="form-control form-control-lg" id="data" name="data" 
                   value="{{ old('data', isset($transacao) ? $transacao->data->format('Y-m-d') : '') }}" required 
                   placeholder="Selecione a data da transação">
        </div>

        <!-- Botões de Ação -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('transacoes.index') }}" class="btn btn-outline-secondary btn-lg" data-bs-toggle="tooltip" title="Voltar à lista de transações">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <button type="submit" class="btn btn-success btn-lg" data-bs-toggle="tooltip" title="{{ isset($transacao) ? 'Salvar alterações' : 'Cadastrar nova transação' }}">
                <i class="fas {{ isset($transacao) ? 'fa-save' : 'fa-check-circle' }}"></i> {{ isset($transacao) ? 'Atualizar' : 'Salvar' }}
            </button>
        </div>
    </form>
</div>

<!-- Estilos para uma aparência mais moderna -->
<style>
    body {
        background-color: #f8f9fc;
    }

    h2 {
        font-size: 2.5rem;
        color: #333;
    }

    .form-label {
        color: #495057;
        font-size: 1.1rem;
    }

    .form-control-lg {
        padding: 1rem;
        font-size: 1.1rem;
        border-radius: 0.5rem;
        border: 1px solid #ced4da;
        box-shadow: inset 0px 1px 4px rgba(0, 0, 0, 0.1);
    }

    .form-control-lg:focus {
        border-color: #5cb85c;
        box-shadow: 0px 0px 5px rgba(92, 184, 92, 0.5);
    }

    .btn-outline-secondary {
        border-color: #6c757d;
        color: #6c757d;
        font-size: 1.2rem;
        transition: all 0.2s ease-in-out;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-success {
        font-size: 1.2rem;
        padding: 0.5rem 2rem;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-success:hover {
        background-color: #449d44;
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection
