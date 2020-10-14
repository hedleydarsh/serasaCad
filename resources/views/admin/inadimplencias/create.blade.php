@extends('adminlte::page')

@section('title', 'Cadastro Serasa')

@section('content_header')
    <h1>Cadastro de Inadimplência</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('admin.inadimplentes') }}" class="btn btn-primary">
                            <i class="fas fa-undo"></i>
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.inadimplencia.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="cliente_id" value="{{ $cliente }}">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="loja_id" class="col-form-label">Loja</label>
                            <select name="loja_id" class="form-control" id="loja_id">
                                @isset($lojas)
                                    @foreach ($lojas as $l)
                                        <option value="{{ $l->id }}">{{ $l->nome }} </option>
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
                        <div class="form-group col-md-6">
                            <label for="anexo">Anexos</label>
                            <input type="file" name="anexo[]" class="form-control @error('anexo.*') is-invalid @enderror"
                                multiple />
                            @error('anexo.*') <div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
