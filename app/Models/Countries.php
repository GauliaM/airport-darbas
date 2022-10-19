<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = ['name', 'ISO', 'created_at', 'updated_at'];

    public function airlines(){
        return $this->hasMany(Airlines::class, 'countries_id');
    }

    public function airports(){
        return $this->hasMany(Airports::class);
    }
}
