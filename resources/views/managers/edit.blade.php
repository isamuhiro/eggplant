@extends('layouts.app') 
@section('title','Editar gerente') 
@section('description','Controle de Gerentes') 
@section('breadcrumb')
<ul class="breadcrumb">
  <li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
  <li><a href="/clientes"><i class="fa fa-users"></i>Clientes</a></li>
  <li><i class="fa fa-user"></i>Gerentes</li>
</ul>
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
    <form action="/gerentes/{{$managers->id}}" method="post" enctype="multipart/form-data">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">{{$managers->name}}</h3>
        </div>
        <div class="box-body ">
          <!-- content here... -->
          {{ csrf_field() }}
          <input name="_method" type="hidden" value="PUT"> @if(count( $errors ) > 0 )
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Alguns erros foram detectados :(</h4>
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
          </div>
          @endif
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="Nome">Nome do usuário: </label>
                <input type="text" class="form-control" id="name" name="name" value="{{$managers->name}}">
              </div>
              <div class="col-md-6">
                <label for="Nome">Lojas: </label>
                <select name="stores_id" class="form-control">
                  @foreach ($managers->client->stores as  $st)
                    @if(!$st->managers_id)
                      <option value="{{$st->id}}">{{$st->company_name}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="Nome">CPF: </label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{$managers->cpf}}">
          </div>
          <div class="form-group">
            <label for="Nome">E-mail: </label>
            <input type="text" class="form-control" id="email" name="email" value="{{$managers->email}}">
          </div>

        </div>
        <div class="box-footer">
          <button class="btn btn-primary btn-block">Salvar</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-6">
    @if(isset($store))
    <div class="box box-widget widget-user-2">
      <div class="widget-user-header bg-green">
          <a href="/store/{{$store['id']}}" style="color:#fff"><h3 class="widget-user-username">{{$store['company_name']}}</h3></a>
        <h5 class="widget-user-desc">Loja</h5>
      </div>
      <div class="box-footer no-padding">
        <ul class="nav nav-stacked">
          <li><a href="#"><b>Estado:</b> {{$store['state']}} </a></li>
          <li><a href="#"><b>Cidade:</b> {{$store['city']}} </a></li>
          <li><a href="#"><b>Cep:</b> {{$store['cep']}} </a></li>
          <li><a href="#"><b>Endereço:</b> {{$store['address']}} </a></li>
          <li><a href="#"><b>Telefone 1:</b> {{$store['phone_1']}} </a></li>
          <li><a href="#"><b>Telefone 2:</b>{{$store['phone_2']}} </a></li>
        </ul>
      </div>
    </div>
    @endif
  </div>

</div>
@endsection