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
                    <div class="col-sm-12">
                        <a href="{{ route('admin.clientes.index') }}" class="btn btn-primary">
                            <i class="fas fa-undo"></i>
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="name">
                                @error('name') <i class="far fa-times-circle"></i> @enderror
                                Nome
                            </label>
                            <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name"
                                placeholder="Digite o nome do cliente">
                            @error('name')
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
                                placeholder="Digite o nome do cliente">
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
                                name="email" placeholder="Digite o email do cliente">
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
                                name="endereco" placeholder="Digite o endereço"></textarea>
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
                                name="descricao" placeholder="Digite algo sobre o cliente"></textarea>
                            @error('descricao')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="checkbox" id="inadimplente" />
                            <label> <b>Inadimplente?</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div id="cadInadimplente"  class="col-md-12" style="display:none">
                            <hr style="color: #000">
                            <h3>Cadastro de inadimplência</h3>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="loja" class="col-form-label">Loja</label>
                                    <select name="loja" class="form-control" id="loja">
                                        <option value="1">Pamacol</option>
                                        <option value="2">Pamacol</option>
                                        <option value="3">Pamacol</option>
                                        <option value="4">Pamacol</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mum_doc" class="col-form-label">Número do documento</label>
                                    <input type="text" name="num_doc" id="num_doc" class="form-control" placeholder="Digite o número do documento"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cod_venda" class="col-form-label">Código da venda</label>
                                    <input type="text" name="cod_venda" id="cod_venda" class="form-control" placeholder="Digite o código da venda"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dt_compra" class="col-form-label">Data da compra</label>
                                    <input type="date" name="dt_compra" id="dt_compra" class="form-control" placeholder="Digite a data da compra"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="vencimento" class="col-form-label">Vencimento</label>
                                    <input type="date" name="vencimento" id="vencimento" class="form-control" placeholder="Digite o vencimento"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-success">Salvar</button>
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
        $('#inadimplente').click(function() {
            $("#cadInadimplente").toggle(this.checked);
        });

    </script>
@stop
