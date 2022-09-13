@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('demo') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Categorias</li>
        </ol>
        <a class="btn btn-primary btn-success btn-lg btn-flat btn-addon m-b-10 m-l-5" href="{{ route('categorias.create') }}">
                                          <i class="ti-plus"></i>+ Adicionar Categoria
                                        </a>
        <!-- Example DataTables Card-->
        <div class="card mb-3 my-3">
            <div class="card-header">
                <h4><i class="fa fa-table"></i> Listagem de Categorias</h4>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- <h4>Listagem de Categorias </h4> -->
                        @if(count($categorias))
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorias as $categoria)
                                <tr class="with-options">
                                    <td>{{$categoria->id}}</td>
                                    <td>{{$categoria->descricao}}</td>
                                    <td >

                                        <a  class="btn btn-info btn-flat btn-addon m-b-10 m-l-5"  href="{{ route('categorias.edit', ['$categoria' => $categoria->id]) }}"><i class="ti-settings"></i>Ver</a>
                                        <!--<a  class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5"  data-toggle="modal" data-target="#meuModal" ><i class="ti-settings"></i>Excluir</a>-->
                                        <!-- <a  class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5" onclick="deletar({{$categoria->id}},'{{$categoria->descricao}}')"><i class="ti-settings"></i>Excluir</a>
                                        -->

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p class="alert-disable">Não há categorias.</p>
                        @endif
                    </div>
                </div>
            <div class="card-footer small text-muted"></div>
        </div>
    </div>
</div>
<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
