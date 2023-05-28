import express from 'express';
import cors from 'cors';
const app = express();
// const puppeteer = require('puppeteer');

import puppeteer from 'puppeteer';
// import * as fs from 'fs/promises';
app.use(cors());
app.get('/data', async (req, res) => {

    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    // let r = {name: "yana", age: 21};
    let url = 'https://www.afisha.ru/saratov/events/';

    // получить сегодняшнюю дату в формате `MM/DD/YYYY`
    let today = new Date();
    let now = today.toLocaleDateString('en-US');
    let date =  now.split( '/');

    let today_date = date[1];
    let today_month = '';
    if(today_date<10) today_date='0'+today_date;
    switch(date[0]){
        case '1': today_month='yanvarya'; break;
        case '2': today_month='fevralya'; break;
        case '3': today_month='marta'; break;
        case '4': today_month='aprelya'; break;
        case '5': today_month='maya'; break;
        case '6': today_month='iyunya'; break;
        case '7': today_month='iyulya'; break;
        case '8': today_month='avgusta'; break;
        case '9': today_month='sentyabra'; break;
        case '10': today_month='oktyabrya'; break;
        case '11': today_month='noyabraya'; break;
        case '12': today_month='dekabrya'; break;
    }

    url = url + today_date+ '-' + today_month;
    await page.goto(url);

    const result = await page.evaluate(() => {

        let c = document.querySelector('.wbapC');
        //кнопка следующей страницы
        let button = c.children[1].children[1].children[1].children[0].children[0];

        let data = []; // Создаём пустой массив для хранения данных
        let dataFilms = []; // Создаём пустой массив для хранения данных
        let elements = document.querySelectorAll('.mQ7Bh');

        for (let element of elements){ // Проходимся в цикле по каждому мероприятию
            let title = element.textContent; // Выбираем название
            let desc = element.parentElement.parentElement.parentElement.parentElement.children[1].textContent;
            let ch = element.parentElement.parentElement.parentElement.parentElement;
            let type= '';
            let subtype = '';
            let subhref = '';
            if(ch.childNodes.length==2){
                type = ch.children[1].textContent;
                desc="";
            }
            else if (ch.childNodes.length==3){
                desc = ch.children[1].textContent;
                type = ch.children[2].textContent;
            }

            if(type=="Фильм"){
                //нужная картинка по клику (ссылка)
                let picture = element.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.children[0].children[4];
                let pichref = picture.href;
                let picClass = picture.className;
                let cl = '.' + picClass;
                subtype = picClass;
                subhref = pichref;
                dataFilms.push({title, subhref});
                //"vcSoT dcsqk atqQM"
            }
            if(type=="Концерт" || type=="Выставка"){
                //нужная картинка по клику (ссылка)
                let picture = element.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.children[0].children[4];
                let pichref = picture.href;
                let picClass = picture.className;
                let cl = '.' + picClass;
                subtype = picClass;
                subhref = pichref;
                dataFilms.push({title, subhref});
                console.log(cl);
                console.log(subhref);
                //"vcSoT dcsqk atqQM"
            }
            data.push({title, desc, type, subtype, subhref}); // Помещаем объект с данными в массив
        }
        return data; // Возвращаем массив мероприятия
    });

    let full =[];
    //в массив мероприятий, если это фильмы, добавляем конкретные жанры
    for (let el of result){
        if(el.type=='Фильм'){
            await page.goto(el.subhref);
            const fff = await page.evaluate(() => {
                let genres =[];
                let dd = document.querySelector('.vO0dE');
                let data= "";
                try {
                    data = dd.children[1].children[1].textContent;
                }
                catch{}
                genres.push(data)
                return genres;
            });
            let gen = JSON.stringify(fff);
            let title = el.title;
            full.push({title, gen});
        }
        if(el.type=='Концерт' || el.type=='Выставка'){
            await page.goto(el.subhref);
            const fff = await page.evaluate(() => {
                let genres =[];
                let dd = document.querySelector('.vO0dE');
                let data = dd.children[0].children[1].textContent;
                genres.push(data)
                return genres;
            });
            let gen = JSON.stringify(fff);
            let title = el.title;
            full.push({title, gen});
        }
    }
    //если фильм, пушим
    await browser.close();
    for (let i=0; i<full.length;i++){
        for(let j=0;j<result.length;j++){
            if(full[i].title==result[j].title) result[j].subtype=full[i].gen;
        }
    }
    //let r = JSON.stringify(result,null,1);
    res.send(result);
    console.log("yes");
    // await fs.writeFile("fullData.txt", r);
});
const port = process.env.PORT || 3000;
app.listen(port, () => {
    console.log(`Server started on port ${port}`);
});
// find();

