<?php

namespace App\Http\Controllers;

use App\Models\Airlines;
use App\Models\Airports;
use App\Models\Countries;
use Illuminate\Http\Request;

class Views extends Controller
{
    public function index(){
        return redirect("/airports");
    }

    public function airports(){
        $airports = Airports::all();
        $countries = Countries::all();

        return view("airports", ['airports' => $airports, 'countries' => $countries]);
    }

    public function countries(){
        $countries = Countries::all();

        return view("countries", ['countries' => $countries]);
    }

    public function airlines(){
        $airlines = Airlines::all();

        return view("airlines", ['airlines' => $airlines]);
    }

    public function add_airports(){
        $countries = Countries::all();
        $airlines = Airlines::all();

        return view("add_airports", ['countries' => $countries, 'airlines' => $airlines]);
    }

    public function edit_airports($id){
        $airports = Airports::find($id);
        $countries = Countries::all();

        return view("edit_airports", ['airports' => $airports, 'countries' => $countries]);
    }

    public function remove_airlines($id){
        $airport = Airports::find($id);

        return view("remove_airlines", ['id' => $id, 'airport' => $airport]);
    }

    public function add_airlines($id){
        $airlines = Airlines::all();
        $airports = Airports::all();

        return view("add_airlines", ['id' => $id, 'airlines' => $airlines, 'airports' => $airports]);
    }

    public function delete_airports($id){
        return view("delete_airports", ['id' => $id]);
    }

    public function edit_countries($id){
        $country = Countries::find($id);

        return view("edit_countries", ['country' => $country]);
    }

    public function delete_countries($id){
        $country = Countries::find($id);

        return view("delete_countries", ['country' => $country]);
    }

    public function add_countries(){
        return view("add_countries");
    }

    public function edit_airlines($id){
        $airline = Airlines::find($id);
        $countries = Countries::all();

        return view("edit_airlines", ['airline' => $airline, 'countries' => $countries]);
    }

    public function delete_airlines($id){
        $airline = Airlines::find($id);
        $countries = Countries::all();

        foreach ($countries as $country) {
            $structured[$country->id] = $country;
        };

        $airline_country = $structured[$airline->countries_id]->name;
        
        return view("delete_airlines", ['airline' => $airline, 'country' => $airline_country]);
    }

    public function create_airlines(){
        $countries = Countries::all();

        return view("create_airlines", ['countries' => $countries]);
    }

    public function noAirlines(){
        try {
            $Countries = Countries::all();
            $arr = array();
            foreach ($Countries as $country){
                if($country->airlines->count() === 0){
                    array_push($arr, $country);
                }
            } 
            return view('countries', ['countries' => $arr]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function noAirlinesAirports(){
        try {
            $Countries = Countries::all();
            $arr = array();
            foreach ($Countries as $country){
                if($country->airlines->count() === 0 && $country->airports->count() === 0){
                    array_push($arr, $country);
                }
            } 
            return view('countries', ['countries' => $arr]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}
