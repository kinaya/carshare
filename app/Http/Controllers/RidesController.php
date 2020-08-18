<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ride;

class RidesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $rides = Ride::orderBy('date', 'desc')->get();
      $total_distance = Ride::sum('distance');
      $total_tax = Ride::sum('tax');
      $total_amount = Ride::sum('amount');

      $data = array(
        'rides' => $rides,
        'total_distance' => $total_distance,
        'total_tax' => $total_tax,
        'total_amount' => $total_amount,
      );

      return view('rides.index')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('rides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // Validate the ride
      $this->validate($request, [
        'title' => 'required',
        'date' => 'required',
        'distance' => 'required',
        'tax' => 'required',
        'amount' => 'required'
      ]);

      $ride = new Ride();
      $ride->title = $request->input('title');
      $ride->distance = $request->input('distance');
      $ride->tax = $request->input('tax');
      $ride->date = $request->input('date');
      $ride->amount = $request->input('amount');
      $ride->user_id = auth()->user()->id;
      $ride->save();

      return redirect('/rides')->with('success', 'Ride created!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ride = Ride::find($id);
        return view('rides.show')->with('ride', $ride);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ride = Ride::find($id);
      if(auth()->user()->id !== $ride->user_id) {
        return redirect('/rides')->with('error', 'Unauthorized page');
      }
      return view('rides.edit')->with('ride', $ride);
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
      // Validate the ride
      $this->validate($request, [
        'title' => 'required',
        'date' => 'required',
        'distance' => 'required',
        'tax' => 'required'
      ]);

      $ride = Ride::find($id);
      $ride->title = $request->input('title');
      $ride->distance = $request->input('distance');
      $ride->tax = $request->input('tax');
      $ride->date = $request->input('date');
      $ride->amount = $request->input('amount');
      $ride->save();

      return redirect('/rides')->with('success', 'Ride updated!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ride = Ride::find($id);
      if(auth()->user()->id !== $ride->user_id) {
        return redirect('/rides')->with('error', 'Unauthorized page');
      }

      $ride->delete();
      return redirect('/rides')->with('success', 'Ride removed!');
    }
}
