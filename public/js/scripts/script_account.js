const personalSec = document.getElementById('sections__personal');
const historySec = document.getElementById('sections__history');
const serviceSec = document.getElementById('sections__service');
const edit = document.getElementById('main__button');
const confirm = document.getElementById('confirm__button');

const personal = document.getElementById('personal');
const history = document.getElementById('history');
const service = document.getElementById('service');
const update = document.getElementById('registration');


// const open = document.getElementById('book');
// const close = document.getElementById('popup__close');
personal.classList.add('active');
personalSec.addEventListener('click', function(e){
    e.preventDefault();
    personal.classList.add('active');
    service.classList.remove('active');
    update.classList.remove('active');
    history.classList.remove('active');})

historySec.addEventListener('click', function(e){
    e.preventDefault();
    personal.classList.remove('active');
    service.classList.remove('active');
    history.classList.add('active');
    update.classList.remove('active');})

serviceSec.addEventListener('click', function(e){
    e.preventDefault();
    personal.classList.remove('active');
    service.classList.add('active');
    history.classList.remove('active');
    update.classList.remove('active');})

edit.addEventListener('click', function (e){
    e.preventDefault();
    personal.classList.remove('active');
    service.classList.remove('active');
    history.classList.remove('active');
    update.classList.add('active');
})
// confirm.addEventListener('click', function (e){
//     e.preventDefault();
//     personal.classList.add('active');
//     service.classList.remove('active');
//     history.classList.remove('active');
//     update.classList.remove('active');
// })

// close.addEventListener('click', () => {
//     popup.classList.remove('active'); })
