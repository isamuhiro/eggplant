<?php

namespace App\Http\Controllers;

use App\Order;
use App\Os;
use App\Manager;
use App\Client;


use Illuminate\Http\Request;
use App\RoutePoint;

class OrderController extends Controller
{

    public function getLastOrdemServico()
    {
        $orders = Os::all();

        $last = array_last($orders->toArray(), function ($value, $key) {
            return $value;
        }, 0);

        return ++$last['id'];
    }

    public function index()
    {
        $orders = Os::orderBy('id', 'desc')->get();
        return $orders;
    }

    public function historicoPedidos()
    {
        $orders = $this->index();
        return view('solicitacoes.index', compact('orders'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $os = new Os;
        $os->number = '0';
        $os->status = '0';
        $os->total = $request->subTotal;
        if ($request->isClient == true) {
            $os->clients_id = $request->user['id'];
        }
        if ($request->isManager == true) {
            $manager = Manager::with('store')->find($request->user['id']);
            $os->managers_id = $request->user['id'];
            $os->stores_id = $manager->store['id'];
        } else {
            if (!array_key_exists('manager', $request->selected)) {
                $os->managers_id = null;
            } else {
                $os->managers_id = $request->manager['id'];
            }
            $os->stores_id = $request->selected['id'];
        }
        $os->save();
        //isamu
        //https://www.designcise.com/web/tutorial/how-to-add-leading-zeros-to-a-number-in-php
        $os_atual = Os::find($os->id);
        $os_atual->number = str_pad($os->id, 5, 0, STR_PAD_LEFT);
        $os_atual->save();

        foreach ($request->items as $item) {
            $order = new Order;
            $order->os = $os_atual->number;
            $order->amount = $item['amountTaken'];
            $order->products_id = $item['id'];
            $order->os_id = $os_atual->id;
            $order->corte = 'fatiado';
            $order->save();
        }

    }

    public function show($os_id)
    {
        $os = Os::find($os_id);
        $orders = $os->orders;
        $client = $os->client;
        $manager = $os->manager;
        $store = $os->store;
        
        return view('solicitacoes.listar', ['orders' => $orders, 'os' => $os, 'client' => $client, 'manager' => $manager, 'store' => $store]);
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $os = Os::find($request->os_id);
        $os->routes_id = $request->route;
        $os->save();

        return \Redirect::back()->with('success', 'Atualizado com sucesso!');
    }

    public function status(Request $request)
    {
        $os = Os::find($request->os_id);
        $os->status = $request->status;
        $os->save();
        return \Redirect::back()->with('success', 'Atualizado com sucesso!');
    }

    public function retrieveManagerOrder($id)
    {
        return Manager::with('oss.orders.product')->find($id)->oss;
    }

    public function retrieveClientOrder($id)
    {
        return Client::with('oss.orders.product')->find($id)->oss;
    }

    public function destroy($os_id)
    {
        $os = Os::findOrFall($os_id);
        $os->delete();
        return redirect()->route('solititacoes.index')->with('alert-success', 'Deletado com sucesso');
    }
}
