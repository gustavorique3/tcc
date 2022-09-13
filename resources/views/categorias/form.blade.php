@extends('layouts.app', ['bodyclass' => 'bg-dark'])

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div style="padding-left: 2%; padding-top: 4%; padding-right: 2%;">
            <div class="card  ">
            <div class="card-header">Cadastrar Categoria</div>
            <div class="card-body">
                <form method="post" action="{{route('categorias.store')}}" >
                @csrf
                    <input type="hidden" id="id" name="id" value="{{ $categoria->id }}" />
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="descricao">Nome</label>
                                <input class="form-control" name="descricao" id="descricao" type="text" aria-describedby="Categoria" placeholder="Nome da categoria" value="{{ $categoria->descricao }}">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-warning btn-flat m-b-15 m-l-15" href="{{ route('categorias.index') }}">Voltar</a>  
                            <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Salvar</button>
                            @if ($categoria->id > 0 )
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
                              Deseja realmente excluir a Categoria <span id="categoriaDescricao"> </span> {{$categoria->descricao}} ?
                            </div>
                            <form class="col-lg-12" method="post" action="{{ route('categorias.destroy',['$categoria' => $categoria->id])}}">
                                {{ csrf_field() }}
                                 <input type="hidden" name="_method" value="DELETE">
                                 <input type="hidden" name="id" id="id" value="{{$categoria->id}}">
                                 <div class="col-lg-12">
                                     <button type="submit" class="btn btn-success btn-flat m-b-15 m-l-15">Sim</button>
                                       <a class="btn btn-danger btn-flat m-b-15 m-l-15" href="{{ route('categorias.index') }}">Cancelar</a>
                                  </div>
                            </form>

                          </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
@endsection
