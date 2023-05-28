<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style_booking.css">
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
            <button class="head__book" href="/booking">Забронировать</button>
        </div>

        <div class="background">
            <div class="container">
                <p class="container__header">Бронирование Номера</p>
                <form class="container__search search" action="{{route('booking_res')}}" method="post">
                    @csrf
                    <div class=search__top>
                        <select class="search__persons" name="person_count">
                            <option class="search__person" value="1">1 чел.</option>
                            <option class="search__person" value="2">2 чел.</option>
                            <option class="search__person" value="3">3 чел.</option>
                            <option class="search__person" value="4">4 чел.</option>
                        </select>
                        <select class="search__children" name="children_count">
                            <option class="search__child" value="0">без детей</option>
                            <option class="search__child" value="1">1 чел.</option>
                            <option class="search__child" value="2">2 чел.</option>
                        </select>
                        <div class="search__block">
                            <p class="search__p">Заезд</p>
                            <input type="date"  class="search__date" min="2023-05-19" name="date_in" id="date_in" required>
                        </div>
                        <div class="search__block">
                            <p class="search__p">Выезд</p>
                            <input type="date"  class="search__date" min="2023-05-20" name="date_out" id="date_out" required>
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
                @if($valid_categories!=null && $valid_categories!=1)
                <p class="container__header results__header">Вот что мы можем вам предложить: </p>
                    @foreach($valid_categories as $valid)
                        <div class="block">
                            <img class="block__img" id="block__img">
                            <div class="block__text">
                                <p class="block__title" id="block__title">Номер класса "{{\App\Models\RoomCategory::where('id',$valid)->first()->title}}"</p>
                                <p class="block__description">{{\App\Models\RoomCategory::where('id',$valid)->first()->general}}</p>
                                <p class="block__price">{{\App\Models\RoomCategory::where('id',$valid)->first()->price_per_night}} руб./сутки</p>
                                <div class="block__buttons">
                                    <button class="block__book" id="more" >Подробнее</button>
                                    <button class="block__book" id="book"  >Забронировать</button>
                                </div>
                            </div>
                        </div>
                        <div class="popup" id="popup">
                            <div class="popup__container">

                                <form class="popup__body"  action="{{route('booking_auth')}}" method="post">
                                    @csrf
                                    <p class="popup__header">Бронирование номера</p>
                                    <p>Пожалуйста, проверьте правильность выбранных вами параметров.</p>
                                    <p>Гостей:
                                        @if($persons==1) 1 взрослый @endif
                                        @if($persons>1) {{$persons}} взрослых @endif
                                    </p>
                                    <p>Дети:
                                        @if($children==0) без детей
                                        @endif
                                        @if($children==1) 1 ребенок @endif
                                        @if($children!=0 && $children!=1){{$children}} детей
                                        @endif
                                    </p>
                                    <p>Дата заезда: {{$date_in}}</p>
                                    <p>Дата выезда: {{$date_out}}</p>
                                    <p>Категория номера "{{\App\Models\RoomCategory::where('id',$valid)->first()->title}}"</p>

                                    <input type="hidden" value="{{$children}}" name="children">

                                    <input type="hidden" value="{{implode(",",$valid_rooms)}}" name="valid_rooms">
                                    <input type="hidden" value="{{$date_in}}" name="date_in">
                                    <input type="hidden" value="{{$date_out}}" name="date_out">
                                    <input type="hidden" value="{{$persons}}" name="persons">
                                    <input type="hidden" value="{{\App\Models\RoomCategory::where('id',$valid)->first()->title}}" name="category">


                                    <button type="submit" class="block__book">Все верно</button>

                                    <div id="popup__close">&#10006</div>
                                </form>
                            </div>
                        </div>
                     @endforeach
                @endif
                @if($valid_categories==null)
                        <p class="container__header results__header">К сожалению, по вашему запросу мы не нашли свободных номеров </p>
                @endif
        </div>
        <footer>
        </footer>
    </body>
</html>

<script src="../js/scripts/script_booking.js"></script>
