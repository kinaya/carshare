<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ride;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $currentMonth = date('m');
        $currentMonthName = date('F');

        $ridesThisMonth = Ride::whereRaw('Month(date) = ?', [$currentMonth])->orderBy('date', 'desc')->get();
        $total_distance = Ride::whereRaw('Month(date) = ?', [$currentMonth])->sum('distance');
        $total_tax = Ride::whereRaw('Month(date) = ?', [$currentMonth])->sum('tax');
        $total_amount = Ride::whereRaw('Month(date) = ?', [$currentMonth])->sum('amount');

        $usersData = array();
        $users = User::all();
        foreach($users as $user) {
          $userData = array(
            'name' => $user->name,
            'rides' => Ride::where('user_id', '=', $user->id)->count(),
            'distance' => Ride::where('user_id', '=', $user->id)->sum('distance'),
            'tax' => Ride::where('user_id', '=', $user->id)->sum('tax'),
            'amount' => Ride::where('user_id', '=', $user->id)->sum('amount'),
          );
          array_push($usersData, $userData);
        }

        $data = array(
          'currentMonth' => $currentMonthName,
          'rides' => $ridesThisMonth,
          'total_distance' => $total_distance,
          'total_tax' => $total_tax,
          'total_amount' => $total_amount,
          'users' => $usersData
        );
        return view('home')->with($data);
    }
}
