let
titre_gestion_categorie_cours = document.querySelectorAll(".titre_gestion_categorie_cours");

titre_gestion_categorie_cours.forEach(function (element, index){
    element.addEventListener("click",function(){
        /* trouve le bon icone */
        document.querySelectorAll(".icone_titre_gestion_categorie_cours").forEach(function (element_, index_){
            if(index_ == index)
            {
                element_.classList.toggle("fa-angle-down");
                element_.classList.toggle("fa-angle-up");
                if(element_.classList.contains("fa-angle-up"))
                {
                    document.querySelectorAll("#voir_details_categorie")[index].classList.add("active");
                }
                else
                {
                    document.querySelectorAll("#voir_details_categorie")[index].classList.remove("active");
                }
            }
            else
            {
                element_.classList.add("fa-angle-down");
                element_.classList.remove("fa-angle-up");   
                document.querySelectorAll("#voir_details_categorie")[index_].classList.remove("active");             
            }
        })
    })
})

/* choix de types de file d'actualité */
let
detail_choix_categorie_file_actualite = document.querySelectorAll(".detail_choix_categorie_file_actualite"),
background_detail_choix_categorie_file_actualite = document.getElementById("background_detail_choix_categorie_file_actualite");
detail_choix_categorie_file_actualite.forEach(function (element, index){
    element.addEventListener("click",function(){
        let px = 25*index;
        background_detail_choix_categorie_file_actualite.setAttribute("style","left: "+px+"%;");
    })
})