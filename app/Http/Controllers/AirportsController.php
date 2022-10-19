<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use App\Models\Countries;
use Illuminate\Http\Request;

class AirportsController extends Controller
{
    public function create(Request $request) {
        try {
            $request->validate([
                'name' => 'required|min:3|max:40',
                'countries_id' => 'required',
                'coords' => 'required'
            ]);
    
            $airport = Airports::create([
                'name' => $request->name,
                'countries_id' => $request->countries_id,
                'coords' => $request->coords
            ]);  
    
            $airport->save();
    
            return redirect('/airports');
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|min:3|max:40',
            'countries_id' => 'required',
            'coords' => 'required'
        ]);

        $airport = Airports::find($id);

        $airport->name          = $request->name;
        $airport->countries_id  = $request->countries_id;
        $airport->coords        = $request->coords;
        
        $airport->save();

        return redirect('/airports');
    }

    public function delete($id) {
        $airport = Airports::find($id);
        
        $airport->delete();
        
        return redirect('/airports');
    }

    public function airline($id, Request $request) {
        $airport = Airports::find($id);
        $airport->airlines_id = $request->airlines_id;

        $airport->save();
        
        return redirect('/airports');
    }

    public function airliner($id) {
        $airport = Airports::find($id);
        $airport->airlines_id = null;

        $airport->save();

        return redirect('/airports');
    }

    public function search(Request $request) {
        if($request->id === '0'){
            return redirect('/airports');
        }
        $airports = Airports::where('countries_id', $request->id)->get();
        $countries = Countries::all();
        return view('airports', ['countries' => $countries, 'airports' => $airports]);
    }

}
