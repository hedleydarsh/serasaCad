@extends('adminlte::page')

@section('title', 'Cadastro Serasa')

@section('content_header')
    <h1>Cadastro de Clientes</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h3 class="card-title">
                            Clientes
                        </h3>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a href="{{ route('admin.clientes.create') }}" class="btn btn-success float-right">
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
                            <th>CPF</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr role="row" class="odd">
                            <td>1</td>
                            <td>Hedley Lima</td>
                            <td>092.940.876-25</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-warning">Editar</a>
                                    <a href="#" class="btn btn-danger ml-1">Excluir</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>AÇÕES</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $('#cadastro-cliente').on('shown.bs.modal', function() {})
    </script>
@stop
