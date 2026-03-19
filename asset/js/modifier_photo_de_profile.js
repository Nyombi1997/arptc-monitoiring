
    let cropper;
    const newPhotoDeProfile = document.getElementById("new_photo_de_profile");
    let zoneDeChopperPhotoDeProfile = document.getElementById("zone_de_crop_changer_photo_de_profile"),
    div_zone_de_crop_changer_photo_de_profile = document.getElementById("div_zone_de_crop_changer_photo_de_profile"),
    enregistrer_le_crop = document.getElementById("enregistrer_le_crop");

    newPhotoDeProfile.addEventListener("change", function(e) {
        div_zone_de_crop_changer_photo_de_profile.classList.add("active");
        const reader = new FileReader();

        reader.onload = function(event) {
            zoneDeChopperPhotoDeProfile.src = event.target.result;
            
            if (cropper) {
                cropper.destroy();
            }

            cropper = new Cropper(zoneDeChopperPhotoDeProfile, {
                viewMode: 1,
                aspectRatio: 1,
                autoCropArea: 1,
                movable: true,
                zoomable: true,
                cropBoxResizable: true
            });
        };
        
        reader.readAsDataURL(e.target.files[0]);
    });
    enregistrer_le_crop.addEventListener("click",function(){
        enregistrer_le_crop.setAttribute("disabled","");
        let temp_btn = enregistrer_le_crop.innerHTML;
        enregistrer_le_crop.innerHTML = `<i class="fa-solid fa-circle-notch rotate"></i>`;

        const canvas = cropper.getCroppedCanvas({
            width:500,
            height:500
        });

        canvas.toBlob(function(blob){

            let formData = new FormData();
            formData.append("croppedImage",blob);
            console.log(formData);
            fetch("/fonctions/crop.php",{
            method:"POST",
            body:formData
            })
            .then(res => res.json())
            .then(data => {
                if(data.result == "ok")
                {
                    Swal.fire({
                        icon: "success",
                        title: "Profile modifier avec succès",
                        text: "",
                        confirmButtonText: "OK",
                        confirmButtonColor: "#31487a",
                        timer: 2000
                    })
                    document.querySelectorAll("#profile_utilisateur").forEach(function(element){
                        element.src = "/asset/images/profile/"+data.msg;
                    })
                }
                else
                {
                    Swal.fire({
                        icon: "error",
                        title: "Une erreur s'est produite",
                        text: data.result,
                        confirmButtonText: "OK",
                        confirmButtonColor: "#31487a"
                    })
                }
                enregistrer_le_crop.removeAttribute("disabled");
                enregistrer_le_crop.innerHTML = temp_btn;
                div_zone_de_crop_changer_photo_de_profile.classList.remove("active");
            })
            .catch(error => 
                    Swal.fire({
                        icon: "error",
                        title: "Une erreur s'est produite",
                        text: error,
                        confirmButtonText: "OK",
                        confirmButtonColor: "#31487a"
                    }));

        });
    })