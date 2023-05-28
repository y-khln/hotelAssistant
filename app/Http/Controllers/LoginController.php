<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        //уже войдено
        if(Auth::check()){
            $reservations = \App\Models\Reservation::where("id_user", auth()->user()->id);
            return redirect()->route('user.account',compact('reservations'));
        }

        $formFields = $request->only(['login','password']);

        //только заходим
        if(Auth::attempt($formFields)){
            $reservations = \App\Models\Reservation::where("id_user", auth()->user()->id);
            return redirect()->route('user.account',compact('reservations'));
        }
        return redirect(route('user.login'))->withErrors([
            'login' => 'Не удалось авторизоваться'
        ]);
    }

    public function booking_login(Request $request){
        //уже войдено
        if(Auth::check()){
            $login=auth()->user()->login;
            $name=auth()->user()->name;
            $surname=auth()->user()->surname;
            $patronymic=auth()->user()->patronymic;
            $date_of_birth=auth()->user()->date_of_birth;
            $phone=auth()->user()->phone;
            $email=auth()->user()->email;
            $passport_id=auth()->user()->passport_id;
            $passport_series=auth()->user()->passport_series;
            $category = $request->category;
            $persons = $request->persons;
            $children = $request->children;
            $date_in = $request->date_in;
            $date_out = $request->date_out;
            $valid_rooms = $request->valid_rooms;

            $valid = explode(",",$valid_rooms);
            $roomCategId = RoomCategory::where('title',$category)->pluck('id');
            $rooms = Room::where('id_category',$roomCategId)->pluck('id');
            $availableRooms = array_intersect($valid,$rooms->toArray());
            $id_room=array_shift($availableRooms);
            $service = Service::all();

            return view('booking_pay', compact('login','service','id_room','valid_rooms','persons','children','date_in','date_out','category','name','surname','patronymic','date_of_birth','phone','email','passport_id','passport_series'));
        }

        $formFields = $request->only(['login','password']);

        //только заходим

        if(Auth::attempt($formFields)){
            $login=auth()->user()->login;
            $name=auth()->user()->name;
            $surname=auth()->user()->surname;
            $patronymic=auth()->user()->patronymic;
            $date_of_birth=auth()->user()->date_of_birth;
            $phone=auth()->user()->phone;
            $email=auth()->user()->email;
            $passport_id=auth()->user()->passport_id;
            $passport_series=auth()->user()->passport_series;
            $category = $request->category;
            $persons = $request->persons;
            $children = $request->children;
            $date_in = $request->date_in;
            $date_out = $request->date_out;
            $valid_rooms = $request->valid_rooms;

            $valid = explode(",",$valid_rooms);
            $roomCategId = RoomCategory::where('title',$category)->pluck('id');
            $rooms = Room::where('id_category',$roomCategId)->pluck('id');
            $availableRooms = array_intersect($valid,$rooms->toArray());
            $id_room=array_shift($availableRooms);
            $service = Service::all();
            return view('booking_pay', compact('login','service','id_room','valid_rooms','persons','children','date_in','date_out','category','name','surname','patronymic','date_of_birth','phone','email','passport_id','passport_series'));
        }
        $category = $request->category;
        $persons = $request->persons;
        $children = $request->children;
        $date_in = $request->date_in;
        $date_out = $request->date_out;
        $valid_rooms = $request->valid_rooms;

        $valid = explode(",",$valid_rooms);
        $roomCategId = RoomCategory::where('title',$category)->pluck('id');
        $rooms = Room::where('id_category',$roomCategId)->pluck('id');
        $availableRooms = array_intersect($valid,$rooms->toArray());
        $id_room=array_shift($availableRooms);
//        dd($request->valid_rooms);
        return view('booking_login',compact('persons','id_room','valid_rooms','children','date_in','date_out','category'))->withErrors([
            'login' => 'Не удалось авторизоваться'
        ]);
    }
    public function booking_login_page(Request $request)
    {
        $category = $request->category;
        $persons = $request->persons;
        $children = $request->children;
        $date_in = $request->date_in;
        $date_out = $request->date_out;
        $valid_rooms = $request->valid_rooms;

        return view('booking_login',compact('persons','valid_rooms','children','date_in','date_out','category'));
    }
    public function booking_pre_complete(Request $request){
        $login=$request->login;
        $fullPrice = $request->fullPrice;
        $roomPrice = $request->roomPrice;
        $name=$request->name;
        $surname=$request->surname;
        $patronymic=$request->patronymic;
        $date_of_birth=$request->date_of_birth;
        $phone=$request->phone;
        $email=$request->email;
        $passport_id=$request->passport_id;
        $passport_series=$request->passport_series;
        $id_room=$request->id_room;
        $category = $request->category;
        $persons = $request->persons;
        $children = $request->children;
        $date_in = $request->date_in;
        $date_out = $request->date_out;
        $valid_rooms = $request->valid_rooms;

        return view('booking_finish', compact('login','fullPrice','roomPrice','id_room','valid_rooms','persons','children','date_in','date_out','category','name','surname','patronymic','date_of_birth','phone','email','passport_id','passport_series'));
    }
}
