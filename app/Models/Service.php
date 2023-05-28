<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'id_service', 'id');
    }
}
