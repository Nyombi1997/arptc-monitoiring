

/* valider le nouveau nom */
let
form_nom = document.getElementById("form_nom");
nom = document.getElementById("new_nom"),
valide_nom = document.getElementById("valide_nom");

form_nom.addEventListener("submit",function(e){
    e.preventDefault();
    let
    value_nom = nom.value.trim();
    value_nom = nom.value.replace(/ +/g,"");
    let erreur = "Entrez un nom d'utilisateur";
    let link = "check_nom_utilisateur";
    /* si le text est vide */
    if(value_nom == "")
    {
            Swal.fire({
            icon: "error",
            title: erreur,
            text: "",
            confirmButtonText: "OK",
            confirmButtonColor: "#31487a"
        })
        return;
    }
    else
    {
        valide_nom.setAttribute("disabled","");
        $.post("fonctions/"+link+".php",
            {nom: nom.value.trim()},
            function(data){
                /* si le text exist */
                if(data.result == "error")
                {
                    Swal.fire({
                        icon: "error",
                        title: "Ce nom est déjà utiliser",
                        text: "",
                        confirmButtonText: "OK",
                        confirmButtonColor: "#31487a"
                    })
                    valide_nom.removeAttribute("disabled");
                    return;
                }
                else
                {
                    Swal.fire({
                        icon: "success",
                        title: "Le nom a été modifier",
                        text: "",
                        confirmButtonText: "OK",
                        confirmButtonColor: "#31487a",
                        iconColor: "#31487a",
                        timer: 1000
                    })
                    valide_nom.removeAttribute("disabled");
                }
            }
        )
    }
})

/* checking adresse email */
let
form_email = document.getElementById("form_email"),
email = document.getElementById("email"),
valide_email = document.getElementById("valide_email");
let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

form_email.addEventListener("submit",function(e){
    e.preventDefault();
    let
    value_email = email.value.trim();
    value_email = email.value.replace(/ +/g,"");
    if(value_email == "")
    {
            Swal.fire({
            icon: "error",
            title: "Entrez une adresse email",
            text: "",
            confirmButtonText: "OK",
            confirmButtonColor: "#31487a"
        })
        email.focus();
        return;
    }
    else if(emailRegex.test(email.value.trim()) == false)
    {
            Swal.fire({
            icon: "error",
            title: "Entrez une adresse email correct",
            text: "",
            confirmButtonText: "OK",
            confirmButtonColor: "#31487a"
        })
        email.focus();
        return;
    }
    else
    {
        valide_email.setAttribute("disabled","");
        $.post("fonctions/check_edit_email.php",
            {email: email.value.trim()},
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
                    email.focus();
                    valide_email.removeAttribute("disabled");
                    return;
                }
                else
                {
                    Swal.fire({
                        icon: "success",
                        title: "L'adresse email a été modifier",
                        text: "",
                        confirmButtonText: "OK",
                        confirmButtonColor: "#31487a",
                        iconColor: "#31487a",
                        timer: 1000
                    })
                    valide_email.removeAttribute("disabled");
                }
            }
        )
    }
})

/* let check new password */
let form_password = document.getElementById("form_password"),
password = document.querySelectorAll("#password"),
valid_password = document.getElementById("valid_password");

form_password.addEventListener("submit",function(e){
    e.preventDefault();
    /* checker password */
    if(password.length>1)
    {
        if(password[1].value.length < 6)
        {
            Swal.fire({
                icon: "error",
                title: "Le mot de passe doit avoir au moins 6 caractères",
                text: "",
                confirmButtonText: "OK",
                confirmButtonColor: "#31487a"
            }).then(() => {
                password[1].focus();
            })
            return;
        }
        else if(password[0].value == password[1].value)
        {
            Swal.fire({
                icon: "error",
                title: "Veuillez entrer un nouveau mot de passe",
                text: "",
                confirmButtonText: "OK",
                confirmButtonColor: "#31487a"
            }).then(() => {
                password[1].focus();
            })
            return;
        }
        else if(password[2].value != password[1].value)
        {
            Swal.fire({
                icon: "error",
                title: "Les mots de passe ne sont pas identique.",
                text: "",
                confirmButtonText: "OK",
                confirmButtonColor: "#31487a"
            }).then(() => {
                password[1].focus();
            })
            return;
        }
    }
    /* checker si le password actuelle est correcte */
    valid_password.setAttribute("disabled","");
    $.post("fonctions/check_edit_password.php",
        {
            mdp: password[0].value,
            mdp1: password[1].value,
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
                email.focus();
                valid_password.removeAttribute("disabled");
                return;
            }
            else
            {
                Swal.fire({
                    icon: "success",
                    title: "Le mot de passe a été changé avec succès !",
                    text: "",
                    confirmButtonText: "OK",
                    confirmButtonColor: "#31487a",
                    iconColor: "#31487a",
                    timer: 1000
                })
                valid_password.removeAttribute("disabled");
                password.forEach(function(element){
                    element.value = "";
                })
            }
        }
    )
})
/* afficher password */
document.querySelectorAll(".icone_form_login").forEach(function(element){
    element.addEventListener("click",function(){
        let parentElement = element.parentElement;
        let passwordInput = parentElement.querySelector("input");
        element.classList.toggle("fa-eye-slash");
        element.classList.toggle("fa-eye");
        if(element.classList.contains("fa-eye-slash"))
        {
            passwordInput.type = "password";
        }
        else
        {
            passwordInput.type = "text";
        }
    })
})

/* lire l'écriture de la description */
let
description = document.getElementById("description"),
form_description = document.getElementById("form_description"),
valid_description = document.getElementById("valid_description");
form_description.addEventListener("submit",function(e){
    e.preventDefault();
    valid_description.setAttribute("disabled","");
    let temp_btn = valid_description.innerHTML;
    valid_description.innerHTML = `<i class="fa-solid fa-circle-notch rotate"></i>`;
    $.post("fonctions/check_edit_description.php",
        {
            description: description.value.trim(),
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
                valid_description.removeAttribute("disabled");
                valid_description.innerHTML = temp_btn;
                return;
            }
            else
            {
                Swal.fire({
                    icon: "success",
                    title: "La descriprion a été changer !",
                    text: "",
                    confirmButtonText: "OK",
                    confirmButtonColor: "#31487a",
                    iconColor: "#31487a",
                    timer: 1000
                })
                valid_description.removeAttribute("disabled");
                valid_description.innerHTML = temp_btn;
            }
        }
    )
})