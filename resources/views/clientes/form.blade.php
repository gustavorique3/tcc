@extends('layouts.app', ['bodyclass' => 'bg-dark'])

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div style="padding-left: 2%; padding-top: 4%; padding-right: 2%;">
            <div class="card  ">
            <div class="card-header">Cadastrar Cliente</div>
            <div class="card-body">
                <form method="post" action="{{route('clientes.store')}}" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id" name="id" value="{{ $cliente->id }}" />
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="nome">Nome</label>
                                <input class="form-control" name="nome" id="nome" type="text" aria-describedby="Cliente" placeholder="Nome da cliente" value="{{ $cliente->nome }}">
                            </div>
                            <div class="col-md-6">
                                <label for="sobrenome">Sobrenome</label>
                                <input class="form-control" name="sobrenome" id="sobrenome" type="text" aria-describedby="Cliente" placeholder="Nome da cliente" value="{{ $cliente->sobrenome }}">
                            </div>
                            <div class="col-md-6">
                                <label for="cpf">CPF</label>
                                <input class="form-control" name="cpf" id="cpf" type="text" aria-describedby="Cliente" placeholder="CPF" value="{{ $cliente->cpf }}">
                            </div>
                            <div class="col-md-6">
                                <label for="cnpj">CNPJ</label>
                                <input class="form-control" name="cnpj" id="cnpj" type="text" aria-describedby="Cliente" placeholder="CNPJ" value="{{ $cliente->cnpj }}">
                            </div>
                            <div class="col-md-12">
                                <label for="razao">Razão Social</label>
                                <input class="form-control" name="razao" id="razao" type="text" aria-describedby="Cliente" placeholder="Razão Social" value="{{ $cliente->razao }}">
                            </div>
                            <div class="col-md-3">
                                <label for="cep">CEP</label>
                                <input class="form-control" name="cep" id="cep" type="text" aria-describedby="Cliente" placeholder="CEP" value="{{ $cliente->cep }}">
                            </div>
                            <div class="col-md-3">
                                <label for="numero">Número</label>
                                <input class="form-control" name="numero" id="numero" type="text" aria-describedby="Cliente" placeholder="Número" value="{{ $cliente->numero }}">
                            </div>
                            <div class="col-md-6">
                                <label for="bairro">Bairro</label>
                                <input class="form-control" name="bairro" id="bairro" type="text" aria-describedby="Cliente" placeholder="Bairro" value="{{ $cliente->bairro }}">
                            </div>
                            <div class="col-md-12">
                                <label for="cidade">Cidade</label>
                                <input class="form-control" name="cidade" id="cidade" type="text" aria-describedby="Cliente" placeholder="Cidade" value="{{ $cliente->cidade }}">
                            </div>
                            <div class="col-md-12">
                                <label for="estado">Estado</label>
                                <input class="form-control" name="estado" id="estado" type="text" aria-describedby="Cliente" placeholder="Estado" value="{{ $cliente->estado }}">
                            </div>
                            <div class="col-md-6">
                                <label for="telefone">Telefone</label>
                                <input class="form-control" name="telefone" id="telefone" type="text" aria-describedby="Cliente" placeholder="Número do Telefone" value="{{ $cliente->telefone }}">
                            </div>
                            <div class="col-md-6">
                                <label for="email">E-mail</label>
                                <input class="form-control" name="email" id="email" type="text" aria-describedby="Cliente" placeholder="E-mail" value="{{ $cliente->email }}">
                            </div>
                            <div class="col-md-12">
                                <label for="status">Status</label>
                                <input class="form-control" name="status" id="status" type="text" aria-describedby="Cliente" placeholder="Status" value="{{ $cliente->status }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-warning btn-flat m-b-15 m-l-15" href="{{ route('clientes.index') }}">Voltar</a>  
                            <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                            @if ($cliente->id > 0 )
                            <a class="btn btn-danger btn-flat m-b-15 m-l-15" style="color:white"  data-toggle="modal" data-target="#meuModal">Excluir</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

          <!-- MODAL EXCLUSÃO -->
          <div class="modal" tabindex="-1" role="dialog" id="meuModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                  <div class="row">
                      <div class="col-lg-12">
                          <div class="card">
                            <div class="col-lg-12">
                              Deseja realmente excluir o Cliente <span id="categoriaDescricao"> </span> {{$cliente->descricao}} ?
                            </div>
                            <form class="col-lg-12" method="post" action="{{ route('clientes.destroy',['$cliente' => $cliente->id])}}">
                                {{ csrf_field() }}
                                 <input type="hidden" name="_method" value="DELETE">
                                 <input type="hidden" name="id" id="id" value="{{$cliente->id}}">
                                 <div class="col-lg-12">
                                     <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Sim</button>
                                       <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('clientes.index') }}">Cancelar</a>
                                  </div>
                            </form>

                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
@endsection
