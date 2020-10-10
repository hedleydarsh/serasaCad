@extends('adminlte::page')

@section('title', 'Cadastro Serasa')

@section('content_header')
    <h1>Edição de Clientes</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('admin.clientes.index') }}" class="btn btn-primary">
                            <i class="fas fa-undo"></i>
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.clientes.update', $cliente->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="nome">
                                @error('nome') <i class="far fa-times-circle"></i> @enderror
                                Nome
                            </label>
                            <input type="text" class="form-control @error('nome')is-invalid @enderror" id="nome" name="nome"
                                placeholder="Digite o nome do cliente" value="{{ $cliente->nome }}">
                            @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="cpf">
                                @error('cpf')
                                <i class="far fa-times-circle"></i>
                                @enderror
                                CPF
                            </label>
                            <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf"
                                placeholder="Digite o nome do cliente" value="{{ $cliente->cpf }}">
                            @error('cpf')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="email">
                                @error('email')
                                <i class="far fa-times-circle"></i>
                                @enderror
                                Email
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Digite o email do cliente" value="{{ $cliente->email }}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="endereco">
                                @error('endereco')
                                <i class="far fa-times-circle"></i>
                                @enderror
                                Endereço
                            </label>
                            <textarea class="form-control @error('endereco') is-invalid @enderror" id="endereco"
                                name="endereco" placeholder="Digite o endereço">{{ $cliente->endereco }}</textarea>
                            @error('endereco')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="descricao">
                                @error('descricao') <i class="far fa-times-circle"></i> @enderror
                                Descrição
                            </label>
                            <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao"
                                name="descricao" placeholder="Digite algo sobre o cliente">{{ $cliente->descricao }}</textarea>
                            @error('descricao')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="telefone">
                                @error('telefone')
                                <i class="far fa-times-circle"></i>
                                @enderror
                                telefone
                            </label>
                            <input type="tel" class="form-control @error('telefone') is-invalid @enderror" id="telefone"
                                name="telefone"
                                placeholder="Digite o telefone do cliente" value="{{ $cliente->telefone }}">
                            @error('telefone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Salvar</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"
        integrity="sha512-yVcJYuVlmaPrv3FRfBYGbXaurHsB2cGmyHr4Rf1cxAS+IOe/tCqxWY/EoBKLoDknY4oI1BNJ1lSU2dxxGo9WDw=="
        crossorigin="anonymous">
    </script>
    
    <script>
        $('#inadimplente').click(function() {
            $("#cadInadimplente").toggle(this.checked);
        });

        $(document).ready(function($){
            $('#telefone').mask("(99) 99999 - 9999", {placeholder:"(99) 99999 - 9999"});
            $('#cpf').mask("999.999.999-99", {placeholder:"999.999.999-99"});
        });

    </script>
@stop
