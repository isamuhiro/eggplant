@extends('layouts.app')
@section('title','Rota')
@section('description',$route->name)
@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="/rotas/config"><i class="fa fa-shopping-basket"></i>Todas as rotas</a></li>
</ol>
@endsection      
@section('content')
<div class="row">
  <div class="col-md-6">
    <ul class="timeline">
      <li class="time-label">
        <span class="bg-green">
          Motorista:
        <form action="/rotas/config/{{$route->id}}" method="POST">
            {{ csrf_field() }}
            {{method_field('put')}}
            <div class="row">
              <div class="col-md-6">
                <select name="driver" id="" class="form-control">
                  @foreach ($drivers as $driver)
                <option value="{{$driver->id}}" {{$route->drivers_id == $driver->id ? 'selected': ''}}>
                    {{$driver->name}}
                  </option>    
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <button class="btn btn-primary">Atualizar</button>
              </div>
            </div>
          </form>
        </span>
      </li>
      @foreach($route->routePoints as $route_p)
      <li>
        <i class="fa fa-map-marker bg-blue"></i>
        <div class="timeline-item">
          <h3 class="timeline-header">
          <a href="/store/{{$route_p->store->id}}">{{ucfirst($route_p->store->company_name)}}</a>
          </h3>
          <div class="timeline-body">
              <p>{{ucfirst($route_p->store->address)}} {{$route_p->store->cep}} {{strtoupper($route_p->store->state)}}</p>
              <p>{{$route_p->store->neighborhood}}</p>
          </div>
        </div>
      </li>
      @endforeach
      <li>
        <i class="fa fa-check bg-green"></i>
      </li>
    </ul>
  </div>
  <div class="col-md-6">
    {!! $map['html'] !!}
  </div>
</div>
@endsection
@section('script')
{!! $map['js'] !!}
@endsection
