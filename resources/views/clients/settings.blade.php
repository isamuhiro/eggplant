@extends('layouts.app')
@section('title','Configurações')
@section('description','Configurações de perfil')
@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="/"><i class="fa fa-shopping-basket"></i>Dashboard</a></li>
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
    <form action="/clientes/update_profile/{{$client->id}}" method="post" enctype="multipart/form-data">
		<div class="box box-success">
			<div class="box-header with-border">            
                <h3 class="box-title">{{$client->user->name}}</h3>
            </div>
            <div class="box-body ">
            <!-- content here... -->
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
                <div class="form-group">
                    <label for="Nome">Nome do usuário: </label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$client->user->name}}">
                </div>
                <div class="form-group">
                    <label for="Nome">Email: </label>
                    <input type="text" class="form-control" id="name" name="email" value="{{$client->user->email}}">
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