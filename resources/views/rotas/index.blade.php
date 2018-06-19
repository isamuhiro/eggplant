@extends('layouts.app') 
@section('title','Rotas') 
@section('description','Controle de Rotas') 
@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="produtos"><i class="fa fa-truck"></i>Rotas</a></li>
</ol>
@endsection
 
@section('content')
<div class="row">
  <div class="col-md-6">
    <form action="/rotas/config" method="post" enctype="multipart/form-data">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Gerenciamento de rotas</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <input name="_token" value="Dm50L1jC7jvpotlLqcNBnHh9LRSq4xVSLcsnj4Uv" type="hidden">
              @if(count( $errors ) > 0 )
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alguns erros foram detectados :(</h4>
              @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
              @endforeach
              </div>
              @endif
              @if (\Session::has('success'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                Dados cadastrados com êxito!
              </div>
              @endif
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                      <label for="Nome">Nome da rota: </label>
                      <input class="form-control" id="name" placeholder="Nome da rota" name="name" type="text">
                  </div>
                  <div class="col-md-6">
                      <label for="Nome">Selecione o motorista: </label>
                      <select class="drivers form-control" name="driver">
                        @foreach($drivers as $driver)
                          <option value="{{$driver->id}}">{{$driver->name}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
              </div>
                <label for="Nome">Endereços: </label>
                <select id='stores' multiple='multiple' name="store[]" class="form-control">
                    @foreach($stores as $store)                    
                    <option value='{{$store->id}}'>{{$store->company_name}} - {{$store->address}}</option>
                    @endforeach
                  </select>
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
          <h3 class="box-title">Todas as rotas</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <table class="table">
                <tbody>
                  <tr>
                    <th>Rota</th>
                    <th>Motorista</th>
                  </tr>
                  @foreach($routes as $route)
                  <tr>
                  <td><a href="/rotas/config/{{$route->id}}">{{$route->name}}</a></td>
                    <td>{{$route->driver->name}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
                <!-- /.box-body -->
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="/plugins/iCheck/icheck.min.js"></script>
<script>
  $(document).ready(function() {
    $('.drivers').select2();
    $('#stores').select2().on('select2:select', function(e){
      var id = e.params.data.id;
      var option = $(e.target).children('[value='+id+']');
      option.detach();
      $(e.target).append(option).change();
    });
  });

</script>
@endsection

@endsection