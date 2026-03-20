let
show_mobile_menu = document.getElementById("show_mobile_menu"),
sortie_menu_mobile = document.querySelectorAll("#sortie_menu_mobile");
/* afficher le menu mobile */
show_mobile_menu.addEventListener("click",function(){
    parent_menu_mobile.classList.toggle("active");
})
/* fermer le menu mobile */
sortie_menu_mobile.forEach(element => {
    element.addEventListener("click",function(){
        parent_menu_mobile.classList.remove("active");
    })
})