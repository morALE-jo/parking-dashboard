<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $plates = Plate::orderBy('id','desc')->paginate(5);
        return view('plates.index', compact('plates'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('plates.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'plate' => 'required',
            /* 
            Optional parameters, validation is expected on endpoint
            'owner' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',*/
        ]);
        
        Plate::create($request->post());

        return redirect()->route('plates.index')->with('success','Plate has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Plate  $plate
    * @return \Illuminate\Http\Response
    */
    public function show(Plate $plate)
    {
        return view('plates.show',compact('plate'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Plate  $plate
    * @return \Illuminate\Http\Response
    */
    public function edit(Plate $plate)
    {
        return view('plates.edit',compact('plate'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Plate  $plate
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Plate $plate)
    {
        $request->validate([
            'plate' => 'required',
            /* 
            Optional parameters, validation is expected on endpoint
            'owner' => 'required',
            'start_date' => 'required',
            'end_date' => 'required', */
        ]);
        
        $plate->fill($request->post())->save();

        return redirect()->route('plates.index')->with('success','Plate Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Plate  $plate
    * @return \Illuminate\Http\Response
    */
    public function destroy(Plate $plate)
    {
        $plate->delete();
        return redirect()->route('plates.index')->with('success','Plate has been deleted successfully');
    }
}
