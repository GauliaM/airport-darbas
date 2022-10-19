<?php

namespace App\Http\Controllers;

use App\Models\Airlines;
use Illuminate\Database\Events\ModelsPruned;
use Illuminate\Http\Request;

class AirlinesController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'name' => 'required|min:3|max:40',
            'countries_id' => 'required'
        ]);

        $airline = Airlines::create([
            'name' => $request->name,
            'countries_id' => $request->countries_id
        ]);
        
        $airline->save();

        return redirect('/airlines');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:3|max:40',
            'countries_id' => 'required'
        ]);

        $airline = Airlines::find($id);

        $airline->name          = $request->name;
        $airline->countries_id  = $request->countries_id;

        $airline->save();

        return redirect('/airlines');
    }

    public function delete($id){
        $airline = Airlines::find($id);

        $airline->delete();

        return redirect('/airlines');
    }
}
