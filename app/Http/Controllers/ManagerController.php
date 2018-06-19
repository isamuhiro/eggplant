<?php

namespace App\Http\Controllers;

use App\Manager;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Client;
use App\Store;

class ManagerController extends Controller
{

    public function index()
    {
        $managers = Manager::all();
        return $managers;
    }

    public function gerentesDropList()
    {
        $managers = Manager::all();
        return array_flatten($managers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|alpha_num|max:255',
            'cpf' => 'required|size:14',
            'email' => 'required|email',
            'senha' => 'required|min:4|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $manager = new Manager;
        $manager->name = $request->nome;
        $manager->email = $request->email;
        $manager->password = bcrypt($request->senha);
        $manager->cpf = $request->cpf;
        $manager->clients_id = 1;
        $manager->stores_id = 1;
        $manager->save();

        echo "Gerente cadastrado com sucesso!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $managers = Manager::find($id);
        $store = $managers->store;
        return view('managers.edit')->with(compact("managers","store","stores"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit($manager)
    {
        $stores = Client::find($manager)->stores;
        return $stores;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager, $id)
    {
        $manager = Manager::find($id);

        $manager->name = $request->name;
        $manager->cpf = $request->cpf;
        $manager->email = $request->email;
        $manager->save();
        
        $store = Store::find($request->stores_id);
        $store->managers_id = $manager->id;
        $store->save();

        return \Redirect::back()->with('success', 'The Message');
    }
    public function active(Request $request, $id)
    {
        $manager = Manager::find($id);

        $manager->ativo = $manager->ativo == 1 ? 0 : 1;
        $manager->save();
        return \Redirect::back()->with('success', 'The Message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager = Manager::find($manager->id);
        $manager->delete();
        return $manager->id . 'foi excluido com sucesso';
    }
}
