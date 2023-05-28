<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_auth.css">
</head>

<body>
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
    <p class="enter">Вход в систему</p>
    <form class="login" method="POST" action="{{ route('user.login') }}">
        @csrf
        <div class="form__auth">
            <label for="login" class="label__data">Логин</label>
            <input class="login__input" type="text" value="" id="login" name="login" placeholder="Введите ваш логин">
            @error('login')
            <div class="message">{{$message}}</div>
            @enderror
        </div>
        <div class="form__auth">
            <label for="password" class="label__data">Пароль</label>
            <input class="login__input" type="password" value="" id="password" name="password" placeholder="Введите ваш пароль">
            @error('password')
            <div class="message">{{$message}}</div>
            @enderror
        </div>
        <div class="form__auth">
            <button class="form__button" type="submit" value="1" name="sendAuth">Войти</button>
        </div>
    </form>

    <div class="extra">
        <p class="description">Еще нет личного кабинета?</p>
        <a href="/registration"><button class="form__button reg__button">Зарегистрироваться</button></a>
    </div>
    <footer>

    </footer>
</body>
