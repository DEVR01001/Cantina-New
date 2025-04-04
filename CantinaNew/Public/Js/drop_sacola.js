

let btn_open_cart  = document.getElementById('open_cart_btn')

let btn_close_cart  = document.getElementById('open_close_btn')

let bnt_fechar_fora = document.getElementById('conatiner_drop_cart')

let Container_cart = document.getElementById('conatiner_open_cart')



btn_open_cart.addEventListener('click', ()=>{

    Container_cart.classList.toggle('active_cart')



})





btn_close_cart.addEventListener('click', ()=>{


    Container_cart.classList.remove('active_cart')
    
})





