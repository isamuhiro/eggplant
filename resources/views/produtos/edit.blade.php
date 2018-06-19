@extends('layouts.app')
@section('title','Produtos')
@section('description','Controle de produtos')
@section('breadcrumb')

<ul class="breadcrumb">
	<li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
	<li><a href="/produtos"><i class="fa fa-chevron-circle-right  "></i>Produtos</a></li>
  <li><i class="fa fa-chevron-circle-down"></i>Editar Produtos</li>
</ul> 

@endsection      
@section('content')
<div class="row">
	<div class="col-md-6">
		<form action="/produtos/{{$produto->id}}" method="post" enctype="multipart/form-data">
			{{method_field('put')}}
			<div class="box box-success">
				<div class="box-header with-border">
							<h3 class="box-title">Editar Produto</h3>
	            </div>
	            <div class="box-body">
	            	<div class="row">
	            		<div class="col-md-12">
            			    {{ csrf_field() }}
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
			                  <label for="Nome">Nome do produto: </label>
			                  <input type="text" class="form-control" id="name" placeholder="Digite o nome do produto" name="name" value="{{$produto->name}}">
			                </div>
			                <div class="form-group">
			                  <label for="photo">Foto do produto: </label>
			                  <input type="file" id="photo" name="photo" >
			                  <p class="help-block"></p>
			                </div>
			                <div class="form-group">
				                <label for="exampleInputEmail1">Preço: </label>
			                	<div class="input-group">
					                <span class="input-group-addon">R$</span>
			                  		<input type="text" class="form-control" id="price" placeholder="Digite o preço do produto" name="price" value="{{$produto->price}}">
					              </div>
			                </div>
			                <div class="form-group">
			                	<div class="row">
					                <div class="col-md-6">
					                  <label for="exampleInputEmail1">Peso: </label>
					                  <input type="text" class="form-control" id="weight" placeholder="Digite o peso do produto em Kg" name="weight" value="{{$produto->weight}}">
									</div>
									<div class="col-md-6">
										<label for="exampleInputEmail1">Quantidade do produto: </label>
										<input type="text" class="form-control" id="amount" placeholder="Digite a quantidade do produto" name="amount" value="{{$produto->amount}}">		
									</div>
			                	</div>	
			                </div>
	            		</div>
	            	</div>
	            </div>
	            <div class="box-footer">
	               <button type="submit" class="btn btn-success">Alterar</button>
	             </div>
			</div>
		</form>
	</div>
	<div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-success">
            <div class="box-body">
              <img class="profile-user-img img-responsive img-circle" src="{{$produto->photo}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ucfirst($produto->name)}}</h3>

              <p class="text-muted text-center">R$ {{$produto->price}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Quantidade</b> <a class="pull-right">{{$produto->amount}}</a>
                </li>
                <li class="list-group-item">
                  <b>Peso(kg)</b> <a class="pull-right">{{$produto->weight}}</a>
                </li>
              </ul>
              <form class="deletar" action="{{url('produtos', [$produto->id])}}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este item?');">
		   	   <input type="hidden" name="_method" value="DELETE">
			   <input type="hidden" name="_token" value="{{ csrf_token() }}">
			   <input type="submit" class="btn btn-danger" value="Delete"/>
			</form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	</div>
</div>
@endsection