<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index(){
        return view('index');
    }
    public function about(){
        return view('about');
    }
    public function contacts(){
        return view('contacts');
    }
    public function booking(){
        $valid_categories = 1;
        return view('booking', compact('valid_categories'));
    }
    public function econom(){
        return view('room_econom');
    }
    public function family(){
        return view('room_family');
    }
    public function luxe(){
        return view('room_luxe');
    }
    public function separate(){
        return view('room_separate');
    }
    public function standart(){
        return view('room_standart');
    }

    public function entertainment(){
        $q1=null;

        return view('entertainment', compact('q1'));
    }

    public function findEvents(Request $request){
//        $gen = $request->gender;
//        $q1 = $request->question_1;
//        $q2 = $request->question_2;
//        $q3 = $request->question_3;
//        $q4 = $request->question_4;
//        $q5 = $request->question_5;
//        $q6 = $request->question_6;
//        $q7 = $request->question_7;
//        $q8 = $request->question_8;
//        compact('gen','q1','q2','q3','q4','q5','q6','q7','q8')
        return view('entertainment');
    }
}
