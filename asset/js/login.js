/* trouver */
let 
email = document.getElementById("email"),
password = document.querySelectorAll("#password"),
form = document.querySelector("form");
let
btn = form.querySelector('button[type="submit"]');

/* ecouter la soumission du formulaire */
form.addEventListener("submit", function(e){
    e.preventDefault();
    btn.setAttribute("disabled","");
    let temp_btn = btn.innerHTML;
    btn.innerHTML = `<i class="fa-solid fa-circle-notch rotate"></i>`,
    valid = true;
    /* adresse email */
    if(email.value.trim() == "")
    {
        Swal.fire({
            icon: "error",
            title: "Entrez votre adresse email",
            text: "",
            confirmButtonText: "OK",
            confirmButtonColor: "#31487a"
        })
        valid = false;
        btn.innerHTML = temp_btn;
        btn.removeAttribute("disabled");
    }
    /* password */
    if(password[0].value.trim() == "")
    {
        Swal.fire({
            icon: "error",
            title: "Entrez votre mot de passe",
            text: "",
            confirmButtonText: "OK",
            confirmButtonColor: "#31487a"
        })
        valid = false;
        btn.innerHTML = temp_btn;
        btn.removeAttribute("disabled");
    }
    
    if(valid==true)
    {
        $.post("/fonctions/login.php",
            {
                email: email.value,
                mdp: password[0].value
            },
            function(data){
                if(data.result == "error")
                {
                    Swal.fire({
                        icon: "error",
                        title: data.msg,
                        text: "",
                        confirmButtonText: "OK",
                        confirmButtonColor: "#31487a"
                    })
                    valid = false;
                    btn.innerHTML = temp_btn;
                    btn.removeAttribute("disabled");
                }
                else
                {
                    window.location = "/accueil";
                }
            }
        )
    }
})