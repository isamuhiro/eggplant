@extends('layouts.app')
@section('title','Dashboard')
@section('description','Home page')
@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
  <!-- <li class="active">Here</li> -->
</ol>
@endsection      
@section('content')
<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="ion ion-ios-paper"></i></span>
      <div class="info-box-content">
        <span class="info-box-text"><a href="/pedidos/historico/" class="link-black">Pedidos</a></span> 
        <span class="info-box-number">{{$today > 1 ? $today . ' Pedidos para hoje' : ($today == 1 ? $today . ' Pedido para hoje' : 'Nenhum pedido para hoje')}}</span>
        <span class="info-box-number">{{$orders_on_the_way > 1 ? $orders_on_the_way . ' sendo encaminhados' : ($orders_on_the_way == 1 ? $orders_on_the_way . ' sendo encaminhado' : 'Nenhum sendo encaminhado')}}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="icon ion-map"></i></span>
      <div class="info-box-content">
        <span class="info-box-text"><a href="/pedidos/historico/" class="link-black">Minhas Rotas({{$routes ?: null}})</a></span> 
        <span class="info-box-number">{{$routes > 1 ? $routes . ' rotas existentes ' : ($routes = 1 ? $routes . ' rota existente ':'Nenhuma rota criada')}}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text"><a href="/produtos" class="link-black">Produtos</a></span> 
        <span class="info-box-number">{{$produtos >= 1 ? $produtos . ' cadastrados' : 'Nenhum produto cadastrado :('}}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="ion ion-ios-people-outline"></i></span>
      <div class="info-box-content">
        <span class="info-box-text"><a href="/clientes" class="link-black">Usários cadastrados</a></span>
        <span class="info-box-number">{{$usuarios}} cadastrados {{$aguardo >= 1 ? 'e '.$aguardo . ' aguardando liberação' : ''}} </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>
@endsection