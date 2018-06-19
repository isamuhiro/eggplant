@extends('layouts.app') 
@section('title','Motoristas') 
@section('description','Controle de motoristas') 
@section('breadcrumb')
<ul class="breadcrumb">
  <li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
  <li><i class="fa fa-car"></i> Motoristas</li>
</ul>
@endsection

@section('content')
<div class="row">
  <div class="col-md-6">
    <form action="/motoristas" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Cadastro de motoristas</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              {{ csrf_field() }} @if(count( $errors ) > 0 )
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alguns erros foram detectados :(</h4>
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
              </div>
              @endif
              <div class="form-group">
                <label for="name">Nome: </label>
                <input type="text" class="form-control" id="name" placeholder="Digite o nome" name="name" value="{{ old('name') }}">
              </div>
              <div class="form-group">
                <label for="email">E-mail: </label>
                <input type="email" class="form-control" id="name" placeholder="Informe o email" name="email" value="{{old('email')}}" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="senha">Senha: </label>
                <input type="password" class="form-control" id="senha" placeholder="Informe a senha do motorista" name="senha" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="cpf">CPF: </label>
                <div class="input-group">
                  <input type="text" class="form-control" id="cpf" placeholder="Informe o cpf do motorista" name="cpf" value="{{old('cpf')}}">
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
        <h3 class="box-title">Lista de motoristas</h3>
      </div>
      <div class="box-body no-padding">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th style="width:10px;">cpf</th>
              <th></th>
            </tr>
            @if(isset($drivers)) @foreach($drivers as $driver)
            <tr class="text-sm">
              <td><a href="/motoristas/{{($driver->id)}}" class="link-black">{{ucfirst($driver->name)}}</a></td>
              <td>{{$driver->email}}</td>
              <td>{{$driver->cpf}}</td>
              <td>
                <form action="{{url('/motoristas', [$driver->id])}}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este item?');">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="submit" class="btn btn-danger" value="Delete" />
                </form>
              </td>
              <!-- <td>{{--$driver->amount--}}</td> -->
            </tr>
            @endforeach @endif
          </tbody>
        </table>
      </div>
      <div class="box-footer">
        {{ $drivers->links('layouts.pagination') }}
      </div>
    </div>
  </div>
</div>

@section('script')
<script>
  var cpf = document.getElementById("cpf");
  var im = new Inputmask("999.999.999-99");
  im.mask(cpf);

</script>
@endsection

@endsection