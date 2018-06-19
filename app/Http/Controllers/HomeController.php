<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Client;
use App\Os;
use App\Route;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $produtos = \DB::table('products')->count();
        $usuarios = \DB::table('users')->count();
        $aguardo = Client::where('ativo', '=', 0)->count();
        $orders = Os::all()->count();
        $orders_progress = Os::where('status', '0')->count();

        $oss = Os::all();

        $today = $oss->filter(function ($value, $key) {
            return ($value->created_at->isToday() && date('H:i:s', strtotime($value->created_at)) <= date('H:i:s', strtotime("2019-05-18 12:00:00"))) || ($value->created_at->isYesterday() && date('H:i:s', strtotime($value->created_at)) >= date('H:i:s', strtotime("2019-05-18 12:00:00")));
        })->count();

        $orders_on_the_way = Os::where('status', '1')->count();
        $routes = Route::all()->count();
        return view('home', compact('produtos', 'usuarios', 'aguardo', 'orders', 'orders_progress', 'orders_on_the_way', 'routes', 'today'));
    }

    public function dashboard()
    {
        return view('home.index');
    }

    public function produtos()
    {
        return view('produtos.index');
    }
}
