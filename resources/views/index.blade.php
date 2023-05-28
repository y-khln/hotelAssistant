<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style_index.css">
    </head>

    <body>
        <!-- шапка верхняя -->
        <div class="head">
            <p class="head__logo">Гостиница</p>
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
        <!-- шапка слоган -->
        <div class="underhead">
            <p class="underhead__slogan">Открывайтесь новым впечатлениям, не расставаясь с домашним уютом</p>
        </div>
        <img class="main__img" src="./img/index_main.jpeg">


        <div class="benefits__icons">
            <div class="benefits__block">
                <div class="benefits__round">
                    <img class="benefits__img" src="./img/auto.png">
                </div>
                <span>Аренда <br>Транспорта</span>
            </div>
            <div class="benefits__block">
                <div class="benefits__round">
                    <img class="benefits__img" src="./img/resort.png">
                </div>
                <span>Разнообразие <br>Отыха</span>
            </div>
            <div class="benefits__block">
                <div class="benefits__round">
                    <img class="benefits__img" src="./img/wifi.png">
                </div>
                <span>Бесплатный <br>WiFi</span>
            </div>
            <div class="benefits__block">
                <div class="benefits__round">
                    <img class="benefits__img" src="./img/trash.png">
                </div>
                <span>Экологически Чистая<br>Территория</span>
            </div>
        </div>


        <div class="why__description">
            <p class="why__header">Почему Вам Стоит <span class="why__orange-header">Остановиться У Нас</span></p>
            <p class="why__tiny-header tiny-header">Причины</p>
        </div>
        <div class="why__main">
            <div class="why__reasons">
                <div class="why__reason-block reason">
                    <p class="reason__number">1</p>
                    <p class="reason__header">Предоставляем лучший выбор номеров</p>
                    <p class="reason__description">Здесь будет описание</p>
                </div>
                <div class="why__reason-block reason">
                    <p class="reason__number">2</p>
                    <p class="reason__header">Высокое качество по доступным ценам</p>
                    <p class="reason__description">Здесь будет описание</p>
                </div>
                <div class="why__reason-block reason">
                    <p class="reason__number">3</p>
                    <p class="reason__header">Ресторан в зоне гостиницы</p>
                    <p class="reason__description">Здесь будет описание</p>
                </div>
                <div class="why__reason-block reason">
                    <p class="reason__number">4</p>
                    <p class="reason__header">Отдых на любой вкус</p>
                    <p class="reason__description">Здесь будет описание</p>
                </div>
            </div>
            <div class="why__rooms">
                <img id="why__girls" src="./img/index_girls.jpg">
                <div class="why__review review" id="review_1">
                    <img class="review__human" src="./img/human2.png">
                    <div class="review__text">
                        <p class="review__name">Анна Микеева</p>
                        <p class="review__give">оценивает как   <span class="review__rating">4.8</span></p>
                    </div>
                </div>
                <img id="why__room" src="./img/index_room.jpg">
                <div class="why__review review" id="review_2">
                    <img class="review__human" src="./img/human1.jpg">
                    <div class="review__text">
                        <p class="review__name">Михаил Жданов</p>
                        <p class="review__give">оценивает как   <span class="review__rating">4.5</span></p>
                    </div>
                </div>
                <img id="why__tree" src="./img/index_tree.jpg">
            </div>
        </div>


        <div class="rooms__description why__description">
            <p class="rooms__header">Наши Номера</p>
            <p class="rooms__main-header why__header">Разнообразие <span class="why__orange-header">Выбора</span></p>
            <p class="rooms__tiny-header tiny-header">Описание</p>
        </div>

        <div class="rooms__main">
            <div class="rooms__side">
                <div class="rooms__elem">
                    <img class="rooms__side-img" src="./img/index_side1.jpg">
                    <p class="rooms__guests tiny-header">3 GUESTS</p>
                    <p class="rooms__type">Номер класс "эконом"</p>
                </div>
                <div class="rooms__elem">
                    <img class="rooms__side-img" src="./img/index_side3.jpg">
                    <p class="rooms__guests tiny-header">2 GUESTS</p>
                    <p class="rooms__type">Номер класса "стандарт"</p>
                </div>
            </div>
            <div class="rooms__elem">
                <img class="rooms__big-img" src="./img/index_bigimg.jfif">
                <p class="rooms__guests tiny-header">5 GUESTS</p>
                <p class="rooms__type">Номер класса "люкс"</p>
            </div>
            <div class="rooms__side">
                <div class="rooms__elem">
                    <img class="rooms__side-img" src="./img/index_side4.png">
                    <p class="rooms__guests tiny-header">4 GUESTS</p>
                    <p class="rooms__type">Номер класса "семейный"</p>
                </div>
                <div class="rooms__elem">
                    <img class="rooms__side-img" src="./img/side2.jfif">
                    <p class="rooms__guests tiny-header">4 GUESTS</p>
                    <p class="rooms__type">Номер класса "раздельный"</p>
                </div>
            </div>
        </div>

        <footer>

        </footer>
    </body>
</html>
