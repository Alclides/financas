@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4">
            <i class="fas fa-exchange-alt"></i> Lista de Transações
        </h2>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('transacoes.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus-circle"></i> Adicionar Transação
            </a>
            <a href="{{ route('categorias.index') }}" class="btn btn-info btn-lg">
                <i class="fas fa-tags"></i> Ver Categorias
            </a>
        </div>

        <div class="table-responsive">
            <table id="transacoesTable" class="table table-striped table-hover table-bordered shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Valor (R$)</th>
                        <th>Tipo</th>
                        <th>Categoria</th>
                        <th>Data</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transacoes as $transacao)
                        <tr>
                            <td class="text-center font-weight-bold">{{ $transacao->id }}</td>
                            <td>{{ number_format($transacao->valor, 2, ',', '.') }}</td>
                            <td>{{ ucfirst($transacao->tipo) }}</td>
                            <td class="text-capitalize">{{ $transacao->categoria->nome }}</td>
                            <td>{{ \Carbon\Carbon::parse($transacao->data)->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('transacoes.edit', $transacao->id) }}" class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="tooltip" title="Editar transação">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('transacoes.destroy', $transacao->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta transação?')" data-bs-toggle="tooltip" title="Excluir transação">
                                        <i class="fas fa-trash-alt"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#transacoesTable').DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/Portuguese-Brasil.json"
                },
                order: [[0, 'desc']], 
                responsive: true,
                pageLength: 10,
                lengthChange: true,
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'excel', className: 'btn btn-success btn-sm mx-2', text: '<i class="fas fa-file-excel"></i> Exportar Excel' },
                    { extend: 'pdf', className: 'btn btn-danger btn-sm', text: '<i class="fas fa-file-pdf"></i> Exportar PDF' }
                ]
            });
        });
    </script>

    <style>
        body {
            background-color: #f4f6f9;
        }

        h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1.5rem;
        }

        .btn-primary, .btn-info {
            font-size: 1.2rem;
            padding: 0.5rem 1.5rem;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .btn-primary:hover, .btn-info:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }

        .table-hover tbody tr:hover {
            background-color: #f1f3f5;
        }

        .table thead {
            background-color: #333;
            color: #fff;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6 !important;
        }

        .btn-outline-warning, .btn-outline-danger {
            transition: all 0.3s ease;
        }

        .btn-outline-warning:hover, .btn-outline-danger:hover {
            color: #fff;
        }

        .btn-outline-warning:hover {
            background-color: #f0ad4e;
            border-color: #f0ad4e;
        }

        .btn-outline-danger:hover {
            background-color: #d9534f;
            border-color: #d9534f;
        }

        .dt-buttons .btn {
            margin-right: 5px;
            font-weight: 500;
        }
    </style>
@endsection
