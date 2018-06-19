<?php

namespace App\Http\Controllers;

use App\Os;
use App\Store;
use App\Product;
use Illuminate\Http\Request;

class OsController extends Controller
{
  public function index()
  {
    $ordersQuery = new Os;
    $orders = $ordersQuery->get()->groupBy('os')->sortByDesc('updated_at');
    return $orders;
  }

  public function historicoPedidos()
  {
    $orders = $this->index();

    $oss = Os::all();

    $today = $oss->filter(function ($value, $key) {
      return ($value->created_at->isToday() && date('H:i:s', strtotime($value->created_at)) <= date('H:i:s', strtotime("2019-05-18 12:00:00"))) || ($value->created_at->isYesterday() && date('H:i:s', strtotime($value->created_at)) >= date('H:i:s', strtotime("2019-05-18 12:00:00")));
    });

    $tomorrow = $oss->filter(function ($value, $key) {
      return ($value->created_at->isToday() && date('H:i:s', strtotime($value->created_at)) >= date('H:i:s', strtotime("2019-05-18 12:00:00")));
    });

    return view('solicitacoes.index', compact('orders', 'today', 'tomorrow'));
  }

  public function create()
  {
    $stores = Store::all();
    $products = Product::all();
    return view('solicitacoes.create', compact('stores','products'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Os  $os
   * @return \Illuminate\Http\Response
   */
  public function show(Os $os)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Os  $os
   * @return \Illuminate\Http\Response
   */
  public function edit(Os $os)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Os  $os
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Os $os)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Os  $os
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

    $pedido = Os::find($id);
    $pedido->delete();
    return redirect('pedidos/historico')->with('alert-success', 'excluido com sucesso');
  }
}
