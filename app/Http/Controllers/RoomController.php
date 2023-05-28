<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    function rooms(){
        $standart = RoomCategory::where('id',1)->first();
        $family = RoomCategory::where('id',2)->first();
        $econom = RoomCategory::where('id',3)->first();
        $luxe = RoomCategory::where('id',4)->first();
        $separate = RoomCategory::where('id',5)->first();
        $rooms = [];
        array_push($rooms, $standart, $family, $econom, $luxe, $separate);
        return view('rooms', compact('rooms'));
    }
}
