@extends('layouts.app')
@section('title','Pedido')
@section('description','Criar pedido')
@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="/pedidos/historico"><i class="fa fa-shopping-basket"></i>Pedidos</a></li>
</ol>
@endsection      
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header"><h3 class="box-title">Novo pedido</h3></div>
            <div class="box-body">
                <form action="" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="os">Ordem de serviço (OS)</label>
                        <input type="text" class="form-control" value="00002" name="os">
                    </div>
                    <div class="form-group">
                        <div><label for="os">Todas as lojas</label></div>
                        <select name="store" id="" class="form-control">
                            @foreach ($stores as $store)
                            <option value="{{$store->id}}">{{$store->company_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        {{-- produtos --}}
                        <div class="col-md-6">
                            <h3 class="box-title">Produtos</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>Nome</td>
                                        <td>Preço</td>
                                        <td>Ação</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>
                                            <a class="btn btn-success" data-add="{{$product}}">Add</a>
                                        </td>
                                    </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- pedido --}}
                        <div class="col-md-6">
                            <h3 class="box-title">Cesta</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>Nome</td>
                                        <td>Preço</td>
                                        <td>Quantidade</td>
                                    </tr>
                                </thead>
                                <tbody id="row"></tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-success">Finalizar pedido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script>
    $( document ).ready(function() {
        var cart = [];
        Array.prototype.inArray = function(comparer) { 
            for(var i=0; i < this.length; i++) { 
                if(comparer(this[i])) return true; 
            }
            return false; 
        }; 

        Array.prototype.pushIfNotExist = function(element, comparer) { 
            if (!this.inArray(comparer)) {
                this.push(element);
            }
        }; 

        $('[data-add]').on('click',function(){
            var product = $(this).attr('data-add');
            var rows = '';
            product = JSON.parse(product);
            cart.pushIfNotExist(product,function(e){
                return e.id === product.id
            });
            $.each(cart,function(i,prod){
                prod.qnt = 1;
                var data = JSON.stringify(prod);
                rows += '<tr><td>'+prod.name+'</td><td>'+prod.price+'</td><td>'+prod.qnt+'</td><td><a data-product="'+data+'" class="btn btn-primary">+</a></td></tr>';
            });
            $('#row').html(rows);
        });

        $('#row').on('click','[data-product]',function(){
            var product = $(this).attr('data-product'); 
            console.log(product);
        });
    });
</script>
@endsection
@endsection