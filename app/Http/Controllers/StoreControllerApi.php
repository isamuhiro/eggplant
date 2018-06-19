<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use App\Client;
use App\Manager;

class StoreControllerApi extends Controller
{
    public function index()
    {
        return $stores = Store::all();
    }

    public function show(Client $client, $id)
    {
        return $client->with('stores.manager')->find($id)->stores;
    }

    public function update(Request $request, Store $store)
    {
        $store->address = $request->address;
        $store->company_name = $request->company_name;
        $store->city = $request->city;
        $store->phone_1 = $request->phone_1;
        $store->phone_2 = $request->phone_2;
        $store->email = $request->email;
        $store->neighborhood = $request->neighborhood;
        $store->state = $request->state;
        $store->save();
        // if (isset($request->manager)) {
        //     $manager_old = Manager::find($request->manager['id']);
        //     $manager_old->stores_id = null;
        //     $manager_old->save();
        // }
        // if (isset($request->selected['id'])) {
        //     $manager = Manager::find($request->selected['id']);
        //     $manager->stores_id = $store->id;
        //     $manager->save();
        // }
    }

    public function destroy(Store $store)
    {
        //
    }
}
