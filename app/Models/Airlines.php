<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airlines extends Model
{
    use HasFactory;
    
    protected $table = 'airlines';

    protected $fillable = ['name', 'countries_id', 'created_at', 'updated_at'];


    public function country(){
        return $this->belongsTo(Countries::class, 'countries_id');
    }

    public function airports(){
        return $this->hasMany(Airports::class, 'id');
    }
}
