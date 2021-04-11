<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facility;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'facility_id', 'status'];

    public function facility(){
    	return $this->belongsTo(Facility::class);
    }
}
