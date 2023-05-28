<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_booking.css">
    <link rel="stylesheet" href="../css/style_auth.css">
</head>

<body>
<!-- шапка верхняя -->
<div class="head">
    <p class="head__logo"><a href="/">Гостиница</a></p>
    <div class="head__navigation">
        <a class="head__elem" href="/about">О нас</a>
        <a class="head__elem" href="/services">Наши услуги</a>
        <a class="head__elem" href="/rooms">Номера</a>
        <a class="head__elem" href="/contacts">Контакты</a>
        <a class="head__elem" href="/entertainment">Развлечения</a>
        <a class="head__elem" href="/account">Личный кабинет</a>
    </div>
    <a href="/booking"><button class="head__book" >Забронировать</button></a>
</div>
<p class="enter">Оплата</p>


<div >
    <div class="popup__container">
        <form class="popup__body" method="POST" action="{{ route('booking_pre_complete') }}">
            @csrf
            <p>Произведение оплаты</p>
            <p>Оплата номера: {{$p =\App\Models\RoomCategory::where('title',$category)->pluck('price_per_night')->first()}} руб. * {{$d = floor(strtotime($date_out)-strtotime($date_in))/(60*60*24)}} дня  => <span id="summa">{{$p*$d}}</span> рублей</p>
            <p>Добавить дополнительные услуги: </p>
            <div class="cont">
                @foreach($service as $s)
                <div class="cont__block">
                    <span class="cont__span" id="cont__service">{{$s->title}}</span>
                    <div class="cont__main">
                        <span class="cont__span" id="cont__price">{{$s->price}}</span>
                        <div class="cont__buttons">
                            <button class="cont__button" type="button" id="minus">-</button>
                            <span id="count">0</span>
                            <button class="cont__button" type="button" id="plus">+</button>
                            <div class="fixed"><span id="count__f"></span></div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <p>Итого: <span id="full"></span> руб.</p>



            <button type="submit" class="block__book">Оплатить</button>
            <input type="hidden" id="fullPrice" value="" name="fullPrice">
            <input type="hidden" id="roomPrice" value="" name="roomPrice">
            <input type="hidden" value="{{$login}}" name="login">
            <input type="hidden" value="{{$surname}}" name="surname">
            <input type="hidden" value="{{$name}}" name="name">
            <input type="hidden" value="{{$patronymic}}" name="patronymic">
            <input type="hidden" value="{{$date_of_birth}}" name="date_of_birth">
            <input type="hidden" value="{{$phone}}" name="phone">
            <input type="hidden" value="{{$email}}" name="email">
            <input type="hidden" value="{{$passport_series}}" name="passport_series">
            <input type="hidden" value="{{$passport_id}}" name="passport_id">


            <input type="hidden" value="{{$date_in}}" name="date_in">
            <input type="hidden" value="{{$date_out}}" name="date_out">
            <input type="hidden" value="{{$persons}}" name="persons">
            <input type="hidden" value="{{$children}}" name="children">
            <input type="hidden" value="{{$category}}" name="category">
            <input type="hidden" value="{{$id_room}}" name="id_room">
            <input type="hidden" value="{{$valid_rooms}}" name="valid_rooms">
            <input type="hidden" value="{{0}}" name="booking_registration">

        </form>
    </div>
</div>
<footer></footer>
</body>
</html>

<script src="../js/scripts/script_booking_pay.js"></script>
