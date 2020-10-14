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
                <form action="{{ route('admin.clientes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="name">
                                @error('name') <i class="far fa-times-circle"></i> @enderror
                                Nome
                            </label>
                            <input type="text" class="form-control @error('nome')is-invalid @enderror" id="nome" name="nome"
                                placeholder="Digite o nome do cliente" value="{{ old('nome') }}">
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
                                placeholder="Digite o nome do cliente" value="{{ old('cpf') }}">
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
                                name="email" placeholder="Digite o email do cliente" value="{{ old('email') }}">
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
                                name="endereco" placeholder="Digite o endereço">{{ old('endereco') }}</textarea>
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
                                name="descricao" placeholder="Digite algo sobre o cliente">{{ old('descricao') }}</textarea>
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
                                name="telefone" placeholder="Digite o telefone do cliente" value="{{ old('telefone') }}">
                            @error('telefone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="checkbox" name="inadimplente" value="1" id="inadimplente" />
                            <label> <b>Inadimplente?</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div id="cadInadimplente" class="col-md-12" style="display:none">
                            <hr style="color: #000">
                            <h3>Cadastro de inadimplência</h3>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="loja_id" class="col-form-label">Loja</label>
                                    <select name="loja_id" class="form-control" id="loja_id">
                                        @isset($lojas)
                                            @foreach ($lojas as $l)
                                                <option value="{{ $l->id }}">{{ $l->nome }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mum_doc" class="col-form-label">Número do documento</label>
                                    <input type="text" name="num_doc" id="num_doc" class="form-control"
                                        value="{{ old('num_doc') }}" placeholder="Digite o número do documento" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cod_venda" class="col-form-label">Código da venda</label>
                                    <input type="text" name="cod_venda" id="cod_venda" class="form-control"
                                        value="{{ old('cod_venda') }}" placeholder="Digite o código da venda" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dt_compra" class="col-form-label">Data da compra</label>
                                    <input type="date" name="dt_compra" id="dt_compra" class="form-control"
                                        value="{{ old('dt_compra') }}" placeholder="Digite a data da compra" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dt_vencimento" class="col-form-label">dt_vencimento</label>
                                    <input type="date" name="dt_vencimento" id="dt_vencimento" class="form-control"
                                        value="{{ old('dt_vencimento') }}" placeholder="Digite o dt_vencimento" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="valor" class="col-form-label">Valor</label>
                                    <input type="number" name="valor" id="valor" class="form-control"
                                        value="{{ old('valor') }}" placeholder="Digite o valor" />
                                </div>
                                <div class="form-group">
                                    <label for="anexo">Anexos</label>
                                    <input type="file" name="anexo[]"
                                        class="form-control @error('anexo.*') is-invalid @enderror" multiple />
                                    @error('anexo.*') <div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
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

        $(document).ready(function($) {
            $('#telefone').mask("(99) 99999 - 9999", {
                placeholder: "(99) 99999 - 9999"
            });
            $('#cpf').mask("999.999.999-99", {
                placeholder: "999.999.999-99"
            });
        });

    </script>
@stop
