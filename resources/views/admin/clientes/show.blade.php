@extends('adminlte::page')

@section('title', 'Cadastro Serasa')

@section('content_header')
    <h1>Clientes Cadastrado</h1>
@stop

@section('content')

    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h3 class="card-title">Cliente cadastrado</h3>
                </div>
                <div class="col-md-6 col-sm-12">
                    <a href="" onClick="window.print();return false" class="btn btn-success ml-2 float-right">
                        <i class="fas fa-print"></i>
                    </a>
                    <a href="{{ route('admin.clientes.index') }}" class="btn btn-info float-right">
                        <i class="fas fa-undo"></i>
                        Voltar
                    </a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @isset($cliente)
                <div class="mb-3">
                    <h4 class="mb-3">Informações pessoais</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nome</label>
                                <div class="">{{ $cliente->nome }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Cpf</label>
                                <div class="">{{ $cliente->cpf }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Email</label>
                                <div class="">{{ $cliente->email }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Telefone</label>
                                <div class="">{{ $cliente->telefone }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Endereço</label>
                                <div class="">{{ $cliente->endereco }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Descrição</label>
                                <div class="">{{ $cliente->descricao }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a class="btn btn-warning" href="{{ route('admin.clientes.edit', $cliente->id) }}">
                            <i class="fas fa-edit"> Editar</i>
                        </a>
                    </div>
                    <hr>
                </div>

                @if (count($cliente->inadimplencias))
                    <div class="mb-3">
                        <h4 class="mb-3">Informações da inadimplência</h4>
                        @foreach ($cliente->inadimplencias as $i)
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Loja</label>
                                        <div class="">{{ $i->loja->nome }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Número do documento</label>
                                        <div class="">{{ $i->num_doc }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Código da venda</label>
                                        <div class="">{{ $i->cod_venda }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Data da compra</label>
                                        <div class="">{{ $i->dt_compra }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Data do Vencimento</label>
                                        <div class="">{{ $i->dt_vencimento }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label>Anexos</label>
                                    <div class="card-footer bg-white">
                                        <ul class="mailbox-attachments d-flex flex-wrap">
                                            @isset($i->anexo)
                                                @foreach ($i->anexo as $a)
                                                    <li>
                                                        <span class="mailbox-attachment-icon">
                                                            <i class="far fa-file"></i>
                                                        </span>

                                                        <div class="mailbox-attachment-info">
                                                            <a href="#" class="mailbox-attachment-name">
                                                                <i class="fas fa-paperclip"></i>
                                                                {{ $a->anexo }}
                                                            </a>
                                                            <span class="mailbox-attachment-size clearfix mt-1">
                                                                <div class="btn-group">
                                                                    <form
                                                                        action="{{ route('admin.inadimplenciaAnexoDestroy', $a->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="btn btn-default">
                                                                            <i class="far fa-trash-alt"></i>
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                    <a href="{{ asset('storage/' . $a->anexo) }}" target="_blank"
                                                                        class="btn btn-default btn-sm float-right ml-4">
                                                                        <i class="fas fa-cloud-download-alt"></i></a>

                                                                </div>
                                                            </span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endisset
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-3">
                            <div class="btn-group">
                                <a class="btn btn-warning mr-2" href="{{ route('admin.inadimplencia.edit', $i->id) }}">
                                    <i class="fas fa-edit"> Editar</i>
                                </a>

                                <form action="{{ route('admin.inadimplencia.destroy', $i->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash">Remover Inadimplencia</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @else
                        <a href="{{ route('admin.inadimplencia.show', $cliente->id) }}" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            Criar inadimplência
                        </a>
                    @endif
            @endisset
        </div>
        <!-- /.card-body -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
