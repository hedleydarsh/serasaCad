@extends('adminlte::page')

@section('title', 'Cadastro Serasa')

@section('content_header')
    <h1>Cadastro de Lojas</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h3 class="card-title">
                            Lojas
                        </h3>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a href="{{ route('admin.lojas.create') }}" class="btn btn-success float-right" >
                            <i class="fas fa-plus"></i>
                            Novo
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="Mytable" class="table table-striped dataTable collapsed">
                    <thead>
                        <tr role="row">
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Telefone</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($loja)
                            @foreach ($loja as $l)
                                <tr role="row">
                                    <td>{{ $l->id }}</td>
                                    <td>{{ $l->nome }}</td>
                                    <td>{{ $l->descricao }}</td>
                                    <td>{{ $l->telefone }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.lojas.edit', $l->id) }}" class="btn btn-warning">Editar</a>
                                            <form action="{{ route('admin.lojas.destroy', $l->id) }}" method="post" class="ml-1">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Deletar</button>
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
                            <th>Descrição</th>
                            <th>AÇÕES</th>
                        </tr>
                    </tfoot>
                </table>
                {{ $loja->links() }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="cadastro-loja" tabindex="-1" role="dialog" aria-labelledby="Cadastro de Loja"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastro de loja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.lojas.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label" for="nome">
                                @error('nome') <i class="far fa-times-circle"></i> @enderror
                                Nome
                            </label>
                            <input type="text" class="form-control @error('nome')is-invalid @enderror" id="nome" name="nome"
                                placeholder="Digite o nome da loja">
                            @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="descricao">
                                @error('descricao')
                                <i class="far fa-times-circle"></i>
                                @enderror
                                Descrição
                            </label>
                            <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao"
                                name="descricao" placeholder="Digite algo sobre a loja"></textarea>
                            @error('endereco')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="telefone">
                                @error('telefone') <i class="far fa-times-circle"></i> @enderror
                                Telefone
                            </label>
                            <input type="tel" class="form-control @error('telefone')is-invalid @enderror" id="telefone"
                                name="telefone" placeholder="Digite o telefone da loja">
                            @error('telefone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="slug">
                                @error('slug') <i class="far fa-times-circle"></i> @enderror
                                slug
                            </label>
                            <input type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" name="slug"
                                placeholder="Digite o slug da loja">
                            @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Salvar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function($) {
            $('#telefone').mask("(99) 99999 - 9999", {
                placeholder: "(99) 99999 - 9999"
            });
            $('#cpf').mask("999.999.999-99", {
                placeholder: "999.999.999-99"
            });
        });

        $('#cadastro-loja').on('shown.bs.modal', function() {});
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
