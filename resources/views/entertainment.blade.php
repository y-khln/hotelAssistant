<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_general.css">
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
        <p class="container__header">Мероприятия <span class="why__orange-header">Нашего Города</span></p>
        <p class="container__text-ent">Ищете куда пойти в Саратове? Пройдите небольшой тест, и мы порекомендуем мероприятие, наиболее подходящее именно вам! </p>

        <div id="background">
            <div id="loader"></div>
            <p class="background__text">Пожалуйста, подождите. Ваш запрос обрабатывается</p>
        </div>



        <div class="wrapper">
            <i id="left" class="fa-solid fa-angle-left">ᐊ</i>
            <div class="carousel">
                <img src="../img/slider_0.jpg" alt="img" draggable="false">
                <img src="../img/slider_1.jpg" alt="img" draggable="false">
                <img src="../img/slider_2.jpeg" alt="img" draggable="false">
                <img src="../img/slider_3.png" alt="img" draggable="false">
                <img src="../img/slider_4.jpg" alt="img" draggable="false">
                <img src="../img/slider_5.jpg" alt="img" draggable="false">
            </div>
            <i id="right" class="fa-solid fa-angle-right">ᐅ</i>
        </div>


    <form class="container__test" id="events__form"  method="POST">
        @csrf
        <p class="container__question">Ваш пол?</p>
        <div class="container__labels">
            <div class="container__labels-sub">
                <input type="radio" value="1" name="gender" required>
                <label class="label__data">Мужской</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="2" name="gender" required>
                <label class="label__data">Женский</label>
            </div>
        </div>
        <p class="container__question">1.  Что вы чаще всего ищете, посещая культурные мероприятия (выставки, спектакли, фильмы)?</p>
        <div class="container__labels">
            <div class="container__labels-sub">
                <input type="radio" value="1" name="question_1" required>
                <label class="label__data">Возможность получить вдохновение и радость</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="2" name="question_1" required>
                <label class="label__data">Возможность пережить сильные эмоции</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="3" name="question_1" required>
                <label class="label__data">Возможность увидеть известного человека вживую</label>
            </div>
        </div>
        <p class="container__question">2.  Как вы любите проводить свободное время?</p>
        <div class="container__labels">
            <div class="container__labels-sub">
                <input type="radio" value="1" name="question_2" required>
                <label class="label__data">Дома за компьютером/телефоном/книгами</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="2" name="question_2" required>
                <label class="label__data">Встречаюсь с друзьями, общаюсь</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="3" name="question_2" required>
                <label class="label__data">Посещаю культурные мероприятия</label>
            </div>
        </div>
        <p class="container__question">3.  Что из перечисленного для вас является наиболее важным в фильме/спектакле?</p>
        <div class="container__labels">
            <div class="container__labels-sub">
                <input type="radio" value="1" name="question_3" required>
                <label class="label__data">Захватывающий сюжет</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="2" name="question_3" required>
                <label class="label__data">Возможность поразмыслить</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="3" name="question_3" required>
                <label class="label__data">Хорошая игра актеров</label>
            </div>
        </div>
        <p class="container__question">4.  Если бы вы сами стали писателем, о чем бы вы писали?</p>
        <div class="container__labels">
            <div class="container__labels-sub">
                <input type="radio" value="1" name="question_4" required>
                <label class="label__data">Писал бы романы о жизни, трудностях, любви, социальных проблемах</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="2" name="question_4" required>
                <label class="label__data">Писал бы что-то с захватывающими сюжетами, возможно фантастику</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="3" name="question_4" required>
                <label class="label__data">Писал бы об исторических событиях</label>
            </div>
        </div>
        <p class="container__question">5.  Как вы относитесь к шумным мероприятиям?</p>
        <div class="container__labels">
            <div class="container__labels-sub">
                <input type="radio" value="1" name="question_5" required>
                <label class="label__data">Положительно, люблю большие компании</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="2" name="question_5" required>
                <label class="label__data">Нейтрально или отрицательно</label>
            </div>
        </div>
        <p class="container__question">6.  В какой компании вы бы хотели посетить мероприятие?</p>
        <div class="container__labels">
            <div class="container__labels-sub">
                <input type="radio" value="1" name="question_6" required>
                <label class="label__data">В одиночестве</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="2" name="question_6" required>
                <label class="label__data">В компании семьи или близких</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="3" name="question_6" required>
                <label class="label__data">В компании друзей</label>
            </div>
        </div>
        <p class="container__question">7. Что вы предпочитаете больше всего? </p>
        <div class="container__labels">
            <div class="container__labels-sub">
                <input type="radio" value="1" name="question_7" required>
                <label class="label__data">Юмористические постановки и стендап</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="2" name="question_7" required>
                <label class="label__data">Интересные фильмы</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="3" name="question_7" required>
                <label class="label__data">Концерт любимого исполнителя</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="3" name="question_7" required>
                <label class="label__data">Выставки (картин, автомобилей и т.д.)</label>
            </div>
        </div>
        <p class="container__question">8.  Что вам нравится больше: легкий развлекательный контент или драматические истории, заставляющие задуматься?</p>
        <div class="container__labels">
            <div class="container__labels-sub">
                <input type="radio" value="1" name="question_8" required>
                <label class="label__data">Легкий развлекательный контент</label>
            </div>
            <div class="container__labels-sub">
                <input type="radio" value="2" name="question_8" required>
                <label class="label__data">Драматические стории </label>
            </div>
        </div>
        <button class="form__button test__button" type="submit" id="search__button">Отправить</button>

    </form>

        <div id="container__recommendation">
            <img id="recommendation__img">
            <p>По результатам теста наиболее подходящее для Вас мероприятие - <span id="results"></span></p>
            <a id="href"><button id="afisha" class="form__button" type="button">Посмотреть на Afisha.ru</button></a>
        </div>

    </div>




</body>
<footer>
</footer>

{{--<script type="module" src="../js/nnetwork.mjs"></script>--}}
{{--<script src="../js/dist/bundle.js"></script>--}}
<script src="../js/script_design.js"></script>
<script>var exports = {};</script>
<script type="module" src="../js/script_entertainment.js"></script>
<script type="module" src="../js/nnetwork.js"></script>
<script src="https://unpkg.com/brain.js"></script>



