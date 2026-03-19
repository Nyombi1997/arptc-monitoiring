<div class="div_publier_file_actualite">
    <div class="profile_text_publier_file_actualite">
        <div class="parent_input_profile_publier_file_actualite">
            <div class="div_image_profile_publier_file_actualite">
                <?= $profile ?>
            </div>
            <div class="div_input_publier_file_actualite">
                <input type="text" placeholder="Partager votre savoir...">
            </div>
        </div>
        <div class="div_type_publication">
            <div class="detail_type_publication">
                <i class="fa-solid fa-video"></i> Vidéo
            </div>
            <div class="detail_type_publication" id="publier_image">
                <i class="fa-solid fa-image"></i> Image
            </div>
            <div class="detail_type_publication">
                <i class="fa-solid fa-file-lines"></i> Document
            </div>
        </div>
    </div>
</div>

<!-- pop up -->
<div class="div_parent_pop_up" id="pop_up_image">
    <!-- background -->
    <div class="background_pop_up" id="sortie_pop_up_image">
    </div>
    <div class="div_pop_up_container">
        <div class="titre_pop_up_container">Chargez votre image</div>
        <div class="charger_image_publication_pop_up_container">
            <label for="new_photo_publication" class="btn_new_image_publication_pop_up_container">Charger une image</label>
            <input type="file" name="" id="new_photo_publication">
        </div>
        <div class="div_zone_de_crop_photo_de_publication" id="div_zone_de_crop_photo_de_publication">
            <div class="div_crop_image_pop_up_container">
                <img src="" alt="" id="zone_de_crop_photo_de_publication">
            </div>
            <div class="div_text_publication_pop_up_container">
                <textarea name="" id="ecriture_publication_image" placeholder="Écrivez les details de votre publication"></textarea>
            </div>
            <div class="validation_publication_pop_up_container">
                <button type="button" id="enregistrer_le_crop">Publier</button>
            </div>
        </div>
    </div>
</div>

<script>
    let 
    publier_image = document.getElementById("publier_image"),
    sortie_pop_up_image = document.getElementById("sortie_pop_up_image"),
    pop_up_image = document.getElementById("pop_up_image");

    publier_image.addEventListener("click",function(){
        pop_up_image.classList.add("active");
    })
    
    sortie_pop_up_image.addEventListener("click",function(){
        pop_up_image.classList.remove("active");
    })

    let cropper;
    const new_photo_publication = document.getElementById("new_photo_publication");
    let zoneDeChopperPhotoPublication = document.getElementById("zone_de_crop_photo_de_publication"),
    div_zone_de_crop_photo_de_publication = document.getElementById("div_zone_de_crop_photo_de_publication"),
    ecriture_publication_image = document.getElementById("ecriture_publication_image")
    enregistrer_le_crop = document.getElementById("enregistrer_le_crop"),
    tags = true;

    /* lire l'ecriture de la publication en image */
    ecriture_publication_image.addEventListener("input",function(){
        let texte = this.value;

        tags = texte.match(/#(\w+)/g);
    })
    let tribute = new Tribute({
        trigger: '#',
        values: [
            { key: 'informatique', value: 'informatique' },
            { key: 'php', value: 'php' },
            { key: 'javascript', value: 'javascript' }
        ]
    });

    tribute.attach(ecriture_publication_image);


    new_photo_publication.addEventListener("change", function(e) {
        div_zone_de_crop_photo_de_publication.classList.add("active");
        const reader = new FileReader();

        reader.onload = function(event) {
            zoneDeChopperPhotoPublication.src = event.target.result;
            
            if (cropper) {
                cropper.destroy();
            }

            cropper = new Cropper(zoneDeChopperPhotoPublication, {
                viewMode: 1,           // Limite le crop aux bords de l'image
                aspectRatio: NaN,        // Carré (ou changer à null pour libre)
                autoCropArea: 1,       // Remplit le crop automatiquement
                movable: true,
                zoomable: true,
                cropBoxResizable: true,
                minContainerWidth: 300,
                minContainerHeight: 300
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
            /* enregistrer l'image */
            fetch("/fonctions/crop_image_publication.php",{
            method:"POST",
            body:formData
            })
            .then(res => res.json())
            .then(data => {
                if(data.result == "ok")
                {
                    let img = data.msg;
                    fetch("/fonctions/save_publication_img.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            message: ecriture_publication_image.value,
                            tags: tags,
                            img: img,
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data);
                    });
                    Swal.fire({
                        icon: "success",
                        title: "Publication réussit !",
                        text: "",
                        confirmButtonText: "OK",
                        confirmButtonColor: "#31487a",
                        timer: 2000
                    })
                    .then(()=>{
                        window.location = "/compte";
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
                    enregistrer_le_crop.removeAttribute("disabled");
                    enregistrer_le_crop.innerHTML = temp_btn;
                    div_zone_de_crop_photo_de_publication.classList.remove("active");
                }
            })
            .catch(error => 
                    Swal.fire({
                        icon: "error",
                        title: "Une erreur s'est produite",
                        text: error,
                        confirmButtonText: "OK",
                        confirmButtonColor: "#31487a"
                    }));
                    enregistrer_le_crop.removeAttribute("disabled");
                    enregistrer_le_crop.innerHTML = temp_btn;
                    div_zone_de_crop_photo_de_publication.classList.remove("active");
        });
    })
</script>