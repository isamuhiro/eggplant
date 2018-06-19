<?php


namespace App\Http\Controllers;

use App\Client;
use App\Manager;
use App\User;
use App\ProductClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct() {
    //     $this->middleware('auth:clients');
    // }
    public function index()
    {
        // $vetor = Arra();
        $clients = Client::orderBy('id', 'desc')->get();
        $managers = Manager::paginate(10);
        // dd($managers);
        return view('clients.index')->with(compact("clients", "managers"));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, $id)
    {
        $client = Client::find($id);
        return view('clients.settings', compact('client'));
    }

    public function updatePerfil(Request $request)
    {
        $this->validate($request, [
            'name' => "bail|required",
            'email' => "bail|email",
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return \Redirect::back()->with('success', 'The Message');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function productClientSelected($id)
    {
        $produtos = DB::table('products_clients')
            ->join('products', 'products.id', '=', 'products_clients.products_id')
            ->join('clients', 'clients.id', '=', 'products_clients.clients_id')
            ->select('products.*')
            ->where('clients.id', '=', $id)
            ->get();
        // select products.name, products.price from products_clients inner join products on products.id = products_clients.products_id inner join clients on clients.id = products_clients.clients_id where clients.id =  1;
        return $produtos;
    }

    public function edit(Client $client, $id)
    {
        $client = Client::find($id);
        $selected_products = $this->productClientSelected($id);

        $managers = $client->managers;
        $stores = $client->stores;
        return view('clients.edit')->with(compact("selected_products", "client", "managers","stores"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client, $id)
    {
        $this->validate($request, [
            'name' => "bail|required",
            'cpf' => "bail|max:14",
            'cnpj' => "bail|max:18",
            'razao_social' => "bail|max:255",
            'inscricao_estadual' => "bail|max:255"
        ]);

        $client = Client::find($id);

        $client->cpf = $request->cpf;
        $client->cnpj = $request->cnpj;
        $client->razao_social = $request->razao_social;
        $client->inscricao_estadual = $request->inscricao_estadual;
        $client->name = $request->name;
        $client->save();

        return \Redirect::back()->with('success', 'The Message');
    }

    public function active(Request $request, $id)
    {
        $client = Client::find($id);
        $client->ativo = $client->ativo == 1 ? 0 : 1;
        $client->save();
        return \Redirect::back()->with('success', 'The Message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function storeProductsOnClientSelected(Request $request)
    {
        foreach ($request->selected_products as $product) {
            $prod_cli = new ProductClient;
            $prod_cli->clients_id = $request->user['id'];
            $prod_cli->products_id = $product['id'];
            $prod_cli->save();
        }
        return $request->all();
    }
}
