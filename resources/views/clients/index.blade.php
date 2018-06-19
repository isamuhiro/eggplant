@extends('layouts.app') 
@section('title','Clientes') 
@section('description','Controle de clientes') 
@section('breadcrumb')
<ul class="breadcrumb">
  <li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
  <li><i class="fa fa-chevron-circle-down"></i>Clientes</li>
</ul>
@endsection
 
@section('content')
<div class="row">
  <div class="col-md-12">
    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
      Dados atualizados com sucesso!
    </div>
    @endif
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Todos os clientes</h3>
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
            @if(isset($clients)) @foreach($clients as $client)
            <tr class="text-sm">
              <td><a href="clientes/{{($client->id)}}/edit" class="link-black">{{$client->name}}</a></td>
              <td>{{$client->email}}</td>
              <td>
                <form action="clientes/active/{{$client->id}}" method="POST">
                  {{method_field('put')}} {{ csrf_field() }}
                  <button class="btn {{$client->ativo == 0 ? 'btn-danger' : 'btn-success'}} btn-sm">{{$client->ativo == 0 ? 'Desativado' : 'Ativo'}}</button>
                </form>
              </td>
              <td><a href="clientes/{{($client->id)}}/edit" class="btn btn-default">Editar</a></td>
            </tr>
            @endforeach @endif
          </tbody>
        </table>
      </div>
      {{-- <div class="box-footer">
        {{ $clients->links('layouts.pagination') }}
      </div> --}}
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
