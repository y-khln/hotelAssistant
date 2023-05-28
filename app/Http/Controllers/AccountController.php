<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $reservations=\App\Models\Reservation::where("id_user", auth()->user()->id)->get();
        $purchases = [];
        foreach ($reservations as $res){
            $p=\App\Models\Purchase::where("id_reservation", $res->id)->get();
            foreach ($p as $pp) {
                array_push($purchases, [$pp,$res->id]);
            }

        }
//        dd($purchases);
//        dd($reservations);
        return view('account',compact('reservations','purchases'));
    }

    public function updateUser(Request $request, int $id){
        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->patronymic = $request->patronymic;
        $user->date_of_birth = $request->date_of_birth;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->passport_series = $request->passport_series;
        $user->passport_id = $request->passport_id;
        $user -> save();
        $reservations = \App\Models\Reservation::where("id_user", auth()->user()->id);
        return redirect()->route('user.account',compact('reservations'));
        //return redirect()->route('user.account')->with('Successful update');
    }

}
