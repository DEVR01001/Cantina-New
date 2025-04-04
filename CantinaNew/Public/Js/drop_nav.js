

let BtnOpen = document.getElementById('icon_menu');

let ConteudoMenu = document.getElementById('conteudo_menu');



BtnOpen.addEventListener('click', () => {

    ConteudoMenu.classList.toggle("active_menu")


    if (BtnOpen.classList.contains("fa-bars")) {
        BtnOpen.classList.replace("fa-bars", "fa-times");
    } else {
        BtnOpen.classList.replace("fa-times", "fa-bars");
    }
    

});

