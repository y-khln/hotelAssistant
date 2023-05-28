<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style_booking.css">
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
                <a class="head__elem" href="/account">Личный кабинет</a>
            </div>
            <a href="/booking"><button class="head__book" >Забронировать</button></a>
        </div>

        <div class="background">
            <div class="container">
                <p class="container__header">Бронирование номера</p>
                <form class="container__search search" action="{{route('schedule.get')}}" method="post">
                    <div class=search__top>
                        <select class="search__persons">
                            <option class="search__person" value="1">1 чел.</option>
                            <option class="search__person" value="2">2 чел.</option>
                            <option class="search__person" value="3">3 чел.</option>
                            <option class="search__person" value="4">4 чел.</option>
                        </select>
                        <select class="search__children">
                            <option class="search__child" value="0">без детей</option>
                            <option class="search__child" value="1">1 чел.</option>
                            <option class="search__child" value="2">2 чел.</option>
                            <option class="search__child" value="3">3 чел.</option>
                        </select>
                        <div class="search__block">
                            <p class="search__p">Заезд</p>
                            <input type="date" value="2023-02-15" class="search__date" id="in">
                        </div>
                        <div class="search__block">
                            <p class="search__p">Выезд</p>
                            <input type="date" value="2023-02-15" class="search__date" id="out">
                        </div>
                        <button type="submit" class="search__button">Подобрать</button>
                    </div>
                    <div class="search__bottom">
                        <div class="search__bottom-block block1">
                            <input id="work" name="purpose" type="radio" value="1" checked class="search__aim">
                            <label class="search__aim-p" for="work">работа</label>
                        </div>
                        <div class="search__bottom-block block2">
                            <input id="vacation" type="radio" name="purpose" value="2" class="search__aim">
                            <label class="search__aim-p" for="vacation">отдых</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="results">
            <p class="container__header results__header">Вот что мы можем вам предложить: </p>





            <div class="block">
                <img src="./img/img_rooms/standart/03a6b8613c70b144abd844ab418b4e48.jpg" class="block__img">
                <div class="block__text">
                    <p class="block__title">Номер класса "Стандарт"</p>
                    <p class="block__description">Комфортабельный номер на 2 персоны, 1 кровать king size</p>
                    <p class="block__price">4000/сутки</p>
                    <div class="block__buttons">
                        <button class="block__book" id="more">Подробнее</button>
                        <button class="block__book" id="book" name="book">Забронировать</button>
                    </div>
                </div>
            </div>
            <div class="block">
                <img src="./img/img_rooms/standart/03a6b8613c70b144abd844ab418b4e48.jpg" class="block__img">
                <div class="block__text">
                    <p class="block__title">Номер класса "Стандарт"</p>
                    <p class="block__description">Комфортабельный номер на 2 персоны, 1 кровать king size</p>
                    <p class="block__price">4000/сутки</p>
                    <div class="block__buttons">
                        <button class="block__book" id="more">Подробнее</button>
                        <button class="block__book" id="book" name="book">Забронировать</button>
                    </div>

                </div>
            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>
