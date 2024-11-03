@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">
            <i class="fas fa-th-list"></i> Categorias
        </h1>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus-circle"></i> Criar Categoria
            </a>
            <a href="{{ route('transacoes.index') }}" class="btn btn-info btn-lg">
                <i class="fas fa-exchange-alt"></i> Ver Transações
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered shadow-sm" id="categories-table">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nome</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td class="text-center font-weight-bold">{{ $categoria->id }}</td>
                            <td class="text-capitalize">{{ $categoria->nome }}</td>
                            <td class="text-center">
                                <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="tooltip" title="Editar categoria">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')" data-bs-toggle="tooltip" title="Excluir categoria">
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
            $('#categories-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Portuguese.json"
                },
                "pagingType": "full_numbers",
                "order": [[ 0, "asc" ]],
                "columnDefs": [
                    { "targets": 0, "width": "10%" },
                    { "targets": 2, "orderable": false, "width": "20%" }
                ],
                "initComplete": function() {
                    $('#categories-table').removeClass('no-footer').addClass('table-bordered');
                }
            });
        });
    </script>

    <style>
        body {
            background-color: #f4f6f9;
        }

        h1 {
            font-size: 2.5rem;
            color: #333;
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
    </style>
@endsection
