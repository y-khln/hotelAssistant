import net from './nnetwork.js'


let container = document.querySelector('#container__recommendation');
let p = document.querySelector('#results');
let img = document.querySelector('#recommendation__img')
let href = document.querySelector('#href')
container.style.display = 'none';



function showLoader() {
    let loader = document.getElementById('background');
    loader.style.display = 'block';
}
function hideLoader() {
    let loader = document.getElementById('background');
    loader.style.display = 'none';
}
// let text = await fetch('http://localhost:3000/data');
// if (text.ok) {
//     let data = await text.json();
//     data.forEach(elem => JSON.stringify(elem));
//     localStorage.setItem('events', JSON.stringify(data));
//     console.log(JSON.parse(localStorage.getItem('events')));
// }
// else{ console.log("Ошибка "+ text.status);}

let form = document.getElementById('events__form');
if((JSON.parse(localStorage.getItem('events')))==null){
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        showLoader();
        fetch('http://localhost:3000/data')
            .then(function (response) {
                return response.json()
            })
            .then(function (data) {
                data.forEach((elem => JSON.stringify(elem)));
                localStorage.setItem('events', JSON.stringify(data));
                console.log(JSON.parse(localStorage.getItem('events')));
                getEvent();
                container.style.display = 'block';
            })
            .catch(function (error) {
                // Обрабатываем ошибки
                console.log(error);
                hideLoader();
            });
    });
}

else {
    console.log(JSON.parse(localStorage.getItem('events')));
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        getEvent();
        container.style.display = 'block';
    })
}

function getEvent() {
    showLoader();
    let gen = document.querySelector('input[name="gender"]:checked');
    let q1 = document.querySelector('input[name="question_1"]:checked');
    let q2 = document.querySelector('input[name="question_2"]:checked');
    let q3 = document.querySelector('input[name="question_3"]:checked');
    let q4 = document.querySelector('input[name="question_4"]:checked');
    let q5 = document.querySelector('input[name="question_5"]:checked');
    let q6 = document.querySelector('input[name="question_6"]:checked');
    let q7 = document.querySelector('input[name="question_7"]:checked');
    let q8 = document.querySelector('input[name="question_8"]:checked');


    let request = {
        gender: Number(gen.value),
        first: Number(q1.value),
        second: Number(q2.value),
        third: Number(q3.value),
        forth: Number(q4.value),
        fifth: Number(q5.value),
        sixth: Number(q6.value),
        seventh: Number(q7.value),
        eighth: Number(q8.value)
    }
    console.log(request);

    const output = net.run(request);
    let available_events = JSON.parse(localStorage.getItem('events'));

    let obj = {
        "Драма": (Number(output.film_drama) * 100).toFixed(1),
        "Детектив": (Number(output.film_detective) * 100).toFixed(1),
        "Боевик,  Триллер": (Number(output.film_action) * 100).toFixed(1),
        "Криминальный, Ужасы":(Number(output.film_horror) * 100).toFixed(1),
        "Комедия": (Number(output.film_comedy) * 100).toFixed(1),
        "Фантастика, Фэнтези": (Number(output.film_fantastic) * 100).toFixed(1),
        "Мультфильм, Приключения, Семейный": (Number(output.film_family) * 100).toFixed(1),
        "Классика, Джаз": (Number(output.concert_classic) * 100).toFixed(1),
        "Рок": (Number(output.concert_rock) * 100).toFixed(1),
        "Поп": (Number(output.concert_pop) * 100).toFixed(1),
        "Юмор, Стендап": (Number(output.concert_humor) * 100).toFixed(1)
    }
    console.log(obj);
    let need = [];
    let recommend = [];
    need.push(deleteElem());
    need.push(deleteElem());
    let n = need[0].concat(need[1]);
    console.log(n)
    for (let i = 0; i < available_events.length; i++) {
        for (let j = 0; j < n.length; j++) {
            if (available_events[i].subtype.includes(n[j]) || available_events[i].type.includes(n[j])) {
                recommend.push(available_events[i]);
            }
        }
    }
    console.log(recommend);
    const uniqSet = new Set();
    for (let i = 0; i < recommend.length; i++) {
        for (let j = 0; j < i; j++)
            if (recommend[j] === recommend[i]) {
                uniqSet.add(recommend[i])
            }
    }
    const uniq = Array.from(uniqSet);
    if (uniq == "") {
        const randomIndex = Math.floor(Math.random() * recommend.length);
        const needValue = recommend[randomIndex];
        console.log(needValue);
        try{p.textContent = needValue.type + " '" + needValue.title +"'"}
        catch{}
        try{href.href = needValue.subhref}
        catch{}
        switch(needValue.type || needValue.subtype){
            case 'Фильм': img.src = './img/cinema.jpg'; break;
            case 'Мультфильм': img.src = './img/cinema.jpg'; break;
            case 'Выставка': img.src = './img/vistavka.png.'; break;
            case 'Концерт': img.src = './img/concert.jpg'; break;
        }
        console.log("no");
    } else{
        try{p.textContent = uniq[0].type + " '" + uniq[0].title+"'"}
        catch{}
        try{href.href = uniq[0].subhref}
        catch{}
        switch(uniq[0].type || uniq[0].subtype){
            case 'Фильм': img.src = './img/cinema.jpg'; break;
            case 'Мультфильм': img.src = './img/cinema.jpg'; break;
            case 'Выставка': img.src = './img/vistavka.png.'; break;
            case 'Концерт': img.src = './img/concert.jpg'; break;
        }
        console.log(uniq[0]);
    }


    function deleteElem() {
        const values = Object.values(obj);
        const maxVal = Math.max(...values);
        for (const [key, value] of Object.entries(obj)) {
            if (value == maxVal) {
                delete obj[key];
                let k = key.split(", ")
                return k;
            }
        }
    }

    hideLoader();
}






