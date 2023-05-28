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
<p class="enter">Завершение бронирования</p>


<div >
    <div class="popup__container">
        <form class="popup__body" method="POST" action="{{ route('booking_complete') }}">
            @csrf
            <p class="popup__header">Бронирование номера</p>
            <p>Пожалуйста, проверьте правильность выбранных вами параметров.</p>
            <p>Гостей:
                @if($persons==1) 1 взрослый @endif
                @if($persons>1) {{$persons}} взрослых @endif
            </p>
            <p>Дети:
                @if($children==0) без детей
                @endif
                @if($children==1) 1 ребенок @endif
                @if($children!=0 && $children!=1){{$children}} детей
                @endif
            </p>
            <p>Дата заезда: {{$date_in}}</p>
            <p>Дата выезда: {{$date_out}}</p>
            <p>Категория номера "{{$category}}"</p>
            <p>Идентификатор номера: {{$id_room}} </p>
            <br>
            <p>Фамилия: {{$surname}}</p>
            <p>Имя: {{$name}}</p>
            <p>Отчество: {{$patronymic}}</p>
            <p>Дата рождения: {{$date_of_birth}}</p>
            <p>Контактный номер: {{$phone}}</p>
            <p>Электронная почта: {{$email}}</p>
{{--            <p>Серия паспорта: {{$passport_series}}</p>--}}
{{--            <p>Номер паспорта: {{$passport_id}}</p>--}}
            <br>
            <p>Cтоимость проживания: {{$roomPrice}} руб.</p>
            <p>Общая стоиомсть: {{$fullPrice}} руб.</p>


            <button type="submit" class="block__book">Все верно</button>


            <input type="hidden" value="{{$date_in}}" name="date_in">
            <input type="hidden" value="{{$date_out}}" name="date_out">
            <input type="hidden" value="{{$persons}}" name="persons">
            <input type="hidden" value="{{$children}}" name="children">
            <input type="hidden" value="{{$category}}" name="category">
            <input type="hidden" value="{{$valid_rooms}}" name="valid_rooms">
        </form>
    </div>
</div>

</body>
