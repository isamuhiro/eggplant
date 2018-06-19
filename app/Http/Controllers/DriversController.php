<?php

namespace App\Http\Controllers;

use App\Drivers;
use Illuminate\Http\Request;

class DriversController extends Controller
{
  public function index()
  {
    $drivers = Drivers::orderBy('name')->paginate(10);
    return view('motoristas.index', compact('drivers'));
  }

  public function create()
  {
        //
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => "bail|required",
      'cpf' => "bail|required",
      'senha' => "bail|min:4",
      'email' => "bail|min:10|unique:drivers"
    ]);
    $driver = new Drivers();
    $driver->name = $request->name;
    $driver->cpf = $request->cpf;
    $driver->email = $request->email;
    $driver->password = bcrypt($request->senha);
    $driver->save();

    return redirect('motoristas');
  }

  public function show($id)
  {
    $drivers = Drivers::find($id);

    return view('motoristas.edit', compact('drivers'));
  }

  public function update(Request $request, Drivers $drivers, $id)
  {
    $drivers = Drivers::find($id);
    $this->validate($request, [
      'name' => "bail|required",
      'cpf' => "bail|required",
      'senha' => "bail|min:4",
      'email' => "bail|min:10|unique:drivers,email,".$drivers->id
    ]);
    $drivers->name = $request->name;
    $drivers->cpf = $request->cpf;
    $drivers->email = $request->email;
    $drivers->password = $request->password;
    $drivers->save();

    return redirect('motoristas');
  }

  public function showDriversOs($id)
  {
    $driversos = Drivers::find($id)->os;
    return $driversos;
  }

  public function destroy($driver_id)
  {
    $motoristas = Drivers::find($driver_id);
    $motoristas->delete();
    return redirect()->route('motoristas.index')->with('alert-success', 'Deletado com sucesso');
  }
}
