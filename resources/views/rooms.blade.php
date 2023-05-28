<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style_rooms.css">
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
            <p class="container__header">Наши <span class="why__orange-header">Номера</span></p>
            @foreach($rooms as $categ)
            <form class="container__room block" >
                <img class="block__img" id="block__img">
                <div class="block__text">
                    <p class="block__title" id="block__title">Номер класса "{{$categ->title}}"</p>
                    <p class="block__description">{{$categ->general}}</p>
                    <p class="block__price">{{$categ->price_per_night}} руб./сутки</p>
                    <button class="block__book" id="more">Подробнее</button>
                </div>
            </form>
            @endforeach
        </div>

        <footer>
        </footer>
    </body>
</html>

<script src="../js/scripts/script_rooms.js"></script>
