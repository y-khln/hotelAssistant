<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function services(){
        $services = Service::all();
        return view('services', compact('services'));
    }
}
