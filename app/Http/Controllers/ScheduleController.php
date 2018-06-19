<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ExponentPhpSDK;
use App\Schedule;


class ScheduleController extends Controller
{
  public function schedule()
  {
    $schedules = Schedule::all();
    foreach ($schedules as $schedule) {
      $interestDetails = [(string)$schedule->id, $schedule->key];
      $expo = ExponentPhpSDK\Expo::normalSetup();
      $expo->subscribe($interestDetails[0], $interestDetails[1]);
      $notification = ['body' => 'Peça antes das 12h e receba hoje mesmo!','title' =>'Pedidos para hoje?'];
      $expo->notify($interestDetails[0], $notification);
    }
  }

  public function store(Request $request)
  {
    $schedule = Schedule::updateOrCreate(['key' => $request->token]);
    $schedule->key = $request->token;
    $schedule->save();
    return $schedule;
  }
}
