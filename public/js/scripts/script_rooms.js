const block = document.getElementsByClassName('block');

for(let i=0; i<block.length;i++){
    let more = block[i].querySelector('#more');
    let title = block[i].querySelector('#block__title');
    let picture = block[i].querySelector('#block__img');

    switch(title.textContent){
        case 'Номер класса "эконом"':
            picture.src = './img/img_rooms/econom_2.jpg'; break;
        case 'Номер класса "семейный"':
            picture.src = './img/img_rooms/family/8ae3dedd730a4ed91ec1f2aef10e7c0d.jpg'; break;
        case 'Номер класса "люкс"':
            picture.src = './img/img_rooms/luxe/0ddc863000f1a77f41dbd8db2b8ded9c.jpg'; break;
        case 'Номер класса "стандарт"':
            picture.src = './img/img_rooms/standart/03a6b8613c70b144abd844ab418b4e48.jpg'; break;
        case 'Номер класса "раздельный"':
            picture.src = './img/img_rooms/separate/2fafc977bc5b28e0aedd722ddae07ae0.jpg'; break;
    }
        more.addEventListener('click', function(e){
            e.preventDefault();
            switch(title.textContent){
                case 'Номер класса "эконом"':
                    window.location.href = '/rooms/econom';
                    break;
                case 'Номер класса "семейный"':
                    window.location.href = '/rooms/family';
                    break;
                case 'Номер класса "люкс"':
                    window.location.href = '/rooms/luxe';
                    break;
                case 'Номер класса "стандарт"':
                    window.location.href = '/rooms/standart';
                    break;
                case 'Номер класса "раздельный"':
                    window.location.href = '/rooms/separate';
                    break;
            }
        })
    }

