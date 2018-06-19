@extends('layouts.app')
@section('title',$store->company_name)
@section('description','Loja')
@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-shopping-basket"></i>Empresas / Lojas</a></li>
</ol>
@endsection      
@section('content')
<div class="row">
    <div class="col-md-9">
        @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
            Dados atualizados com sucesso!
        </div>
        @endif
        <form action="/store/{{$store->id}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT"> 
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
                    <h3 class="box-title">{{$store->company_name}}</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Nome">Nome da loja: </label>
                                <input type="text" class="form-control" id="name" name="company_name" value="{{$store->company_name}}">
                            </div>
                            <div class="form-group">
                                <label for="Nome">Endereço: </label>
                                <input type="text" class="form-control" id="name" name="address" value="{{$store->address}}">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="Nome">Estado: </label>
                                        <input type="text" class="form-control" id="name" name="state" value="{{$store->state}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Nome">Cidade: </label>
                                        <input type="text" class="form-control" id="name" name="city" value="{{$store->city}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Nome">Bairro: </label>
                                        <input type="text" class="form-control" id="name" name="neighborhood" value="{{$store->neighborhood}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="Nome">Telefone 1: </label>
                                        <input type="text" class="form-control" id="name" name="phone_1" value="{{$store->phone_1}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Nome">Telefone 2: </label>
                                        <input type="text" class="form-control" id="name" name="phone_2" value="{{$store->phone_2}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="Nome">Cep: </label>
                                        <input type="text" class="form-control" id="name" name="cep" value="{{$store->cep}}">
                                    </div>      
                                    <div class="col-md-6">
                                        <label for="Nome">Email: </label>
                                        <input type="text" class="form-control" id="name" name="email" value="{{$store->email}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection