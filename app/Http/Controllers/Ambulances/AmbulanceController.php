<?php

namespace App\Http\Controllers\Ambulances;
use App\Http\Controllers\Controller;

use App\Models\Ambulance;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambulances = Ambulance::all();
        return view('pages.ambulances.index',compact('ambulances'));
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
        try {
            $ambulances = new Ambulance();
            $ambulances->name = $request->name;
            $ambulances->number = $request->number;
            $ambulances->status = 1;
            $ambulances->save();

            return redirect()->route('ambulances.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ambulance  $ambulance
     * @return \Illuminate\Http\Response
     */
    public function show(Ambulance $ambulance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ambulance  $ambulance
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambulance $ambulance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ambulance  $ambulance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            $ambulances = Ambulance::findOrFail($request->id);
            $ambulances->name = $request->name;
            $ambulances->number = $request->number;

            if(isset($request->status)) {
              $ambulances->status = 1;
            } else {
              $ambulances->status = 2;
            }

            $ambulances->save();
            return redirect()->route('ambulances.index');
        }
        catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ambulance  $ambulance
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        Ambulance::findOrFail($request->id)->delete();
        return redirect()->route('ambulances.index');
    }
}
