<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
//    use HasFactory;
    protected $primaryKey = 'id';
    public function room_category()
    {
        return $this->belongsTo(RoomCategory::class, 'id_category', 'id');
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'id_room', 'id');
    }
}
