<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_booking.css">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_account.css">
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

    <div class="container">
        <p class="container__hello">Здравствуйте, {{auth()->user()->name}}</p>

    </div>

    <div class="sections">
        <p class="sections__title">Личный кабинет</p>
        <button id="sections__personal" class="sections__personal sections__child">Ваши данные</button>
        <button id="sections__history" class="sections__history sections__child">История бронирований</button>
        <button id="sections__service" class="sections__service sections__child">История покупок</button>
        <button class="admin__back"><a href="/logout">Выйти из учетной записи</a></button>
    </div>
    <div class="main">
        <div class="main__content personal" id="personal">
            <p class="main__p">Фамилия: <span class="main__span">{{auth()->user()->surname}}</span></p>
            <p class="main__p">Имя: <span class="main__span">{{auth()->user()->name}}</span></p>
            <p class="main__p">Отчество: <span class="main__span">{{auth()->user()->patronymic}}</span></p>
            <p class="main__p">Дата рождения: <span class="main__span">{{auth()->user()->date_of_birth}}</span></p>
            <p class="main__p">Контактный телефон: <span class="main__span">{{auth()->user()->phone}}</span></p>
            <p class="main__p">Электронная почта: <span class="main__span">{{auth()->user()->email}}</span></p>
            <p class="main__p">Серия паспорта: <span class="main__span">{{auth()->user()->passport_series}}</span></p>
            <p class="main__p">Номер паспорта: <span class="main__span">{{auth()->user()->passport_id}}</span></p>
            <button class="search__button main__button" id="main__button">Редактировать</button>
        </div>

        <form class="main__content registration" id="registration" action="{{route('account_update',auth()->user()->id)}}" method="post">
            @csrf
            @method('PUT')
            <p class="main__p">РЕДАКТИРОВАНИЕ ДАННЫХ</p>
            <span class="main__span">Заполните поля, которые необходимо изменить</span>
            <p class="main__p">Фамилия: <span class="main__span"></span></p>
            <input type="text" pattern="^[А-Яа-яЁё\s]+$" value="{{auth()->user()->surname}}" id="surname" name="surname" placeholder="" required>
            <p class="main__p">Имя: <span class="main__span"></span></p>
            <input type="text" pattern="^[А-Яа-яЁё\s]+$" value="{{auth()->user()->name}}" id="name" name="name" placeholder="Введите имя" required>
            <p class="main__p">Отчество: <span class="main__span"></span></p>
            <input type="text" pattern="^[А-Яа-яЁё\s]+$" value="{{auth()->user()->patronymic}}" id="patronymic" name="patronymic" placeholder="Введите отчество">
            <p class="main__p">Дата рождения: <span class="main__span"></span></p>
            <input type="date" max="2005-05-18" value="{{auth()->user()->date_of_birth}}" id="date_of_birth" name="date_of_birth" required>
            <p class="main__p">Контактный телефон: <span class="main__span"></span></p>
            <input type="text" value="{{auth()->user()->phone}}" id="phone" name="phone" placeholder="Введите телефон" required>
            <p class="main__p">Электронная почта: <span class="main__span"></span></p>
            <input type="email"  value="{{auth()->user()->email}}" id="email" name="email" placeholder="Введите электронную почту" required>

{{--            <p class="main__p">Вы можете ввести данные вашего паспорта вручную или прикрепить четкое изображение разворота ниже.</p>--}}
            <p class="main__p">Серия паспорта: <span class="main__span"></span></p>
            <input type="text" required pattern="[0-9]{4}" value="{{auth()->user()->passport_series}}" id="passport_series" name="passport_series" placeholder="Введите серию вашего паспорта">
            <p class="main__p">Номер паспорта: <span class="main__span"></span></p>
            <input type="text" required pattern="[0-9]{6}" value="{{auth()->user()->passport_id}}" id="passport_id" name="passport_id" placeholder="Введите номер вашего паспорта">
            <button class="search__button main__button" id="confirm__button">Подтвердить</button>
        </form>
        <div class="main__content history" id="history">
            <p class="main__p">История ваших бронирований</p>
            @if($reservations!=null)
                @foreach($reservations as $r)
                    <div class="history__block">
                        <p class="">Идентификатор бронирования: <span>{{$r->id}}</span></p>
                        <p class="history__room">Номер: <span>{{$r->id_room}}</span></p>
                        <p class="history__room">Дата заезда: <span>{{$r->check_in_date}}</span></p>
                        <p class="history__room">Дата выезда: <span>{{$r->check_out_date}}</span></p>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="main__content service" id="service">
            <p class="main__p">История ваших покупок в сети гостиницы</p>
            @if($purchases!=[])
                @foreach($purchases as $s)
                    <div class="history__block">
{{--                        <p class="">Идентификатор бронирования: {{$s[1]}}</p>--}}
                        <p class="">Идентификатор чека: {{$s[0]->id}}</p>
                        <p class="">Услуга: {{\App\Models\Service::where('id',$s[0]->id_service)->first()->title}}</p>
                        <p class="">Стоимость: {{\App\Models\Service::where('id',$s[0]->id_service)->first()->price}} рублей</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


</body>
<script src="../js/scripts/script_account.js"></script>
