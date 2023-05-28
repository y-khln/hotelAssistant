<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_general.css">
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
    <button class="head__book" href="/booking">Забронировать</button>
</div>
<p>{{$persons}}</p>
<body>
<p class="enter">Зарегистрироваться</p>
<p class="description">Для регистрации вам необходимо придумать уникальный логин и пароль для входа в личный кабинет, а также указать свои персональные данные </p>
<form class="registration" method="POST" action="{{ route('booking_finish') }}">
    @csrf
    <div class="registration__auth form__auth">
        <label for="login" class="label__data">Логин</label>
        <input type="text" value="" id="login" name="login" placeholder="Введите ваш логин">
        @error('login')
        <div class="message">{{$message}}</div>
        @enderror
    </div>
    <div class="registration__auth form__auth">
        <label for="password" class="label__data">Пароль</label>
        <input type="password" value="" id="password" name="password" placeholder="Введите ваш пароль">
        @error('password')
        <div class="message">{{$message}}</div>
        @enderror
    </div>
    <div class="registration__data">
{{--        <p>Прикрепите скан первой страницы паспорта. Необходимые поля заполнятся автоматически</p>--}}
{{--        <input type="file" value="" id="passport_photo">--}}
        <label for="surname" class="label__data">Фамилия</label>
        <input type="text" pattern="^[А-Яа-яЁё\s]+$" value="" id="surname" name="surname" placeholder="Иванов" required>
        <label for="name" class="label__data">Имя</label>
        <input type="text" pattern="^[А-Яа-яЁё\s]+$" value="" id="name" name="name" placeholder="Иван" required>
        <label for="patronymic" class="label__data">Отчество</label>
        <input type="text" pattern="^[А-Яа-яЁё\s]+$" value="" id="patronymic" name="patronymic" placeholder="Иванович">
        <label for="date_of_birth" class="label__data">Дата рождения</label>
        <input type="date" value="" id="date_of_birth" name="date_of_birth" required>
        <label for="email" class="label__data">Электронная почта</label>
        <input type="email" value="" id="email" name="email" placeholder="email@mail.ru" required>
        <label for="phone" class="label__data">Контактный телефон</label>
        <input type="text" value="" id="phone" name="phone" placeholder="89000000000" required>
    </div>
    <div class="registration__data passport">
        <p>Для возможности оформления бронирования, заполните, пожалуйста, данные ваших документов</p>
        <label for="passport_series" class="label__data">Серия паспорта</label>
        <input type="text" pattern="[0-9]{4}" value="" id="passport_series" name="passport_series" placeholder="0000" required>
        <label for="passport_id" class="label__data">Номер паспорта</label>
        <input type="text" pattern="[0-9]{6}" value="" id="passport_id" name="passport_id" placeholder="000000" required>
    </div>
    <div class="registration__permission">
        <span>Я даю разрешение на обработку своих персональных данных</span>
        <input type="checkbox" id="permission" name="permission" required>
    </div>
    <div class="registration__auth">
        <button class="registration__button form__button" type="submit" value="1" name="sendAuth">Регистрация</button>
    </div>

    <input type="hidden" value="{{$children}}" name="children">
    <input type="hidden" value="{{$date_in}}" name="date_in">
    <input type="hidden" value="{{$date_out}}" name="date_out">
    <input type="hidden" value="{{$persons}}" name="persons">
    <input type="hidden" value="{{$category}}" name="category">
    <input type="hidden" value="{{$valid_rooms}}" name="valid_rooms">

    <input type="hidden" name="booking_registration" value={{1}}>

</form>

<form class="extra" method="POST" action="{{route('booking_login_page') }}">
    @csrf
    <p class="description">Уже зарегистрированы?</p>


{{--    <a href="/booking_login_get">--}}
    <button class="extra form__button reg__button" type="submit">Войти</button>
    <input type="hidden" value="{{$children}}" name="children">
    <input type="hidden" value="{{$date_in}}" name="date_in">
    <input type="hidden" value="{{$date_out}}" name="date_out">
    <input type="hidden" value="{{$persons}}" name="persons">
    <input type="hidden" value="{{$category}}" name="category">
    <input type="hidden" value="{{$valid_rooms}}" name="valid_rooms">

{{--    </a>--}}
</form>
<footer>

</footer>
</body>
