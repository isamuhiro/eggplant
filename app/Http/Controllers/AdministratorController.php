<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return $clients;
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:6',
        ]);

        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = bcrypt($request->password);
        $client->save();

        return $client;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Client::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'adiciona_cnpj' => 'bail|required',
            'adiciona_contato_razao_social' => 'bail|required',
            'adiciona_endereco_comercial' => 'bail|required',
        ]);
        $client = Client::find($request->user['id']);
        $client->cnpj = $request->adiciona_cnpj;
        $client->razao_social = $request->adiciona_contato_razao_social;
        $client->inscricao_estadual = $request->adiciona_endereco_comercial;
        $client->save();
        return $client;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
