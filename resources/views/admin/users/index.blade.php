@extends('adminlte::page')

@section('title', 'Cadastro Serasa')

@section('content_header')
    <h1>Cadastro de usuários</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h3 class="card-title">
                            Usuários
                        </h3>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a href="{{ route('admin.usuarios.create') }}" class="btn btn-success float-right">
                            <i class="fas fa-plus"></i>
                            Novo
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable" style="width: 100%" class="table table-striped dataTable collapsed">
                    <thead>
                        <tr role="row">
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Staus</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($user)
                            @foreach ($user as $u)
                                <tr role="row" class="odd">
                                    <td>{{ $u->id }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->status }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.usuarios.edit', $u->id) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.usuarios.destroy', $u->id) }}" method="post"
                                                class="ml-1 mr-1">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Staus</th>
                            <th>AÇÕES</th>
                        </tr>
                    </tfoot>
                </table>
                {{ $user->links() }}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
           $(document).ready(function() {
            $('.dataTable').DataTable({
                responsive: true,
                "autoWidth": true,
                "language": {
                    "sEmptyTable": "Não foi encontrado nenhum registo",
                    "sLoadingRecords": "A carregar...",
                    "sProcessing": "A processar...",
                    "sLengthMenu": "Exibir _MENU_ registos",
                    "sZeroRecords": "Não foram encontrados resultados",
                    "sInfo": "Exibindo de _START_ até _END_ de _TOTAL_ registos",
                    "sInfoEmpty": "Exibindo de 0 até 0 de 0 registos",
                    "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
                    "sInfoPostFix": "",
                    "sSearch": "Procurar:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",
                        "sLast": "Último"
                    },
                    "oAria": {

                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });
        });
</script>
@stop
