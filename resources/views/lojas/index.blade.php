@extends('layouts.app')
@section('title','Lojas')
@section('description','Todas as lojas')
@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-shopping-basket"></i>Todas as lojas</a></li>
</ol>
@endsection      
@section('content')
<div class="row">
    <div class="col-md-6">
        @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
            Dados atualizados com sucesso!
        </div>
        @endif
        <form action="/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="country" value="Brazil">
            @if(count( $errors ) > 0 )
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alguns erros foram detectados :(</h4>
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastrar loja</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="Nome">Nome da loja: </label>
                                        <input type="text" class="form-control" id="name" name="company_name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Nome">Cliente/Administrador relacionado: </label>
                                        <select name="clients_id" class="form-control">
                                            @foreach ($clients as $client)
                                                <option value="{{$client->id}}">{{$client->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Nome">Endereço: </label>
                                <input type="text" class="form-control" id="name" name="address">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="Nome">Estado: </label>
                                        {{-- <input type="text" class="form-control" id="name" name="state"> --}}
                                        <select name="state" class="form-control">
                                            @foreach ($estados as $estado)
                                                <option value="{{$estado->Sigla}}">{{$estado->Nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Nome">Cidade: </label>
                                        <input type="text" class="form-control" id="name" name="city">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Nome">Bairro: </label>
                                        <input type="text" class="form-control" id="name" name="neighborhood">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="Nome">Telefone 1: </label>
                                        <input type="text" class="form-control" id="name" name="phone_1">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Nome">Telefone 2: </label>
                                        <input type="text" class="form-control" id="name" name="phone_2">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="Nome">Cep: </label>
                                        <input type="text" class="form-control" id="name" name="cep">
                                    </div>      
                                    <div class="col-md-6">
                                        <label for="Nome">Email: </label>
                                        <input type="text" class="form-control" id="name" name="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Todas as empresas</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cliente/adminstrador</th>
                        <th>Gerente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $stores as $store )
                    <tr>
                        <td>
                            <a href="/store/{{$store->id}}">{{$store->company_name}}</a>
                        </td>
                        <td><a href="/clientes/{{$store->client->id}}/edit">{{$store->client->name}}</a></td>
                        <td>{{$store->manager ? $store->manager->name : "Sem gerente"}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
@section('script')
<script>
  $('#table').DataTable({
    language: {
        search: "Filtro:",
        paginate: {
            first:      "Primeiro",
            previous:   "Anterior",
            next:       "Próximo",
            last:       "Último"
        },
        info: "Mostrando página _PAGE_ de _PAGES_",
        lengthMenu: "Mostrando _MENU_ registros por página",
    }
});
</script>
@endsection
@endsection