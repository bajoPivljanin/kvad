let menuopen = document.querySelector('#menuopen');
let menuclose = document.querySelector('#menuclose');

menuopen.addEventListener('click', () => {
    let lista = document.querySelectorAll('header .donji-nav ul li');

    lista.forEach(item => {
        item.style.display = "block";
    });
    menuopen.style.display="none";
    menuclose.style.display="block";
});

menuclose.addEventListener('click',()=>{
    let lista = document.querySelectorAll('header .donji-nav ul li');

    lista.forEach(item => {
        item.style.display = "none";
    });

    menuopen.style.display="block";
    menuclose.style.display="none";
});