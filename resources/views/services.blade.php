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
            <div class="why__description">
                <p class="why__header">Наши <span class="why__orange-header">Услуги</span></p>
            </div>
            <div class="container__up">
                <img class="container__pyramid" src="./img/free-icon-service.png">
                <p class="container__right">
                    Намереваясь отправиться в отпуск, большинство из нас не задумываемся о том, каким образом<br>
                    туристические агентства и гостиницы организуют досуг таким образом, <br> чтобы мы ни
                    в чем не нуждались. <br>Мы позаботились о вашем комфорте и подобрали все самые необходимые
                    и полезные услуги, <br>с которыми вы сможете ознакомиться ниже
                </p>
                <img class="container__pyramid" id="rotate" src="./img/free-icon-service.png">
            </div>

            <div class="container__services-main">
                <div class="container__block">
                    <p class="container__text why__header" >
                        В нашей гостинице существует ряд <br>основных услуг, которые оказываются бесплатно <br>абсолютно каждому нашему клиенту!
                    </p>
                    <div class="container__services">
                        <div class="container__elements">
                            <img class="services__galka" src="../img/galka.png">
                            <p>В случае необходимости вызов скорой медицинской помощи</p>
                        </div>
                        <div class="container__elements">
                            <img class="services__galka" src="../img/galka.png">
                            <p>Наличие и круглосуточная возможность использовать медицинскую аптечку</p>
                        </div>
                        <div class="container__elements">
                            <img class="services__galka" src="../img/galka.png">
                            <p>Доставка писем, газет и прочей корреспонденции, предназначенной гостю</p>
                        </div>
                        <div class="container__elements">
                            <img class="services__galka" src="../img/galka.png">
                            <p>Пробуждение гостя к назначенному времени</p>
                        </div>
                        <div class="container__elements">
                            <img class="services__galka" src="./img/galka.png">
                            <p>Наличие и возможность доступа к кипятку, ножницам, иголкам с нитками</p>
                        </div>
                        <div class="container__elements">
                            <img class="services__galka" src="../img/galka.png">
                            <p>Пользование одним комплектом посуды и его замена</p>
                        </div>

                    </div>

                </div>
                <img class="container__img" src="./img/women.png">
            </div>
        </div>
        <div class="phone">
            <img class="phone__img" src="./img/phone.png">
            <div class="phone__text">
                <p class="why__header phone__p">Мы очень вас любим и ценим, <br>поэтому предлагаем выбор дополнительных услуг<br> для полноценного отдыха!</p>
                <p class="why__description phone__p-mini">Все необходимые услуги вы сможете добавить к бронированию на этапе оформления</p>
            </div>
        </div>
        <div class="list">
            <div class="why__description">
                <p class="why__header">Стоимость <span class="why__orange-header">Дополнительных</span> Услуг</p>
                <p class="why__tiny-header tiny-header">Их можно добавить позднее при бронировании</p>
            </div>

            <table class="list__table">
                <tr>
                    <th>Наименование услуги</th>
                    <th>Стоимость</th>
                @foreach($services as $s)
                    <tr>
                        <td>
                            {{$s->title}}
                        </td>
                        <td>
                            {{$s->price}} руб.
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>



{

        <footer>
        </footer>
    </body>
</html>
