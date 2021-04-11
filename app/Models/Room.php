<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'price', 'image', 'quantity', 'type', 'class'];

    public function booking(){
    	return $this->hasMany(Booking::class);
    }
}
