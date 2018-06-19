@extends('layouts.app')
@section('title','Histórico de pedidos')
@section('description','Todos os pedidos')
@section('breadcrumb')
<ul class="breadcrumb">
	<li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
  <li><i class="fa fa-exchange"></i> Solicitações de Clientes</li>
</ul> 
@endsection     
@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- Custom Tabs (Pulled to the right) -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs pull-right">
        <li><a href="#tab_3-2" data-toggle="tab">Para o dia seguinte</a></li>
        <li class="active"><a href="#tab_2-2" data-toggle="tab">Do dia</a></li>
        <li><a href="#tab_1-1" data-toggle="tab">Todos</a></li>
        <li class="pull-left header"><i class="fa fa-th"></i>Pedidos</li>
        <li class="pull-left"><form action="/pedidos/create/"><button class="btn btn-success">Criar novo pedido</button></form></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane" id="tab_1-1">
          {{-- TODOS --}}
          <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Histórico de pedidos</h3>
              </div>
              <div class="box-body">
                <table class="table table-striped table-hover dataTable" id="table">
                  <thead>
                    <tr>
                      <th>Data</th>
                      <th>Código do pedido</th>
                      <th style="width:10px;">Total</th>
                      <th>Status do serviço</th>
                      <th style="width:10px">Ações</th>
                      <th></th> 
                    </tr>
                  </thead>
                  <tbody>
                  @if(isset($orders))
                  @foreach($orders as $groups)
                    @foreach($groups as $registros)
                    
                    <tr class="text-sm">
                      <td>{{ date( 'd/m/Y H:i:s' , strtotime($registros->updated_at)) }}</td>
                      <td>
                        <b>
                          <a href="/pedidos/detalhes-pedido/{{($registros->number)}}">{{'#'.$registros->number }}</a>
                        </b>
                      </td>
                      <td>{{'R$'.number_format($registros->total,2, ',', '.') }}</td>
                      <td>{{$registros->status == 0 ? 'Pendente' : ($registros->status == 1 ? 'A caminho' : 'Concluido') }}</td>
                      <td><a href="/pedidos/detalhes-pedido/{{($registros->number)}}" class="btn btn-success">Detalhes</a>
                      </td>
                      <td>
                        <form action="{{url('pedidos/delete-history', [$registros->id])}}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este item?');">
                            <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="submit" class="btn btn-danger" value="Delete"/>
                      </form>
                      </td>
                    </tr>
                    @endforeach
                  @endforeach
                  @endif
                </tbody>
              </table>
              </div>  
            </div>
        </div>
        <div class="tab-pane active" id="tab_2-2">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Seus pedidos do dia de hoje ( 12:01h - 12h )</h3>
            </div>
            <div class="box-body">
              <table class="table table-striped" id="t_order">
                <thead>
                  <tr>
                    <th>Data</th>
                    <th>Código do pedido</th>
                    <th style="width:10px;">Total</th>
                    <th>Status do serviço</th>
                    <th style="width:10px">Ações</th>
                    <th></th> 
                  </tr>
                </thead>
                <tbody>
                  @if(isset($today))
                    @foreach ($today as $t_order)
                    <tr class="text-sm">
                      <td>{{ date( 'd/m/Y H:i:s' , strtotime($t_order->updated_at)) }}</td>
                      <td>
                        <b>
                          <a href="/pedidos/detalhes-pedido/{{($t_order->number)}}">{{'#'.$t_order->number }}</a>
                        </b>
                      </td>
                      <td>{{'R$'.number_format($t_order->total,2, ',', '.') }}</td>
                      <td>{{$t_order->status == 0 ? 'Pendente' : ($t_order->status == 1 ? 'A caminho' : 'Concluido') }}</td>
                      <td><a href="/pedidos/detalhes-pedido/{{($t_order->number)}}" class="btn btn-success">Detalhes</a>
                      </td>
                      <td>
                        <form action="{{url('pedidos/delete-history', [$t_order->id])}}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este item?');">
                            <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="submit" class="btn btn-danger" value="Delete"/>
                      </form>
                      </td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="tab_3-2">
          <div class="box box-success">
              <div class="box-header">
                <h3 class="box-title">Seus pedidos do dia seguinte (Após às 12:01)</h3>
              </div>
              <div class="box-body">
                <table class="table table-striped" id="t_order">
                  <thead>
                    <tr>
                      <th>Data</th>
                      <th>Código do pedido</th>
                      <th style="width:10px;">Total</th>
                      <th>Status do serviço</th>
                      <th style="width:10px">Ações</th>
                      <th></th> 
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($tomorrow))
                      @foreach ($tomorrow as $tomorrow_order)
                      <tr class="text-sm">
                        <td>{{ date( 'd/m/Y H:i:s' , strtotime($tomorrow_order->updated_at)) }}</td>
                        <td>
                          <b>
                            <a href="/pedidos/detalhes-pedido/{{($tomorrow_order->number)}}">{{'#'.$tomorrow_order->number }}</a>
                          </b>
                        </td>
                        <td>{{'R$'.number_format($tomorrow_order->total,2, ',', '.') }}</td>
                        <td>{{$tomorrow_order->status == 0 ? 'Pendente' : ($tomorrow_order->status == 1 ? 'A caminho' : 'Concluido') }}</td>
                        <td><a href="/pedidos/detalhes-pedido/{{($tomorrow_order->number)}}" class="btn btn-success">Detalhes</a>
                        </td>
                        <td>
                          <form action="{{url('pedidos/delete-history', [$tomorrow_order->id])}}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este item?');">
                              <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>
                        </td>
                      </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
        </div>
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

$('#t_order').DataTable({
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

$('#tomorrow_order').DataTable({
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