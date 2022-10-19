<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airports extends Model
 {
    use HasFactory;

    protected $table = 'airports';

    protected $fillable = ['name', 'countries_id', 'coords', 'airlines_id', 'created_at', 'updated_at'];


    public function country(){
        return $this->belongsTo(Countries::class, 'countries_id');
    }

    public function airline(){
        return $this->belongsTo(Airlines::class, 'airlines_id');
    }
 }
