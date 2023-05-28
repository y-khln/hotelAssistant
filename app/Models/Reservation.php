<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'id_reservation', 'id');
    }
}
