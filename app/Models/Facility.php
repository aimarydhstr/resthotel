<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Feature;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    public function feature(){
    	return $this->hasMany(Feature::class);
    }
}
