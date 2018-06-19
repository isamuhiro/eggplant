<?php

namespace App\Http\Controllers;

use App\Store;
use App\Manager;
use App\Client;
use Illuminate\Http\Request;
use Validator;

class StoreController extends Controller
{
    public function index()
    {
        $store = Store::all();
        return $store;
    }

    public function allStores()
    {
        $stores = Store::all();
        $clients = Client::all();
        $json = \File::get("estados.json");
        $estados = json_decode($json);
        return view('lojas.index', ['stores' => $stores, 'clients' => $clients, 'estados' => $estados]);
    }

    public function storeStore(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|min:4|max:255',
            'city' => 'required|min:3|max:255',
            'state' => 'required|size:2',
            'phone_1' => 'string|min:9|max:15',
            'email' => 'email',
            'cep' => 'required|min:8|max:9',
            'address' => 'required|min:10|max:255'
        ]);

        Store::create($request->all());
        return \Redirect::back()->with('success', 'The Message');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'empresa' => 'required|min:4|max:255',
            'cidade' => 'required|min:3|max:255',
            'estado' => 'required|size:2',
            'telefone' => 'required|string|min:14|max:15',
            'telefone2' => 'min:14|string|max:15',
            'email' => 'required|email',
            'cep' => 'required|size:9',
            'endereco' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $store = new Store();
        $store->company_name = $request->empresa;
        $store->state = $request->estado;
        $store->phone_1 = $request->telefone;
        $store->phone_2 = $request->telefone2;
        $store->city = $request->cidade;
        $store->country = 'Brazil';
        $store->address = $request->endereco;
        $store->neighborhood = $request->bairro;
        $store->cep = $request->cep;
        $store->email = $request->email;
        $store->clients_id = $request->userid; //id do usuário autenticado
        $store->save();

        if ($request->selected !== null) {
            $manager = Manager::find($request->selected);
            $manager->stores_id = $store->id;
            $manager->save();
        }
    }

    public function show(Store $store)
    {
        $store_finded = Store::find($store);
        return $store;
    }

    public function edit($id)
    {
        $store = Store::find($id);
        return view('lojas.edit', compact('store'));
    }

    public function update(Request $request, Store $store)
    {
        $store_finded = Store::find($store)->first();
        $store_finded->company_name = $request->company_name;
        $store_finded->city = $request->city;
        $store_finded->state = $request->state;
        $store_finded->country = $request->country;
        $store_finded->phone_1 = $request->phone_1;
        $store_finded->phone_2 = $request->phone_2;
        $store_finded->clients_id = $request->clients_id;
        $store_finded->save();
    }

    public function updateStore(Request $request, $id)
    {
        $this->validate($request, [
            'company_name' => 'required|min:4|max:255',
            'city' => 'required|min:3|max:255',
            'state' => 'required|size:2',
            'phone_1' => 'required|min:8|max:15',
            'email' => 'email',
            'cep' => 'required|min:8|max:9',
            'address' => 'required|min:10|max:255'
        ]);

        $store = Store::find($id);
        $store->fill($request->all());
        $store->save();
        return \Redirect::back()->with('success', 'The Message');
    }

    public function destroy(Store $store)
    {
        $store_finded = Store::find($store)->first();
        $store_finded->delete();
    }
}
