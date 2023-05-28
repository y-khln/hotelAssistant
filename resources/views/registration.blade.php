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
        <a href="/booking"><button class="head__book" >Забронировать</button></a>
    </div>
    <p class="enter">Зарегистрироваться</p>
    <p class="description">Для регистрации вам необходимо придумать уникальный логин и пароль для входа в личный кабинет, а также указать свои персональные данные. </p>
    <form class="registration" method="POST" action="{{ route('user.registration') }}">
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
            <label for="surname" class="label__data">Фамилия</label>
            <input type="text" pattern="^[А-Яа-яЁё\s]+$" value="" id="surname" name="surname" placeholder="Иванов" required>
            <label for="name" class="label__data">Имя</label>
            <input type="text" pattern="^[А-Яа-яЁё\s]+$" value="" id="name" name="name" placeholder="Иван" required>
            <label for="patronymic" class="label__data">Отчество</label>
            <input type="text" pattern="^[А-Яа-яЁё\s]+$" value="" id="patronymic" name="patronymic" placeholder="Иванович">
            <label for="date_of_birth" class="label__data">Дата рождения (для регистрации вам должно быть более 18 лет)</label>
            <input type="date" max="2005-05-18" id="date_of_birth" name="date_of_birth" required>
            <label for="email" class="label__data">Электронная почта</label>
            <input type="email" value="" id="email" name="email" placeholder="email@mail.ru" required>
            <label for="phone" class="label__data">Контактный телефон</label>
            <input type="tel" value="" id="phone" name="phone" placeholder="89000000000" required>
        </div>
        <div class="registration__data passport">
            <p>Для оформления бронирования, заполните, пожалуйста, данные ваших документов</p>
            <label for="passport_series" class="label__data">Серия паспорта</label>
            <input type="text" pattern="[0-9]{4}" value="" id="passport_series" name="passport_series" placeholder="0000" required>
            <label for="passport_id" class="label__data">Номер паспорта</label>
            <input type="text" pattern="[0-9]{6}" value="" id="passport_id" name="passport_id" placeholder="000000" required>
        </div>
        <div class="registration__permission">
            <span>Я даю разрешение на обработку своих персональных данных</span>
            <input type="checkbox" id="permission" name="permission" required>
        </div>

        <input type="hidden" name="booking_registration" value="0">

        <div class="registration__auth">
            <button class="registration__button form__button" type="submit" value="1" name="sendAuth">Регистрация</button>
        </div>
    </form>
    <footer>

    </footer>
</body>
