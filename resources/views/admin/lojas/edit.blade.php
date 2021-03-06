@extends('adminlte::page')

@section('title', 'Cadastro Serasa')

@section('content_header')
    <h1>Edição de Loja</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h3 class="card-title">
                            Edição de Lojas
                        </h3>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a href="{{ route('admin.lojas.index') }}" class="btn btn-primary float-right">
                            <i class="fas fa-undo"></i>
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.lojas.update', 1) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="col-form-label" for="nome">
                            @error('nome') <i class="far fa-times-circle"></i> @enderror
                            Nome
                        </label>
                        <input type="text" class="form-control @error('nome')is-invalid @enderror" id="nome" name="nome"
                            value="{{ $loja->nome }}" />
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
                            name="descricao">{{ $loja->descricao }}</textarea>
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
                            name="telefone" value="{{ $loja->telefone }}">
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
                            value="{{ $loja->slug }}">
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-lg btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $('#cadastro-loja').on('shown.bs.modal', function() {})

    </script>
@stop
