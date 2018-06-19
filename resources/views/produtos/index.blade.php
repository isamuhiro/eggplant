@extends('layouts.app')
@section('title','Produtos')
@section('description','Controle de produtos')
@section('breadcrumb')
<ul class="breadcrumb">
	<li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
  <li><i class="fa fa-chevron-circle-down"></i>Produtos</li>
</ul> 
@endsection      
@section('content')
<div class="row">
	<div class="col-md-6">
		<form action="produtos" method="post" enctype="multipart/form-data">
			<div class="box box-success">
				<div class="box-header with-border">
	              <h3 class="box-title">Cadastro de produtos</h3>
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
			                  <input type="text" value="{{old('name')}}" class="form-control" id="name" placeholder="Digite o nome do produto" name="name">
			                </div>
			                <div class="form-group">
			                  <label for="photo">Foto do produto: </label>
			                  <input type="file" id="photo" name="photo">

			                  <p class="help-block"></p>
			                </div>
			                <div class="form-group">
				                <label for="exampleInputEmail1">Preço: </label>
			                	<div class="input-group">
					                <span class="input-group-addon">R$</span>
			                  		<input type="text" class="form-control" id="price" placeholder="Digite o preço do produto" name="price" value="{{old('price')}}">
					              </div>
			                </div>
			                <div class="form-group">
			                	<div class="row">
					                <div class="col-md-6">
					                  <label for="exampleInputEmail1">Peso: </label>
					                  <input type="text" class="form-control" id="weight" placeholder="Digite o peso do produto em Kg" name="weight" value="{{old('weight')}}">
									</div>
									<div class="col-md-6">
										<label for="exampleInputEmail1">Quantidade do produto: </label>
										<input type="text" class="form-control" id="amount" placeholder="Digite a quantidade do produto" name="amount" value="{{old('amount')}}">
									</div>
			                	</div>	
			                </div>
			                <div class="form-group">
			                  
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
              <h3 class="box-title">Todos os produtos</h3>
            </div>
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
									<th></th>
                  <th>Nome</th>
                  <th>Preço</th>
                  <th style="width:10px;">Peso</th>
                  <th></th>
                  <!-- <th style="width:10px;">Quantidade</th> -->
                </tr>
								@if(isset($produtos))
                @foreach($produtos as $produto)
                <tr class="text-sm">
								<td align="center">
								@if($produto->photo != "")
								<img src="{{$produto->photo}}" style="width:60px;height:60px;">
								@else
								<i class="far fa-image" style="font-size: 50px;"></i>
								@endif
								</td>
									<td><a href="produtos/{{($produto->id)}}" class="link-black">{{ucfirst($produto->name)}}</a></td>
                  <td>R${{$produto->price}}</td>
                  <td>{{$produto->weight}}kg</td>
                  <td>
                  	<form action="{{url('produtos', [$produto->id])}}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este item?');">
     <input type="hidden" name="_method" value="DELETE">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <input type="submit" class="btn btn-danger" value="Delete"/>
</form>
                  </td>
                  <!-- <td>{{--$produto->amount--}}</td> -->
                </tr>
                @endforeach
                @endif
              </tbody></table>
            </div>
						<div class="box-footer">
						{{ $produtos->links('layouts.pagination') }}
						</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				Total de produtos pedidos pelo aplicativo
			</div>
			<div class="box-body">
				<table class="table table-stripped" id="table">
					<thead>
						<tr>
							<th>Produto</th>
							<th>Quantidade</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($amount as $prod)
							<tr>
									<td>{{$prod->label}}</td>
									<td>{{$prod->value}}</td>
							</tr>		
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@section('script')
<script>
	 $(document).ready(function(){
		$("#price").inputmask('decimal', {
				'alias': 'numeric',
				'autoGroup': true,
				'digits': 2,
				'radixPoint': ".",
				'digitsOptional': false,
				'allowMinus': false,
				'placeholder': '',
				'rightAlign': false
		});
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
	 });
</script>
@endsection
@endsection


