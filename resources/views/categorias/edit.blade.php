@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">
        <i class="fas fa-edit"></i> Editar Categoria
    </h1>

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nome">Nome da Categoria</label>
            <input type="text" class="form-control" id="nome" name="nome" 
                   value="{{ old('nome', $categoria->nome) }}" required placeholder="Digite o novo nome da categoria">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success" data-bs-toggle="tooltip" title="Atualizar categoria">
                <i class="fas fa-sync-alt"></i> Atualizar
            </button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary" data-bs-toggle="tooltip" title="Cancelar">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
