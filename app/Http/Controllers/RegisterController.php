<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request)
    {
        $booking_registration=$request->booking_registration;
        if(Auth::check()&&$booking_registration!=1){
            $login=$request->login;
            return redirect()->to(route('user.account',compact('login')));
        }

        $user = new User();

        $user->login=$request->login;
        $user->password=$request->password;
        $user->name=$request->name;
        $user->surname=$request->surname;
        $user->patronymic=$request->patronymic;
        $user->date_of_birth=$request->date_of_birth;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->passport_id=$request->passport_id;
        $user->passport_series=$request->passport_series;

        $name=$request->name;
        $surname=$request->surname;
        $patronymic=$request->patronymic;
        $date_of_birth=$request->date_of_birth;
        $phone=$request->phone;
        $email=$request->email;
        $passport_id=$request->passport_id;
        $passport_series=$request->passport_series;
        $category = $request->category;
        $persons = $request->persons;
        $children = $request->children;
        $date_in = $request->date_in;
        $date_out = $request->date_out;

        if(User::where('login',$user->login)->exists() && $booking_registration==0){
            return redirect()->to(route('user.registration'))->withErrors([
                'login' => 'Пользователь с таким логином уже зарегистрирован'
            ]);
        }
        if(User::where('login',$user->login)->exists() && $booking_registration==1){
            return redirect()->to(route('booking_auth',compact('persons','children','date_in','date_out','category')))->withErrors([
                'login' => 'Пользователь с таким логином уже зарегистрирован'
            ]);
        }

        $user -> save();



        if($booking_registration==1){
            Auth::login($user);
            $login=$request->login;
            $valid_rooms = $request->valid_rooms;

            $valid = explode(",",$valid_rooms);
            $roomCategId = RoomCategory::where('title',$category)->pluck('id');
            $rooms = Room::where('id_category',$roomCategId)->pluck('id');
            $availableRooms = array_intersect($valid,$rooms->toArray());
            $id_room=array_shift($availableRooms);
            $service = Service::all();
            return view('booking_pay', compact('login','service','valid_rooms','id_room','persons','children','date_in','date_out','category','name','surname','patronymic','date_of_birth','phone','email','passport_id','passport_series'));
        }
        if($booking_registration==0){
            Auth::login($user);
            $login=$user->login;
            $reservations=null;
            $purchases=[];
            $valid_rooms = $request->valid_rooms;
            return view('account', compact('login', 'reservations','purchases'));
        }
        return redirect()->to(route('user.login'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);
    }
}
