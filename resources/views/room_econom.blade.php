<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style_room.css">
        <link rel="stylesheet" href="../css/style_room_econom.css">
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
            <div class="container__booking">
                <form class="booking">
                    <p class="booking__header">Подобрать номер</p>
                    <div class="booking__date">
                        <div class="booking__date-in">
                            <span class="booking__desc">Заезд</span>
                            <input type="date" name="" value="2023-02-09">
                        </div>
                        <div class="booking__date-out">
                            <span class="booking__desc">Выезд</span>
                            <input type="date" name="" value="2023-02-09">
                        </div>
                    </div>
                    <div class="booking__purpose">
                        <input type="radio" name="purpose" checked class="booking__work" value="1">Работа</input>
                        <input type="radio" name="purpose" class="booking__vacation" value="2">Отдых</input>
                    </div>

                    <div class="booking__persons">
                        <p class="booking__desc">Выберите количество гостей</p>
                        <div class="booking__count">
                            <select class="booking__adults persons">
                                <option class="booking__option" value="1">1 взр.</option>
                                <option class="booking__option" value="2">2 взр.</option>
                            </select>
                            <select class="booking__children persons">
                                <option value="0">без детей</option>
                            </select>
                        </div>
                    </div>

                    <button class="booking__submit" type="booking__submit">НАЙТИ</button>
                </form>
            </div>

            <div class="container__main">
                <div class="container__list">
                    <div class="container__anchor"><a href="#services__section">Удобства и услуги</a></div>
                    <div class="container__anchor"><a href="#services__conditions">Условия размещения</a></div>
                    <div class="container__anchor"><a href="#services__reviews">Отзвывы гостей</a></div>
                </div>
                <p class="container__header">Номер класса "Эконом"</p>
                <div class="container__images images">
                    <div class="images__left">
                        <img src="../img/img_rooms/econom_1.jpg" class="images__1">
                        <img src="../img/img_rooms/econom_33.jpg" class="images__2">
                    </div>
                    <div class="images__right">
                        <img src="../img/img_rooms/econom_2.jpg" class="images__3">
                    </div>
                </div>
            </div>
        </div>

        <div class="container2">
            <p class="container__header" id="services__section">Удобства и услуги</p>
            <div class="container2__services services">
                <div class="services__left" >
                    <div class="services__services">
                        <img src="" class="services__icon">
                        <p class="services__header">Ванная комната</p>
                    </div>
                    <div class="services__services">
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Душ</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Стиральная машина</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Фен</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Туалетная бумага</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Полотенца</span>
                        </div>
                    </div>
                    <div class="services__services">
                        <img src="" class="services__icon">
                        <p class="services__header">Безопасность</p>
                    </div>
                    <div class="services__services">
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Огнетушитель</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Круглосуточная охрана</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Сейф</span>
                        </div>
                    </div>
                </div>
                <div class="services__middle">
                    <div class="services__services">
                        <img src="" class="services__icon">
                        <p class="services__header">Техника</p>
                    </div>
                    <div class="services__services">
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Утюг и гладильная доска</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Кондиционер</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Телевизор</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Мини холодильник</span>
                        </div>
                    </div>
                </div>
                <div class="services__right">
                    <div class="services__services">
                        <img src="" class="services__icon">
                        <p class="services__header">Общие удобства</p>
                    </div>
                    <div class="services__services">
                        <div  class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Ресторан в территории</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Лифт</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Места для курения</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Москитные сетки</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Транспортная доступность</span>
                        </div>
                        <div class="services__service">
                            <img class="services__galka" src="../img/galka.png">
                            <span>Парковка</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container3" id="services__conditions">
            <p class="container__header">Условия размещения</p>
            <div class="container3__main">
                <div class="container3__conditions">
                    <p class="container3__condition">Заезд:</p>
                    <p class="container3__condition">Выезд:</p>
                    <p class="container3__condition">Отмена бронирования:</p>
                    <p></p>
                    <p class="container3__condition">Правила размещения:</p>
                </div>

                <div class="container3__results">
                    <p class="container3__p">с 14.00</p>
                    <p class="container3__p">с 12.00 до 14.00</p>
                    <p class="container3__p">При отмене бронирования менее, чем за 10 дней, предоплата возвращается в размере 50%.</p>
                    <p class="container3__p2">При отмене бронирования менее, чем за 5 дней, предоплата не возвращается.</p>
                    <p class="container3__p1">Не допускается заезд и проживание с животными.</p>
                    <p class="container3__p2">Курение в номерах любого класса запрещено.</p>
                </div>
            </div>
        </div>

        <div class="container3 container4" id="services__reviews">
            <p class="container__header">Отзывы наших гостей</p>
            <div class="container4__main">
                <div class="why__review review" id="review_1">
                    <img class="review__human" src="../img/human1.jpg">
                    <div class="review__text">
                        <p class="review__name">Михаил Жданов</p>
                        <p class="review__give">оценивает как   <span class="review__rating">4.5</span></p>
                        <p class="review__review">Снимали номер для отдыха с детьми, все на высшем уровне</p>
                    </div>
                </div>
                <div class="why__review review" id="review_2">
                    <img class="review__human" src="../img/human2.png">
                    <div class="review__text">
                        <p class="review__name">Инна</p>
                        <p class="review__give">оценивает как   <span class="review__rating">5</span></p>
                        <p class="review__review">Заезжали в номер класса стандарт на неделю, все очень понравилось</p>
                    </div>
                </div>
            </div>
        </div>

        <footer>

        </footer>
    </body>
</html>
