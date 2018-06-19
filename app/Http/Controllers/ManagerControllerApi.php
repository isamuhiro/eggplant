<?php

namespace App\Http\Controllers;

use App\Manager;
use App\Client;
use App\Store;

use Illuminate\Http\Request;

class ManagerControllerApi extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        
        $id = $request->user['id'];
        $manager = new Manager;
        $manager->name = $request->nome;
        $manager->email = $request->email;
        $manager->password = bcrypt($request->senha);
        $manager->cpf = $request->cpf;
        $manager->clients_id = $id;
        $manager->save();

        $store = Store::find($request->selected['id']);
        $store->managers_id = $manager->id;
        $store->save();
    }

    public function show($id)
    {
        $managers = Client::find($id)->managers;
        return $managers;
    }

    public function edit(Manager $manager)
    {
        return $manager;
    }

    public function update(Request $request, Manager $manager)
    {
        $manager->name = $request->name;
        $manager->email = $request->email;
        $manager->cpf = $request->cpf;
        if ($request->password !== $manager->password) {
            $manager->password = bcrypt($request->password);
        }
        $manager->save();
        return $manager;
    }

    public function destroy(Manager $manager)
    {
        //
    }
}
