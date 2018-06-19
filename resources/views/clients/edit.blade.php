@extends('layouts.app')
@section('title','Cliente')
@section('description','Controle de clientes')
@section('breadcrumb')
<ul class="breadcrumb">
	<li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
	<li><a href="/clientes"><i class="fa fa-users"></i>Clientes</a></li>
  <li><i class="fa fa-user"></i> Editar Cliente</li>
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
    <form action="/clientes/{{$client->id}}" method="post" enctype="multipart/form-data">
		<div class="box box-success">
			<div class="box-header with-border">            
                <h3 class="box-title">{{$client->name}}</h3>
            </div>
            <div class="box-body ">
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
                    <input type="text" class="form-control" id="name" name="name" value="{{$client->name}}">
                </div>
                <div class="form-group">
                    <label for="Nome">CPF: </label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{$client->cpf}}">
                </div>
                <div class="form-group">
                    <label for="Nome">CNPJ: </label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{$client->cnpj}}">
                </div>
                <div class="form-group">
                    <label for="Nome">Razão social: </label>
                    <input type="text" class="form-control" id="razao_social" name="razao_social" value="{{$client->razao_social}}">
                </div>
                <div class="form-group">
                    <label for="Nome">Inscrição estadual: </label>
                    <input type="text" class="form-control" id="inscricao_estadual" name="inscricao_estadual" value="{{$client->inscricao_estadual}}">
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-primary btn-block">Salvar</button>
            </div>
		</div>
    </form>
	</div>
    <!-- inicio dos produtos selecionados -->
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de produtos frequentes</h3>
            </div>
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody>
                <tr>
                  <th>Nome</th>
                  <th>Preço</th>
                </tr>
                @if(isset($selected_products))
                @foreach($selected_products as $item)
                <tr class="text-sm">
                  <td>{{ucfirst($item->name)}}</td>
                  <td>R${{$item->price}}</td>
                </tr>
                @endforeach
                @endif
              </tbody></table>
            </div>
                        <div class="box-footer">
                        {{-- $selected_products->links('layouts.pagination') --}}
                        </div>
        </div>
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Lojas deste cliente</h3>
          </div>
          <div class="box-body no-padding">
            <table class="table table-striped">
              <tbody>
              <tr>
                <th>Nome</th>
                <th>Endereço</th>
              </tr>
              @if(isset($stores))
              @foreach($stores as $store)
              <tr class="text-sm">
                <td><a href="/store/{{$store->id}}">{{ucfirst($store->company_name)}}</a></td>
                <td>{{ucfirst($store->address)}}</td>
              </tr>
              @endforeach
              @endif
            </tbody></table>
          </div>
        <div class="box-footer">
        {{-- $selected_products->links('layouts.pagination') --}}
        </div>
      </div>
    </div>
    <!-- fim dos produtos... -->
</div>
<div class="row">
    <div class="col-md-6">
  @if (\Session::has('success'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
        Dados atualizados com sucesso!
      </div>
  @endif
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Lista de gerentes do cliente</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped" id="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          @if(isset($managers))
          @foreach($managers as $manager)
          <tr class="text-sm">
            <td><a href="/gerentes/{{($manager->id)}}" class="link-black">{{$manager->name}}</a></td>
            <td>{{$manager->email}}</td>
            <td>
              <form action="/gerentes/active/{{$manager->id}}" method="POST">
                {{method_field('put')}}
                {{ csrf_field() }}
                <button class="btn {{$manager->ativo == 0 ? 'btn-danger' : 'btn-success'}} btn-sm">{{$manager->ativo == 0 ? 'Desativado' : 'Ativo'}}</button>
              </form>
            </td>
            <td><a href="/gerentes/{{($manager->id)}}" class="btn btn-default">Editar</a></td>
          </tr>
          @endforeach
          @endif
        </tbody></table>
      </div>
      </div>
  </div> 
</div> <!-- fim da row -->
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