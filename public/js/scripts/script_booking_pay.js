let blocks = document.getElementsByClassName('cont__block');
let full = document.getElementById('full');
let input = document.getElementById('fullPrice');
let input2 = document.getElementById('roomPrice');
let summa = document.getElementById('summa');
full.textContent = summa.textContent;
input2.value=summa.textContent;

for(let i=0; i<blocks.length;i++){
    let plus = blocks[i].querySelector('#plus');
    let minus = blocks[i].querySelector('#minus');
    let span = blocks[i].querySelector('#count')
    let spanf = blocks[i].querySelector('#count__f')
    let price = blocks[i].querySelector('#cont__price');
    console.log(plus.textContent)

    plus.addEventListener('click', function(e) {
        e.preventDefault();
        console.log(Number(span.textContent)+1);
        span.textContent = Number(span.textContent)+1;
        if(spanf.textContent==null) spanf.textContent = price.textContent;
        else {
            spanf.textContent = Number(spanf.textContent) + Number(price.textContent);
            full.textContent = Number(full.textContent) + Number(price.textContent);
            input.value = full.textContent;
        }
    });
    minus.addEventListener('click', function(e) {
        e.preventDefault();
        if(Number(span.textContent)>0){
            span.textContent = Number(span.textContent)-1;
            spanf.textContent = Number(spanf.textContent)-Number(price.textContent);
            full.textContent = Number(full.textContent)-Number(price.textContent);
            input.value = full.textContent;
        }
        if(Number(spanf.textContent)==0) spanf.textContent = "";

    });
}

