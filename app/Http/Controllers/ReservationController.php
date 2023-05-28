<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomCategory;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    function showRooms(Request $request){
        $persons = $request->person_count;
        $children = $request->children_count;
        $date_in = $request->date_in;
        $date_out = $request->date_out;
//        print_r($date_in);
        $interval = new DateInterval('P1D');
        $standart = Room::where('id_category',1)->get();
        $family = Room::where('id_category',2)->get();
        $econom = Room::where('id_category',3)->get();
        $luxe = Room::where('id_category',4)->get();
        $separate = Room::where('id_category',5)->get();

        $date_start= new DateTime($date_in);
        $date_end= new DateTime($date_out);
        $period2 = new DatePeriod($date_start, $interval, $date_end, DatePeriod::EXCLUDE_START_DATE);
        $array_dates = array_map(
            function($item){return $item->format('Y-m-d');},
            iterator_to_array($period2)
        );
        $rooms = [];
        $vc = [];
        $vr = [];

        array_push($rooms, $standart, $family, $econom, $luxe, $separate);
        //для каждой массива по категории
        foreach($rooms as $categ){
            //для каждого номера проверяем резервации
            foreach($categ as $room){
                //делаем массив всех резерваций по каждому номеру
                $reserv = Reservation::where('id_room',$room->id)->get();
                if(count($reserv)==0) continue;
                //НАДО ЛИ НАМ ЭТО???
                $dates_in = []; //свободно до обеда
                $dates_out = []; //свободно после обеда
                $reserved =[]; //занято полностью
                foreach($reserv as $res){
//                    echo "<br>";
//                    echo $room;
//                    echo "<br>";
                    $start= new DateTime($res->check_in_date);
                    array_push($dates_in, $start);
                    $end = new DateTime(strval($res->check_out_date));
                    array_push($dates_out, $end);
                    $periods = new DatePeriod($start, $interval, $end, DatePeriod::EXCLUDE_START_DATE);
                    //без последних их первых дней  ДОБАВЛЯЕМ В "ЗАБРОНЕНО"
                    foreach ($periods as $period) {
                        array_push($reserved, $period->format('Y-m-d'));
//                        print_r($period->format('Y-m-d')) ;
                    }
                }
                $flag = 0;
                for($i=0;$i<count($array_dates);$i++){
                    if (in_array($array_dates[$i], $reserved)) { $flag=1;
//                        echo 'reserv',$array_dates[$i];
                        break;}
                }
                if($flag==0){
                    if (in_array($date_in, $reserved)) { $flag=2;
//                        echo 'problem start';
                    }
                    if (in_array($date_out, $reserved)) { $flag=2;
//                        echo 'problem end';
                    }
                }
                if($flag==0){
                    array_push($vr, $room->id);
                    if(!in_array($room->id_category, $vc)){
                        array_push($vc, $room->id_category);
                    }
//                    echo 'cool';
                }
//                echo $room->id;
//                echo $room->id_category;
            }
        }
        $valid_categories = $vc;
        $valid_rooms = $vr;
//        implode(",",$vr);
        //dd($valid_rooms);
        return view('booking', compact('valid_categories','valid_rooms','persons', 'children', 'date_in', 'date_out'));
    }


    function data(Request $request)
    {
        $category = $request->category;
        $persons = $request->persons;
        $children = $request->children;
        $date_in = $request->date_in;
        $date_out = $request->date_out;
        $valid_rooms = $request->valid_rooms;

        return view('booking_auth',compact('persons','valid_rooms','children','date_in','date_out','category'));
    }

    function bookingPay(Request $request)
    {
        $login = $request->login;
        $persons = $request->persons;
        $children = $request->children;
        $date_in = $request->date_in;
        $date_out = $request->date_out;
        $category = $request->category;
        $valid_rooms = $request->valid_rooms;
        $id_room=$request->id_room;
        $surname = $request->surname;
        $patronymic = $request->patronymic;
        $name = $request->name;
        $date_of_birth = $request->date_of_birth;
        $phone = $request->phone;
        $passport_id = $request->passport_id;
        $passport_series = $request->passport_series;
        $email = $request->email;
        return view('booking_pay', compact('login','id_room','valid_rooms','persons','children','date_in','date_out','category','name','surname','patronymic','date_of_birth','phone','email','passport_id','passport_series'));
    }



    function bookingComplete(Request $request){
        $reservation = new Reservation();

        $reservation->id_user = auth()->user()->id;

        //какой айди брать?
        //подходящие номера со всех категорий
        $valid = explode(",",$request->valid_rooms);
        $roomCategId = RoomCategory::where('title',$request->category)->pluck('id');
        $rooms = Room::where('id_category',$roomCategId)->pluck('id');
        $availableRooms = array_intersect($valid,$rooms->toArray());
        $reservation->id_room=array_shift($availableRooms);
        $reservation->check_in_date=$request->date_in;
        $reservation->check_out_date=$request->date_out;
        $reservation->persons=$request->persons;
        $reservation->children=$request->children;

        $reservation -> save();
        if($reservation){
            return view('booking_complete');
        }
    }
}
