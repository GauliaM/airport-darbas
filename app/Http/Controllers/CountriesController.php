<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function create(Request $request){ 
        $request->validate([
            'name'  => 'required|min:4|max:25',
            'ISO'   => 'required|min:3|max:3'
        ]);

        $country = Countries::create([
            'name'  => $request->name,
            'ISO'   => $request->ISO
        ]);

        $country->save();

        return redirect('/countries');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'  => 'required|min:4|max:25',
            'ISO'   => 'required|min:3|max:3'
        ]);

        $country = Countries::find($id);
        $country->name  = $request->name;   
        $country->ISO   = $request->ISO;

        $country->save();

        return redirect('/countries');
    }
    
    public function delete($id){
        $country = Countries::find($id);

        $country->delete();

        return redirect('/countries');
    }
}
