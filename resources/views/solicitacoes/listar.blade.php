@extends('layouts.app')
@section('title','Detalhes pedido')
@section('description','Detalhes do seu pedido')
@section('breadcrumb')
<ul class="breadcrumb">
	<li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
	<li><a href="/pedidos/historico"><i class="fa fa-chevron-circle-right"></i>Solicitações de Clientes</a></li>
  <li><i class="fa fa-chevron-circle-down"></i>Itens do Pedido</li>
</ul> 
@endsection
@section('content')
  <div class="row">
	<div class="col-md-12">
    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Verduranet
          </h2>
        </div>
      </div>
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Pedido feito por
          <address>
          @if(isset($os->manager))
            <strong>{{$os->manager->name}}</strong><br>
            Email: {{$os->manager->email}}
          </address>
          @else
            <strong>{{$os->store->client->name}}</strong><br>
          @endif
        </div>
        <div class="col-sm-4 invoice-col">
          Para
          <address>
            <strong>{{$os->store->company_name}}</strong><br>
            Endereço: {{$os->store->address}}<br>
            Phone: {{$os->store->phone_1}}<br>
            Email: {{$os->store->email}}
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          <b>Ordem de Servico #{{$os->number}}</b><br>
          <br>
          <b>Data: </b> {{date('d/m/Y',strtotime($os->created_at))}}<br>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Produto</th>
              <th>Preço </th>
              <th>Quantidade</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($orders))
              @foreach($orders as $order)
                <tr class="text-sm">
                  <td>{{ucfirst($order->product->first()->name)  }}</td>
                  <td>{{'R$ '.number_format($order->product->first()->price,2,',','.')  }}</td>
                  <td>{{$order->amount}}</td>
                </tr>
              @endforeach
            @endif
            </tbody>
            <tfoot>
              <tr>
                <th>Subtotal: {{'R$ '.number_format($os->total,2,',','.')  }}</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <ul class="timeline">
              <!-- timeline time label -->
              <li class="time-label">
                    <span class="bg-green">
                      Status do pedido
                    </span>
              </li>
              <li>
                <i class="fa fa-hourglass bg-green"></i>

                <div class="timeline-item">

                  <h3 class="timeline-header">Em processo</h3>

                  <div class="timeline-body">
                    Seu pedido está sendo processado.
                  </div>
                </div>
              </li>
              <li>
                @if($os->status == 1 || $os->status == 2)
                  <i class="fa fa-truck bg-green"></i>
                @else
                  <i class="fa fa-truck bg-gray"></i>
                @endif
                <div class="timeline-item">
                  <h3 class="timeline-header">À caminho</h3>

                  <div class="timeline-body">
                    Seu pedido está sendo entregue.
                  </div>
                </div>
              </li>
              <li>
                @if($os->status == 2)
                  <i class="fa fa-thumbs-o-up bg-green"></i>
                @else
                  <i class="fa fa-thumbs-o-up bg-gray"></i>
                @endif

                <div class="timeline-item">
                  <h3 class="timeline-header">Concluido</h3>

                  <div class="timeline-body">
                    Seu pedido foi entregue ao destinatario com êxito.
                  </div>
                </div>
              </li>
              <li>
                @if($os->status == 2)
                  <i class="fa fa-check bg-green"></i>
                @else
                  <i class="fa fa-check bg-gray"></i>
                @endif
                
              </li>
            </ul>
          </div>
          <div class="col-md-6">
              @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                  Dados atualizados com êxito!
                </div>
              @endif
        <div class="row">
          <div class="col-md-6">
          <form action="" method="POST">
            {{method_field('put')}}
            <h3><i class="fa fa-map-marker" aria-hidden="true"></i> Rota de destino</h3>
            <input type="hidden" name="os_id" value="{{$os->id}}">
            @if($os->store)
              <input type="hidden" name="store_id" value="{{$os->store->id}}">
            @endif
            <div class="form-group">
              <select id='routes' name="route" class="form-control">
                  @if($os->store)
                    {{-- @foreach ( $os->store->routePoints as $route_p ) 
                      <option value='{{$route_p->route->id}}'>{{$route_p->route->name}}</option>
                    @endforeach --}}
                  @endif
                  </select>
                </div>
                <div class="form-group">
                  <button class="btn btn-success btn-block">Atualizar</button>
                </div>
              </form>
          <form action="status" method="POST">
              <h3><i class="fa fa-refresh" aria-hidden="true"></i> Atualizar status</h2>
              <input type="hidden" name="os_id" value="{{$os->id}}">
              @if($os->store)
                <input type="hidden" name="store_id" value="{{$os->store->id}}">
              @endif
              <div class="form-group">
                <select id="status" name="status" class="form-control">
                      <option value='0' {{$os->status == 0 ? 'selected' : ''}}>Em processo</option>
                      <option value='1' {{$os->status == 1 ? 'selected' : ''}}>À caminho</option>
                      <option value='2' {{$os->status == 2 ? 'selected' : ''}}>Concluido</option>
                  </select>
              </div>
              <div class="form-group">
                <button class="btn btn-success btn-block">Atualizar</button>
              </div>
            </form>
          </div>
          <div class="col-md-6">
          
            </div>
          </div>
        </div>
      </div>
    </section>
	</div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
</script>

@endsection