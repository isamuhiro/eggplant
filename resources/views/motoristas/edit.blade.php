@extends('layouts.app') 
@section('title','Motoristas') 
@section('description','Controle de driverses') 
@section('breadcrumb')
<ul class="breadcrumb">
  <li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
  <li><a href="/motoristas"><i class="fa fa-chevron-circle-right  "></i>Motoristas</a></li>
  <li><i class="fa fa-chevron-circle-down"></i>Editar Motoristas</li>
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
    <form action="/motoristas/{{$drivers->id}}" method="post" enctype="multipart/form-data">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">{{$drivers->name}}</h3>
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
            <label for="Nome">Nome do usuário: </label>
            <input type="text" class="form-control" id="name" name="name" value="{{$drivers->name}}">
          </div>
          <div class="form-group">
            <label for="Nome">CPF: </label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{$drivers->cpf}}">
          </div>
          <div class="form-group">
            <label for="senha">Senha: </label>
            <input type="password" class="form-control" id="senha" name="password" value="{{$drivers->cpf}}">
          </div>
          <div class="form-group">
            <label for="Nome">E-mail: </label>
            <input type="text" class="form-control" id="email" name="email" value="{{$drivers->email}}">
          </div>

        </div>
        <div class="box-footer">
          <button class="btn btn-primary btn-block">Salvar</button>
        </div>
      </div>
    </form>
  </div>

</div>
@endsection