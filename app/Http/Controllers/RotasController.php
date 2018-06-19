<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoutePoint;
use App\Route;
use App\Drivers;
use App\Store;
use FarhanWazir\GoogleMaps\GMaps;

class RotasController extends Controller
{
      public function index()
      {
            $drivers = Drivers::all();
            $stores = Store::all();
            $routes = Route::all();
            return View('rotas.index', ['drivers' => $drivers, 'stores' => $stores, 'routes' => $routes]);
      }

      public function store(Request $request)
      {
            $this->validate($request, [
                  'name' => 'required',
                  'driver' => 'required|string|min:1',
            ]);

            $route = new Route;
            $route->name = $request->name;
            $route->drivers_id = $request->driver;
            $route->save();

            $i = 0;
            $len = count($request->store);

            foreach ($request->store as $store) {
                  $route_point = new RoutePoint;
                  if ($i == $len - 1) { //se for o ultimo
                        $route_point->end_point = true;
                  } else {
                        $route_point->end_point = false;
                  }
                  $route_point->stores_id = $store;
                  $route_point->routes_id = $route->id;
                  $route_point->save();
                  $i++;
            }

            return \Redirect::back()->with('success', 'The Message');
      }

      public function show($id)
      {
            $route = Route::find($id);
            $config = array();
            $first = $route->routePoints->first();
            $last = $route->routePoints->last();
            $directionsWaypointArray = $route->routePoints->diff([$first,$last])->all();
            $first_address = $first->store->address .' '. $first->store->city;
            $last_address = $last->store->address .' '. $last->store->city;
            //isamu
            $drivers = Drivers::all();
            $config['center'] = $first_address;
            $config['zoom'] = '18';
            $config['map_height'] = '500px';
            $config['scrollwheel'] = false;
            $config['directions'] = true;
            $config['directionsStart'] = $first_address;

            if(!empty($directionsWaypointArray)){
                  $addresses = array();
                  foreach($directionsWaypointArray as $dir){
                        $dir_index = $dir->store->address . ' '. $dir->store->city;
                        $addresses[] = $dir_index;
                  }
                  $config['directionsWaypointArray'] = $addresses;
            }
            $config['directionsEnd'] = $last_address;
            $config['directionsDivID'] = 'directionsDiv';

            $gmap = new GMaps();
            $gmap->initialize($config);

            $map = $gmap->create_map();
            return view('rotas.edit', array('route' => $route, 'map' => $map,'drivers'=> $drivers));
      }

      public function update(Request $request, $id)
      {
        $route = Route::find($id);
        $route->drivers_id = $request->driver;
        $route->save();
        return \Redirect::back()->with('success', 'The Message');
      }

      public function destroy($id)
      {
        //
      }
}
